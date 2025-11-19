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

mix
    .setPublicPath('public/assets')
    .setResourceRoot('assets')
    .js('resources/assets/js/app.js', 'js')
    .js('resources/assets/js/admin.js', 'js')
    .sass('resources/assets/sass/app.scss', 'css')
    .sass('resources/assets/sass/admin.scss', 'css')
    .version();
