changed      = require 'gulp-changed'
gulp         = require 'gulp'
imagemin     = require 'gulp-imagemin'
pngquant     = require('imagemin-pngquant');
config       = require('../config').images
browserSync  = require 'browser-sync'

gulp.task 'images', ->
	return gulp.src(config.src)
		.pipe(changed(config.dest))
		.pipe(imagemin({
			progressive: true
			svgoPlugins: [{removeViewBox: false}]
			use: [pngquant()]
		}))
		.pipe(gulp.dest(config.dest))
		.pipe(browserSync.reload
			stream: true
		)