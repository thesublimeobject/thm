/*--------------------------------------------------------*\
	Isotope Filtering Function
	**** TODO: Abstract these functions ??
	**** TODO: Add hashes for all instances?
\*--------------------------------------------------------*/

import els from '../ref/els'
import includes from 'lodash.includes'
import toArray from 'lodash.toarray'
import _find from 'lodash.find'
import closest from '../util/closest'
import permute from '../util/permute'

const isoFiltersInit = (instance, iso, filters) => {
	
	// Filter Type
	let filterType = filters[0].parentNode.getAttribute('data-filter-group') !== undefined
		? 'group'
		: 'menu'
	
	// Loop through Filters
	for (let filter of filters) {
		filter.addEventListener('click', function() {

			// Set filters to empty string
			let filters = ''

			// Clear hash, if hash exists
			if (window.location.hash) window.location.hash = ''

			// Begin filtering
			if (filterType === 'menu') {

				// Clear all filters, add active filter class
				for (let filter of els.isotopeFilters) filter.classList.remove('iso__filter--active')
				this.classList.add('iso__filter--active')

				// Get the filter
				let filter = this.getAttribute('data-filter')

				// Run the filter, layout
				if (filter.indexOf('.') > -1) {
					iso.arrange({ filter: filter })
				} else {
					iso.arrange({
						filter: '*',
						sortBy: filter,
					})
				}
				iso.layout()
			}

			else if (filterType === 'group') {

				// Fetch the group filter accordingly
				let group = this.parentNode.getAttribute( 'data-filter-group' )

				// Clear all filters in group, add active filter class
				for (let filter of this.parentNode.querySelectorAll('.iso__filter')) {
					filter.classList.remove('iso__filter--active')
				}
				this.classList.add('iso__filter--active')

				// Get the filters
				instance.filters[ group ] = this.getAttribute( 'data-filter' )

				// Add them to the string from the object
				for (let key in instance.filters) {
					filters += instance.filters[ key ]
				}

				// Run the filter, layout
				iso.arrange({ filter: filters })
				iso.layout()
			}
		})
	}
}

export default isoFiltersInit
