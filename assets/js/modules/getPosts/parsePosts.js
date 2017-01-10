/*--------------------------------------------------------*\
	Parse requested posts
\*--------------------------------------------------------*/

import nodeify from './nodeify'

const parsePosts = (storage, obj) => {
	let posts = JSON.parse(window.localStorage.getItem(storage)).posts
	let nodes = []
	for (let post of posts) {
		nodeify(post, nodes)
	}
	obj.localItems = nodes
}

export default parsePosts