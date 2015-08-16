<?php

namespace Falcon\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register composer bindings in the container
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout.default', 'Falcon\Http\Composers\CategoryComposer');
    }

    /**
     * Register the service provider
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
