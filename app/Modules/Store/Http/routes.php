<?php

Route::group(['prefix' => 'store', 'namespace' => 'Falcon\Modules\Store\Http\Controllers'], function () {
    Route::get('/', 'StoreController@index');
});
