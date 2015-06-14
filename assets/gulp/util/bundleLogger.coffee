gutil        = require 'gulp-util'
prettyHrtime = require 'pretty-hrtime'
startTime = null

module.exports =
	start: (filepath) ->
		startTime = process.hrtime()
		gutil.log 'Bundling', gutil.colors.green(filepath) + '...'
		return

	watch: (bundleName) ->
		gutil.log 'Watching files required by', gutil.colors.yellow(bundleName)
		return

	end: (filepath) ->
		taskTime = process.hrtime(startTime)
		prettyTime = prettyHrtime(taskTime)
		gutil.log 'Bundled', gutil.colors.green(filepath), 'in', gutil.colors.magenta(prettyTime)
		return