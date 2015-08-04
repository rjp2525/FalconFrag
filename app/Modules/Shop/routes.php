<?php

Route::group(['module' => 'Shop', 'namespace' => 'Falcon\Modules\Shop\Controllers', 'prefix' => 'products', 'domain' => 'alpha.falconfrag.com'], function () {
    Route::get('/', function () {
        return 'Test';
    });
    Route::resource('Shop', 'ShopController');

});
