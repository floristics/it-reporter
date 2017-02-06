<?php

namespace App\Http\Sections;

use App\Organisation;
use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumn;
use AdminDisplay;
use AdminDisplayFilter;
use AdminColumnFilter;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;
use App\CatalogItem;
use App\FundamentalSetting;

class Contracts extends Section /*implements Initializable*/
{
    protected $model = '\App\Contract';

    /**
     * @param $var - имя переменной FundamentalSettings
     * @return FundamentalSettings::value
     */
    protected function getVarValue($var){
        $model = FundamentalSetting::class;
        $model = new $model;
        return $model->where('var', $var)->first()->value;
    }


    /**
     * Initialize class.
     */
  /*  public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 3, function() {
            return \App\Contract::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {
            //...
        });
    }
*/
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = 'Договорная база';

    /**
     * @var string
     */
    protected $alias = 'contracts';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {

        $data = AdminDisplay::datatables()
            ->with('_organisation','_pay_method','_contractor')
            ->setHtmlAttribute('class', 'table-primary')
            ->setFilters([
                AdminDisplayFilter::related('organisation_id')->setModel(Organisation::class)
            ])
            ->setOrder([[1, 'asc']]);
        $data->setColumnFilters([
            null,
            AdminColumnFilter::text()->setPlaceholder('Организация'),
            AdminColumnFilter::text()->setPlaceholder('Название'),
            null,
            null,
            null,
            null,
            AdminColumnFilter::text()->setPlaceholder('Специалист'),
            null,
                //AdminColumnFilter::select()->setPlaceholder('Тип оплаты')->setModel(new Country)->setDisplay('title'),
                //AdminColumnFilter::text()->setPlaceholder('Companies'),
            ]);
        $data->setColumns(
 //               AdminColumn::action('Cr')
//                ->setIcon('fa fa-download'),
                AdminColumn::filter('organisation_id')
                    ->setWidth('40px'),
                AdminColumn::text('_organisation.name', 'Организация'),
                AdminColumn::text('name', 'Название')
                    ->setHtmlAttribute('class', 'text-left font-blue-madison')
                    ->append(AdminColumn::custom()
                            ->setCallback(function($model) {
                                if (!$model->scan == '') {
                                    return  "<a class='btn btn-outline blue pull-left btn-xs' href='../". $model->scan ."' target='_blank'>
                                             <i class='fa fa-download'></i>
                                             </a>";
                                } else {
                                    return '';
                                }
                            })),
                AdminColumn::text('_pay_method.name', 'Тип')
                    ->setWidth('200px')
                    ->setHtmlAttribute('class', 'text-left'),
                  AdminColumn::text('_contractor.name', 'Подрядчик')
                      ->setWidth('200px')
                      ->setHtmlAttribute('class', 'text-left'),
                AdminColumn::custom('Cумма')->setCallback(function($model) {
                    return  strrev(wordwrap(strrev($model->value), 3, " ",TRUE)) . ' руб.';
                }),
                AdminColumn::datetime('create_date')
                    ->setLabel('Дата заключения')
                    ->setFormat('d.m.Y')
                    ->setWidth('170px')
                    ->setHtmlAttribute('class', 'text-center'),
                AdminColumn::text('specialist','Специалист')
                    ->setWidth('150px')

 //               AdminColumn::lists('roles.name')->setLabel('Roles')->setWidth('200px')
            )
            ->paginate(10);

        return $data;
    }
    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $data =  AdminForm::panel()->setHtmlAttribute('enctype', 'multipart/form-data');
/*
        $data->addHeader(AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::text('firstName', 'First Name')->required()
                ], 3)->addColumn([
                    AdminFormElement::text('lastName', 'Last Name')->required()
                ], 3)->addColumn([
                    AdminFormElement::date('birthday', 'Birthday')->setFormat('d.m.Y')->required()
                ])
        );
*/


        $displayOrganisations = [];
        if (auth()->user()->isUser()){
            //Отображаем организацию юзера
            $displayOrganisations = [
                AdminFormElement::select('organisation_id', 'Организация')->setModelForOptions(new Organisation)
                    ->setLoadOptionsQueryPreparer(function($item, $query) {
                    return $query->where('id', auth()->user()->getOrgId());
                    })
                    ->setDisplay('name')->required('Выберите организацию')
            ];
        } else {
            $displayOrganisations = [
                AdminFormElement::select('organisation_id', 'Организация')->setModelForOptions(new Organisation)->setDisplay('name')->required('Выберите организацию')
            ];
        };
        $data->addBody(AdminFormElement::columns()
                ->addColumn($displayOrganisations, 4)
                ->addColumn([
                    AdminFormElement::select('pay_method', 'Тип')->setModelForOptions(CatalogItem::class)->setLoadOptionsQueryPreparer(function($item, $query) {
                        return $query->where('catalog_id', $this->getVarValue('contract_type_list'));
                     })
                        ->setDisplay('name')->required('Выберите тип договора')
                ], 4)
                ->addColumn([
                    AdminFormElement::select('contractor', 'Подрядчик')->setModelForOptions(CatalogItem::class)->setLoadOptionsQueryPreparer(function($item, $query) {
                        return $query->where('catalog_id', $this->getVarValue('contractor_list'));
                    })
                        ->setDisplay('name')->required('Выберите подрядчика по договору')
                ], 4)//todo номер каталога с подрядчиками
                ->addColumn([
                    AdminFormElement::text('name', 'Название')->required('Введите название договора')
                ], 4)
                ->addColumn([
                    AdminFormElement::select('pay_period', 'Период оплаты')->setModelForOptions(CatalogItem::class)->setLoadOptionsQueryPreparer(function($item, $query) {
                        return $query->where('catalog_id', $this->getVarValue('pay_period_list'));
                    })
                        ->setDisplay('name')
                        ->required('Выберите периодичность оплат по договору')
                ], 4)//todo перенести в базу все опции
                ->addColumn([
                    AdminFormElement::text('value', 'Сумма оплаты (руб.)')->required('Укажите сумму оплаты по договору')
                ], 2)
                ->addColumn([
                    AdminFormElement::date('create_date', 'Дата заключения')->required('Укажите дату заключения договора')
                ], 2)
                ->addColumn([
                    AdminFormElement::text('specialist', 'Ответственный специалист')->required('Укажите специалиста')
                ], 4)->addColumn([
                    AdminFormElement::textarea('comment', 'Комментарий')
                ], 8),

                AdminFormElement::file('scan', 'Загрузите скан договора (300*300 dpi)')->required('Загрузите скан договора')
        );
/*
            [
                AdminFormElement::text('name', 'Login')->required(),
                AdminFormElement::text('email', 'Email')->required()->addValidationRule('email'),
                AdminFormElement::multiselect('roles', 'Roles')->setModelForOptions(new Role())->setDisplay('name'),
            ]);
*/
        return $data;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // todo: remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }
}
