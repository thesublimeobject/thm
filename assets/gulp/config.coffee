neat = require('node-neat').includePaths
dest = "../bld"
src = "./src"

module.exports =

	browserSync:
		proxy: "thm.dev/"
		ghostMode: 
			clicks: false
			location: false
			forms: false
			scroll: false
	
	sass:
		src: "styl/src/**"
		dest: dest
		settings: 
			sourceComments: 'map',
			imagePath: '/img',
			errLogToConsole: true,
			includePaths: ['sass'].concat(neat)

	markup:
		src: ['../*.html', '../*.php', '../inc/*.php', '../templates/*.php']

	images:
		src: "/img/**"
		dest: dest + "/img"

	browserify:
		bundleConfigs: [
			entries: './js/src/app.coffee'
			dest: dest
			extensions: ['.coffee']
			outputName: 'app.js'
			debug: true
		]