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
        \App\Contract_annex::class => 'App\Http\Sections\Annexes',
        \App\Employee::class => 'App\Http\Sections\Employees',
        \App\Inf_resource::class => 'App\Http\Sections\Inf_resources'
    ];

    /**
     * Section::class => Policy::class
     * Если для секции правило в этом массиве не определено то Gate будет запрашивать неймспейс политик указанный в
     * sleeping_owl.php + имя секции + SectionModelPolicy
     * @var array
     */
    protected $policies = [
        \App\Http\Sections\Organisations::class => 'App\Policies\OrganisationPolicy',
        \App\Http\Sections\Contracts::class => 'App\Policies\ContractPolicy',
        \App\Http\Sections\Annexes::class => 'App\Policies\AnnexPolicy',
        \App\Http\Sections\FundamentalSettings::class => 'App\Policies\FundamentalSettingsPolicy',
        \App\Http\Sections\Users::class => 'App\Policies\UserPolicy',
        \App\Http\Sections\Inf_resources::class => 'App\Policies\Inf_resourcesPolicy',
        \App\Http\Sections\Employees::class =>  'App\Policies\EmployeesSectionModelPolicy',
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
        $this->registerMediaPackages();
        $this->registerPolicies('Admin\\Policies\\');

    }
    /*
     * пытался добавить скрипт попапа с приложениями к договорам - не работает
     */
    private function registerMediaPackages()
    {
        PackageManager::add('front.controllers')
            ->js('contractPopup', asset('js/ContractPopup.js'));
    }
}
