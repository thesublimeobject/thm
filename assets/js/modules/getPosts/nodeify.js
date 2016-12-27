/*--------------------------------------------------------*\
	Transform JSON strings into DOM Nodes.
\*--------------------------------------------------------*/

const nodeify = (post, nodes) => {
	let fragment = document.createDocumentFragment()
	let div = document.createElement('div')
	div.innerHTML = post
	nodes.push(div.firstChild)
}

export default nodeify