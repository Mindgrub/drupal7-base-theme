var gulp = require('gulp');
var browserSync = require('browser-sync');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var install = require("gulp-install");
var notify = require("gulp-notify");
var autoprefixer = require('gulp-autoprefixer');


var settings = {
    domain: 'mindgrub-subtheme.dev'
};

var paths = {
    css_directory: 'assets/css',
    sass_directory: 'assets/scss'
};

paths.scss = [paths.sass_directory + '/**/*.scss'];
paths.css = [paths.css_directory + '/**/*.css'];

// Run an npm install
gulp.task('install', function () {
    return gulp.src(['./bower.json', './package.json'])
        .pipe(install());
});

// Task to start the browser-sync server and watch for changed files
gulp.task('browser-sync', function () {
    return browserSync({
        proxy: settings.domain,
        logSnippet: false,
        open: false,
        ghostMode: false,
        files: paths.css.concat(paths.scripts)
    });
});

// Task to compile using compass
gulp.task('styles', function () {
    return gulp.src(paths.scss)
        .pipe(sourcemaps.init())
        .pipe(sass({
            precision: 7
        }))
        .on('error', notify.onError({
            message: function (error) {
                return error.message;
            }
        }))
        .pipe(autoprefixer())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(paths.css_directory));
});

// Watch for files and run the appropriate task
gulp.task('watch', function () {
    gulp.watch(paths.scss, ['styles']);
});

gulp.task('default', ['install', 'styles', 'watch', 'browser-sync']);


