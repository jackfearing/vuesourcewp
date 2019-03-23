/**
 * Gulpfile for Custom WordPress Theme Development.
 *
 */


//Watching for Changes with Browsersync
// npm run browsersync

//Compile and Minify All Theme Assets
// npm run build

// npm run styles - to compile all SCSS files in the assets/styles/scss directory.
// npm run scripts - to compile all JS files in the assets/scripts/js directory.
// npm run images - to optimize all image files in the assets/images directory.


/**
 * Load Gulp Plugins.
 *
 */
var gulp = require ('gulp');


// Style Plugins
var autoprefixer = require('autoprefixer');
var sass = require ('gulp-sass');
var cssnano = require ('gulp-cssnano');
var postcss = require('gulp-postcss');


// Image Plugins
var newer = require('gulp-newer');
var imagemin = require('gulp-imagemin');



// JavaScript Plugins
var plumber = require('gulp-plumber');
var babel = require('gulp-babel');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var filter = require('gulp-filter');
var es2015 = require('babel-preset-es2015');
var filter = require('gulp-filter');


// Utility Plugins
var browserSync = require('browser-sync').create();
var touch = require('gulp-touch-cmd');
var sourcemaps = require('gulp-sourcemaps');









/**
 * Gulp Functions
 *
 */


// Set local URL if using Browser-Sync
const LOCAL_URL = 'http://local.vuesourcewp.dev.cc/';
const SOURCE = {
	scripts: [
		// Place custom JS here, files will be concantonated, minified if ran with --production
		'source/scripts/**/*.js',
    ],
	// Scss files will be concantonated, minified if ran with --production
	styles: 'source/styles/**/*.scss',
	images: 'source/images/**/*',
	php: '**/*.php'
};

const ASSETS = {
	styles: 'assets/styles/',
	scripts: 'assets/scripts/',
	images: 'assets/images/',
	all: 'assets/'

};

const JSHINT_CONFIG = {
	"node": true,
	"globals": {
		"document": true,
		"window": true,
		"jQuery": true,
		"$": true,
		"postcss": {
			"parser": "sugarss",
			"map": false,
			"plugins": {
				"postcss-plugin": {}
			}
		}
	}
};


// JSHint, concat, and minify JavaScript
gulp.task('scripts', function() {

	// Use a custom filter so we only lint custom JS
	const CUSTOMFILTER = filter(SOURCE.scripts + '**/*.js', {restore: true});

	return gulp.src(SOURCE.scripts)
		.pipe(plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
        }))
		.pipe(sourcemaps.init())
		.pipe(babel({
			presets: ['@babel/env']
		}))
		.pipe(CUSTOMFILTER)
			.pipe(jshint(JSHINT_CONFIG))
			.pipe(jshint.reporter('jshint-stylish'))
			.pipe(CUSTOMFILTER.restore)
		.pipe(concat('scripts.js'))
		.pipe(uglify())
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(ASSETS.scripts))
		.pipe(touch());
});




// Compile Sass, Autoprefix, PostCSS and Minify
gulp.task('styles', function () {
	var processors = [
		autoprefixer({
			browsers: [
				'last 2 versions',
				'ie >= 10',
				'ios >= 7'
			],
			cascade: false,
			grid: 'autoplace'
		}),
	];
	return gulp.src(SOURCE.styles)
		.pipe(sourcemaps.init())
		.pipe(sass().on('error', sass.logError))
		.pipe(postcss(processors))
		.pipe(cssnano())
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(ASSETS.styles))
		.pipe(touch());
});






// Optimize images, move into assets directory
gulp.task('images', function() {
	return gulp.src(SOURCE.images)
		.pipe(imagemin())
		.pipe(gulp.dest(ASSETS.images))
		.pipe(touch());
});







// Browser-Sync watch files and inject changes
gulp.task('browsersync', function() {

    // Watch these files
    var files = [
    	SOURCE.php,
    ];

    browserSync.init(files, {
	    proxy: LOCAL_URL,
	    notify: false,
	    injectChanges: true,
		//browser: ["google chrome", "firefox"],
		reloadDelay: 250,
        snippetOptions: {
            ignorePaths: ["wp-admin/**"]
        },
    });

    gulp.watch(SOURCE.styles, gulp.parallel('styles')).on('change', browserSync.reload);
    gulp.watch(SOURCE.scripts, gulp.parallel('scripts')).on('change', browserSync.reload);
    gulp.watch(SOURCE.images, gulp.parallel('images')).on('change', browserSync.reload);
});


// These are the files Browsersync will watch
gulp.task('watch', function() {

	// Watch .scss files
	gulp.watch(SOURCE.styles, gulp.parallel('styles'));

	// Watch scripts files
	gulp.watch(SOURCE.scripts, gulp.parallel('scripts'));

	// Watch images files
	gulp.watch(SOURCE.images, gulp.parallel('images'));

});







// Run styles, scripts and images - then start Browsersync
gulp.task('default', gulp.parallel('styles', 'scripts', 'images'));
