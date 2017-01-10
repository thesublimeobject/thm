/*--------------------------------------------------------*\
	Fonts

	// TODO: conditionally load polyfills based on Modernizr
	// Might need to load this conditionally based on support
	// import Promise from 'bluebird'
\*--------------------------------------------------------*/

import FontFaceObserver from 'fontfaceobserver'

function loadFonts() {
	const fonts = {
		light: new FontFaceObserver('montserratlight'),
		regular: new FontFaceObserver('montserratregular'),
		bold: new FontFaceObserver('montserratsemibold'),
	}

	Promise.all([
		fonts.light.load(), 
		fonts.regular.load(), 
		fonts.bold.load()
	]).then(() => document.body.classList.add('fonts--loaded'))
}

export default loadFonts