#*--------------------------------------------------------*#
	# Banner
#*--------------------------------------------------------*#

slidr = require './../../lib/slidr/slidr.min.js'

module.exports = 

	container: document.getElementById 'banner__slidr'
	items: document.getElementsByClassName 'banner__item'
	slidrItems: []

	getItems: ->
		_this = @
		for item in @items
			do (item) ->
				data = item.getAttribute 'data-slidr'
				_this.slidrItems.push(data)
		@slidrItems.push('one')
		return

	slidrInit: ->
		Slidr = slidr.create('banner-slidr',
			breadcrumbs: true
			controls: false
			transition: 'fade'
		).add('h', @slidrItems).auto(7500)
		return

	lazyload: ->
		for item in @items
			do (item) ->
				skrollr = item.querySelector '.bg-parallax'
				if skrollr.getAttribute('data-background') isnt null and skrollr.getAttribute('data-background') isnt undefined
					bg = skrollr.getAttribute 'data-background'
					skrollr.style.backgroundImage = bg
					return

	init: ->
		@getItems()
		@slidrInit()
		@lazyload()
		return

				
