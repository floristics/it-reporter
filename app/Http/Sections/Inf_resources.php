<?php

namespace App\Http\Sections;

use App\CatalogItem;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use \App\Inf_resource as IR_model;
use SleepingOwl\Admin\Contracts\Initializable;
use AdminDisplay;
use \SleepingOwl\Admin\Facades\TableColumnFilter as AdminColumnFilter;
use AdminDisplayFilter;
use \SleepingOwl\Admin\Facades\TableColumn as AdminColumn;
use \SleepingOwl\Admin\Facades\FormElement as AdminFormElement;
use AdminForm;
use App\Helpers\Helper;
use App\Organisation;
use AdminFormButton;
use App\Contract;

/**
 * Class Inf_resources
 *
 * @property \App\Inf_resource $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Inf_resources extends Section
{
    protected $model = IR_model::class;

    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = true;

    /**
     * @var string
     */
    protected $title = 'Категорирование информационных ресурсов';

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $table = AdminDisplay::datatables()

            ->setHtmlAttribute('class', 'table-primary')

            /*->setFilters([ //Возможность фильтровать по GET "?organisation_id="
                AdminDisplayFilter::related('organisation_id')->setModel(IR_model::class)
            ])*/

            ->setOrder([[1, 'asc']])

            ->setColumns([
                AdminColumn::text('_organisation.name', 'Организация')->setWidth(50),
                AdminColumn::text('_inf_resource.name', 'Наименование ИР'),
                AdminColumn::custom('КК', function ($model) {
                    return $model->privacyColumn[$model->privacy];
                }),
                AdminColumn::custom('Кц', function ($model) {
                    return $model->integrityColumn[$model->privacy];
                }),
                AdminColumn::custom('Кд', function ($model) {
                    return $model->availabilityColumn[$model->privacy];
                }),
                AdminColumn::text('details', 'Расположение ИР (имя сервера или рабочей станции - DNS, IP)'),
                AdminColumn::text('purpose', 'Назначение ИР'),
                AdminColumn::text('owner', 'Собственник ИР'),
                AdminColumn::text('holder', 'Владелец ИР'),
                AdminColumn::text('accountable', 'Ответственный за эксплуатацию ИР'),

            ]);

        //todo: фильтры сбивают верстку из-за своих размеров
        /*$table->setColumnFilters([
            AdminColumnFilter::text()->setPlaceholder('Организация'),
            AdminColumnFilter::select()->setPlaceholder('Наименование ИР')->setModel(new CatalogItem())->setDisplay('name'),
            AdminColumnFilter::text()->setPlaceholder('КК'),
            AdminColumnFilter::text()->setPlaceholder('Кц'),
            AdminColumnFilter::text()->setPlaceholder('Кд'),
            null,
            null,
            null,
            null,
            null,
            //AdminColumnFilter::select()->setPlaceholder('Тип оплаты')->setModel(new Country)->setDisplay('title'),
            //AdminColumnFilter::text()->setPlaceholder('Companies'),
        ]);*/

        return $table;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $form =  AdminForm::panel()->setHtmlAttribute('enctype', 'multipart/form-data')

            -> addBody(
                AdminFormElement::columns()
                    -> addColumn([
                        AdminFormElement::select('organisation_id', 'Организация')
                            -> setModelForOptions(new Organisation)
                            -> setLoadOptionsQueryPreparer(function($item, $query) {
                                return $query->where('id', auth()->user()->getOrgId());
                            })
                            -> setDisplay('name')
                            -> required('Выберите организацию')
                    ],4)
                    -> addColumn([
                        AdminFormElement::select('catalog_item_id', 'Наименование ИР')
                            -> setModelForOptions(CatalogItem::class)
                            -> setLoadOptionsQueryPreparer(function($item, $query) {
                                return $query->where('catalog_id', Helper::getVarValue('inf_resource_list'));
                            })
                            -> setDisplay('name')->required('Выберите наименование ИР')
                    ],4)
                    -> addColumn([
                        AdminFormElement::select('privacy', 'Категория конфиденциальности')
                        -> setOptions($this->getModel()->privacyColumn)
                    ] ,4)
                    -> addColumn([
                        AdminFormElement::select('integrity', 'Категория целостности')
                            -> setOptions($this->getModel()->integrityColumn)
                    ],4)
                    -> addColumn([
                        AdminFormElement::select('availability', 'Категория доступности')
                            -> setOptions($this->getModel()->availabilityColumn)
                    ],4)
                    -> addColumn([
                        AdminFormElement::text('details','Расположение ИР (имя сервера или рабочей станции - DNS, IP)')
                    ],4)
                    -> addColumn([
                        AdminFormElement::text('purpose','Назначение ИР')
                    ],4)
                    -> addColumn([
                        AdminFormElement::text('owner','Собственник ИР')
                    ],4)
                    -> addColumn([
                        AdminFormElement::text('holder','Владелец ИР')
                    ],4)
                    -> addColumn([
                        AdminFormElement::text('accountable','Ответственный за эксплуатацию ИР')
                    ],4)
                    -> addColumn([
                        AdminFormElement::select('contract_id', 'Сопоставленный договор')
                            -> setModelForOptions(new Contract)
                            -> setLoadOptionsQueryPreparer(function($item, $query) {
                                return $query->where('organisation_id', auth()->user()->getOrgId());
                            })
                            -> setDisplay('name')
                    ],4)


            );

        $form -> getButtons() -> setButtons([
            'save_and_close'  => AdminFormButton::saveAndClose()->setText('Создать'),
            'cancel' => AdminFormButton::cancel(),
        ]);

        return $form;
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
