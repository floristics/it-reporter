<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Contract;

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

    public function before(User $user, $ability, Contract $item)
    {
        /*
         * Инициализируется первой, если не вернет true/false, то инициализируется функция-действие.
         */
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function display(User $user, Contract $item)
    {
        return true;
    }

    public function create(User $user, Contract $item)
    {
        return $user->isUser();
    }

    public function edit(User $user, Contract $item)
    {
        if ($user->isUser()){
            return $item->organisation_id == $user->GetOrgId();
        }
    }

    public function restore(User $user, Contract $item)
    {
        return $this->edit($user, $item);
    }

    public function delete(User $user, Contract $item)
    {
        return $this->edit($user, $item);
    }

}
