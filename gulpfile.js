var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass([
            'bootstrap/bootstrap.scss',
            'font-awesome/font-awesome.scss',
            'main.scss'
        ])
        .styles([
            'bootstrap.css',
            'font-awesome.css',
            'main.css'
        ], 'public/css/all.css', 'public/css')
        .scripts([
            'plugins.js',
            'main.js'
        ], 'public/js/all.js', 'public/js')
        .version(["css/all.css", "js/all.js"]);
});

/**
 * Uncomment for LESS version of Bootstrap 3.*
 */
/*elixir(function(mix) {
    mix.less([
        'bootstrap/bootstrap.less',
        'font-awesome/font-awesome.less',
        'main.less'
    ])
        .styles([
            'bootstrap.css',
            'font-awesome.css',
            'main.css'
        ], 'public/css/all.css', 'public/css')
        .scripts([
            'plugins.js',
            'main.js'
        ], 'public/js/all.js', 'public/js')
        .version(["css/all.css", "js/all.js"]);
});*/