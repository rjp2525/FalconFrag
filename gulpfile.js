var gulp = require('gulp')
    imagemin = require('gulp-imagemin')
    elixir = require('laravel-elixir');

// Minify and compress images
elixir.extend('images', function(src, dest) {
    // Slight modifications to directories
    var srcDir = elixir.config.assetsDir + src;

    // Gulp task for image minification
    gulp.task('images', function() {
        gulp.src(srcDir)
            .pipe(imagemin({
                progressive: true
            }))
            .pipe(gulp.dest(dest))
    });

    // Register a watcher for the source files
    this.registerWatcher('images', srcDir);
    return this.queueTask('images');
});

// Copy fonts to public directory with watcher
elixir.extend('fonts', function(src, dest) {
    // Slight modifications to directories
    var srcDir = elixir.config.assetsDir + src;

    // Copy files to destination
    gulp.task('fonts', function() {
        gulp.src(srcDir)
            .pipe(gulp.dest(dest));
    });

    // Register a watcher for the source files
    this.registerWatcher('fonts', srcDir);
    return this.queueTask('fonts');
});

// Always run in production mode
elixir.config.production = true;

// The main Elixir "run" function
elixir(function(mix) {
    // Compile sourcemaps for minified files (development only)
    //elixir.config.sourcemaps = true;

    // Build and copy assets
    mix.less('style.less')
       .less('admin.less')
       .scripts([
            '../bower/jquery/dist/jquery.js',
            '../bower/bootstrap/dist/js/bootstrap.js',
            '../bower/twitter-bootstrap-wizard/jquery.bootstrap.wizard.js',
            '../bower/OwlCarouselBower/owl-carousel/owl.carousel.js',
            '../bower/jquery-validation/dist/jquery.validate.js',
            '../bower/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js',
            'vendor/jquery.smoothscroll.js',
            'application.js'
        ], 'public/js/application.js')
       .scripts([
            '../bower/jquery/dist/jquery.js',
            '../bower/bootstrap/dist/js/bootstrap.js',
            '../bower/twitter-bootstrap-wizard/jquery.bootstrap.wizard.js',
            '../bower/chartjs/Chart.js',
            '../bower/easy-pie-chart/dist/jquery.easypiechart.js',
            '../bower/jquery-validation/dist/jquery.validate.js',
            '../bower/jquery.maskedinput/dist/jquery.maskedinput.js',
            'admin/application.js'
        ], 'public/js/admin/application.js')
       .images('img/**/*', 'public/img')
       .fonts('fonts/**/*', 'public/fonts')
       .version([
            'public/css/style.css',
            'public/css/admin.css',
            'public/js/application.js',
            'public/js/admin/application.js'
        ]);
       // Will uncomment later
       //.phpUnit();
});
