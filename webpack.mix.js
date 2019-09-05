const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setPublicPath('public')
    .setResourceRoot('../') // Turns assets paths in css relative to css file
    // .options({
    //     processCssUrls: false,
    // })
    .sass('resources/sass/frontend/app.scss', 'css/frontend.css')
    .sass('resources/sass/backend/app.scss', 'css/backend.css')
    .js('resources/js/frontend/app.js', 'js/frontend.js')
    .js([
        'resources/js/backend/before.js',
        'resources/js/backend/app.js',
        'resources/js/backend/after.js'
    ], 'js/backend.js')
    .extract([
        // Extract packages from node_modules to vendor.js
        'jquery',
        'bootstrap',
        'popper.js',
        'axios',
        'sweetalert2',
        'lodash'
    ])
    .sourceMaps();

if (mix.inProduction()) {
    mix.version()
        .options({
            // Optimize JS minification process
            terser: {
                cache: true,
                parallel: true,
                sourceMap: true
            }
        });
} else {
    // Uses inline source-maps on development
    mix.webpackConfig({
        devtool: 'inline-source-map'
    });
}
