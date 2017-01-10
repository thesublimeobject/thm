/*--------------------------------------------------------*\
	Filter Type: Menu
\*--------------------------------------------------------*/

function menuFilters( instance, filters ) {
	
	let { sortBy: sortBy, sortAscending: sortAscending } = instance
	// Clear hash, if hash exists
	if (window.location.hash !== '') window.location.hash = ''

	// Clear all filters and add active filter class
	for ( let filter of filters ) filter.classList.remove('filter--active')
	this.classList.add('filter--active')

	// Get the Filter
	let filter = this.getAttribute('data-filter')


	// Run the filter and re-layout the items
	if ( filter.indexOf('.') > -1 ) {
		instance.iso.arrange({
			filter: filter,
			sortBy: sortBy,
			sortAscending: sortAscend,
		})
	} else {
		instance.iso.arrange({
			filter: '*',
			sortBy: sortBy
			sortAscending: sortAscend
		})
	}

	instance.iso.layout()
}

export default menuFilters