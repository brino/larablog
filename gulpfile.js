var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .webpack('app.js')
        .webpack('article-editor.js')
        .webpack('article.js')
        .copy('node_modules/font-awesome/fonts','public/build/fonts')
        .version(['js/app.js','css/app.css','js/article-editor.js','js/article.js'])
});
