var concat = require('gulp-concat')
var gulp = require('gulp')
var minifyCSS = require('gulp-minify-css')
var rename = require("gulp-rename")
var sass = require('gulp-sass')
var uglify = require('gulp-uglify')
//var sourcemaps = require('gulp-sourcemaps')

var scssPath = ['./scss/**/*.scss', './bower_components/foundation/scss/**/*.scss']

gulp.task('sass', function() {
  gulp.src(scssPath)
    //.pipe(sourcemaps.init())
      .pipe(sass({ imagePath: '../images' }))
    //.pipe(sourcemaps.write())
    .pipe(gulp.dest('./css'))
})

gulp.task('minify-sass', ['sass'], function() {
  gulp.src('./css/kaveh-chini.css')
    .pipe(rename('kaveh-chini.min.css'))
    .pipe(minifyCSS())
    .pipe(gulp.dest('./css'))
})

gulp.task('vendor-js', function() {
  gulp.src(['./bower_components/isotope/dist/isotope.pkgd.js', './bower_components/imagesloaded/imagesloaded.pkgd.js'])
    .pipe(concat('vendor.js'))
    .pipe(gulp.dest('javascript'))
})

gulp.task('minify-js', ['vendor-js'],function() {
  gulp.src('javascript/*.js')
    .pipe(uglify({
      mangle: true
    }))
    .pipe(gulp.dest('javascript/dist'))
});

gulp.task('watch', function() {
  gulp.watch(scssPath, ['sass', 'minify-sass'])
})

gulp.task('default', ['watch', 'sass', 'minify-sass', 'minify-js', 'vendor-js'])
