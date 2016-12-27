/*--------------------------------------------------------*\
	Instantiate Isotope Instance

	TODO: History
\*--------------------------------------------------------*/

import isotopeResize from './util/resize'
import isotopeOnLoad from './util/onload'
import isotopeHashLoad from './util/hashLoad'

function getColumnWidth(items) {
	let { width } = item.getBoundingClientRect()
	return width
}

function init(options, callback) {

	if(!options.layout) options.layout = 'masonry'

	return new Promise(resolve => {
		require.ensure([], () => {
			if(options.layout !== 'masonry') {
				resolve({
					Isotope: require('isotope-layout'),
					[options.layout]: require(`isotope-${options.layout}`)
				})
			} else {
				resolve({ Isotope: require('isotope-layout') })
			}
		}).then(({Isotope}) => {

			options.iso = new Isotope(
				options.container, {
				itemSelector: options.selector,
				layoutMode: options.layout,
				[options.layout]: {
					columnWidth: options.columnWidth,
					gutter: options.gutter,
				},
				transitionDuration: 500,
				percentPosition: true,
				// getSortData: {
				// 	date: '[data-date]',
				// },
				// sortBy: 'date'
			})

			isotopeResize(options)
			isotopeOnLoad(options)
			isotopeHashLoad(options)

			return options.iso
		})
	})
}

export default init

