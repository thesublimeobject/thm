var path = require('path')
var webpack = require('webpack')
var BrowserSyncPlugin = require('browser-sync-webpack-plugin')
var ExtractTextPlugin = require('extract-text-webpack-plugin')

module.exports = {
	devtool: 'eval',

	entry: [
		'webpack-dev-server/client?http://localhost:3000',
		'webpack/hot/only-dev-server',
		'babel-polyfill',
		'./js/src/app'
	],

	resolve: {
		extensions: ['', '.js']
	},

	module: {
		loaders: [{
			test: /\.js$/,
			loaders: ['babel'],
			exclude: 'node_modules'
		},
		
		// Isotope Hacks
		{
			test: /isotope\-|fizzy\-ui\-utils|desandro\-|masonry|outlayer|get\-size|doc\-ready|eventie|eventemitter/,
			loader: 'imports?define=>false&this=>window'
		},
		{
			test: /imagesloaded\-|fizzy\-ui\-utils|desandro\-|masonry|outlayer|get\-size|doc\-ready|eventie|eventemitter/,
			loader: 'imports?define=>false&this=>window'
		},

		// JSON
		{
			test: /\.json$/,
			loaders: ['json-loader']
		},
		
		// Sass
		{
			test: /\.scss$/,
			loaders: [ 'style', 'css?sourceMap', 'sass?sourceMap' ]
		}]
	},

	output: {
		path: path.join(__dirname, 'public'),
		filename: 'bundle.js',
		publicPath: 'http://localhost:3000/public/'
	},

	node: {
		fs: 'empty'
	},

	plugins: [
		new BrowserSyncPlugin(
			{
				// browse to http://localhost:3000/ during development 
				proxy: 'yo-test.dev/',
				host: 'localhost',
				port: 3000,
				ws: true,
				open: false,
			},

			{
				// prevent BrowserSync from reloading the page 
				// and let Webpack Dev Server take care of this 
				reload: false,
				name: 'main',
 			}
		),
		new webpack.HotModuleReplacementPlugin(),
		new webpack.NoErrorsPlugin(),
		// new ExtractTextPlugin('public/build.css')
	],
}