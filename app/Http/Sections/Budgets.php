<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;

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

        return AdminDisplay::datatables()//->with('departure')
        ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                /*AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::text('organisation_id', 'Название организации')->setWidth('30px'),*/
                AdminColumn::text('CatalogItem.name', 'Статья расходов')->setWidth('100px'),
                AdminColumn::custom('Значение')->setCallback(function($model) {
                    return  strrev(wordwrap(strrev($model->value), 3, " ",TRUE)) . ' руб.';
                })->setWidth('30px')
            )->paginate(25);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('CatalogItem.name', 'Статья расходов')->required(),
            AdminFormElement::text('value', 'Значение')->required()
        ]);
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
