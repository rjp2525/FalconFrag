<?php

// Alpha Routes
Route::group(['domain' => 'alpha.falconfrag.com'], function () {
    // Client Panel
    Route::group(['prefix' => 'client', 'namespace' => 'Client'], function () {
        // Client panel routes
        Route::get('/', ['as' => 'client.index', 'uses' => 'HomeController@index']);

        Route::get('register', ['as' => 'client.register', 'uses' => 'AuthController@getRegister']);
        Route::post('register', ['as' => 'client.register.submit', 'uses' => 'AuthController@postRegister']);
        Route::get('login', ['as' => 'client.login', 'uses' => 'AuthController@getLogin']);
        Route::post('login', ['as' => 'client.login.submit', 'uses' => 'AuthController@postLogin']);

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

    // All primary routes
    Route::get('/', ['as' => 'default.home', 'uses' => 'HomeController@index']);

    Route::get('about', ['as' => 'default.about', 'uses' => 'HomeController@about']);

    Route::get('home', ['as' => 'client.home', 'uses' => 'Auth\AuthController@history']);
    Route::get('edit', ['as' => 'client.edit', 'uses' => 'Auth\AuthController@getEdit']);
    Route::post('edit', ['as' => 'client.edit.submit', 'uses' => 'Auth\AuthController@postEdit']);

    Route::get('s3', function () {
        //$upload = Storage::disk('s3')->put('nav-logo.png', file_get_contents(public_path('img/nav-logo.png')));
        $file = Storage::disk('s3')->get('nav-logo.png');

        //$url = '<img src="'.Storage::disk('s3')->getAdapter()->getClient()->getObjectUrl(env('S3_BUCKET'), env('S3_KEY')).'/'.$file.'">';
        return '<img src="' . Storage::disk('s3')->getAdapter()->getClient()->getObjectUrl(env('S3_BUCKET'), 'nav-logo.png') . '">';
    });
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
