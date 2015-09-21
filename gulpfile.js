var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix
        // Copy webfont files from /vendor directories to /public directory.
        .copy('vendor/fortawesome/font-awesome/fonts', 'public/build/fonts/font-awesome')
        .copy('vendor/twbs/bootstrap-sass/assets/fonts/bootstrap', 'public/build/fonts/bootstrap')
        .copy('vendor/twbs/bootstrap/dist/js/bootstrap.min.js', 'public/js/vendor')

        .sass([ // Process front-end stylesheets
                'frontend/main.scss'
            ], 'resources/assets/css/frontend/main.css')
        .styles([  // Combine pre-processed CSS files
                'frontend/main.css'
            ], 'public/css/frontend.css')
        .scripts([ // Combine front-end scripts
                'plugins.js',
                'frontend/main.js'
            ], 'public/js/frontend.js')

        .sass([ // Process back-end stylesheets
            'backend/main.scss',
            'backend/skin.scss',
            'backend/plugin/toastr/toastr.scss'
        ], 'resources/assets/css/backend/main.css')
        .styles([ // Combine pre-processed CSS files
                'backend/main.css'
            ], 'public/css/backend.css')
        .scripts([ // Combine back-end scripts
                'plugins.js',
                'backend/main.js',
                'backend/plugin/toastr/toastr.min.js',
                'backend/custom.js'
            ], 'public/js/backend.js')

        // Apply version control
        .version(["public/css/frontend.css", "public/js/frontend.js", "public/css/backend.css", "public/js/backend.js"]);
});

/**
 * Uncomment for LESS version
 */
/*elixir(function(mix) {
    mix
        // Copy webfont files from /vendor directories to /public directory.
        .copy('vendor/fortawesome/font-awesome/fonts', 'public/build/fonts/font-awesome')
        .copy('vendor/twbs/bootstrap/fonts', 'public/build/fonts/bootstrap')
        .copy('vendor/twbs/bootstrap/dist/js/bootstrap.min.js', 'public/js/vendor')

        .less([ // Process front-end stylesheets
            'frontend/main.less'
        ], 'resources/assets/css/frontend/main.css')
        .styles([  // Combine pre-processed CSS files
            'frontend/main.css'
        ], 'public/css/frontend.css')
        .scripts([ // Combine front-end scripts
            'plugins.js',
            'frontend/main.js'
        ], 'public/js/frontend.js')

        .less([ // Process back-end stylesheets
            'backend/AdminLTE.less',
            'backend/plugin/toastr/toastr.less'
        ], 'resources/assets/css/backend/main.css')
        .styles([ // Combine pre-processed CSS files
            'backend/main.css'
        ], 'public/css/backend.css')
        .scripts([ // Combine back-end scripts
            'plugins.js',
            'backend/main.js',
            'backend/plugin/toastr/toastr.min.js',
            'backend/custom.js'
        ], 'public/js/backend.js')

        // Apply version control
        .version(["public/css/frontend.css", "public/js/frontend.js", "public/css/backend.css", "public/js/backend.js"]);
});*/
