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
        Route::get('logout', ['as' => 'client.logout', 'uses' => 'AuthController@getLogout']);

        Route::get('overview', ['as' => 'client.overview', 'uses' => 'HomeController@index']);
        Route::get('history', ['as' => 'client.home', 'uses' => 'AuthController@history']);
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
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    // Admin Panel Routes
});

Route::group(['prefix' => 'help', 'namespace' => 'Help'], function () {
    // Support Routes
    Route::get('/', ['as' => 'help.index', 'uses' => 'IndexController@index']);
});

Route::get('/', ['as' => 'default.home', 'uses' => 'IndexController@index']);
Route::get('about', ['as' => 'default.about', 'uses' => 'IndexController@about']);
Route::get('network', ['as' => 'default.network', 'uses' => 'IndexController@network']);

// Catch any routes not defined and display the homepage
// TODO: Change this to a 404 page
Route::any('{path?}', function () {
    return view('welcome');
})->where('path', '.+');
