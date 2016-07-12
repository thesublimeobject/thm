/*--------------------------------------------------------*\
	Modal
	
	*** TODO ***
	1. Do I really need to iterate through all elements on close?
	2. Possibly add length to the body/wrapper element when the modal is actually large than the body?
	3. Make any modal with an iframe inside as wide as it's [width], but still have a max-width.
		— just set it to the actual width/height
\*--------------------------------------------------------*/

import 'classlist-polyfill'
import fastdom from 'fastdom'
import _parseInt from 'lodash.parseint'
import _defaults from 'lodash.defaults'

const modal = (options) => {

	// Default Options
	const defaults = {
		modals: document.getElementsByClassName('modal'),
		open: document.getElementsByClassName('modal__trigger'),
		close: document.getElementsByClassName('modal__close'),
		overlayAppend: document.getElementsByClassName('wrapper')[0] || document.body,
		header: document.getElementsByClassName('header')[0],
		// options for overlay coloring, etc.?
	}

	// Overwrite defaults when applicable
	options = _defaults(options || {}, defaults)

	// Construct the overlay
	const overlayConstructor = (overlayAppend) => {
		let overlay = document.createElement('div')
		overlay.classList.add('modal__overlay')
		overlayAppend.appendChild(overlay)
		options.overlay = overlay
	}

	// Open modal
	const open = function() {
		if (this.nodeType === 'ANCHOR') event.preventDefault()
		let id = this.getAttribute('data-modal')
		let modal = document.getElementById(id)

		modal.classList.add('modal--visible')

		if (modal.querySelector('iframe') !== null) autoplay(modal)

		options.overlay.classList.add('modal__overlay--active')

		// set modal position
		setModalPosition(modal)
	}

	// Close modal
	const close = function() {
		if (this.nodeType === 'ANCHOR') event.preventDefault()

		// close overlay
		options.overlay.classList.remove('modal__overlay--active')

		// close modal
		for (let modal of options.modals) {
			if (modal.classList.contains('modal--visible')) {
				modal.classList.remove('modal--visible')

				// video?
				let video = modal.querySelector('iframe')
					? modal.querySelector('iframe')
					: null

				if (video) resetVideo(video)
			}
		}

		// reset modal
		const reset = () => {
			for (let modal of options.modals) {
				if (modal.classList.contains('modal--large')) {
					fastdom.mutate(() => {
						modal.style.top = 0
						modal.classList.remove('modal--large')
					})
				}
			}
		}
	}

	// Reset Video Modals
	const resetVideo = (video) => {
		let src = video.getAttribute('src'), srcArray

		// If src has ?start= to start video at a certain time
		// then ?&autoplay would be an invalid query. Check for
		// existence of either 
		if (src.indexOf('?&autoplay')) srcArray = src.split('?&autoplay')
		if (src.indexOf('&autoplay')) srcArray = src.split('&autoplay')

		src = srcArray[0]
		video.setAttribute('src', '')
		video.setAttribute('src', src)
	}

	// Autoplay Video on Open
	const autoplay = (modal) => {
		modal.classList.add('modal--video')

		const frame = modal.querySelector('iframe')	
		const src = frame.getAttribute('src')
		const w = frame.getAttribute('width')
		const h = frame.getAttribute('height')
		const iframe = document.createElement('iframe')

		content.removeChild(frame)

		// If ?start= exists in the src, adding ?&autoplay
		// Won't work because it introduces an invalid query
		if (src.indexOf('?start=') > -1) {
			iframe.src = `${src}&autoplay=1`
		} else {
			iframe.src = `${src}?&autoplay=1`
		}

		iframe.width = w 
		iframe.height = h
		iframe.frameborder = 0

		content.appendChild(iframe)
	}

	// If modal is too big, reset position
	const setModalPosition = (modal) => {

		// Re-references due to fastdom scoping
		let header = options.header
		let m = modal

		// fastdom
		fastom.measure(()=> {
			let h = _parseInt(window.getComputedStyle(m).height, 10)
			let windowHeight = window.innerHeight

			// re-write this to be optional
			let dy = window.scrollY || window.pageYOffset || document.documentElement.scrollTop

			// at most, expand to 95% of screen
			if (h > windowHeight * 0.90) {
				m.classList.add('modal--large')

				// set bound
				const topBound = windowHeight * 0.05

				// measure with scroll
				const top = dy + 40

				fastdom.mutate(()=> {
					m.style.top = topBound > top ? topBound + 'px' : top + 'px'
				})
			} else {
				return false
			}
		})
	}

	// Remove styling on close
	const reset = ()=> {
		for (let modal of options.modals) {
			if (modal.classList.contains('modal--large')) {
				fastdom.mutate(()=> {
					modal.style.top = 0
					modal.classList.remove('modal--large')
				})
			}
		}
	}

	// Bind listeners
	const bindListeners = () => {
		for (let element of options.open) {
			element.addEventListener('click', open)
		}

		for (let element of options.close) {
			element.addEventListener('click', close)
		}

		// add close to overlay, also
		options.overlay.addEventListener('click', close)
	}

	// Constructor
	return {
		init: () => {
			overlayConstructor(options.overlayAppend)
			bindListeners()
		}
	}
}

export default modal