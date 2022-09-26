const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

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

mix.webpackConfig({
    experiments: {
        topLevelAwait: true,
    },

});

mix.ts('resources/js/app.ts', 'public/js').vue({ version: 3 })
    .sass('resources/sass/app.scss', 'public/css');

mix.options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
});
