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
    .styles('node_modules/icheck-bootstrap/icheck-bootstrap.min.css','public/css/icheck-bootstrap.css')
    .styles('node_modules/overlayscrollbars/css/OverlayScrollbars.min.css','public/css/OverlayScrollbars.css')
    .styles('node_modules/daterangepicker/daterangepicker.css','public/css/daterangepicker.css')

    .sass('node_modules/@fortawesome/fontawesome-free/scss/fontawesome.scss', 'public/css/fontawesome.css')
    .sass('node_modules/admin-lte/build/scss/AdminLTE.scss','public/css/AdminLTE.css')
    .sass('node_modules/bootstrap/scss/bootstrap.scss','public/css/bootstrap.css')
    .sass('node_modules/tempusdominus-bootstrap-4/src/sass/tempusdominus-bootstrap-4-build.scss','public/css/tempusdominus-bootstrap-4.css')

    .scripts('node_modules/jquery/dist/jquery.min.js','public/js/jquery.js')
    .scripts('node_modules/jquery-ui-dist/jquery-ui.min.js','public/js/jquery-ui.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js','public/js/bootstrap.bundle.js')
    .scripts('node_modules/chart.js/dist/Chart.min.js','public/js/Chart.js')
    .scripts('node_modules/sparklines/source/sparkline.js','public/js/sparkline.js')
    .scripts('node_modules/jquery-knob-chif/dist/jquery.knob.min.js','public/js/jquery.knob.js')
    .scripts('node_modules/moment/moment.js','public/js/moment.js')
    .scripts('node_modules/daterangepicker/daterangepicker.js','public/js/daterangepicker.js')
    .scripts('node_modules/tempusdominus-bootstrap-4/src/js/tempusdominus-bootstrap-4.js','public/js/tempusdominus-bootstrap-4.js')
    .scripts('node_modules/summernote/dist/summernote-bs4.min.js','public/js/summernote-bs4.js')
    .scripts('node_modules/overlayscrollbars/js/jquery.overlayScrollbars.min.js','public/js/jquery.overlayScrollbars.js')
    .scripts('node_modules/admin-lte/dist/js/adminlte.js','public/js/adminlte.js')
    .scripts('node_modules/admin-lte/dist/js/pages/dashboard.js','public/js/dashboard.js')
    .scripts('node_modules/admin-lte/dist/js/demo.js','public/js/demo.js')
;
