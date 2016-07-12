/*--------------------------------------------------------*\
	*** KBD Dropdown ***
	
	transforms <ul> element into a functional dropdown menu
\*--------------------------------------------------------*/

import fastdom from 'fastdom'
import _parseInt from 'lodash.parseint'

class Dropdown {

	constructor(dropdown) {
		this.dropdown = dropdown
		this.els = dropdown.querySelectorAll('li')
	}

	getStyle(el, style) {
		let styl = _parseInt(window.getComputedStyle(el)[style], 10)
		return styl
	}

	activeInit() {
		fastdom.mutate(() => {
			let span = document.createElement('span')
			span.textContent = this.els[0].textContent
			this.dropdown.insertBefore(span, this.dropdown.firstChild)
		})
	}

	calcListHeight() {
		let height = null
		fastdom.measure(() => {
			height = this.getStyle(this.els[0], 'height') * ( this.els.length - 1 )
		})
		return height
	}

	toggle() {
		this.dropdown.addEventListener('click', () => {
			if (this.dropdown.classList.contains('iso__dropdown--active')) {
				for (let el of this.els) {
					fastdom.mutate(() => {
						el.style.top = 0
					})
				}
				this.dropdown.classList.remove('iso__dropdown--active')
			}

			else {
				fastdom.measure(() => {
					let height = this.getStyle(this.els[0], 'height')
					fastdom.mutate(() => {
						Array.from(this.els).forEach((el, index) => {
							el.style.top = height * index + 'px'
						})
					})
				})
				this.dropdown.classList.add('iso__dropdown--active')
			}
		})
	}

	clearActive() {
		for (let el of this.els) {
			el.classList.remove('iso__filter--active')
		}
	}

	toggleCurrentLabel() {
		for (let el of this.els) {
			el.addEventListener('click', (event) => {
				if (el.classList.contains('iso__filter--active')) {
					return false
				}

				else {
					this.clearActive()
					fastdom.mutate(() => {
						this.dropdown.querySelector('span').textContent = event.target.textContent
					})
					event.target.classList.add('iso__filter--active')
				}
			})
		}
	}

	init() {
		this.activeInit()
		this.toggle()
		this.toggleCurrentLabel()
	}
}

module.exports = Dropdown