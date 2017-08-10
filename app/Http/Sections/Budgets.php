<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumn;
use \SleepingOwl\Admin\Facades\Display as AdminDisplay;
use \SleepingOwl\Admin\Facades\Form as AdminForm;
use \SleepingOwl\Admin\Facades\FormElement as AdminFormElement;
use App\FundamentalSetting;
use App\CatalogItem;
use SleepingOwl\Admin\Form\FormElements;
use AdminFormButton;
use App\Helpers\Helper;

class Budgets extends Section
{

    protected $model = '\App\Budget';

    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return $tabs =  AdminDisplay::tabbed() //todo: автоматизировать выбор вкладок, добавить подписи где какой бюджет.
            -> appendTab($this->getDisplayData(2016),'2016', Helper::isYearToday(2016))
            -> appendTab($this->getDisplayData(2017), '2017', Helper::isYearToday(2017))
            -> appendTab($this->getDisplayData(2018), '2018', Helper::isYearToday(2018))
            -> appendTab($this->getDisplayData(2019), '2019', Helper::isYearToday(2019));
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return $tabs = AdminDisplay::tabbed()
            -> appendTab($this->getFormData(2016),'2016', Helper::isYearToday(2016))
            -> appendTab($this->getFormData(2017), '2017', Helper::isYearToday(2017))
            -> appendTab($this->getFormData(2018), '2018', Helper::isYearToday(2018))
            -> appendTab($this->getFormData(2019), '2019', Helper::isYearToday(2019));

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

    /**
     * Формирование таблиц для вывода, обертка в функцию для упрощения вывода по годам
     * @param $year
     * @return $this
     */
    protected function getDisplayData($year)
    {
        $table1 = AdminDisplay::datatables()
            -> setModelClass(\App\Budget::class) //->with('departure')
            -> setApply(function($query) use($year) { //выводим только бюджет текущего юзера
                $query
                    -> where('organisation_id', auth()->user()->GetOrgId())
                    -> whereIn('catalog_item_id', [18,3,23,22,23]) //todo: значения должны браться из базы
                    -> where('year',$year);
            })
            -> setHtmlAttribute('class', 'table-primary')
            -> setColumns([
                AdminColumn::text('CatalogItem.name', 'Статья расходов')->setWidth('100px'),
                AdminColumn::custom('Значение')->setCallback(function($model) {
                    return  strrev(wordwrap(strrev($model->value), 3, " ",TRUE)) . ' руб.';
                })->setWidth('30px')
            ])
            -> paginate(25);


        $table2 = AdminDisplay::datatables()
            -> setModelClass(\App\Budget::class)//->with('departure')
            -> setApply(function($query) use($year) {
                //выводим только бюджет текущего юзера
                $query
                    ->where('organisation_id', auth()->user()->GetOrgId())
                    ->whereIn('catalog_item_id', [34,35,36,37,38]) //todo: значения должны браться из базы
                    -> where('year',$year);
            })
            -> setHtmlAttribute('class', 'table-primary')
            -> setColumns([
                AdminColumn::text('CatalogItem.name', 'Статья расходов')->setWidth('100px'),
                AdminColumn::custom('Значение')->setCallback(function($model) {
                    return  strrev(wordwrap(strrev($model->value), 3, " ",TRUE)) . ' руб.';
                })->setWidth('30px')
            ])
            -> paginate(25);


        $columns= AdminFormElement::columns()
            -> addColumn([AdminFormElement::html(
                '<div class="alert bg-info">
                    <h4> Бюджет ИТ</h4>
                </div>'),
                $table1],6)
            -> addColumn([AdminFormElement::html(
                '<div class="alert bg-info">
                    <h4> Бюджет АСУ ТП</h4>
                </div>'),
                $table2],6);

        return $columns;
    }

    /**
     * @param $year
     * @return mixed
     */
    protected function GetFormData($year)
    {
        $form1 = AdminForm::panel()
            -> setModelClass($this->getClass()) //Без этого columns не работает
            -> addBody(
                AdminFormElement::columns()
                    -> addColumn([AdminFormElement::select('catalog_item_id','Статья расходов')
                        -> setModelForOptions(CatalogItem::class)
                        -> setLoadOptionsQueryPreparer(function($item, $query) {
                            return $query
                                ->where('catalog_id', Helper::getVarValue('budget_list'));
                        })
                        -> setDisplay('name')
                        -> required('Укажите статью бюджета')],
                        6)
                    -> addColumn([AdminFormElement::text('value','Сумма (руб.)')
                        -> required('Укажите значение')],
                        6)

                ,AdminFormElement::hidden('organisation_id')
                    ->setDefaultValue(auth()->user()->getOrgId())
                ,AdminFormElement::hidden('year')
                    ->setDefaultValue($year)

        );

        $form1 -> getButtons() -> setButtons([
            'save_and_close'  => AdminFormButton::saveAndClose()
                -> setText('Создать'),
            'cancel' => AdminFormButton::cancel(),
        ]);

        $form2 = AdminForm::panel()
            -> setModelClass($this->getClass()) //Без этого columns не работает
            -> addBody(
                AdminFormElement::columns()
                    -> addColumn([AdminFormElement::select('catalog_item_id','Статья расходов')
                    -> setModelForOptions(CatalogItem::class)
                    -> setLoadOptionsQueryPreparer(function($item, $query) {
                        return $query
                            ->where('catalog_id', Helper::getVarValue('budget_asutp_list'));
                    })
                    -> setDisplay('name')
                    -> required('Укажите статью бюджета')],
                    6)
                    -> addColumn([
                        AdminFormElement::text('value','Сумма (руб.)')
                        ->required('Укажите значение')
                    ],6)

                ,AdminFormElement::hidden('organisation_id')
                    -> setDefaultValue(auth()->user()->getOrgId())
                ,AdminFormElement::hidden('year')
                    -> setDefaultValue($year)
        );

        $form2 -> getButtons() -> setButtons([
            'save_and_close'  => AdminFormButton::saveAndClose()
                -> setText('Создать'),
            'cancel' => AdminFormButton::cancel(),
        ]);

        $columns = AdminFormElement::columns()
            -> addColumn([AdminFormElement::html(
                '<div class="alert bg-info">
                    <h4> Бюджет ИТ</h4>
                </div>'),$form1],6)
            -> addColumn([AdminFormElement::html(
                '<div class="alert bg-info">
                    <h4> Бюджет АСУ ТП</h4>
                </div>'),$form2],6);

        return $columns;

    }
}
