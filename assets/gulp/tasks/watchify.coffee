gulp           = require 'gulp'
browserifyTask = require './browserify'

gulp.task 'watchify', (callback) ->
	browserifyTask(callback, true)