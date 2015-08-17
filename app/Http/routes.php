<?php

// Alpha Routes
Route::group(['domain' => 'alpha.falconfrag.com'], function () {
    // API Endpoints
    Route::group(['prefix' => 'api/v1', 'namespace' => 'Api\V1'], function () {
        Route::group(['prefix' => 'account', 'namespace' => 'Account', 'middleware' => 'oauth'], function () {
            Route::get('profile', ['as' => 'api.v1.account.profile', 'uses' => 'ProfileController@getProfile']);
        });

        Route::get('/', ['as' => 'api.v1.index', 'uses' => 'BaseController@index']);
        Route::post('oauth/access_token', ['as' => 'api.v1.oauth.access_token', 'uses' => 'OAuthController@issueToken']);
    });

    // Client Panel
    Route::group(['prefix' => 'client', 'namespace' => 'Client'], function () {
        // Client panel routes
        Route::get('/', ['as' => 'client.index', 'uses' => 'HomeController@index']);

        Route::get('register', ['as' => 'client.register', 'uses' => 'AuthController@getRegister']);
        Route::post('register', ['as' => 'client.register.submit', 'uses' => 'AuthController@postRegister']);
        Route::get('login', ['as' => 'client.login', 'uses' => 'AuthController@getLogin']);
        Route::post('login', ['as' => 'client.login.submit', 'uses' => 'AuthController@postLogin']);
        Route::get('confirm/{token?}', ['as' => 'client.confirm', 'uses' => 'AuthController@getConfirm']);

        Route::get('overview', ['as' => 'client.overview', 'uses' => 'HomeController@index']);
    });

    // Admin Panel
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        // Admin panel routes
        Route::get('dash', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);
        Route::get('clients', ['as' => 'admin.clients.index', 'uses' => 'ClientController@index']);
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
    Route::get('/', ['as' => 'default.home', 'uses' => 'HomeController@index']);

    Route::get('test', function () {
        return \Falcon\Models\Account\Country::all();
    });

    Route::get('about', ['as' => 'default.about', 'uses' => 'HomeController@about']);

    Route::get('home', ['as' => 'client.home', 'uses' => 'Auth\AuthController@history']);
    Route::get('edit', ['as' => 'client.edit', 'uses' => 'Auth\AuthController@getEdit']);
    Route::post('edit', ['as' => 'client.edit.submit', 'uses' => 'Auth\AuthController@postEdit']);
});

// Primary domain routes
Route::group(['domain' => 'falconfrag.com'], function () {
    // Catch all urls on main domain, return coming soon
    Route::any('{path?}', function () {
        return view('welcome');
    })->where('path', '.+');
});

// Default site homepage
Route::get('/', function () {
    return view('welcome');
});
