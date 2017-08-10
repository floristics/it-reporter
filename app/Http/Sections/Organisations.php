<?php

namespace App\Http\Sections;

use Illuminate\Http\Request;
use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Section;

use SleepingOwl\Admin\Display\Column\Lists;
    
    
use AdminColumn;
use AdminDisplay;
use \SleepingOwl\Admin\Facades\Form as AdminForm;
use \SleepingOwl\Admin\Facades\FormElement as AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;
use App\User;
use App\System;
use AdminSection;

//SleepingOwl\Admin\Facades\Admin::class,

/**
 * Class Organisations
 *
 * @property \Organisation $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Organisations extends Section implements Initializable
{
    protected $model = '\App\Organisation';

    public function initialize()
    {
        /*
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 3, function() {
            return \App\Organisation::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {
            //...
        });
        */

    }

    public function getIcon()
    {
        return 'fa fa-building';
    }

    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = true;

    protected $title;

    protected $alias;

    public function onDisplay($scopes = [])
    {
        $data= AdminDisplay::datatables()//->with('departure')
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#'),
                AdminColumn::link('name', 'Название организации'),
                AdminColumn::text('inn', 'ИНН'),
                AdminColumn::text('User.name')->setLabel('Руководитель отдела'),
                AdminColumn::text('num_workplace')->setLabel('Количество сотрудников ИТ')
            )->paginate(25);
        return $data;
    }

   public function onEdit($id)
    {
        $form = AdminForm::panel();

        $form->addBody(AdminFormElement::columns()
        ->AddColumn([
            AdminFormElement::text('name', 'Название организации')->required('Заполните это поле')->setReadOnly(!auth()->user()->isAdmin())
        ] ,3)
        ->AddColumn([
            AdminFormElement::select('user_id', 'Начальник ИТ отдела')->setModelForOptions(User::class)->setDisplay('name')->required('Заполните это поле')->setReadOnly(!auth()->user()->isAdmin())
        ],4)

        ->AddColumn([
            AdminFormElement::text('departure_name', 'Точное название отдела')->required('Заполните это поле')
        ],3)
        ->AddColumn([
            $n=AdminFormElement::number('num_workplace', 'Кол-во рабочих мест')->required('Заполните это поле')
        ],3)
        ->AddColumn([
            AdminFormElement::select('system_id', 'Учетная система')->setModelForOptions(System::class)->setDisplay('name')->required('Заполните это поле')
        ],4)
        ->AddColumn([
            AdminFormElement::text('inn', 'ИНН')
        ],3)
        ->AddColumn([AdminFormElement::file('User.image_url', 'Изображение профиля')->setUploadPath(function() {
    return 'images';
})],3)
        );
        return $form;
    }


    public function onCreate()
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Название организации')->required(),
            AdminFormElement::text('inn', 'ИНН')
        ]);
    }

    public function onDelete($id)
    {
        // todo: remove if unused
    }


    public function onRestore($id)
    {
        // todo: remove if unused
    }

}
