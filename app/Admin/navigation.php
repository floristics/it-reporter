<?php

use SleepingOwl\Admin\Navigation\Page;

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

    [
        'title' => 'Information',
        'icon'  => 'fa fa-exclamation-circle',
        'priority'    => 5,
        'url'   => route('admin.information'),
    ],

    [
        'title' => "Настройки",
        'icon' => 'fa fa-gear',
        'priority'    => 4,
        'pages' => [
            (new Page(''))
                ->setIcon('fa fa-gear')
                ->setTitle('App Settings')
                ->setPriority(3)
                ->setUrl(route('admin.app_settings'))
                ->setAccessLogic(function (Page $page) {
                    return auth()->user()->isAdmin();
                }),

            (new Page(App\Organisation::class))
                ->setIcon('fa fa-building')
                ->setTitle('Организации')
                ->setPriority(2)
                ->setAccessLogic(function (Page $page) {
                    return auth()->user()->isAdmin();
                }),

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
                ->setIcon('fa fa-circle')
                ->setTitle('Бюджеты')
                ->setPriority(5),

            (new Page(App\License::class))
                ->setIcon('fa fa-circle')
                ->setTitle('Лицензии')
                ->setPriority(6),
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