<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\Organisation' => 'App\Policies\OrganisationPolicy',
        'App\FundamentalSetting' => 'App\Policies\FundamentalSettingsPolicy',
        //'App\Contract' => 'App\Policies\ContractPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(/*GateContract $gate*/)
    {
        $this->registerPolicies();
/*
        $gate->define('onDisplay', function ($user, $contract) {
            return false;
        });*/
    }
}
