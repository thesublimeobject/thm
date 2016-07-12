const build = '../bld'
const themeName = 'thm'

const config = {
	browserSync: {
		proxy: 'thm.dev/',
		ghostMode: false,
		open: false,
		port: 3000, 
	},
	
	sass: {
		entry: 'styl/screen.scss',
		dev: 'screen.css',
		prod: 'screen.min.css',
		src: 'styl/**/*',
		dest: build,
		settings: {
			sourceComments: 'map',
			imagePath: '/img',
			errLogToConsole: true,
			indentType: 'tab',
			indentWidth: 1,
		}
	},

	markup: {
		src: [`../cnt/themes/${themeName}/**/*.php`, `../cnt/themes/${themeName}/**/*.html`]
	},

	images: {
		src: 'img/**/*',
		dest: build + '/img',
	},
}

const { browserSync, sass, markup, images } = config

export { 
	build, 
	browserSync, 
	sass, 
	markup, 
	images, 
}