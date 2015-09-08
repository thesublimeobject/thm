#*--------------------------------------------------------*#
	# Quotes
#*--------------------------------------------------------*#

slidr = require './../../lib/slidr/slidr.min.js'
_debounce = require 'lodash/function/debounce'
_parseInt = require 'lodash/string/parseInt'
$ = jQuery

module.exports = 

	container: document.getElementById 'quote__slider'
	items: document.getElementsByClassName 'quote__item'
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
		Slidr = slidr.create('quote__slider',
			breadcrumbs: false
			controls: 'border'
			transition: 'cube'
			overflow: true
			pause: true
		).add('h', _this.slidrItems).auto(10000)

	init: ->
		@getItems()

		# Only init slider if at least two items exits
		if @slidrItems.length > 2
			@slidrInit()
		return


				
