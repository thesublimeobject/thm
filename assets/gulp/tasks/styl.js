var gulp         = require('gulp');
var sass 		 = require('gulp-ruby-sass');
var autoprefixer = require('gulp-autoprefixer');
var minifycss 	 = require('gulp-minify-css');
var notify       = require('gulp-notify');
var rename 		 = require('gulp-rename');
var handleErrors = require('../util/handleErrors');

gulp.task('styl', function() {
    return gulp.src('styl/src/screen.scss')
        .pipe(sass({sourcemap: false, style: 'compact'}))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe(gulp.dest('styl/bld'))
        .pipe(rename({suffix: '.min'}))
        .pipe(minifycss())
        .pipe(gulp.dest('../bld'))
        .pipe(notify({ message: 'Styles task complete' }))
        .on('error', handleErrors);
});