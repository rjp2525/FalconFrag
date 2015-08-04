<?php

Route::group(array('module' => 'Store', 'namespace' => 'Falcon\Modules\Store\Controllers'), function() {

    Route::resource('Store', 'StoreController');
    
});	