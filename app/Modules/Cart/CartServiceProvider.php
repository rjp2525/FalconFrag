<?php

namespace Falcon\Modules\Cart;

use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
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
        $this->app['cart'] = $this->app->share(function ($app) {
            $storage = $app['session'];
            $events = $app['events'];
            $instanceName = 'cart';
            $session_key = env('CART_SESSION_KEY', 'SomeRandomString');

            return new Cart(
                $storage,
                $events,
                $instanceName,
                $session_key
            );
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}
