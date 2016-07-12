import notify from 'gulp-notify'

const handleErrors = function(errorObject, callback) {
	notify.onError(errorObject.toString().split(': ').join(':\n')).apply(this, arguments)
	if (typeof this.emit === 'function') {
		this.emit('end')
	}
}

export default handleErrors