/*--------------------------------------------------------*\
	Instantiate Isotope Instance
\*--------------------------------------------------------*/

import els from '../ref/els'
import _debounce from 'lodash.debounce'

const isoInit = (Isotope, options, hashLoad, callback) => {

	// Main options
	let iso = new Isotope(
		options.container, {
		itemSelector: options.selector,
		masonry: {
			columnWidth: options.selector,
			gutter: options.gutter,
		},
		transitionDuration: '0.25s',
	})

	if (!!options.responsive) {
		if (window.innerWidth <= 1168) isotopeResize(iso, options)
		window.addEventListener('resize', () => isotopeResize(iso, options))
	}

	// Initialize filter/sort?
	if (!!options.filter) {
		iso.arrange({
			filter: options.filter
		})

		// Find the initial filter and add the active class
		for (let filter of els.isotopeFilters) {
			const data = filter.getAttribute('data-filter')
			if (data == '*') {
				filter.classList.add('iso__filter--active')
			}
		}
	}

	// Initialize layout on first call
	iso.layout()

	// Get hash
	if (hashLoad) {
		if (els.hash !== '') {
			let filter = 'filter--' + els.hash.split('#')[1]
			document.querySelector('.iso--filter input[id="' + filter + '"]').checked = true
			iso.arrange({
				filter: '.' + filter,
				sortBy: 'order'
			})
			iso.layout()
			
			// Scroll to section on load
			scrollTo(els.resourcesBlock)
		}
	} 
	
	// If history.state isn't null re-filter to previous layout
	if (els.hash === '' && history.state !== null) {
		let id = history.state.filtered.split('.')
		if (history.state.filtered == '*') {
			history.state.filtered = null
			
			// Save and return the object
			options.iso = iso
			return iso
		}
		let checkbox = document.querySelector('#' + id[1])
		if (checkbox.checked == false) {
			checkbox.checked = true
		}
		iso.arrange({
			filter: history.state.filtered
		})
		iso.layout()
	}

	// Save and return the object
	options.iso = iso
	return iso
}

const isotopeResize = _debounce((instance, options) => {
	let opts = options.responsive
	for (let option of opts) {
		if (window.innerWidth <= option.width) {
			instance.options.masonry.gutter = option.gutter
			instance.layout()
		}
	}
}, 150)

export default isoInit