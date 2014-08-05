var gulp         = require('gulp');
var sass         = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var minifycss    = require('gulp-minify-css');
var notify       = require('gulp-notify');
var rename       = require('gulp-rename');
var handleErrors = require('../util/handleErrors');
var browserSync  = require('browser-sync');

gulp.task('styl', function() {
    return gulp.src('styl/src/screen.scss')
        .pipe(sass({
            includePaths: [
                './styl/lib/__vendors/harp-susy/scss',
                './styl/lib/__vendors/harp-compass/scss'
            ]
        }))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe(gulp.dest('styl/bld'))
        .pipe(rename({suffix: '.min'}))
        .pipe(minifycss())
        .pipe(gulp.dest('../bld'))
        .pipe(notify({ message: 'Styles task complete' }))
        .pipe(browserSync.reload({ stream: true, notify: false }))
        .on('error', handleErrors);
});