var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var gulp   = require('gulp');

gulp.task('uglify', function() {
    gulp.src([
    	'./js/lib/*.js', 
    	'../bld/app.js'
    ])
        .pipe(concat('bld.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('../bld'));
});