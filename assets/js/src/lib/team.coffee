#*--------------------------------------------------------#
	# Team
#*--------------------------------------------------------#

Isotope = require 'isotope-layout'

module.exports = 

	container: document.getElementById 'iso-team'
	items: document.getElementsByClassName 'team-item'
	filters: document.getElementsByClassName 'block-menu-item'
	iso: null

	isoInit: ->
		@iso = new Isotope @container,
			itemSelector: '.team__item'
			masonry:
				columnWidth: '.team__item'
				gutter: 8
			getSortData: 
				order: '[data-name]'
			sortBy: 'order'
		return

	clearFilters: ->
		for filter in @filters
			do (filter) ->
				if classie.has(filter, 'filter--active')
					classie.remove(filter, 'filter--active')
					return

	setFilters: ->
		_this = @
		for el in @filters
			el.addEventListener 'click', ->

				# Add active filter class
				_this.clearFilters()
				classie.add(@, 'filter--active')

				# Get the filter
				filter = @.getAttribute 'data-filter'

				# Run the filter
				_this.iso.arrange
					filter: filter
				_this.iso.layout()
				return

	init: ->
		_this = @
		@isoInit()
		@setFilters()
		@iso.layout()
		return