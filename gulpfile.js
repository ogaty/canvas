const gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('default', ['scss', 'js']);

gulp.task('scss', function() {
    return gulp.src([
        'resources/assets/sass/**/*.scss'
    ]).pipe(sass())
      .pipe(gulp.dest('public/css'));
});

gulp.task('js', function() {
});
