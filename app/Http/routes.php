<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

// Alpha Routes
Route::group(['domain' => 'alpha.falconfrag.com'], function () {
    // Client Panel
    Route::group(['prefix' => 'client', 'namespace' => 'Client'], function () {
        // Client panel routes
        Route::get('/', ['as' => 'client.index', 'uses' => 'HomeController@index']);
    });

    // Admin Panel
    Route::group(['prefix' => 'admin'], function () {
        // Admin panel routes
    });

    // Community Area
    Route::group(['prefix' => 'help'], function () {
        // Support area routes
    });

    // All primary routes
    Route::get('/', ['as' => 'default.home', 'uses' => 'HomeController@index']);
});

Route::any('{path?}', function () {
    return view('welcome');
})->where('path', '.+');
