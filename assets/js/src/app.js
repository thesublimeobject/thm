import '../../styl/src/screen.scss'

document.getElementsByClassName('wrapper')[0].style.opacity = 1

var Iso, classie, fn, i, kbd, len, link, links, m, mobileMenu, modal, sort, wrapper;
classie = require('classie');
modal = require('kbd-modal').Modal;
// mobileMenu = require('./lib/menu');
// kbd = require('./lib/kbd');
// wrapper = document.getElementsByClassName('wrapper')[0];
// wrapper.style.opacity = 1;

m = new modal('md-trigger', '[id^="md"]', 'md-close');
m.init();

links = document.getElementsByTagName('a');

fn = function(link) {
	var host, url;
	host = window.location.hostname;
	url = link.getAttribute('href');
	if (url.indexOf(host) < 0 || url.indexOf('.pdf') > -1) {
		return link.setAttribute('target', '_blank');
	}
};
for (i = 0, len = links.length; i < len; i++) {
	link = links[i];
	fn(link);
}

if (module.hot) {
	module.hot.accept()
}