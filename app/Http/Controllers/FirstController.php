<?php

namespace App\Http\Controllers;

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
use App\Organisation, \App\User, \App\System, \App\Budget, \App\License;

class FirstController extends AdminController
{
    public function __construct()
    {
        $this->middleware('user');

    }

    protected $data = [];
    private $parentBreadcrumb = 'home';
    private $org_id = '';


    /*
     * Подготовка данных
     */
    public function index(Request $request)
    {
        if (auth()->user()->isUser() && !auth()->user()->isAdmin()) {
            //Если USER => информация об организации, где он руководитель.
            $this->org_id = auth()->user()->getOrgId();
            $this->data['displayFilter'] = 0;
        } else {
            //Если ADMIN => информация о любой организации.
            $this->org_id = $request->input('organisation_id');
            $this->data['displayFilter'] = 1;
        }

        $this->data['select'] = AdminFormElement::select('organisation_id','Выберите организацию')->setModelForOptions(Organisation::class)->setDisplay('name');
        $this->data['orgs'] = DB::table('organisations')->select('id','name')->get();

        if ($this->org_id == '') {
            //Не выбрано никакой организации
            return $this->renderView();
            exit();
        }

        $org = Organisation::find($this->org_id);
        $this->data['org_id'] = $this->org_id;
        $this->data['org_name'] = $org->name;
        $this->data['org_manager'] = User::find($org->user_id)->name;
        $this->data['system'] = System::find($org->system_id)->name;
        $this->data['num_workplace'] = $org->num_workplace;
         $this->data['licenses'] = License::join('catalog_items', 'licenses.catalog_item_id', '=', 'catalog_items.id')->select('name','quantity')->where('organisation_id','=',$org->id)->get();
        $this->data['budgets'] = Budget::join('catalog_items', 'budgets.catalog_item_id', '=', 'catalog_items.id')->select('name','value')->where('organisation_id','=',$org->id)->whereIn('catalog_item_id', [18,3,23,22,23])->get(); //todo: значения должны браться из базы
        $this->data['budgets_asutp'] = Budget::join('catalog_items', 'budgets.catalog_item_id', '=', 'catalog_items.id')->select('name','value')->where('organisation_id','=',$org->id)->whereIn('catalog_item_id', [34,35,36,37,38])->get(); //todo: значения должны браться из базы
       
        $this->data['is_user_org_manager'] = auth()->user()->getOrgId() == $org->id;

        return $this->renderView();
    }


    /**
     * @return mixed
     */
    public function renderView()
    {
        $title = /*isset($this->data['org_name']) ? $this->data['org_name'] : */'Сводка по организации';
        return $this->renderContent(
            view('mypage', $this->data), $title
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

