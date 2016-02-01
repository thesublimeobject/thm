import gulp from 'gulp'
import gutil from 'gulp-util'
import changed from 'gulp-changed'
import imagemin from 'gulp-imagemin'
import pngquant from 'imagemin-pngquant'
import browserSync from 'browser-sync'
import webpack from 'webpack'
import webpackConfig from './webpack.config'
import webpackDevServer from 'webpack-dev-server'
import livereload from 'gulp-livereload'

// Webpack
gulp.task('webpack', () => {
	new webpackDevServer(webpack(webpackConfig), {
		publicPath: 'http://localhost:3000/public/',
		contentBase: __dirname,
		hot: true,
		stats: {
			colors: true
		},
		proxy: {
			'*': 'http://localhost:3001'
		}
	}).listen(3000, 'localhost', (err) => {
		if (err) console.log(err)
		console.log('Listening at localhost:3000')
	})
})


// Get BS instance 'main' from webpack
let bs = browserSync.get('main')

// Reload
gulp.task('reload', () => {
	return bs.reload()
})

// Images
gulp.task('images', () => {
	return gulp.src('img/**/*')
		.pipe(changed('./../bld/img'))
		.pipe(imagemin({
			progressive: true,
			svgoPlugins: [{removeViewBox: false}],
			use: [pngquant()],
		}))
		.pipe(gulp.dest('./../bld/img'))
		.pipe(bs.reload({ stream: true }))
})

// Watch
gulp.task('watch', () => {
	gulp.watch(['../cnt/themes/yo/**/*.php', '../cnt/themes/yo/**/*.html'], ['reload'])
	gulp.watch(['img/**/*'], ['images'])
})

// Default
gulp.task('default', ['webpack', 'images', 'watch'])
