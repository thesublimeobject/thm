var gulp = require('gulp'),
    compass = require('gulp-compass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    coffee = require('gulp-coffee'),
    coffeelint = require('gulp-coffeelint'),
    beautify = require('gulp-beautify'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    clean = require('gulp-clean'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    watch = require('gulp-watch'),
    newer = require('gulp-newer'),
    livereload = require('gulp-livereload'),
    lr = require('tiny-lr'),
    server = lr();

gulp.task('styl', function() {
    gulp.src('styl/src/screen.scss')
        .pipe(compass({ sass: 'styl/src', css: 'styl/bld' }))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe(gulp.dest('styl/bld'))
        .pipe(rename({suffix: '.min'}))
        .pipe(minifycss())
        .pipe(gulp.dest('../bld'))
        .pipe(livereload(server))
        .pipe(notify({ message: 'Styles task complete' }));
});

gulp.task('coffee', function() {
    gulp.src('js/src/*.coffee')
        // .pipe(coffeelint())
        // .pipe(coffeelint.reporter())
        .pipe(coffee({bare: true}))
        .pipe(beautify({indentSize: 4}))
        .pipe(gulp.dest('js/src'));
});

gulp.task('js', function() {
    gulp.src(['./js/lib/picturefill/picturefill.js', './js/lib/*.js', './js/src/app.js'])
        .pipe(concat('bld.min.js'))
        .pipe(gulp.dest('../bld'))
        .pipe(uglify())
        .pipe(gulp.dest('../bld'))
        .pipe(livereload(server));
});

gulp.task('img', function() {
    gulp.src('./img/*')
        .pipe(cache(imagemin({ optimizationLevel: 5, progressive: true, interlaced: true })))
        .pipe(gulp.dest('../bld/img'))
        .pipe(livereload(server));
});

gulp.task('cln', function() {
    gulp.src(['dist/assets/css', 'dist/assets/js', 'dist/assets/img'], {read: false}).pipe(clean());
});

gulp.task('watch', function() {
    server.listen(35729, function (err) {
        if (err) {
            return console.log(err)
        };
        gulp.watch('styl/src/*.scss', ['styl']);
        gulp.watch('js/src/*.js', ['js']);
        gulp.watch('js/src/*.coffee', ['coffee']);
        gulp.src('../*.php').pipe(watch()).pipe(livereload(server));
        
    });
});

gulp.task('default', function() {
    gulp.start('styl', 'coffee', 'js', 'watch');
});








