<?php

namespace Falcon\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class ApiRouteServiceProvider extends ServiceProvider
{

    protected $namespace = 'Falcon\Http\Controllers\Api\V1';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);
    }

    public function map(\Dingo\Api\Routing\Router $api)
    {
        $api->version(['version' => 'v1', 'namespace' => $this->namespace], function ($api) {
            $api->group(['prefix' => 'api'], function ($api) {
                return require app_path('Api/v1/Http/routes.php');
            });
        });
    }
}
