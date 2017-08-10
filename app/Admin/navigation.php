<?php

use SleepingOwl\Admin\Navigation\Page;
use SleepingOwl\Admin\Navigation\Badge;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
/*
 AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
 	  $page
		  ->addPage()
	  	  ->setTitle('Dashboard')
		  ->setUrl(route('admin.dashboard'))
		  ->setPriority(100);

	  $page->addPage(\App\User::class);
 });
*/
// // or
//
// AdminSection::addMenuPage(\App\User::class);

return [
    (new Page(''))
        ->setIcon('fa fa-dashboard')
        ->setTitle('Dashboard')
        ->setPriority(1)
        ->setUrl(route('admin.dashboard'))
        ->setAccessLogic(function (Page $page) {
            return auth()->user()->isAdmin();
        }),

    (new Page(''))
        ->setIcon('fa fa-pie-chart')
        ->setTitle('Сводная информация')
        ->setPriority(2)
        ->setUrl(route('admin.about')),

    (new Page(App\Contract::class))
        ->setIcon('fa fa-file-text')
        ->setTitle('Договоры')
        ->setPriority(3),

   (new Page(App\Inf_resource::class))
        ->setIcon('fa fa-list')
        ->setTitle('Категорирование ИР')
        ->setPriority(4),

    (new Page(App\Organisation::class))
        ->setIcon('fa fa-building')
        ->setTitle('Организации')
        ->setPriority(5)
        ->setAccessLogic(function (Page $page) {
            return auth()->user()->isAdmin();
        }),

    [
        'title' => 'Information',
        'icon'  => 'fa fa-exclamation-circle',
        'priority'    => 7,
        'url'   => route('admin.information'),
    ],

    [
        'title' => "Настройки",
        'icon' => 'fa fa-gear',
        'priority'    => 6,
        'pages' => [
            (new Page(''))
                ->setIcon('fa fa-gear')
                ->setTitle('App Settings')
                ->setPriority(3)
                ->setUrl(route('admin.app_settings'))
                ->setAccessLogic(function (Page $page) {
                    return auth()->user()->isAdmin();
                }),

            (new Page())
                ->setIcon('fa fa-building')
                ->setTitle('Моя организация')
                ->setPriority(4)
                ->setUrl('/home/organisations/edit'),

            (new Page())
                ->setIcon('fa fa-users')
                ->setTitle('Мои сотрудники')
                ->setPriority(5)
                ->addBadge(function() {
                    return \App\Employee::where('status','=','1')->count();
                },['class' => 'label-warning'])
                ->setUrl('/home/employees'),

            (new Page(App\User::class))
                ->setIcon('fa fa-users')
                ->setTitle('Пользователи') //todo Добавить счетчик кол-ва юзеров
                ->setPriority(1)
                ->setAccessLogic(function (Page $page) {
                    return auth()->user()->isAdmin();
                }),

            (new Page(App\FundamentalSetting::class))
                ->setIcon('fa fa-gear')
                ->setTitle('Настройки приложения')
                ->setPriority(4)
                ->setAccessLogic(function (Page $page) {
                    return auth()->user()->isAdmin();
                }),

            (new Page(App\Budget::class))
                ->setIcon('fa fa-money')
                ->setTitle('Бюджеты')
                ->setPriority(6),

            (new Page(App\License::class))
                ->setIcon('fa fa-check-square-o ')
                ->setTitle('Лицензии')
                ->setPriority(7),
        ]
    ],

/*
    [
        'title' => 'Users',
        'icon'  => 'fa fa-users',
        'priority'    => 3,
        'url'   => route('admin.users'),
    ],*/
    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    //        (new Page(\App\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fa fa-user')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isSuperAdmin();
    //            }),
    //
    //        // or
    //
    //        new Page([
    //            'title'    => 'News',
    //            'priority' => 200,
    //            'model'    => \App\News::class
    //        ]),
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
	//		      ));
    //
	//		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
    //        [
    //            'title'       => 'News',
    //            'priority'    => 300,
    //            'accessLogic' => function ($page) {
    //                return $page->isActive();
    //		      },
    //            'pages'       => [
    //
    //                // ...
    //
    //            ]
    //        ]
    //    ]
    // ]
];