gulp     = require 'gulp'
config   = require '../config'
watchify = require './browserify'

gulp.task 'watch', ['setWatch','browserSync'], (callback) ->
	# gulp.watch('./js/src/*.coffee', ['browserify'])
	# gulp.watch('../bld/app.js', ['uglify'])
	gulp.watch(config.sass.src,   ['sass'])
	gulp.watch(config.images.src, ['images'])
	gulp.watch(config.markup.src, ['bs-reload'])
