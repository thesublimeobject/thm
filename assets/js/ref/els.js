/*--------------------------------------------------------*\
	Globally defined reference && state structures
\*--------------------------------------------------------*/

const els = {

	// mains
	wrapper: document.getElementsByClassName('wrapper')[0],
	head: document.getElementsByTagName('head')[0],
	blocks: document.getElementsByClassName('block'),
	content: document.getElementsByClassName('content'),

	// header && footer
	header: document.getElementsByClassName('header')[0],
	headerHasScrollListener: false,
	navToggle: document.getElementsByClassName('nav__toggle')[0],
	navMenu: document.getElementsByClassName('overlay__menu')[0],
	footer: document.getElementsByClassName('footer')[0],

	// lazyload
	lazy: {
		items: document.querySelectorAll(`[data-bg*="/"]`)
	},
	
	// modal
	modal: {
		overlay: document.getElementsByClassName('modal__overlay')[0],
		newsletter: document.getElementById('modal--newsletter'),
		items: document.getElementsByClassName('modal'),
	},

	// window.location
	protocol: window.location.protocol,
	host: window.location.host,
	pathname: window.location.pathname,
	hash: window.location.hash,
	ref: document.referrer,
}

export default els