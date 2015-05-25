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
    mix.less('admin.less')
        .coffee()
        .scripts([
            'admin/bootstrap/jquery.js',
            'admin/bootstrap/transition.js',
            'admin/bootstrap/alert.js',
            'admin/bootstrap/button.js',
            'admin/bootstrap/carousel.js',
            'admin/bootstrap/collapse.js',
            'admin/bootstrap/dropdown.js',
            'admin/bootstrap/modal.js',
            'admin/bootstrap/tooltip.js',
            'admin/bootstrap/popover.js',
            'admin/bootstrap/scrollspy.js',
            'admin/bootstrap/tab.js',
            'admin/bootstrap/affix.js',
            'admin/bootstrap/toggle-class.js'
        ], 'public/js/admin/bootstrap.js')
        .version([
            'css/admin.css',
            'js/admin/bootstrap.js'
        ])
        .copy('resources/assets/img', 'public/img');
});
