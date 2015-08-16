<?php

Route::group(['module' => 'Store', 'prefix' => 'store', 'namespace' => 'Falcon\Modules\Store\Controllers', 'domain' => 'alpha.falconfrag.com'], function () {
    Route::get('/', ['as' => 'store.index', 'uses' => 'StoreController@index']);
});
