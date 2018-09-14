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

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/admin/bootstrap/css/bootstrap.min.css',
    'resources/admin/font-awesome/4.5.0/css/font-awesome.min.css',
    'resources/admin/ionicons/2.0.1/css/ionicons.min.css',
    'resources/admin/dist/css/AdminLTE.min.css',
    'resources/admin/dist/css/skins/_all-skins.min.css'
], 'public/css/admin.css');
mix.scripts([
    'resources/admin/plugins/jQuery/jquery-2.2.3.min.js',
    'resources/admin/bootstrap/js/bootstrap.min.js',
    'resources/admin/plugins/slimScroll/jquery.slimscroll.min.js',
    'resources/admin/plugins/fastclick/fastclick.js',
    'resources/admin/assets/dist/js/app.min.js',
    'resources/admin/dist/js/demo.js'
], 'public/js/admin.js');

