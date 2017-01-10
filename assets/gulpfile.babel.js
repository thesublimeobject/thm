/*--------------------------------------------------------*\
	Imports
\*--------------------------------------------------------*/

import gulp           from 'gulp'
import imagemin       from 'gulp-imagemin'
import pngquant       from 'imagemin-pngquant'
import changed        from 'gulp-changed'
import sass           from 'gulp-sass'
import autoprefixer   from 'gulp-autoprefixer'
import sourcemaps     from 'gulp-sourcemaps'
import cssnano        from 'gulp-cssnano'
import rename		  from 'gulp-rename'
import webpack        from 'webpack'
import gulpWebpack	  from 'gulp-webpack'
import webpackLogger  from 'webpack-gulp-logger'
import named 		  from 'vinyl-named'
import config         from './gulp/webpack.config'
import prodConfig     from './gulp/webpack.config.prod'
import logger         from './gulp/util/logger'
import handleErrors   from './gulp/util/handleErrors'
import prettifyTime   from './gulp/util/prettifyTime'
import { browserSync: bsConfig, sass: sassConfig, images, markup, build } from './gulp/config'
const browserSync = require('browser-sync').create()
const reload = browserSync.reload

/*--------------------------------------------------------*\
	Images
\*--------------------------------------------------------*/

gulp.task('images', function() {
	return gulp.src(images.src)
		.pipe(changed(images.dest))
		.pipe(imagemin({
			progressive: true,
			svgoPlugins: [{
				removeViewBox: false
			}, {
				cleanupIDs: false
			}, {
				removeUselessDefs: false
			}],
			use: [pngquant()],
		}))
		.pipe(gulp.dest(images.dest))
		.pipe(browserSync.stream())
})

gulp.task('imagesProd', function() {
	return gulp.src(images.src)
		.pipe(changed(images.dest))
		.pipe(imagemin({
			progressive: true,
			svgoPlugins: [{
				removeViewBox: false
			}, {
				cleanupIDs: false
			}],
			use: [pngquant()],
		}))
		.pipe(gulp.dest(images.dest))
})

/*--------------------------------------------------------*\
	Sass
\*--------------------------------------------------------*/

gulp.task('sass', function() {
	return gulp.src(sassConfig.entry)
		.pipe(sourcemaps.init())
		.pipe(sass(sassConfig.settings))
		.on('error', handleErrors)
		.pipe(autoprefixer({
			browsers: ['> 0.5%', 'last 2 version', 'IE 10', 'IE 11', 'Safari 7'] 
		}))
		
		// TODO: Look into options here.
		// .pipe(cssnano())

		// Write production file: minified and sourcemap removed.
		.pipe(rename(sassConfig.prod.app))
		.pipe(gulp.dest(sassConfig.dest))

		// Write sourcemaps
		.pipe(sourcemaps.write())

		// Write regular file for debugging with sourcemaps.
		.pipe(rename(sassConfig.dev))
		.pipe(gulp.dest(sassConfig.dest))
		.pipe(browserSync.stream())
})

gulp.task('sassProd', function() {
	return gulp.src(sassConfig.entry)
		.pipe(sass(sassConfig.settings))
		.on('error', handleErrors)
		.pipe(autoprefixer({
			browsers: ['> 2.5%', 'last 2 version', 'IE >= 10', 'Safari >= 7', 'iOS >= 7'] 
		}))
		.pipe(cssnano())
		.pipe(rename(sassConfig.prod.app))
		.pipe(gulp.dest(sassConfig.dest))
})

/*--------------------------------------------------------*\
	Critical
\*--------------------------------------------------------*/

gulp.task('sass:critical', function() {
	return gulp.src(sassConfig.critical)
		.pipe(sass(sassConfig.settings))
		.on('error', handleErrors)
		.pipe(autoprefixer({
			browsers: ['> 2.5%', 'last 2 version', 'IE >= 10', 'Safari >= 7', 'iOS >= 7']
		}))
		.pipe(cssnano())
		.pipe(rename(sassConfig.prod.critical))
		.pipe(gulp.dest(sassConfig.dest))
		.pipe(browserSync.stream())
})

gulp.task('sassProd:critical', function() {
	return gulp.src(sassConfig.critical)
		.pipe(sass(sassConfig.settings))
		.on('error', handleErrors)
		.pipe(autoprefixer({
			browsers: ['> 2.5%', 'last 2 version', 'IE >= 10', 'Safari >= 7', 'iOS >= 7']
		}))
		.pipe(cssnano())
		.pipe(rename(sassConfig.prod.critical))
		.pipe(gulp.dest(sassConfig.dest))
		.pipe(browserSync.stream())
})

/*--------------------------------------------------------*\
	Webpack
\*--------------------------------------------------------*/

gulp.task('webpack', function() {
	return webpack(config).watch(200, webpackLogger(function() {
		browserSync.reload()
	}))
})

/*--------------------------------------------------------*\
	Webpack --> Production
\*--------------------------------------------------------*/

gulp.task('webpackProd', function() {
	return gulp.src(['./js/src/app.js'])
		.pipe(named())
		.pipe(gulpWebpack(prodConfig, webpack))
		.pipe(gulp.dest('../build'))
})

/*--------------------------------------------------------*\
	BrowserSync
\*--------------------------------------------------------*/

gulp.task('serve', ['webpack', 'sass', 'images'], function() {
	browserSync.init({
		proxy: 'thm.dev/',
		open: false,
		ghostMode: false,
		notify: false,
	})
	
	gulp.watch(sassConfig.src, ['sass'])
	gulp.watch(images.src, ['images', reload])
	gulp.watch(markup.src, reload)
})

/*--------------------------------------------------------*\
	Default
\*--------------------------------------------------------*/

gulp.task('default', ['webpack', 'sass', 'sass:critical', 'images', 'serve'])
gulp.task('prod', ['webpackProd', 'sassProd', 'sassProd:critical', 'imagesProd'])