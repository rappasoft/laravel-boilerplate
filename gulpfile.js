var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix
        // Copy webfont files from /vendor directories to /public directory.
        .copy('vendor/fortawesome/font-awesome/fonts', 'public/fonts')
        .copy('vendor/twbs/bootstrap-sass/assets/fonts/bootstrap', 'public/fonts')

        .sass([ // Process front-end stylesheets
                'frontend/main.scss'
            ], 'resources/assets/css/frontend')
        .styles([  // Combine pre-processed CSS files
                'frontend/main.css'
            ], 'public/css/frontend.css', 'resources/assets/css')
        .scripts([ // Combine front-end scripts
                'plugins.js',
                'frontend/main.js'
            ], 'public/js/frontend.js', 'resources/assets/js')

        .sass([ // Process back-end stylesheets
            'backend/main.scss',
            'backend/skin.scss'
        ], 'resources/assets/css/backend')
        .styles([ // Combine pre-processed CSS files
                'bootstrap.css',
                'font-awesome.css',
                'backend/main.css',
                'backend/skin.css'
            ], 'public/css/backend.css', 'resources/assets/css')
        .scripts([ // Combine back-end scripts
                'plugins.js',
                'backend/main.js'
            ], 'public/js/backend.js', 'resources/assets/js')

        // Apply version control
        .version(["css/frontend.css", "js/frontend.js", "css/backend.css", "js/backend.js"]);
});

/**
 * Uncomment for LESS version
 */
/*elixir(function(mix) {
    mix
        // Copy webfont files from /vendor directories to /public directory.
        .copy('vendor/fortawesome/font-awesome/fonts', 'public/fonts')
        .copy('vendor/twbs/bootstrap/fonts', 'public/fonts')

        .less([ // Process front-end stylesheets
            'frontend/main.less'
        ], 'resources/assets/css/frontend')
        .styles([  // Combine pre-processed CSS files
            'frontend/main.css'
        ], 'public/css/frontend.css', 'resources/assets/css')
        .scripts([ // Combine front-end scripts
            'plugins.js',
            'frontend/main.js'
        ], 'public/js/frontend.js', 'resources/assets/js')

        .less([ // Process back-end stylesheets
            'backend/AdminLTE.less',
        ], 'resources/assets/css/backend')
        .styles([ // Combine pre-processed CSS files
            'bootstrap.css',
            'font-awesome.css',
            'backend/main.css',
            'backend/skin.css'
        ], 'public/css/backend.css', 'resources/assets/css')
        .scripts([ // Combine back-end scripts
            'plugins.js',
            'backend/main.js'
        ], 'public/js/backend.js', 'resources/assets/js')

        // Apply version control
        .version(["css/frontend.css", "js/frontend.js", "css/backend.css", "js/backend.js"]);
});
*/
