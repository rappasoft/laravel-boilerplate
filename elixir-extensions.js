const gulp = require('gulp');
const Elixir = require('laravel-elixir');
const Task = Elixir.Task;
const htmlmin = require('gulp-htmlmin');
const rtlcss = require('gulp-rtlcss');
const rename = require('gulp-rename');

Elixir.extend('compressHtml', function() {
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
});

Elixir.extend('rtlCss', function() {
    new Task('rtlCss', function() {
        return gulp.src('./resources/assets/css/backend/app.css')
            .pipe(rtlcss())
            .pipe(rename({ basename: 'backend', suffix: '-rtl' }))
            .pipe(gulp.dest('./public/css/'));
    })
});