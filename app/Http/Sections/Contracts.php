<?php

namespace App\Http\Sections;

use App\Contract_annex as Annex;
use App\Organisation;
use Illuminate\Routing\Router;
use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Contracts\Template\Assets;
use SleepingOwl\Admin\Section;
use \SleepingOwl\Admin\Facades\TableColumn as AdminColumn;
use \SleepingOwl\Admin\Facades\Display as AdminDisplay;
use AdminDisplayFilter;
use AdminColumnFilter;
use AdminForm;
use \SleepingOwl\Admin\Facades\FormElement as AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;
use App\CatalogItem;
use App\FundamentalSetting;
use App\Contract_scan;
use App\Helpers\Helper;


class Contracts extends Section implements Initializable
{
    use \SleepingOwl\Admin\Traits\Assets;

    protected $model = '\App\Contract';

    /**
     * Initialize class.
     */

    public function __construct(\Illuminate\Contracts\Foundation\Application $app, $class)
    {
        parent::__construct($app, $class);
        //Инициализируем ассеты для добавления js файла
        $this->initializePackage();
    }

    public function initialize()
    {
        //Добавляем скрипт попапов со списком приложений
        //todo: проверить аргументы функции, почему то скрипт вклинивается во всех разделах сайта, до объявления jquery.
        $this->addScript('contractPopup','js/ContractPopup.js',['admin-default']);
        //Внедряем ассеты
        $this->includePackage();
    }

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
    protected $checkAccess = true;

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
            ->setFilters([ //Возможность фильтровать по GET "?organisation_id="
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
                ->setWidth('50'),
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
                ->setWidth('')
                ->setHtmlAttribute('class', 'text-left'),
              AdminColumn::text('_contractor.name', 'Подрядчик')
                  ->setWidth('')
                  ->setHtmlAttribute('class', 'text-left'),
            AdminColumn::custom('Cумма')->setCallback(function($model) {
                return  strrev(wordwrap(strrev($model->value), 3, " ",TRUE)) . ' руб.';
            }),
            AdminColumn::datetime('create_date','Дата заключения')
                ->setFormat('d.m.Y')
                ->setWidth('')
                ->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('specialist','Специалист')
                ->setWidth(''),
            AdminColumn::custom('Приложения')->setCallback(function($model) {
//todo: Большой запрос для каждого элемента, попробовать через annexes.name
                $annexCount = Annex::where('contract_id',$model->getKey())->count();
                if (!$annexCount) { return ;};
                $html = '<span>'.$annexCount.' шт.</span><br>';
                $html.= '<button onclick="showAnnexModal(\''.url('/home').'/annex?contract_id='.$model->getKey().'\')" class="btn btn-xs btn-outline blue">Показать</button>';
                return $html;
            })

            )->paginate(10);

        //Модальное окно для вывода приложений
        $data->getActions()->setView(view('AnnexModal'))->setPlacement('after.panel');

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
        $lol = new Contract_scan();
        $data->addBody(AdminFormElement::columns()
                ->addColumn($displayOrganisations, 4)
                ->addColumn([
                    AdminFormElement::select('pay_method', 'Тип')->setModelForOptions(CatalogItem::class)->setLoadOptionsQueryPreparer(function($item, $query) {
                        return $query->where('catalog_id', Helper::getVarValue('contract_type_list'));
                     })
                        ->setDisplay('name')->required('Выберите тип договора')
                ], 4)
                ->addColumn([
                    AdminFormElement::select('contractor', 'Подрядчик')->setModelForOptions(CatalogItem::class)->setLoadOptionsQueryPreparer(function($item, $query) {
                        return $query->where('catalog_id', Helper::getVarValue('contractor_list'));
                    })
                        ->setDisplay('name')->required('Выберите подрядчика по договору')
                ], 4)//todo номер каталога с подрядчиками
                ->addColumn([
                    AdminFormElement::text('name', 'Название')->required('Введите название договора')
                ], 4)
                ->addColumn([
                    AdminFormElement::select('pay_period', 'Период оплаты')->setModelForOptions(CatalogItem::class)->setLoadOptionsQueryPreparer(function($item, $query) {
                        return $query->where('catalog_id', Helper::getVarValue('pay_period_list'));
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

            AdminFormElement::file('scan', 'Загрузите скан основного договора (300*300 dpi)')->setModel($lol)->setUploadSettings(['contract_id'=>'2', 'path' => 'localhost'])
        );

        //dd (AdminFormElement::file('scan', 'Загрузите скан основного договора (300*300 dpi)')->setModel($lol)->setUploadSettings(['contract_id'=>'2', 'path' => 'localhost'])
        //); exit();
        // todo: Доработать отправку файлов!

        // Секция приложенний для договора
        if (!isset($id)) {//Если договор еще не создан
            $data->addFooter(
                AdminFormElement::html('<h4>Добавить приложения можно после добавления основного договора</h4>')
            );
        } else {//Если редактируем существующий договор
            $annexes = AdminFormElement::columns()->addColumn([AdminDisplay::table()
                ->setModelClass(Annex::class)
                ->setApply(function($query) use($id) {
                $query->where('contract_id', $id); // Фильтруем список приложений по ID договора
                })
                ->setParameter('contract_id', $id)
                ->setNewEntryButtonText('Добавить приложение')
                ->setTitle('<h3>Добавление приложений к договору</h3>')
                ->setColumns(
                AdminColumn::text('name', 'Название документа')
        )], 6);

            $data->addBody([ $annexes
                //,AdminFormElement::html('<a href="'.url('home').'/annex/create?contract_id='.$id.'" class="btn btn-success">Добавить приложение к договору</a>')
            ]);
        }

        return $data;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }


}
