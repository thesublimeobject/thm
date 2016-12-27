/*--------------------------------------------------------*\
	Polyfills
\*--------------------------------------------------------*/
HTMLCollection.prototype[Symbol.iterator] = Array.prototype.values

if (typeof Promise !== "undefined" && Promise.toString().indexOf("[native code]") !== -1) {
    require.ensure([], () => {
		let Promise = require('bluebird')
		window.Promise = Promise
	})
}

/*--------------------------------------------------------*\
	Browser Class - Name and Name-Version
\*--------------------------------------------------------*/
import browser from 'detect-browser'
let ver = browser.version.match(/^([0-9]*[^\.])/)[0]
document.body.classList.add('browser--' + browser.name, 'browser--' + browser.name + "-" + ver)

/*--------------------------------------------------------*\
	Components
\*--------------------------------------------------------*/
import els from 'els'
window.__els__ = els

//import header from './lib/header'
// import carousel from './lib/carousel'
//header()
// carousel()


/*--------------------------------------------------------*\
	Load...
\*--------------------------------------------------------*/

els.wrapper.style.opacity = 1
