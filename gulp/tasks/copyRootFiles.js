const gulp = require('gulp');

module.exports = function copyRootFiles() {
  return gulp.src('src/rootFiles/**/*')
    .pipe(gulp.dest('build'))
};
