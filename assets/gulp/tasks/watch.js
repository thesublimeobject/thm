var gulp = require('gulp');

gulp.task('watch', ['setWatch', 'browserSync'], function() {
	gulp.watch(['styl/src/**/*.scss', 'styl/lib/plg/*.scss'], ['styl']);
	gulp.watch('./js/src/*.coffee', ['browserify']);
	gulp.watch('../bld/app.js', ['uglify']);
});
