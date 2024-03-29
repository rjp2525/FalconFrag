<?php

namespace Falcon\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Falcon\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            //\Falcon\Http\Middleware\VerifyCsrfToken::class,
            \Falcon\Http\Middleware\PermittedAddress::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class
        ],
        'api' => [
            'throttle:60,1',
            'bindings'
        ]
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'csrf'       => \Falcon\Http\Middleware\VerifyCsrfToken::class,
        'auth'       => \Falcon\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings'   => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'guest'      => \Falcon\Http\Middleware\RedirectIfAuthenticated::class,
        'can'        => \Illuminate\Auth\Middleware\Authorize::class,
        'throttle'   => \Illuminate\Routing\Middleware\ThrottleRequests::class,

        // Roles
        'role'       => \Bican\Roles\Middleware\VerifyRole::class,
        'permission' => \Bican\Roles\Middleware\VerifyPermission::class,
        'level'      => \Bican\Roles\Middleware\VerifyLevel::class
    ];
}
