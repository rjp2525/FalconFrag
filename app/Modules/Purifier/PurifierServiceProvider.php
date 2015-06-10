<?php

namespace Falcon\Modules\Purifier;

use Illuminate\Support\ServiceProvider;

class PurifierServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     *
     * Boot the service provider.
     *
     * @return null
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('purifier', function ($app) {
            return new Purifier($app['files'], $app['config']);
        });

        // Helper function
        require_once 'clean.php';
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['purifier'];
    }

}
