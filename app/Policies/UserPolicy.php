<?php

namespace App\Policies;

use App\User;
use App\Http\Sections\Users;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function before(User $user, $ability, Users $section, User $item)
    {
        return $user->isAdmin();
    }

}
