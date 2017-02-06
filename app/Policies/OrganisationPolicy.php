<?php

namespace App\Policies;

use App\User;
use App\Organisation;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganisationPolicy
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

    public function before(User $user, $ability, Organisation $item)
    {
        return $user->isAdmin();
    }
}
