<?php

namespace Falcon\Modules\Active;

use Illuminate\Support\ServiceProvider;

class ActiveServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app['active'] = $this->app->share(function ($app) {
            return new Active($app['router']);
        });

        // Helper function
        require_once 'helper.php';
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['active'];
    }
}
