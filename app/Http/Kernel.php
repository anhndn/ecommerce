<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

/**
 * Class Kernel.
 */
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \App\Http\Middleware\LocaleMiddleware::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        /*
         * Default laravel route middleware
         */
        'auth'       => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest'      => \App\Http\Middleware\RedirectIfAuthenticated::class,

<<<<<<< HEAD
		/**
		 * Access Middleware
		 */
		'access.routeNeedsRole' => \App\Http\Middleware\RouteNeedsRole::class,
		'access.routeNeedsPermission' => \App\Http\Middleware\RouteNeedsPermission::class,

		/**
		 * Innovate Ecommerce
		 */
		'checkout'=> \App\Http\Middleware\CheckOutCheck::class,
	];
=======
        /*
         * Access Middleware
         */
        'access.routeNeedsRole'       => \App\Http\Middleware\RouteNeedsRole::class,
        'access.routeNeedsPermission' => \App\Http\Middleware\RouteNeedsPermission::class,
    ];
>>>>>>> 61cca9260d75f322faff49975dedaaa23a4b4fd6
}
