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

// The main Elixir "run" function
elixir(function(mix) {
    mix.less('style.less')
       .less('admin.less')
       .scripts([
            '../bower/jquery/dist/jquery.js',
            '../bower/bootstrap/dist/js/bootstrap.js'
        ], 'public/js/application.js')
       .scripts([
            '../bower/jquery/dist/jquery.js',
            '../bower/bootstrap/dist/js/bootstrap.js'
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
