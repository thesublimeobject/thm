gulp = require 'gulp'

gulp.task 'default', ['browserify', 'sass', 'images', 'compress', 'watch']