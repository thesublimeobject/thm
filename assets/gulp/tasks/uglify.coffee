gulp    	 = require 'gulp'
config  	 = require('../config').browserify
size    	 = require 'gulp-filesize'
uglify  	 = require 'gulp-uglify'
rename  	 = require 'gulp-rename'
browserSync  = require 'browser-sync'

gulp.task 'uglify', ['browserify'], ->
	return gulp.src('../bld/app.js')
		.pipe(uglify())
		.pipe(rename
			suffix: '.min' 
		)
		.pipe(gulp.dest('../bld'))
		.pipe(size())
		.pipe(browserSync.reload
			stream: true
			once: true
			notify: false 
		)