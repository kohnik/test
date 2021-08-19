const gulp = require('gulp');

module.exports = function copyFiles() {
  return gulp.src('src/files/**/*')
    .pipe(gulp.dest('build/files'))
};
