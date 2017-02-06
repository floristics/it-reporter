<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

use SleepingOwl\Admin\Navigation\Page;
use AdminSection;
use PackageManager;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\User::class => 'App\Http\Sections\Users',
        \App\FundamentalSetting::class => 'App\Http\Sections\FundamentalSettings',
        \App\Organisation::class => 'App\Http\Sections\Organisations',
        \App\Contract::class => 'App\Http\Sections\Contracts',
        \App\Budget::class => 'App\Http\Sections\Budgets',
        \App\License::class => 'App\Http\Sections\Licenses',
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//
        parent::boot($admin);

    }
}
