<?php

namespace App\Http\Controllers;

use App\Http\Sections\Contracts;
use SleepingOwl\Admin\Http\Controllers\AdminController;
use AdminTemplate;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use AdminSection;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Form\Element\Select;


class AnnexController extends AdminController
{
    protected $data = [];
    private $parentBreadcrumb = 'home';

    public function index()
    {
        //Отображение информации о приложениях
    }

    public function edit($id)
    {
        //Редактирование приложения к договору

        //Вовод названия договора, к которому относится приложение
        if (!$id) {
            $this->data['contract_name'] = AdminFormElement::html("<h3>Название</h3>");
        }


        //$this->data['annex_name']
        //$this->data['value]
        //$this->data['pay_period']
        //$this->data['create_date']
        //$this->data['specialist']
        //$this->data['comment']

        return $this->renderView();
    }

    public function create()
    {
        //Добавление нового приложения к договору
        $this->edit(null);
    }

    /**
     * @return mixed
     */
    public function renderView()
    {
        $title = /*isset($this->data['org_name']) ? $this->data['org_name'] : */'Сводка по организации';
        return $this->renderContent(
            view('annex', $this->data), $title
        );
    }

    /*
     * Изменение метода родителя
     */
    public function renderContent($content, $title = null)
    {
        // $content = $content->with('data', $this->data)->render();
        $content = $content->with('data')->render();

        return AdminTemplate::view('_layout.inner')
            ->with('title', $title)
            ->with('content', $content)
            ->with('breadcrumbKey', $this->parentBreadcrumb);
    }

}
