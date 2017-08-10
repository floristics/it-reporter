<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Contract_annex as Annex;
use App\Http\Sections\Annexes;
use App\Contract;
use \Illuminate\Support\Facades\Request;
use \Illuminate\Support\Facades\Route;

class AnnexPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before(User $user, $ability, Annexes $section, Annex $item)
    {
        /*
         * Инициализируется первой, если не вернет true/false, то инициализируется функция-действие.
         */
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function display(User $user, Annexes $section, Annex $item)
    {
        return true;
    }

    public function create(User $user, Annexes $section, Annex $item)
    {
        if ($user->isUser()) {
            //Проверяем, принадлежит ли договор, для которого создаем приложение организации пользователя
            //1. Вытаскиваем id зашитое в url
            if ( Route::current()->adminModelId ) { return $item->getOrganisationId( Route::current()->adminModelId ) == $user->GetOrgId(); }
            //1. Вытаскиваем id помещенное в параметры url
            if ( Request::input('contract_id') ) { return $item->getOrganisationId( Request::input('contract_id') ) == $user->GetOrgId(); }
        }
    }

    public function edit(User $user, Annexes $section, Annex $item)
    {
        if ($user->isUser()){
            //Проверяем, принадлежит ли договор, для которого редактируем приложение организации пользователя
            return $item->GetOrganisationId() == $user->GetOrgId();
        }
    }

    public function restore(User $user, Annexes $section, Annex $item)
    {
        return $this->edit($user, $section, $item);
    }

    public function delete(User $user, Annexes $section, Annex $item)
    {
        return $this->edit($user, $section, $item);
    }
}
