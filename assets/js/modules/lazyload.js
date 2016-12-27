/*--------------------------------------------------------*\
	Lazyload
\*--------------------------------------------------------*/

const lazyload = (items) => {
	for (let item of items) {

		let url = item.getAttribute('data-bg')
		let img = new Image()
		img.onload = () => {
			item.style.backgroundImage = `url(${img.src})`
		}
		img.src = url
	}
}

export default lazyload