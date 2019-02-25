var gulp = require('gulp');
var sass = require('gulp-sass');
var clean = require('gulp-clean-css');
var babel = require('gulp-babel');
var uglify = require('gulp-uglify');
var rollup = require('gulp-better-rollup');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var resolve = require('rollup-plugin-node-resolve');
var commonjs = require('rollup-plugin-commonjs');


var sassSource = './scss/style.scss';
var sassEditor = './scss/editor-style.scss';
var cssDest = './theme/css';
var cssEditorDest = './theme';
var jsSource = './src/index.js';
var jsInput = './src/index.js';
var jsDest = './theme/js';


gulp.task('styles',function() {
	return gulp.src(sassSource)
		.pipe(sass().on('error', sass.logError))
		// .pipe(clean())
		.pipe(gulp.dest(cssDest));
});

gulp.task('editor',function() {
	return gulp.src(sassEditor)
		.pipe(sass().on('error', sass.logError))
		// .pipe(clean())
		.pipe(gulp.dest(cssEditorDest));
});

gulp.task('scripts', function () {
	return gulp.src(jsSource)
		.pipe(sourcemaps.init())
		.pipe(babel({
			presets: ['@babel/env']
		}))
		.pipe(rollup({plugins: [commonjs(), resolve()]},'iife'))
		.pipe(gulp.dest(jsDest))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.pipe(sourcemaps.write('maps'))
		.pipe(gulp.dest(jsDest));
});

gulp.task('watch', function(){
	gulp.watch(sassSource, gulp.series('styles'));
	gulp.watch(jsSource, gulp.series('scripts'));
	gulp.watch(sassEditor, gulp.series('editor'));
});
