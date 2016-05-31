//setup variables
var gulp = require('gulp'),
	uglify = require('gulp-uglify'),
	sass = require('gulp-sass'),
	plumber = require('gulp-plumber'),
	concat = require('gulp-concat'),
	concatCss = require('gulp-concat-css'),
	minifyCss = require('gulp-minify-css'),
	imagemin = require('gulp-imagemin'),
	jsmin = require('gulp-jsmin'),
	rename = require('gulp-rename'),
	autoprefixer = require('gulp-autoprefixer');

//minify scripts
gulp.task('minjs', function () {
	gulp.src('lib/js/*.js')
		.pipe(jsmin())
		.pipe(gulp.dest('js'));
});

//tasks for scripts
gulp.task('scripts', function(){
	gulp.src('lib/js/*.js')
	.pipe(plumber())
	.pipe(uglify())
	.pipe(gulp.dest('js'));
});

//concatenate scripts into one file
gulp.task('concat', function() {
  return gulp.src('lib/js/*.js')
    .pipe(concat('all.js'))
	.pipe(uglify())
    .pipe(gulp.dest('js/'));
});

//tasks for styles
gulp.task('sass', function(){
	gulp.src('lib/sass/*.scss')
	.pipe(plumber())
	.pipe(sass({
		outputStyle: 'expanded'
	}))
	.pipe(autoprefixer())
	.pipe(gulp.dest('css/'));
});

//concatenate css
gulp.task('concatCss', function() {
  return gulp.src('lib/sass/*.scss')
	.pipe(plumber())
	.pipe(sass({
		outputStyle: 'expanded'
	}))
	.pipe(autoprefixer())
    .pipe(concatCss("styles.css"))
    .pipe(minifyCss({compatibility: 'ie8'}))
    .pipe(gulp.dest('css/'));
});

//tasks for compressed images
gulp.task('image', function(){
	gulp.src('lib/images/*')
		.pipe(imagemin({
			progressive: true
		}))
		.pipe(gulp.dest('images'));
});

//watch javascript files
gulp.task('watch', function() {
	gulp.watch('lib/js/*.js', ['scripts']);
	gulp.watch('lib/sass/*.scss', ['sass']);
	gulp.watch('lib/images/*', ['image']);
});

//use array to run multiple tasks
gulp.task('default', ['scripts', 'sass', 'watch', 'image']);

//add compressed build task
gulp.task('build', ['concatCss', 'minjs']);