/*--------------------------------------------------------*\
	Isotope Load Posts

	If all posts haven't been loaded and filtering occurs,
	load the rest of the posts.
\*--------------------------------------------------------*/

function checkPostsLoadPosts = ( instance, listener=false ) => {
	let isoItems = instance.iso.items
	let localItems = instance.localItems.length
	let postsLoaded = instance.postsLoaded
	let itemsToLoad = instance.itemsToLoad
	let morePostsExist = (isoItems.length + localItems) > (postsLoaded + itemsToLoad)

	if (morePostsExist) {
		let { localItems: items, postsLoaded: index } = instance
		let newItems = items.slice(index, items.length - index)
		instance.postsLoaded = items.length

		if(!!listener) {
			listener.parentNode.removeChild(listener)
		}

		if( morePostsExist && !!instance.loadMore && !!instance.loadMore.parentNode ) {
			instance.loadMore.parentNode.removeChild(instance.loadMore)
		}

		return true
	}

	return false

}

export default checkPostsLoadPosts