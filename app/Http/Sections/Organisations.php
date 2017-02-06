<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;
use App\User;

class Organisations extends Section //implements Initializable
{

    protected $model = '\App\Organisation';

   /* public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 3, function() {
            return \App\Organisation::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {
            //...
        });
    }*/

    public function getIcon()
    {
        return 'fa fa-building';
    }

    protected $checkAccess = true;

    protected $title;

    protected $alias;

    public function onDisplay()
    {
        return AdminDisplay::datatables()//->with('departure')
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::link('name', 'Название организации')->setWidth('30px'),
                AdminColumn::text('inn', 'ИНН')->setWidth('100px')
            )->paginate(25);
    }

    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('id', '#')->setReadonly(1),
            AdminFormElement::text('name', 'Название организации')->required(),
            AdminFormElement::select('user_id', 'Начальник ИТ отдела')->setModelForOptions(User::class)->setDisplay('name')->required('Выберите организацию'),
            AdminFormElement::text('inn', 'ИНН')
        ]);
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
