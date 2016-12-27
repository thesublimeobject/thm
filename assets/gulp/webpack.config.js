import path from 'path'
import webpack from 'webpack'
const dest = path.join(__dirname, '..', '..', 'build')
const node_modules = path.join(__dirname, 'node_modules')

module.exports = {
	// devtool: 'inline-source-map',

	entry: [path.join(__dirname, '..', 'js', 'app')],

	resolve: {
		extensions: ['', '.js'],
		alias: {
			'TweenLite': path.resolve('node_modules', 'gsap/src/uncompressed/TweenLite.js'),
			'TweenMax': path.resolve('node_modules', 'gsap/src/uncompressed/TweenMax.js'),
			'TimelineLite': path.resolve('node_modules', 'gsap/src/uncompressed/TimelineLite.js'),
			'TimelineMax': path.resolve('node_modules', 'gsap/src/uncompressed/TimelineMax.js'),
			'ScrollMagic': path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/ScrollMagic.js'),
			'animation.gsap': path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap.js'),
			'debug.addIndicators': path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js'),
		},
		modules: [
			path.join(__dirname, '..', 'js'),
			path.join(__dirname, '..', 'js', 'modules'),
			path.join(__dirname, '..', 'js', 'components'),
			path.join(__dirname, '..', 'js', 'util'),
			path.resolve('node_modules'),
		],
	},

	module: {
		loaders: [{
			test: /\.js$/,
			loader: 'babel-loader',
			exclude: node_modules,
		},

		{
			test: /\.json$/,
			loaders: ['json-loader'],
		},

		{
			test: /isotope\-|fizzy\-ui\-utils|desandro\-|masonry|outlayer|get\-size|doc\-ready|eventie|eventemitter|fastdom/,
			loader: 'imports?define=>false&this=>window',
		}]
	},

	query: {
		cacheDirectory: true,
	},

	output: {
		path: dest,
		filename: 'app.js',
		publicPath: '/bld/',
	},

	node: {
		fs: 'empty',
	},

	plugins: [new webpack.optimize.UglifyJsPlugin(), new webpack.NoErrorsPlugin()]
}