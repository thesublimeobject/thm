gulp         = require('gulp')
browserSync  = require('browser-sync')
sass         = require('gulp-sass')
sourcemaps   = require('gulp-sourcemaps')
handleErrors = require('../util/handleErrors')
config       = require('../config').sass
autoprefixer = require('gulp-autoprefixer')
neat 		 = require('node-neat').includePaths

gulp.task 'sass', ->
	return gulp.src('styl/src/screen.scss')
		.pipe(sourcemaps.init())
		.pipe(sass
			sourceComments: 'map'
			imagePath: '/img'
			errLogToConsole: true
			includePaths: ['sass'].concat(neat)
		)
		.pipe(autoprefixer
			browsers: ['last 2 version'] 
		)
		.pipe(sourcemaps.write())
		.on('error', handleErrors)
		.pipe(gulp.dest(config.dest))
		.pipe(browserSync.reload({stream:true}))