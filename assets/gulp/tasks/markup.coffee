gulp = require 'gulp'
config = require('../config').markup
browserSync  = require 'browser-sync'

gulp.task 'markup', ->
	return gulp.src(config.src)
		.pipe(browserSync.reload
			stream: true
		)