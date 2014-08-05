var gulp = require('gulp');

var livereload   = require('gulp-livereload');
var lr 			 = require('tiny-lr');
var server 	  	 = lr();
var watch 		 = require('gulp-watch');

gulp.task('watch', ['setWatch', 'browserSync'], function() {
	gulp.watch(['styl/src/**/*.scss', 'styl/lib/plg/*.scss'], ['styl']);
	gulp.watch('./js/src/*.coffee', ['browserify']);
	gulp.watch('../bld/app.js', ['uglify']);
	gulp.watch(['../*.php', '../inc/*.php', '../templates/*.php'], ['bs-reload']);
});