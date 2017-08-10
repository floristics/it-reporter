<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Contract;
use App\Http\Sections\Contracts;

class ContractPolicy
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

    public function before(User $user, $ability, Contracts $section, Contract $item)
    {
        /*
         * Инициализируется первой, если не вернет true/false, то инициализируется функция-действие.
         */
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function display(User $user, Contracts $section, Contract $item)
    {
        return true;
    }

    public function create(User $user, Contracts $section, Contract $item)
    {
        return $user->isUser();
    }

    public function edit(User $user, Contracts $section, Contract $item)
    {
        return true;
        if ($user->isUser()){
            return $item->organisation_id == $user->GetOrgId();
        }
    }

    public function restore(User $user, Contracts $section, Contract $item)
    {
        return $this->edit($user, $section, $item);
    }

    public function delete(User $user, Contracts $section, Contract $item)
    {
        return $this->edit($user, $section, $item);
    }

}
