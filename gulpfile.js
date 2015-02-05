var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('bootstrap/bootstrap.less')
        .sass('main.scss')
        .styles([
            'bootstrap.css',
            'main.css'
        ], 'public/css/all.css', 'public/css')
        .scripts([
            'plugins.js',
            'main.js'
        ], 'public/js/all.js', 'public/js')
       .version(["css/all.css", "js/all.js"]);
});