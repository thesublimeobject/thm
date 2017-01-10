/*--------------------------------------------------------*\ 
	Get required posts and store them in localStorage
	
	**** TODO: Add better error handling for failed load
	**** TODO: Only refresh/mutate localStorage postChange --> do this and simply append rather than re-fetching
	**** TODO: In ref to the former, add a trigger if a new post is published, this shouldn't be that hard
\*--------------------------------------------------------*/
import _find from 'lodash.find'
import request from 'superagent'
import Promise from 'bluebird'
import parsePosts from './parsePosts'

function parsePosts(action, storage, obj, callback) {

	localStorage.clear()

	// Has data changed?
	let saved = JSON.parse(window.localStorage.getItem(storage))
	let currentTime = (new Date()).getTime()
	let lastSaved = saved === null ? 0 : saved.time
	let dt = (currentTime - lastSaved) / (1000 * 60)

	// Setup and Make Request
	let req = new Promise(( resolve, reject ) => {

		// If it's been < 30 minutes, don't make new request
		if ( dt >= 30 ) {
			request
				.post(ajaxurl)
				.send({ action })
				.set('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8')
				.end(( err, res ) => {
					if ( err ) {
						reject(err)
					} else {
						resolve(res.text)
					}
				})
		} else {
			resolve(false)
		}
	})

	// Set Request Data and Parse
	.then(( res ) => {
		// Maybe I should convert this to a list to check exact equality???
		if ( res ) {

			// Get current data if request has been made
			let current = JSON.parse(res)

			// Don't update if data has not changed
			if ( saved === null || saved.length !== current.length ) {
				const data = {
					posts: current,
					time: currentTime,
				}

				// Set localStorage
				window.localStorage.setItem(storage, JSON.stringify(data))
			}
		}

		// Parse posts and send to { els } either way
		parsePosts(storage, obj)
	})

	// Callback
	.then(() => {
		if ( !!callback && typeof callback === 'function' ) {
			callback()
		}
	})
}

export default getPosts