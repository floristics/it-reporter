<?php

namespace App\Policies;

use App\User;
use App\FundamentalSetting;
use App\Http\Sections\FundamentalSettings;
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

    public function before(User $user, $ability, FundamentalSettings $section, FundamentalSetting $item)
    {
        return $user->isAdmin();
    }
}
