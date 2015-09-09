var gulp = require('gulp');
var config = require('./gulp.config')();
var $ = require('gulp-load-plugins')({lazy:true});

gulp.task('rsync', function() {
  return gulp.src('./cybersecurity')
    .pipe($.rsync(config.rsyncOptions));
});
