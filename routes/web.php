<?php

// Alpha Routes
Route::group(['domain' => 'alpha.falconfrag.com'], function () {
    // API Endpoints
    Route::group(['prefix' => 'api/v1', 'namespace' => 'Api\V1'], function () {
        Route::group(['prefix' => 'account', 'namespace' => 'Account', 'middleware' => 'oauth'], function () {
            Route::get('profile', ['as' => 'api.v1.account.profile', 'uses' => 'ProfileController@getProfile']);
        });

        Route::group(['prefix' => 'servers', 'namespace' => 'Servers'], function () {
            Route::get('minecraft/dl/jar', ['as' => 'servers.minecraft.dl.jar', 'uses' => 'Minecraft\DaemonController@downloadJarFile']);
            Route::get('minecraft/dl/conf', ['as' => 'servers.minecraft.dl.conf', 'uses' => 'Minecraft\DaemonController@downloadCfgFile']);
            Route::get('minecraft/test', ['as' => 'servers.minecraft.test', 'uses' => 'Minecraft\DaemonController@test']);
        });

        Route::get('/', ['as' => 'api.v1.index', 'uses' => 'BaseController@index']);
    });

    // Client Panel
    Route::group(['prefix' => 'client', 'namespace' => 'Client'], function () {
        // Client panel routes
        Route::get('/', ['as' => 'client.index', 'uses' => 'HomeController@index']);

        Route::get('register', ['as' => 'client.register', 'uses' => 'RegisterController@showRegisterForm']);
        Route::post('register', ['as' => 'client.register.submit', 'uses' => 'RegisterController@register']);
        Route::get('login', ['as' => 'client.login', 'uses' => 'LoginController@showLoginForm']);
        Route::post('login', ['as' => 'client.login.submit', 'uses' => 'LoginController@login']);
        Route::get('confirm/{token?}', ['as' => 'client.confirm', 'uses' => 'RegisterController@getConfirm']);
        Route::get('logout', ['as' => 'client.logout', 'uses' => 'LoginController@logout']);

        Route::get('overview', ['as' => 'client.overview', 'uses' => 'HomeController@index']);
        Route::get('history', ['as' => 'client.home', 'uses' => 'LoginController@history']);
    });

    // Admin Panel
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
        // Admin panel routes
        Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);
        Route::get('clients', ['as' => 'admin.clients.index', 'uses' => 'ClientController@index']);
        Route::get('products', ['as' => 'admin.products.index', 'uses' => 'ProductController@getProducts']);
        Route::get('products/categories', ['as' => 'admin.products.categories', 'uses' => 'ProductController@getCategories']);
        Route::post('products/categories', ['as' => 'admin.products.categories.create', 'uses' => 'ProductController@createCategory']);
        Route::post('products/categories/{id}/edit', ['as' => 'admin.products.categories.edit', 'uses' => 'ProductController@editCategory']);
        Route::get('products/categories/{id}/edit', ['as' => 'admin.products.categories.edit.modal', 'uses' => 'ProductController@getEditCategory']);
        Route::post('products/categories/{id}/delete', ['as' => 'admin.products.categories.delete', 'uses' => 'ProductController@deleteCategory']);

        Route::group(['prefix' => 'twitter'], function () {
            Route::get('/', ['as' => 'admin.social.twitter.index', 'uses' => 'TwitterController@getIndex']);
            Route::get('/{id}', ['as' => 'admin.social.twitter.tweet.view', 'uses' => 'TwitterController@getTweet']);
            Route::post('/{id}/reply', ['as' => 'admin.social.twitter.tweet.reply', 'uses' => 'TwitterController@replyTweet']);
        });

        Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
            Route::get('products/categories', 'ProductController@getProductCategories');
            Route::get('products/category/{id}', 'ProductController@getProductCategory');
        });

        Route::group(['prefix' => 'theme'], function () {
            Route::get('/', 'ThemeController@index');
        });
    });

    // Community Area
    Route::group(['prefix' => 'help'], function () {
        // Support area routes
    });

    Route::group(['namespace' => 'Store'], function () {
        Route::get('products', ['as' => 'product.index', 'uses' => 'ProductController@index']);
        Route::get('products/{category}', ['as' => 'product.category', 'uses' => 'ProductController@getCategory']);
        Route::get('products/{category}/{subcategory}/{service?}', ['as' => 'product.detail', 'uses' => 'ProductController@getProduct']);
    });

    // All primary routes
    //Route::get('/', ['as' => 'default.home', 'uses' => 'HomeController@index']);

    //Route::get('about', ['as' => 'default.about', 'uses' => 'HomeController@about']);

    Route::get('edit', ['as' => 'client.edit', 'uses' => 'Auth\AuthController@getEdit']);
    Route::post('edit', ['as' => 'client.edit.submit', 'uses' => 'Auth\AuthController@postEdit']);

    Route::group(['prefix' => 'twitter'], function () {
        Route::get('post', function () {
            return response()->json(Twitter::postTweet(['status' => 'This Tweet was sent from a Falcon Frag administrator at ' . \Carbon\Carbon::now()->toDateTimeString()]));
        });

        Route::get('mentions', function () {
            return response()->json(Twitter::getMentionsTimeline(['count' => 100]));
        });

        Route::get('cache', function () {
            return Falcon\Models\Admin\Tweet::all();
        });
    });
});

