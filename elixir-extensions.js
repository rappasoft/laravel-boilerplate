const gulp = require('gulp');
const htmlmin = require('gulp-htmlmin');
const Elixir = require('laravel-elixir');
const Task = Elixir.Task;

Elixir.extend('compressHtml', function(message) {
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