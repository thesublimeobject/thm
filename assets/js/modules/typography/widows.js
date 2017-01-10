
import _words from 'lodash.words'
import fastdom from 'fastdom'
import closest from '../../util/closest'

/*--------------------------------------------------------*\
	Insert <br> in the middle of a title in order
	to prevent widowing
\*--------------------------------------------------------*/

function splitWidows(elements) {
	for (let i = 0; i < elements.length; i++) {
		let el = elements[i]
		if (el.innerHTML.indexOf('<br>') === -1) {
			let text = el.textContent
			let words = _words(text)
			let slice = words.splice(Math.ceil(words.length / 2), words.length)
			words.push('<br>')
			let text__modified = words.concat(slice)
			let html = text__modified.join(' ')
			el.innerHTML = html
		}
	}
}

/*--------------------------------------------------------*\
	Glue together the last x number of words
	to prevent widowing
\*--------------------------------------------------------*/

function glueWords__small(el, words) {
	words[words.length - 2] += '&nbsp;' + words[words.length - 1]
	words.splice(words.length - 1, 1)
	el.innerHTML = words.join(' ')
}

function glueWords__large(el, words) {
	words[words.length - 3] += '&nbsp;' + words[words.length - 2] + '&nbsp;' + words[words.length - 1]
	words.splice(words.length - 2, 2)
	el.innerHTML = words.join(' ')
}

function trailingWidows(elements, isQuote = false) {
	for (let i = 0; i < elements.length; i++) {
		let el = isQuote ? elements[i].querySelector('span:not(.quotation__mark)') : elements[i]

		if (el.innerHTML.indexOf('<br>') === -1 && el.innerHTML.indexOf('&nbsp;') === -1) {
			let html = el.innerHTML
			let words = html.split(' ')

			if (!isQuote && words.length > 4) {
				glueWords__large(el, words)
			}

			else if (isQuote || words.length > 3) {
				glueWords__small(el, words)
			}
		}
	}
}
	
export default trailingWidows
