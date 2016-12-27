/*--------------------------------------------------------*\
	Typography
\*--------------------------------------------------------*/

import els from '../../els'
import widows from './widows'

export default (() => {
	let { headings } = els.typography
	if (headings.length) {
		widows(headings)
	}
})