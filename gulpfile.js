var gulp      = require('gulp'),
    sass     = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    cleancss    = require('gulp-clean-css'),
    sourcemaps = require('gulp-sourcemaps');

gulp.task('styles', function(){
    return gulp.src('scss/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoprefixer({ browsers: ['last 2 versions', 'Safari 8', 'ie 11', 'opera 12.1', 'ios 6', 'android 4'] }))
        .pipe(cleancss())
        .pipe(sourcemaps.write(''))
        .pipe(gulp.dest(''));
});

gulp.task('default',['styles']);

gulp.task('watch', function() {
    
    // Watch .scss files
    gulp.watch('scss/*.scss', ['styles']);
    gulp.watch('scss/**/*.scss', ['styles']);
 
});