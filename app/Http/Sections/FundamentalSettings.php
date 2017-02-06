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

class FundamentalSettings extends Section //implements Initializable
{

    /**
     * @var \App\FundamentalSetting
     */
    protected $model = '\App\FundamentalSetting';

    /**
     * Initialize class.
     */
 /*   public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return \App\FundamentalSetting::count();
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
    protected $title = 'Базовые настройки';

    /**
     * @var string
     */
    protected $alias = 'settings';

    /**
     * @return Первичная отображаемая таблица
     */
    public function onDisplay()
    {
        return AdminDisplay::table()/*->with('users')*/
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('100px'),
                AdminColumn::link('name', 'Название'),
                AdminColumn::text('value', 'Значение'),
                AdminColumn::text('description', 'Описание')
            )->paginate(20);
    }

    /**
     * @param int $id
     * @return FormInterface
     */
    public function onEdit($id)
    {
        // поле var - нельзя редактировать, ибо нефиг системообразующий код редактировать
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Название настройки')->required(),
            AdminFormElement::text('value', 'Значение')->required(),
            AdminFormElement::textarea('description', 'Описание'),
            AdminFormElement::text('var', 'Название параметра')->setReadonly(1),
            AdminFormElement::text('id', 'ID')->setReadonly(1),
            AdminFormElement::text('created_at')->setLabel('Создано')->setReadonly(1),

        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        //return $this->onEdit(null);
        // а вот создать var можно. Один раз и навсегда
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Название настройки')->required(),
            AdminFormElement::text('var', 'Постоянный системный код')->required(),
            AdminFormElement::text('value', 'Значение')->required(),
            AdminFormElement::textarea('description', 'Описание'),

        ]);
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

    //заголовок для создания записи
    public function getCreateTitle()
    {
        return 'Создание базовой настройки';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-gear';
    }
}
