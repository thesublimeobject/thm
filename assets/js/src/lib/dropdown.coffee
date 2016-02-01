#*--------------------------------------------------------#
	# KBD Dropdown
#*--------------------------------------------------------#

classie = require 'classie'
_parseInt = require 'lodash/string/parseInt'

class Dropdown

	constructor: (dropdown) ->
		@dropdown = dropdown
		@els = dropdown.querySelectorAll 'li'

	getStyle: (el, style) ->
		styl = _parseInt(window.getComputedStyle(el)[style], 10)
		return styl

	activeInit: ->
		span = document.createElement 'span'
		span.textContent = @els[0].textContent
		@dropdown.insertBefore(span, @dropdown.firstChild)
		return

	calcListHeight: ->
		height = @getStyle(@els[0], 'height') * ( @els.length - 1 )
		return height

	toggle: ->
		_this = @
		@dropdown.addEventListener 'click', ->
			if classie.has(_this.dropdown, 'iso__dropdown--active')
				for el, i in _this.els
					do (el) ->
						el.style.top = 0
				classie.remove(_this.dropdown, 'iso__dropdown--active')
				return

			else
				height = _this.getStyle(_this.els[0], 'height')
				for el, i in _this.els
					do (el) ->
						el.style.top = height * i + 'px'

				classie.add(_this.dropdown, 'iso__dropdown--active')
				return

	toggleCurrentLabel: ->
		_this = @
		for el in @els
			do (el) ->
				el.addEventListener 'click', ->
					if classie.has(el, 'iso__ilter--active')
						return false
					else
						_this.dropdown.querySelector('span').textContent = @.textContent
						classie.add(@, 'iso__filter--active')
						return

	clearFilters: ->
		_this = @
		document.getElementsByClassName('clear-filters')[0].addEventListener 'click', ->
			_this.dropdown.children[0].textContent = _this.els[0].textContent
			return

	init: ->
		@activeInit()
		@toggle()
		@toggleCurrentLabel()
		# @clearFilters()
		return

module.exports = Dropdown