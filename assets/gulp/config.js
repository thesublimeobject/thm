const build = '../build'
const themeName = 'thm'

const config = {
	browserSync: {
		proxy: 'thm.dev/',
		ghostMode: false,
		open: false,
		port: 3000, 
	},
	
	sass: {
		entry: 'styl/app.scss',
		critical: 'styl/critical.scss',
		dev: 'app.css',
		prod: {
			app: 'app.min.css',
			critical: 'critical.min.css',
		},
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