#*--------------------------------------------------------#
   # jQuery Modal Plugin
#*--------------------------------------------------------#

$ = jQuery

settings = 
	overlay: $('.md-overlay')
	trigger: null
	modal: null
	close: null

methods =

	init: (options) ->
		if options
			$.extend settings, options

		settings.trigger.click (event) ->
			event.preventDefault()
			modal = $(@).attr('data-modal')
			modalID = '#' + modal
			$(modalID).addClass('md-show')
			settings.overlay.addClass 'overlay-it'

		mdClose = (event) ->
			event.preventDefault()
			settings.overlay.removeClass 'overlay-it'
			settings.modal.removeClass 'md-show'

		autoPlay = (id, w, h) ->
			src = id.find('iframe').attr 'src'
			id.html '<iframe width="' + w + '" height="' + h + '" src="' + src + '?&autoplay=1" frameborder="0"></iframe>'

		settings.close.on 'click', mdClose
		settings.overlay.on 'click', mdClose


	log: (message) ->
		try
			console.log message
		catch e


$.fn.modal = (method) ->
	if methods[method]
		methods[method].apply( @, Array.prototype.slice.call( arguments, 1 ))
	else if typeof method == 'object' || !method
		methods.init.apply( @, arguments )
	else
		$.error( 'Method ' +  method + ' does not exist on jQuery.plugin_name' )