// ------------------------------------------------------------------------------------------------------

Route::group(['prefix' => 'api/v1', 'namespace' => 'Api\V1'], function () {
    // API Routes
});

Route::group(['prefix' => 'account', 'namespace' => 'Client'], function () {
    // Client Area Routes
    Route::get('/', ['as' => 'client.dashboard', 'uses' => 'DashboardController@index']);

    // Authentication Routes
    //Route::get('login', ['as' => 'client.auth.login', 'uses' => 'AuthController@login']);
    //Route::get('register', ['as' => 'client.auth.register', 'uses' => 'AuthController@register']);
    //Route::get('forgot', ['as' => 'client.auth.forgot', 'uses' => 'AuthController@forgot']);
    //Route::get('reset/{token}', ['as' => 'client.auth.reset', 'uses' => 'AuthController@reset']); // POST?

    // Support Tickets
    Route::get('tickets', ['as' => 'client.tickets.index', 'uses' => 'TicketController@index']);
    Route::get('ticket/{id}', ['as' => 'client.tickets.detail', 'uses' => 'TicketController@detail']);

    Route::get('settings', ['as' => 'client.account.settings', 'uses' => 'AccountController@settings']);
    Route::get('settings/profile', ['as' => 'client.account.settings.profile', 'uses' => 'AccountController@profile']);
    Route::get('security', ['as' => 'client.account.security', 'uses' => 'AccountController@security']);

    // Billing Routes
    Route::get('invoices', ['as' => 'client.invoice.index', 'uses' => 'InvoiceController@index']);
    Route::get('invoice/{id}', ['as' => 'client.invoice.detail', 'uses' => 'InvoiceController@detail']);

    // Service Routes
    Route::get('services', ['as' => 'client.service.index', 'uses' => 'ServiceController@index']);
    Route::get('service/{id}', ['as' => 'client.service.detail', 'uses' => 'ServiceController@detail']);
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    // Admin Panel Routes
});

Route::group(['prefix' => 'help', 'namespace' => 'Help'], function () {
    // Support Routes
    Route::get('/', ['as' => 'help.index', 'uses' => 'IndexController@index']);
});

Route::group(['prefix' => 'community', 'namespace' => ' Community'], function () {
    // Community area
});

Route::get('/', ['as' => 'default.home', 'uses' => 'IndexController@index']);
Route::get('about', ['as' => 'default.about', 'uses' => 'IndexController@about']);
Route::get('network', ['as' => 'default.network', 'uses' => 'IndexController@network']);
Route::get('legal/tos', ['as' => 'default.legal.tos', 'uses' => 'IndexController@tos']);
Route::get('legal/privacy', ['as' => 'default.legal.privacy', 'uses' => 'IndexController@privacy']);

// Catch any routes not defined and display the homepage
// TODO: Change this to a 404 page
Route::any('{path?}', function () {
    return view('welcome');
})->where('path', '.+');
