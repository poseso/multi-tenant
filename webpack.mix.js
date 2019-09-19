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
    .setResourceRoot('../') // turns assets paths in css relative to css file
    .sass('resources/sass/frontend/app.scss', 'css/frontend.css')
    // .sass('resources/sass/backend/demo1.scss', 'css/demo1.css')
    // .sass('resources/sass/backend/demo2.scss', 'css/demo2.css')
    // .sass('resources/sass/backend/demo3.scss', 'css/demo3.css')
    // .sass('resources/sass/backend/demo4.scss', 'css/demo4.css')
    // .sass('resources/sass/backend/demo5.scss', 'css/demo5.css')
    // .sass('resources/sass/backend/demo6.scss', 'css/demo6.css')
    // .sass('resources/sass/backend/demo7.scss', 'css/demo7.css')
    // .sass('resources/sass/backend/demo8.scss', 'css/demo8.css')
    // .sass('resources/sass/backend/demo9.scss', 'css/demo9.css')
    // .sass('resources/sass/backend/demo10.scss', 'css/demo10.css')
    // .sass('resources/sass/backend/demo11.scss', 'css/demo11.css')
    .sass('resources/sass/backend/demo12.scss', 'css/demo12.css')
    .styles([
        'resources/vendors/flaticon/flaticon.css',
        'resources/vendors/flaticon2/flaticon.css',
        'resources/vendors/line-awesome/css/line-awesome.css'
    ], 'public/fonts/fonts.css')
    .copy('resources/vendors/flaticon/font', 'public/fonts/font', false)
    .copy('resources/vendors/flaticon2/font', 'public/fonts/font', false)
    .copy('resources/vendors/line-awesome/fonts', 'public/fonts/font', false)
    .styles([
        'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
        'node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css',
        'node_modules/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css',
        'node_modules/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css',
        'node_modules/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css',
        'node_modules/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css',
        'node_modules/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css',
        'node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css',
        'node_modules/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css',
        'node_modules/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css',
        'node_modules/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css',
        'node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css'
    ], 'public/css/datatables.bundle.css')
    .js('resources/js/frontend/app.js', 'js/frontend.js')
    .js([
        'resources/js/backend/before.js'
    ], 'js/demo12.js')
    .extract([
        /* Extract packages from node_modules, only those used by front and
        backend, to vendor.js */
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
            // optimize js minification process
            terser: {
                cache: true,
                parallel: true,
                sourceMap: true
            }
        });
} else {
    // Uses inline source-maps on development
    mix.webpackConfig({ devtool: 'inline-source-map' });
}
