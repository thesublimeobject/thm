/*--------------------------------------------------------*\
	Header
\*--------------------------------------------------------*/

import els from './../ref/els'

/*--------------------------------------------------------*\
	Toggle Menu
\*--------------------------------------------------------*/

const toggleMenu = (menu) => {
	menu.addEventListener('click', function() {

		// Toggle menu
		this.classList.toggle('active')

		// Toggle overlay && header
		if (els.navMenu.classList.contains('overlay__menu--visible')) {
			els.navMenu.classList.remove('overlay__menu--visible')
			els.header.classList.remove('header--open')
		} else {
			els.navMenu.classList.add('overlay__menu--visible')
			els.header.classList.add('header--open')
		}
	})
}

/*--------------------------------------------------------*\
	Scroll Listener
\*--------------------------------------------------------*/

const headerScroll = () => {

	// Scroll Distance
	fastdom.measure(() => { 
		let dy = window.scrollY || window.pageYOffset 

		if (dy > 25) {

			els.header.classList.add('header--scrolled')
		} 

		else {

			els.header.classList.remove('header--scrolled')
		}
	})
}

const headerScrollListener = () => {
	headerScroll()
	window.addEventListener('scroll', headerScroll)
}


export default(() => {
	toggleMenu(els.navToggle)
	headerScrollListener()
})