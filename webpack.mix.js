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

mix.scripts(['resources/plugins/jquery/jquery.min.js','resources/plugins/daterangepicker/moment.min.js','resources/plugins/daterangepicker/daterangepicker.js','resources/plugins/bootstrap/js/bootstrap.bundle.min.js','resources/js/adminlte.min.js','resources/plugins/jquery-ui/jquery-ui.min.js'],'public/js/app.js')
   .styles(['resources/plugins/daterangepicker/daterangepicker.css','resources/css/adminlte.min.css','resources/plugins/fontawesome-free/css/all.css','resources/plugins/jquery-ui/jquery-ui.min.css'],'public/css/app.css');
   
