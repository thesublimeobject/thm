#*--------------------------------------------------------*#
	# Requires
#*--------------------------------------------------------*#

classie = require 'classie'
modal = require('kbd-modal').Modal
mobileMenu = require './lib/menu'
kbd = require './lib/kbd'
# test = require './lib/test'
# console.log test




#*--------------------------------------------------------#
	# Clean Load
#*--------------------------------------------------------#

wrapper = document.getElementsByClassName('wrapper')[0]
wrapper.style.opacity = 1

#*--------------------------------------------------------*#
	# Modal
#*--------------------------------------------------------*#

m = new modal('md-trigger', '[id^="md"]', 'md-close')
m.init()

#*--------------------------------------------------------*#
	# Local Requires
#*--------------------------------------------------------*#

# banner = require './lib/banner'
# quotes = require './lib/quotes'
# team = require './lib/team'
# single = require './lib/single'

# if banner.container?
# 	banner.init()

# if quotes.container?
# 	quotes.init()

# if team.container?
# 	team.init()

# if single.container?
# 	single.init()

#*--------------------------------------------------------*#
	# Open All Links in New Tabs
#*--------------------------------------------------------*#

links = document.getElementsByTagName 'a'

for link in links
	do (link) ->
		host = window.location.hostname
		url = link.getAttribute 'href'
		if url.indexOf(host) < 0 or url.indexOf('.pdf') > -1
			link.setAttribute 'target', '_blank'

#*--------------------------------------------------------*#
	# KBD Iso
#*--------------------------------------------------------*#

Iso = require 'kbd-iso'

sort = new Iso
	container: 'iso'
	items: 'iso__item'
	filters: 'sidebar__filter'
	gutter: 16
	lazy: true
	filterType: 'sidebarFilters'
	sidebarButton: 'sidebar-button'
	sidebar: 'iso__sidebar'
	menus: 'iso__menu'
	notify: true
	sort:
		order: '[data-order]'
		sortBy: 'order'
		sortAscending: true
	setHeightToWidth: true

sort.init()






