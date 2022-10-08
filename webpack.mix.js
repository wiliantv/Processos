const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/datatables-simple-demo.js', 'public/js').version();
mix.js('node_modules/jquery/dist/jquery.js', 'public/js').version();
mix.js('resources/js/scripts.js', 'public/js')
    .postCss('resources/css/styles.css', 'public/css', [
        //
    ]).version();
