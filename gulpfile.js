const { src, dest, watch, series, parallel } = require('gulp');

const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const combinemq = require('postcss-combine-media-query');
const cssnano = require('cssnano');
const replace = require('gulp-replace');
const browserSync = require('browser-sync').create();

const URL = 'https://local.vibrant';
const themelocation = 'wp-content/themes/vibrantfoods';
const scssSrcFile = themelocation+'/sass/style.scss';
const cssDistFolder = themelocation+'/';
const functionsSrcFile = themelocation+'/inc/scripts-styles.php';
const functionsDistFolder = themelocation+'/inc/';

function sassTask(){
	return src(scssSrcFile, { sourcemaps: true })
		.pipe(sass())
		.pipe(postcss([autoprefixer(), combinemq(), cssnano()]))
		.pipe(dest(cssDistFolder, { sourcemaps: '.' }));
}

function browserSyncServer(cb){
	browserSync.init({
		proxy: URL,
	});
	cb();
}

function browserSyncReload(cb){
	browserSync.reload();
	cb();
}

function cachBustingTask(){
	let cbNumber = new Date().getTime();
	return src(functionsSrcFile)
		.pipe(replace(/vt\d+/g, 'vt' + cbNumber)) 
		.pipe(dest(functionsDistFolder));
}

function watchTask(){
	watch(themelocation+'/**/*.php', browserSyncReload);
	watch(themelocation+'/**/*.js', browserSyncReload);
	watch (themelocation+'/sass/**/*.scss',
		series(
			sassTask,
			browserSyncReload
		)
	);
}

exports.default = series(
	sassTask,
	cachBustingTask,
	browserSyncServer,
	watchTask
);