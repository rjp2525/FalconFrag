var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('style.less')
       .scripts([
            '../bower/jquery/dist/jquery.js',
            '../bower/bootstrap/dist/js/bootstrap.js',
            '../bower/angular/angular.js',
            '../bower/angular-ui-router/release/angular-ui-router.js',
            '../bower/ngstorage/ngStorage.js',
            '../bower/angular-loading-bar/build/loading-bar.js'
        ], 'public/js/vendor.js')
       .scripts([
            'controllers/*.js',
            'services/*.js',
            'application.js'
        ], 'public/js/application.js')
       .phpUnit();
});
