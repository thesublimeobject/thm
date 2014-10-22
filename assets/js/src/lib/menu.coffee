#*--------------------------------------------------------#
	# Mobile Menu
#*--------------------------------------------------------#

module.exports = ->

	bodyEl = document.body
	content = document.querySelector( '.content-wrap' )
	openbtn = document.getElementById( 'open-button' )
	closebtn = document.getElementById( 'close-button' )
	isOpen = false

	init = ->
		initEvents()

	initEvents = ->
		openbtn.addEventListener( 'click', toggleMenu )
		if closebtn
			closebtn.addEventListener( 'click', toggleMenu )

		# content.addEventListener 'click', (event) ->
		# 	target = event.target
		# 	if isOpen and target isnt openbtn
		# 		toggleMenu()


	toggleMenu = ->
		if isOpen
			classie.remove( bodyEl, 'show-menu' )
		else
			classie.add( bodyEl, 'show-menu' )
		isOpen = !isOpen

	init: init