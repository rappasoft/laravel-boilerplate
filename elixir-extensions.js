const gulp = require('gulp');
const htmlmin = require('gulp-htmlmin');
const Elixir = require('laravel-elixir');
const Task = Elixir.Task;
const rtlcss = require('gulp-rtlcss');
const shell = require('gulp-shell');
const rename = require('gulp-rename');

/*Elixir.extend('compressHtml', function(message) {
    new Task('compressHtml', function() {
        const opts = {
            collapseWhitespace:    true,
            removeAttributeQuotes: true,
            removeComments:        true,
            minifyJS:              true
        };

        return gulp.src('./storage/framework/views/*')
            .pipe(htmlmin(opts))
            .pipe(gulp.dest('./storage/framework/views/'))
    }).watch('./storage/framework/views/*')
});*/

Elixir.extend('rtlCSS', function(message) {
    new Task('rtlCSS', function() {
        return gulp.src('./resources/assets/css/backend/app.css')
            .pipe(rtlcss())
            .pipe(rename({ basename: 'backend', suffix: '-rtl' }))
            .pipe(gulp.dest('./public/css/'));
    })
});