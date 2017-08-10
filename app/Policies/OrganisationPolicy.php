<?php

namespace App\Policies;

use App\User;
use App\Organisation;
use App\Http\Sections\Organisations;
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

    public function before(User $user, $ability, Organisations $section, Organisation $item)
    {
        if ($user->isAdmin()) { return true; }
    }

    public function edit(User $user, Organisations $section, Organisation $item)
    {
        //разрешить редактирование своей организациии
        return $item->user_id == auth()->user()->id;
    }
}
