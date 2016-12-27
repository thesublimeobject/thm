/*--------------------------------------------------------*\
	Isotopes

	TODO: If I'm going to lazy load this, I have to also
	accomodate for possible hash loading...??
\*--------------------------------------------------------*/
import els from 'els'
import init from 'lib/isotope/init'
import filter from 'lib/isotope/filter'

const filterEvents = {
	elements: [],

	addHandler(element, event, fn) {
		element.addEventListener(event, fn)
		let id = element.id
		this.elements.push({ id, element, event, fn })
	},

	removeHandler(element, event, fn) {
		element.removeEventLIstener(event,fn)
	},
}

function hoverInit(filters, options, container, iso, action) {
	for (let i = 0; i < filters.length; i++) {
		filterEvents.addHandler(filters[i], action, addInit(filters, options, container, iso))
	}
}

function addInit(filter, options, container, iso) {
	if (iso == null) {
		const iso = init(options).then((iso) => {
			container.classList.add('isotope__container--active')
			filter(options, filters)
			iso.layout()
		})
		removeInit()
	}
}

function removeInit() {
	for (let i = 0; i < filterEvents.elements.length; i++) {
		let { element, event, fn } = filterEvents.elements[i]
		filterEvents.removeHandler(element, event, fn)
	}
}

export default(() => {
	let { isotope: isotopes } = els

	for (let isotope of isotopes) {
		let { contaner, items, iso, selector } = isotope
		if (items.length > 0 && !!container) {
			const { filters } = els.UI 
			let action = 'mouseover'
			hoverInit(filters, isotope, container, iso, action)
		}
	}
})