var webpack = require('webpack')
var webpackDevServer = require('webpack-dev-server')
var config = require('./webpack.config')

new webpackDevServer(webpack(config), {
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