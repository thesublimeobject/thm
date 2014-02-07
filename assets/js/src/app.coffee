jQuery ($) ->

	#*--------------------------------------------------------#
	   # Sidr
	#*--------------------------------------------------------#

	$('#press').sidr
		name: 'sidr'
		side: 'right'

	$('.close-sidr').click ->
		$.sidr 'close', 'sidr'

	$('a#press').bind "click touchstart", ->
		$(@).toggleClass 'open'

	#*--------------------------------------------------------#
	   # bxslider
	#*--------------------------------------------------------#

	$('ul.sldr').bxSlider
		speed: 1000
		pause: 10000
		auto: false
		touchEnabled: false
		pagerCustom: '.feature-pager'
		controls: true
		nextText: 'Previous'
		prevText: 'Next'

	#*--------------------------------------------------------#
	   # Services
	#*--------------------------------------------------------#

	serviceTitle = $('.service-title-hldr')
	serviceContent = $('.service-content')

	serviceTitle.hoverIntent ->
		$(@).parent().find(serviceContent).slideToggle()


	# catNames = 
	# 	names: []
	# 	addName: (x) ->
	# 		catNames.names.push(x)

	# catNames.addName "Bill"
	# catNames.addName "Tori"
	# console.log(catNames.names)






