<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Inf_resource;
use App\Http\Sections\Inf_resources;

class Inf_resourcesPolicy
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

    public function before(User $user, $ability, Inf_resources $section, Inf_resource $item)
    {
        /*
         * Инициализируется первой, если не вернет true/false, то инициализируется функция-действие.
         */
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function display(User $user, Inf_resources $section, Inf_resource $item)
    {
        return true;
    }

    public function create(User $user, Inf_resources $section, Inf_resource $item)
    {
        return $user->isUser();
    }

    public function edit(User $user, Inf_resources $section, Inf_resource $item)
    {
        return true;
        if ($user->isUser()){
            return $item->organisation_id == $user->GetOrgId();
        }
    }

    public function restore(User $user, Inf_resources $section, Inf_resource $item)
    {
        return $this->edit($user, $section, $item);
    }

    public function delete(User $user, Inf_resources $section, Inf_resource $item)
    {
        return $this->edit($user, $section, $item);
    }

}
