var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('js', function() {
	gulp.src([
		'../bower_components/jquery/dist/jquery.js',
		'../bower_components/ReptileForms/dist/reptileforms.js',
		'./public/js/src/*.js',
		])
    .pipe(concat('build.js'))	
    // .pipe(uglify())
    .pipe(gulp.dest('./public/js/'));
});

gulp.task('watch', function() {
  gulp.watch(['./public/js/src/*.js'], ['js']);
  gulp.watch(['./public/css/scss/*.scss'], ['sass']);
  gulp.watch(['./public/css/scss/scaffolding/*.scss'], ['sass']);
});

gulp.task('default', ['watch', 'js', 'sass']);


gulp.task('sass', function () {
    gulp.src('./public/css/scss/*.scss')
        .pipe(sass())
        // .pipe(autoprefixer({
        //     browsers: ['last 2 versions'],
        //     cascade: false
        // 	}))
        .pipe(gulp.dest('./public/css'));
});