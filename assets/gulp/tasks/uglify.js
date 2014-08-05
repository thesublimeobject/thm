var concat 		 = require('gulp-concat');
var uglify 		 = require('gulp-uglify');
var gulp   		 = require('gulp');
var browserSync  = require('browser-sync');

gulp.task('uglify', function() {
    gulp.src([
    	'./js/lib/underscore/underscore.js',
    	'../bld/app.js'
    ])
        .pipe(concat('bld.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('../bld'))
        .pipe(browserSync.reload({ stream:true, once: true, notify: false }));
});