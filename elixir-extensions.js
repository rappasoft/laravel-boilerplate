const gulp = require('gulp');
const Elixir = require('laravel-elixir');
const Task = Elixir.Task;
const rtlcss = require('gulp-rtlcss');
const rename = require('gulp-rename');

Elixir.extend('rtlCss', function() {
    new Task('rtlCss', function() {
        return gulp.src('./resources/assets/css/backend/app.css')
            .pipe(rtlcss())
            .pipe(rename({ basename: 'backend', suffix: '-rtl' }))
            .pipe(gulp.dest('./public/css/'));
    })
});