<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Employee as Employee;
use App\Http\Sections\Employees;
use App\Contract;
use \Illuminate\Support\Facades\Request;
use \Illuminate\Support\Facades\Route;

class EmployeesSectionModelPolicy
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

    public function before(User $user, $ability, Employees $section, Employee $item)
    {
        /*
         * Инициализируется первой, если не вернет true/false, то инициализируется функция-действие.
         */
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function display(User $user, Employees $section, Employee $item)
    {
           return true;
    }

    public function create(User $user, Employees $section, Employee $item)
    {
        return true;
    }

    public function edit(User $user, Employees $section, Employee $item)
    {
        return true;
    }

    public function restore(User $user, Employees $section, Employee $item)
    {
        return $this->edit($user, $section, $item);
    }

    public function delete(User $user, Employees $section, Employee $item)
    {
        return $this->edit($user, $section, $item);
    }
}
