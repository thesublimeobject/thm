/*--------------------------------------------------------*\
	Isotope Filtering Function

	TODO: Abstract these functions...??
	TODO: Add hashes for all instances..??
\*--------------------------------------------------------*/
import els from 'els'
import checkPostsLoadPosts from './checkPostsLoadPosts'
import menu from './filterTypes/menu'

function isotopeFilter( instance, filters ) {

	// Instantiate type of isotope instance
	filters = (!!filters[0].querySelector('input') == true)
		? document.querySelectorAll('.iso--filter input')
		: filters

	// Determine type of filter used (input, menu, dropdown)
	let filterType = (filters[0].nodeName === 'INPUT')
		? 'checkbox'
		: filters[0].classList.contains('menu__item')
			? 'menu'
			: 'dropdown'

	for ( let filter of filters) {

		// Add Click Event to filters
		filter.addEventListener('click', function(event) {

			// Load posts if all aren't loaded
			if (instance.postsLoaded !== undefined) {
				checkPostsLoadPosts(instance)
			}

			// Begin filtering
			if (filterType === 'menu') {
				menu.call(this, instance, filters)
			} else {
				instance.iso.arrange( {filter: filter} )
				instance.iso.layout()
			}
		})
	}
}

export default isotopeFilter