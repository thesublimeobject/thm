var browserSync = require('browser-sync');
var gulp        = require('gulp');

gulp.task('browserSync', ['build'], function() {
	browserSync.init(null, {
		proxy: "/",
		ghostMode: {
			clicks: false,
			location: false,
			forms: false,
			scroll: false
		}
	});
});

gulp.task('bs-reload', function () {
    browserSync.reload();
});