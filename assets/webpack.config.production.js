var path = require('path')
var webpack = require('webpack')
var BrowserSyncPlugin = require('browser-sync-webpack-plugin')
var ExtractTextPlugin = require('extract-text-webpack-plugin')
var node_modules = path.resolve(__dirname, 'node_modules')

module.exports = {
	entry: [
		'babel-polyfill',
		'./js/src/app'
	],

	module: {
		loaders: [{
			test: /\.js$/,
			loaders: ['babel'],
			exclude: [node_modules],
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

		// Sass
		{
			test: /\.scss$/,
			loader: ExtractTextPlugin.extract('style', 'css!sass')
		}]
	},

	output: {
		path: path.join(__dirname, '..', 'bld'),
		filename: 'app.min.js',
	},

	node: {
		fs: 'empty'
	},

	plugins: [
		new ExtractTextPlugin('build.css', { allChunks: true })
	],
}