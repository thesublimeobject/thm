/*--------------------------------------------------------*\
	Components / UI
\*--------------------------------------------------------*/

const components = {
	carousels: [
		{
			block: document.getElementById('block--carousel'),
			container: document.getElementById('carousel--module'),
			selector: '.carousel__item',
			items: document.getElementsByClassName('carousel__item'),
			itemContainer: '.carousel-item__container',
			navigation: {
				container: '#nav--carousel',
				prev: '.carousel__prev',
				next: '.carousel__next',
			},
			options: {
				setItemHeight: true,
			},
		},
	],

	isotope: [
		{
			container: document.getElementById('isotope__container'),
			items: document.getElementsByClassName('isotope__item'),
			iso: null,
			filters: [],
			selector: '.isotope__item',
			gutter: 16,
			sortOnLoad: false,
			localItems: null,
			sortBy: null,
			sortAscend: false,
			postsLoaded: 0,
			itemsToLoad: 9,
			// loadMore: document.getElementById('button--loadMore'),
			//breakpoints: [{width: 0, gutter: 16}],
		},
	],

	modal: {
		overlay: document.getElementsByClassName('modal__overlay')[0],
		items: document.getElementsByClassName('modal'),
	},
}

/*--------------------------------------------------------*\
	Modules
\*--------------------------------------------------------*/

// const modules = {
// 	news: [{}],
// 	team: [{}],
// 	portfolio: [{}],
// }

/*--------------------------------------------------------*\
	JS Vars
\*--------------------------------------------------------*/

const vars = {
	protocol: window.location.protocol,
	host: window.location.host,
	pathname: window.location.pathname,
	hash: window.location.hash,
	ref: document.referrer,

	vendors: {
		jquery: '2.2.4',
		slick: '1.5.9',

	},

	colors: {
		black: '#000000',
		white: '#FFFFFF'
	}
}

/*--------------------------------------------------------*\
	Elements
\*--------------------------------------------------------*/

const elements = {
	wrapper: document.getElementsByClassName('wrapper')[0],
	head: document.getElementsByTagName('head')[0],
	blocks: document.getElementsByClassName('block'),
	container: document.getElementsByClassName('block__container'),

	header: {
		container: document.getElementsByClassName('header')[0],
		overlay: document.getElementsByClassName('overlay__header')[0],
		hasScrollListener: false,
		toggle: {
			open: document.getElementsByClassName('header__nav')[0],
			close: document.getElementsByClassName('overlay__close')[0],
			active: 'overlay__header--active',
		},
		logo: {
			main: document.getElementById('header__logo'),
			overlay: document.getElementById('overlay__logo'),
		},

		menu: {
			items: [],
			itemsBG: []
		},
	},

	content: {
		container: document.getElementsByClassName('content'),
		blockquotes: document.querySelectorAll('.content blockquote'),
	},

	footer: {
		container: document.getElementsByClassName('footer')[0],
		logo: document.getElementById('footer__logo'),
	},

	UI: {
		filters: document.getElementsByClassName('iso--filter'),
	},
}

/*--------------------------------------------------------*\
	Merge and Export
\*--------------------------------------------------------*/
const els = Object.assign({}, components, modules, vars, elements)
export default els