<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $widgets = [
        \App\Widgets\DashboardBlock1::class,
        \App\Widgets\DashboardBlock2::class,
        \App\Widgets\NavigationUserBlock::class,
        //\App\Widgets\NavigationUserBlock::class
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $widgetsRegistry = $this->app[WidgetsRegistryInterface::class];

        foreach ($this->widgets as $widget) {
            $widgetsRegistry->registerWidget($widget);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
