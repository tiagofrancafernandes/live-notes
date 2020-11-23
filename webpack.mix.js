const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const set_sourceMaps = true;

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

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

mix.styles([
    'resources/css/app.css',
    'public/html5-bp/css/normalize.css',
    'public/html5-bp/css/main.css',

    // UIkit CSS
    // 'node_modules/uikit/dist/css/uikit.min.css',
], 'public/mix/css/all.css').sourceMaps(set_sourceMaps);

mix.scripts([
    'public/html5-bp/js/modernizr-3.11.2.min.js',
    'node_modules/jquery/dist/jquery.js',
    'node_modules/axios/dist/axios.js',


    // UIkit JS
    'node_modules/uikit/dist/js/uikit.min.js',
    'node_modules/uikit/dist/js/uikit-icons.min.js',

], 'public/mix/js/all.js').sourceMaps(set_sourceMaps);

// mix.sass('resources/css/tailwindcss.scss', 'public/mix/css/tailwindcss.css').sourceMaps(set_sourceMaps); //TailwindCSS
mix.sass('resources/css/uikit.scss', 'public/mix/css/uikit.css').sourceMaps(set_sourceMaps); //uikit

mix.disableNotifications();
// mix.disableSuccessNotifications();