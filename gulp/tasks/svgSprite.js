const gulp = require('gulp');
const svgstore = require('gulp-svgstore');
const rename = require('gulp-rename');

module.exports = function svgSprite() {
  return gulp.src('src/img/sprite-svg/*.svg')
    .pipe(svgstore({
      inlineSvg: true
    }))
    .pipe(rename('sprite-svg.svg'))
    .pipe(gulp.dest('build/img'))
};

// use
// svg.class__icon(role="img")
//   use(xlink:href="img/sprite-svg.svg#" + fileName)

// if sprite is wrong  - use https://svgsprit.es/ for production
