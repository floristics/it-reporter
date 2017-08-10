<?php

namespace App\Widgets;

use AdminTemplate;
use SleepingOwl\Admin\Widgets\Widget;
use SleepingOwl\Admin\Contracts\Widgets\WidgetInterface;

class NavigationUserBlock extends Widget implements WidgetInterface
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
        return view('auth.navbar', [ //тут косяк!
            'user' => auth()->user()
        ])->render();
    }

    /**
     * @return string|array
     */
    public function template()
    {
        return AdminTemplate::getViewPath('_partials.header');
    }

    /**
     * @return string
     */
    public function block()
    {
        return 'navbar.right';
    }
}