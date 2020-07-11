const gulp = require("gulp");
const sass = require("gulp-sass");
const plumber = require("gulp-plumber");
const notify = require("gulp-notify");
const rename = require("gulp-rename");
const sassGlob = require("gulp-sass-glob");
const mmq = require("gulp-merge-media-queries");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssdeclsort = require("css-declaration-sorter");
const merge = require("merge-stream");

gulp.task("sass", function() {
	let style = gulp
		.src("./src/sass/style.scss")
		.pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
		.pipe(sassGlob())
		.pipe(sass({ outputStyle: "expanded" }))
		.pipe(postcss([autoprefixer()]))
		.pipe(postcss([cssdeclsort({ order: "alphabetical" })]))
		.pipe(mmq())
		.pipe(gulp.dest("./raccoon/src/css"));

	let header_min = gulp
		.src("./src/sass/header.scss")
		.pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
		.pipe(sassGlob())
		.pipe(postcss([autoprefixer()]))
		.pipe(postcss([cssdeclsort({ order: "alphabetical" })]))
		.pipe(mmq())
		.pipe(sass({ outputStyle: "compressed" }))
		.pipe(
			rename({
				suffix: ".min"
			})
		)
		.pipe(gulp.dest("./raccoon/src/css"));
	return merge(style, header_min);
});

gulp.task("watch", function() {
	gulp.watch("./src/sass/**/*.scss", ["sass"]);
});

gulp.task("watch", function(done) {
	gulp.watch("./src/sass/**/*.scss", gulp.task("sass"));
	gulp.watch("./raccoon/*.php");
	gulp.watch("./raccoon/src/css/*.css");
	gulp.watch("./raccoon/src/js/*.js");
});

gulp.task("default", gulp.series(gulp.parallel("watch")));
