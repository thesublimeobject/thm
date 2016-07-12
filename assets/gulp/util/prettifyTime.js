const prettifyTime = (ms) => {
	if (ms > 999) {
		return (ms / 1000).toFixed(2) + ' s'
	}
	return ms + ' ms'
}

export default prettifyTime