let mix = require('laravel-mix');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');


mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .vue()
   .options({
       processCssUrls: false // Prevent Laravel Mix from changing font paths
   })
   .webpackConfig({
       module: {
           rules: [
               {
                   test: /\.(woff2?|ttf|eot|svg)$/,
                   loader: 'file-loader',
                   options: {
                       name: 'fonts/[name].[ext]',
                       publicPath: '../', // Adjusts the relative path in CSS
                       emitFile: true
                   }
               }
           ]
       }
   });

// Copy Bootstrap fonts directly to public folder
mix.copyDirectory(
    'node_modules/bootstrap-sass/assets/fonts/bootstrap',
    'public/fonts/bootstrap'
);



mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .vue();