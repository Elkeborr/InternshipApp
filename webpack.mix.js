const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/welcome.scss", "public/css")
    .sass("resources/sass/form.scss", "public/css")
    .js("resources/js/review.js", "public/js")
    .js("resources/js/checkbox.js", "public/js")
    .js("resources/js/add_tag.js", "public/js")
    .js("resources/js/edit_tag.js", "public/js")
    .js("resources/js/search.js", "public/js")
    .js("resources/js/ajax_setup.js", "public/js")

    .options({ processCssUrls: false });
