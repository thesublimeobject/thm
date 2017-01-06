/*--------------------------------------------------------*\
	Carousel
\*--------------------------------------------------------*/

import els from '../ref/els'
import Promise from 'bluebird'

const replaceArrows = () => {
	let left = document.getElementsByClassName('slick-prev')[0]
	let right = document.getElementsByClassName('slick-next')[0]
	left.textContent = ''
	right.textContent = ''
	left.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129"><path d="M88.6 121.3c.8.8 1.8 1.2 2.9 1.2s2.1-.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8 0l-54 53.9c-1.6 1.6-1.6 4.2 0 5.8l54 53.9z"/></svg>'
	right.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129"><path d="M40.4 121.3c-.8.8-1.8 1.2-2.9 1.2s-2.1-.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8 0l53.9 53.9c1.6 1.6 1.6 4.2 0 5.8l-53.9 53.9z"/></svg>'
}

const initCarousel = (carousel) => {
	let load = new Promise((resolve, reject) => {
		let script = document.createElement('script')
		let ver = els.vendors.jquery
		script.async = true
		script.src = `https://ajax.googleapis.com/ajax/libs/jquery/${ver}/jquery.min.js`
		script.onload = () => resolve()
		els.head.appendChild(script)
	}).then(() => {
		return new Promise((resolve, reject) => {
			let script = document.createElement('script')
			let ver = els.vendors.slick
			script.async = true
			script.src = `//cdn.jsdelivr.net/jquery.slick/${ver}/slick.min.js`
			script.onload = () => resolve()
			els.head.appendChild(script)
		})
	}).then(() => {
		return new Promise((resolve, reject) => {
			let style = document.createElement('link')
			let ver = els.vendors.slick
			style.rel  = 'stylesheet'
			style.type = 'text/css'
			style.href = `//cdn.jsdelivr.net/jquery.slick/${ver}/slick.css`
			style.onload = () => resolve()
			els.head.appendChild(style)
		})
	}).then(() => {
		if (carousel.children.length > 3) {
			jQuery(carousel).slick({
				// autoplay: true,
				// autoplaySpeed: 7500,
				infinite: true,
				slidesToShow: 2,
				slidesToScroll: 1,
				arrows: true,
				cssEase: 'linear',
				dots: false,
				responsive: [
					{
						breakpoint: 961,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
						}
					}
				],
			})

			jQuery(carousel).on('breakpoint', (event, slick) => {
				replaceArrows()
			})
		}

	// replace button text with arrows
	}).then(() => {
		replaceArrows()			
	})
}

export default (() => {
	if (!!els.carousel.container) {
		initCarousel(els.carousel.container)
	}
})