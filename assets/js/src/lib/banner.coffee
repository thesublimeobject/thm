#*--------------------------------------------------------*#
	# Banner
#*--------------------------------------------------------*#

slidr = require './../../lib/slidr/slidr.min.js'

module.exports = 

	container: document.getElementById 'banner__slider'
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
		_this = @
		Slidr = slidr.create('banner__slider',
			breadcrumbs: true
			controls: false
			transition: 'fade'
		).add('h', _this.slidrItems).auto(7500)
		return

	lazyload: ->
		for item in @items
			do (item) ->
				data = item.getAttribute 'data-bg'
				if data?
					item.style.backgroundImage = data
					item.setAttribute 'data-bg', ''

	init: ->
		@getItems()
		
		# Only init slider if at least two items exits
		if @slidrItems.length > 2
			@slidrInit()

		@lazyload()
		return

				
