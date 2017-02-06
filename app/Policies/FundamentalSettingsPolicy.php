<?php

namespace App\Policies;

use App\User;
use App\FundamentalSetting;
use Illuminate\Auth\Access\HandlesAuthorization;

class FundamentalSettingsPolicy
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

    public function before(User $user, $ability, FundamentalSetting $item)
    {
        return $user->isAdmin();
    }
}
