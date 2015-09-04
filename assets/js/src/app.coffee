#*--------------------------------------------------------*#
	# Requires
#*--------------------------------------------------------*#

_ = require 'lodash'
classie = require 'classie'
modal = require('kbd-modal').Modal
mobileMenu = require './lib/menu'
kbd = require './lib/kbd'

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

banner = require './lib/banner'