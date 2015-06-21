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

/*$api =

ApiRoute::api(['version' => 'v1', 'namespace' => 'Api\V1'], function () {
// this is gonna be a nightmare
Route::get('/', 'Auth\AuthController@getIndex');
});*/

$api = app('api.router');

$api->version('v1', ['prefix' => 'api/v1', 'namespace' => 'Falcon\Http\Controllers\Api\V1'], function ($api) {
    $api->group(['prefix' => 'auth'], function ($api) {
        $api->get('/', 'Auth\AuthController@index');
        $api->post('login', 'Auth\AuthController@login');
        //$api->get('/', 'Auth\AuthController@index');
    });
    //$api->get('/', 'Auth\AuthController@index');
});

/*Route::api(['version' => 'v1', 'namespace' => 'Api\V1'], function () {
Route::get('/', 'Auth\AuthController@getIndex');
});*/

Route::any('{path?}', function () {
    return view('welcome');
})->where('path', '.+');

//Route::any('{path?}', 'WelcomeController@index')->where("path", ".+");
