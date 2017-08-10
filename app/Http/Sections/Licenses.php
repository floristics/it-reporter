<?php

namespace App\Http\Sections;

use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumn;
use AdminDisplay;
use \SleepingOwl\Admin\Facades\Form as AdminForm;
use \SleepingOwl\Admin\Facades\FormElement as AdminFormElement;
use App\FundamentalSetting;
use App\CatalogItem;
use App\Helpers\Helper;

class Licenses extends Section
{

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

        $data = AdminDisplay::datatables()//->with('departure')
        ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('CatalogItem.name', 'Название')->setWidth('100px'),
                AdminColumn::custom('Кол-во')->setCallback(function($model) {
                    return  strrev(wordwrap(strrev($model->quantity), 3, " ",TRUE)) . ' шт.';
                })->setWidth('30px')
            )->paginate(25);

        $data->setApply(function($query) {
            $query->where('organisation_id', '=', auth()->user()->GetOrgId());
        });
        return $data;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $data= AdminForm::panel();
        $data->addBody(AdminFormElement::columns()
            ->addColumn([AdminFormElement::select('catalog_item_id','Программный продукт')->setModelForOptions(CatalogItem::class)->setLoadOptionsQueryPreparer(function($item, $query) {
                return $query->where('catalog_id', Helper::getVarValue('license_list'));
            })
                ->setDisplay('name')
                ->required('Укажите программный продукт')],6)
            ->addColumn([AdminFormElement::text('quantity','Кол-во лицензий')->required('Укажите значение')],6)
            ,AdminFormElement::hidden('organisation_id')->setDefaultValue(auth()->user()->getOrgId())

        );

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
