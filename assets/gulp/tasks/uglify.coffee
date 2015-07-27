gulp   = require 'gulp'
uglify = require 'gulp-uglify'
 
gulp.task 'compress', ->
	return gulp.src './js/src/load.js'
		.pipe(uglify())
		.pipe(gulp.dest('../bld'))