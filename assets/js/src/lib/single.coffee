#*--------------------------------------------------------*#
	# Requires
#*--------------------------------------------------------*#

$ = jQuery
owlCarousel = require '../../lib/owl-carousel.js'
_debounce = require 'lodash/function/debounce'

#*--------------------------------------------------------*#
	# Module
#*--------------------------------------------------------*#

module.exports = 

	container: document.getElementById 'recent-posts__slider'
	items: document.getElementsByClassName 'recent-posts__slider-item'
	arrowLeft: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="-356.4 234.5 232.8 500" enable-background="new -356.4 234.5 232.8 500"><path d="M-131.5 734.5l-224.9-249.7 224.9-250.3 7.9 6.9-218.6 242.9 218.6 242.9-7.9 7.3z" fill="#fff"/></svg>'
	arrowRight: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="-356.4 234.5 232.8 500" enable-background="new -356.4 234.5 232.8 500"><path d="M-348.5 234.5l224.9 249.7-224.9 250.3-7.9-6.9 218.6-242.9-218.6-242.9 7.9-7.3z" fill="#fff"/></svg>'

	sliderInit: ->
		_this = @
		$(@container).owlCarousel
			items: 4
			nav: true
			itemsMobile: false
			navigation: true
			pagination: false
			rewindNav: true
			navigationText: [ _this.arrowLeft, _this.arrowRight ]

	sliderNav: ->
		containerHeight = @container.offsetHeight
		document.getElementsByClassName('owl-controls')[0].style.height = containerHeight + 'px'
		return

	init: ->
		_this = @

		if @items.length > 4

			script = document.createElement 'script'
			script.onload = ->
				_this.sliderInit()
				_this.sliderNav()

			script.setAttribute('src', '//' + window.location.host + '/cnt/themes/yo/assets/js/lib/owl-carousel.js')
			document.body.appendChild(script)

			window.addEventListener 'resize', _debounce ->
				_this.sliderNav()
				return
			, 150
			
			return
		return