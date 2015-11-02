gulp         = require('gulp')
browserSync  = require('browser-sync')
sass         = require('gulp-sass')
sourcemaps   = require('gulp-sourcemaps')
handleErrors = require('../util/handleErrors')
config       = require('../config').sass
autoprefixer = require('gulp-autoprefixer')
minifyCSS    = require 'gulp-minify-css'
rename		 = require 'gulp-rename'
modal		 = require('kbd-modal').includePaths

gulp.task 'sass', ->
	return gulp.src('styl/src/screen.scss')
		.pipe(sourcemaps.init())
		.pipe(sass
			sourceComments: 'map'
			imagePath: '/img'
			errLogToConsole: true
			includePaths: ['sass'].concat(modal)
			indentType: 'tab'
			indentWidth: 1
		)
		.on('error', handleErrors)
		.pipe(autoprefixer
			browsers: ['last 2 version'] 
		)
		.pipe(minifyCSS())

		# Write production file: minified and sourcemap removed.
		.pipe(rename('screen.min.css'))
		.pipe(gulp.dest(config.dest))

		# Write sourcemaps
		.pipe(sourcemaps.write())

		# Write regular file for debugging with sourcemaps.
		.pipe(rename('screen.css'))
		.pipe(gulp.dest(config.dest))
		.pipe(browserSync.reload({ stream: true }))