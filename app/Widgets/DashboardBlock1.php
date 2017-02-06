<?php

namespace App\Widgets;

use SleepingOwl\Admin\Widgets\Widget;
use SleepingOwl\Admin\Contracts\Widgets\WidgetInterface;

class DashboardBlock1 extends Widget implements WidgetInterface
{
    /**
     * Если метод вернет false, блок не будет помещен в шаблон
     * Данный метод не обязателен
     *
     * @return boolean
     */
    public function active()
    {
        return true;
    }

    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        return view('dashboard.block1');
    }

    /**
     * @return string|array
     */
    public function template()
    {
        return \AdminTemplate::getViewPath('dashboard');
    }

    /**
     * @return string
     */
    public function block()
    {
        return 'block.top';
    }
}