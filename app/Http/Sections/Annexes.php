<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use App\Contract;
use AdminColumn;
use SleepingOwl\Admin\Facades\Display as AdminDisplay;
use AdminDisplayFilter;
use AdminColumnFilter;
use \SleepingOwl\Admin\Facades\Form as AdminForm;
use \SleepingOwl\Admin\Facades\FormElement as AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;
use App\CatalogItem;
use App\FundamentalSetting;
use Debugbar;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;

/**
 * Class Annexes
 * Contract_id подставляется автоматически в inoput методом GET
 *
 * @property \Contract_annex $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Annexes extends Section
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = true;

    /**
     * @var string
     */
    protected $model = '\App\Contract_annex';

    /**
     * @var string
     */
    protected $title = "Приложения для договоров";

    /**
     * @var string
     */
    protected $alias = 'annex';

    /**
     * @return DisplayInterface
     */

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
       //Разрешаем добавлять документ только для своего договора. App\Policies\AnnexPolicy
       //todo: Сделать это!

        $data =  AdminForm::panel()->setHtmlAttribute('enctype', 'multipart/form-data');
        $data->addBody([
            AdminFormElement::hidden('contract_id'),
            AdminFormElement::columns()
            /*->addColumn([AdminFormElement::select('contract_id','Основной договор')->setModelForOptions(Contract::class)->setLoadOptionsQueryPreparer(function($item, $query) {
                $idUserOrg = DB::table('organisations')->where('user_id',auth()->id())->value('id');
                return $query->where('organisation_id', $idUserOrg);
            })
                ->setDisplay('name')
            ], 4)*/
            ->addColumn([AdminFormElement::text('name','Название документа')], 4)
            ->addColumn([AdminFormElement::date('create_date','Дата заключения')], 4)
            ->addColumn([AdminFormElement::text('value','Сумма оплаты (руб.)')], 4)
            ->addColumn([AdminFormElement::select('pay_period','Период оплаты')->setModelForOptions(CatalogItem::class)->setLoadOptionsQueryPreparer(function($item, $query) {
                return $query->where('catalog_id', Helper::getVarValue('pay_period_list'));
            })
                ->setDisplay('name')
                ->required('Выберите периодичность оплат по договору')
            ], 4)
            ->addColumn([AdminFormElement::text('specialist','Ответственный специалист')], 4)
            ->addColumn([AdminFormElement::textarea('comment','Комментарий')], 4)

            ,AdminFormElement::file('scan', 'Загрузите скан основного договора (300*300 dpi)')]);


        return $data;
    }

    public function onDisplay()
    {
        $data = AdminDisplay::datatables()->setOrder([[1, 'asc']]);
        $data->setApply(function($query) {
            $query->select('contract_annexes.*')->leftjoin('contracts', 'contract_annexes.contract_id', '=', 'contracts.id')->where('organisation_id','9');
        });
        $data->setColumns(
            AdminColumn::text('name', 'Название')->append(AdminColumn::custom()
                ->setCallback(function($model) {
                    if (!$model->scan == '') {
                        return  "<a class='btn btn-outline blue pull-left btn-xs' href='../". $model->scan ."' target='_blank'>
                                     <i class='fa fa-download'></i>
                                     </a>";
                    } else {
                        return '';
                    }
                })),
            AdminColumn::text('create_date', 'Дата заключения'),
            AdminColumn::text('comment', 'Комментарий')
        );

        if (request()->input('contract_id') > 0) {
            $data->setApply(function($query) {
                $query->where('contract_id', request()->input('contract_id')); // Фильтруем список приложений по ID договора
            });
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
