var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass([
            'bootstrap/bootstrap.scss',
            'font-awesome/font-awesome.scss',
        ], 'resources/assets/css')
    .sass([
            'frontend/main.scss'
        ], 'resources/assets/css/frontend')
    .styles([
            'bootstrap.css',
            'font-awesome.css',
            'frontend/main.css'
        ], 'public/css/frontend.css', 'resources/assets/css')
    .scripts([
            'plugins.js',
            'frontend/main.js'
        ], 'public/js/frontend.js', 'resources/assets/js')
    .sass([
        'backend/main.scss',
        'backend/skin.scss'
    ], 'resources/assets/css/backend')
    .styles([
            'bootstrap.css',
            'font-awesome.css',
            'backend/main.css',
            'backend/skin.css'
        ], 'public/css/backend.css', 'resources/assets/css')
    .scripts([
            'plugins.js',
            'backend/main.js'
        ], 'public/js/backend.js', 'resources/assets/js')
    .version(["css/frontend.css", "js/frontend.js", "css/backend.css", "js/backend.js"]);
});

/**
 * Uncomment for LESS version
 */
/*elixir(function(mix) {
    mix.less([
        'bootstrap/bootstrap.less',
        'font-awesome/font-awesome.less',
    ], 'resources/assets/css')
        .less([
            'frontend/main.less'
        ], 'resources/assets/css/frontend')
        .styles([
            'bootstrap.css',
            'font-awesome.css',
            'frontend/main.css'
        ], 'public/css/frontend.css', 'resources/assets/css')
        .scripts([
            'plugins.js',
            'frontend/main.js'
        ], 'public/js/frontend.js', 'resources/assets/js')
        .less([
            'backend/AdminLTE.less',
        ], 'resources/assets/css/backend')
        .styles([
            'bootstrap.css',
            'font-awesome.css',
            'backend/main.css',
            'backend/skin.css'
        ], 'public/css/backend.css', 'resources/assets/css')
        .scripts([
            'plugins.js',
            'backend/main.js'
        ], 'public/js/backend.js', 'resources/assets/js')
        .version(["css/frontend.css", "js/frontend.js", "css/backend.css", "js/backend.js"]);
});
*/