/*--------------------------------------------------------*\
	Scroll to a given location
\*--------------------------------------------------------*/

import els from '../ref/els'
import fastdom from 'fastdom'
	
const scrollTo = (to, dur = 1000, cb = null) => {

	Math.easeInOutQuad = function(t, b, c, d) {
		t /= d / 2
		if (t < 1) {
			return (c / 2 * t * t + b)
		}
		t--
		return - c / 2 * ( t * (t - 2) - 1 ) + b
	}

	let move = (amount) => {
		document.documentElement.scrollTop = amount
		document.body.parentNode.scrollTop = amount
		document.body.scrollTop = amount
	}

	let position = () => {
		return document.documentElement.scrollTop || 
			   document.body.parentNode.scrollTop || 
			   document.body.scrollTop
	}
	
	let headerHeight, start, change = 0
	fastdom.measure(() => {
		headerHeight = els.header.getBoundingClientRect().height
		start = position()
		change = to.offsetTop - headerHeight - start
	})
	let currentTime = 0
	let increment = 20
	let duration = (typeof(duration) == 'undefined') ? 500 : dur

	let animateScroll = () => {
		currentTime += increment
		let val = Math.easeInOutQuad( currentTime, start, change, duration )
		fastdom.mutate(() => move(val))

		if (currentTime < duration) {
			window.requestAnimationFrame(animateScroll)
		} 

		else {
			if (!!cb && typeof(cb) == 'function') {
				cb()
			}
		}
	}

	return animateScroll()
}

export default scrollTo