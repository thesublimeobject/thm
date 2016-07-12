/*--------------------------------------------------------*\
	Isotope
\*--------------------------------------------------------*/

import els from '../ref/els'
import isoInit from './isotope'
import isoFiltersInit from './isotopeFilters'

export default(() => {
	let isotopes = els.isotope.length
	while (isotopes--) {
		if (!!els.isotope[isotopes].container) {
			
			return new Promise(resolve => {
				require.ensure([], () => {
					resolve({
						Isotope: require('isotope-layout')
					})
				})
			}).then(({ Isotope }) => {
				const iso = isoInit(Isotope, els.isotope[isotopes])
				isoFiltersInit(els.isotope[isotopes], iso, els.isotopeFilters)
			}).then(() => {
				els.wrapper.style.opacity = 1
			})
		}
	}
})