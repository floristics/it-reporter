<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Role;
use AdminColumnEditable;
use App\CatalogItem;
use App\Helpers\Helper;
use AdminFormButton;
use DB;






/**
 * Class Employees
 *
 * @property \App\Employee $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Employees extends Section
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
    protected $title = 'Сотрудники вашего отдела';

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
            -> setModelClass(\App\Employee::class)
            -> setHtmlAttribute('class', 'table-primary')
            -> setColumns(
                AdminColumn::text('id', '#'),
                AdminColumn::text('name', 'Имя'),
                AdminColumn::text('org.name', 'Организация'),
                AdminColumn::text('rank.name', 'Должность'), 

                AdminColumnEditable::checkbox('status')->setCheckedLabel('Работает')
                    ->setUncheckedLabel('Уволен')->setLabel('Статус')
            )
            -> paginate(25);
//todo: Добавить сверку по кол-ву работающих сотрудников.
        $numWorkPlace=DB::table('organisations')->select('num_workplace')->where('id', auth()->user()->getOrgId())->value('');
        $columns = AdminFormElement::columns()
            -> addColumn([AdminFormElement::html(                
                '<div class="alert bg-info">
                    <p>Согласно штатному расписанию в вашем отделе '.$numWorkPlace.' сотрудников.</p>
                    </div>')],12)
            -> addColumn([
                $table],12);
        $tabs = AdminDisplay::tabbed()
            -> appendTab($columns,$this->title);
        return $tabs ;
        
     
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {

        $columns = AdminFormElement::columns()
            -> addColumn([
                AdminFormElement::text('name','ФИО сотрудника')
                -> required('Укажите ФИО сотрудника')
            ],6)
            -> addColumn([
                AdminFormElement::select('catalog_item_id','Должность')
                    -> setModelForOptions(CatalogItem::class)
                    -> setLoadOptionsQueryPreparer(function($item, $query) {
                        return $query
                            ->where('catalog_id', Helper::getVarValue('employee_status_list'));
                    })
                    -> setDisplay('name')
                    -> required('Укажите должность сотрудника')
            ],6)
            -> addColumn([
                AdminFormElement::checkbox('status','Работает')
                    ->setDefaultValue(1)
            ],12);

        $form = AdminForm::panel()
            -> setModelClass($this->getClass()) //Без этого columns не работает
            -> addBody($columns,
                AdminFormElement::hidden('organisation_id')
                    -> setDefaultValue(auth()->user()->getOrgId())
            );

        $form -> getButtons() -> setButtons([
            'save_and_close'  => AdminFormButton::saveAndClose()
                -> setText('Создать'),
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
