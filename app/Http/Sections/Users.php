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
use App\Role;

class Users extends Section //implements Initializable
{
    /**
     * @var \App\User
     */
    protected $model = '\App\User';

    /**
     * Initialize class.
     */
 /*   public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 3, function() {
            return \App\User::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {
            //...
        });
    }
*/
    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-users';
    }

    /**
     * @var bool
     */
    protected $checkAccess = true;
//todo Ограничение прав не по политикам а по Middleware
    /**
     * @var string
     */
    protected $title = 'Пользователи';


    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $data = AdminDisplay::datatables()
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::link('name', 'Login')->setWidth('200px'),
                AdminColumn::text('email', 'Email')->setWidth('150px'),
                AdminColumn::lists('roles.display_name')->setLabel('Roles')->setWidth('200px')
                /*,AdminColumn::custom('Роль')->setWidth('100px')->setCallback(function($model) {
                    return  \App\Role::find($model->role_id)->name;
                })*/
            )
            ->paginate(25);
       /* $data->setApply(function ($query) {
            $query->with(\App\Role::class);
        });*/


/*
        $data->setApply(function ($query) {
            $query->where('role_id', '<=', auth()->user()->role_id);
        });
*/
        return $data;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Login')->required(),
            AdminFormElement::text('email', 'Email')->required()->addValidationRule('email'),
            AdminFormElement::multiselect('roles', 'Roles')->setModelForOptions(new Role())->setDisplay('name'),
        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        // Создание и редактирование записи идентичны, поэтому перенаправляем на метод редактирования
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
     * Переопределение метода содержащего заголовок создания записи
     *
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    public function getCreateTitle()
    {
        return 'Добавление роли';
    }

    /**
     * Переопределение метода для запрета удаления записи
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return bool
     */
    public function isDeletable(\Illuminate\Database\Eloquent\Model $model)
    {
        return false;
    }

    /**
     * Переопределение метода содержащего ссылку на редактирование записи
     *
     * @param string|int $id
     *
     * @return string
     */

    /**
     * Переопределение метода содержащего ссылку на удаление записи
     *
     * @param string|int $id
     *
     * @return string
     */
    public function getDeleteUrl($id)
    {
        return 'Ссылка на удаление записи';
    }
}
