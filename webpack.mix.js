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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();



mix.postCss('resources/css/login_nav.css','public/css');
mix.postCss('resources/css/styles.css','public/css');
mix.postCss('resources/css/toastr.css','public/css');

mix.js('resources/js/validate_login.js','public/js');
mix.js('resources/js/validate_register.js','public/js');
// mix.js('resources/js/scripts.js','public/js');
// mix.js('resources/js/toastr.js','public/js');


