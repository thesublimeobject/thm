/*--------------------------------------------------------*\
	Set all elements to mirror the tallest element. 
	Loops through children to mitigate compunding 
	resizing height issues.
\*--------------------------------------------------------*/

// Lodash Dependencies
import _parseInt from 'lodash.parseint'
import _reduce from 'lodash/collection/reduce'


const balanceHeight = (items, margin = 0, callback) => {

	fastdom.measure({

		// Which item is the tallest?
		let height = 0
		for (let item of items) {

			// Set item defaults to 0
			let itemHeight = {
				full: 0,
				padding: 0,
				childrenHeight: 0,
			}

			// Add padding from the main element
			itemHeight.padding = 
				_parseInt( window.getComputedStyle(item).paddingTop, 10 ) +
				_parseInt( window.getComputedStyle(item).paddingBottom, 10 )

			// Add height of children
			for (let child of item.children) {
				if ( window.getComputedStyle(child).position != 'absolute' ) {

					// Get main height
					itemHeight.childrenHeight += child.clientHeight

					// Add margin height
					itemHeight.childrenHeight += _parseInt( window.getComputedStyle(child).marginTop, 10 )
					itemHeight.childrenHeight += _parseInt( window.getComputedStyle(child).marginBottom, 10 )
				}
			}

			// Calculate total height
			itemHeight.full = itemHeight.padding + itemHeight.childrenHeight

			// set height var if applicable
			if (itemHeight.full > height) height = itemHeight.full
		}

		fastdom.mutate({
			for (let item of items ) {
				item.style.height = height + 'px'
			}
		})
	})

	if ( !!callback && typeof(callback) === 'function' ) {
		callback()
	}
}

export default balanceHeight