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
    mix.sass('app.scss', 'resources/css');
    
    mix.styles([
        'libs/bootstrap.min.css',
        'ie10-viewport-bug-workaround.css',
        'signin.css'
    ], 'public/css/login.css', 'resources/css');
    
    mix.styles([
        'libs/bootstrap.min.css',
        'libs/select2.min.css',
        'ie10-viewport-bug-workaround.css',
        'blog.css'
    ], 'public/css/final.css', 'resources/css');
    
    mix.scripts([
        'ie-emulation-modes-warning.js',
        'ie10-viewport-bug-workaround.js'
    ], 'public/js/login.js', 'resources/js');
    
    mix.scripts([
        'ie-emulation-modes-warning.js',
        'libs/jquery.min.js',
        'libs/bootstrap.min.js',
        'libs/select2.min.js',
        'ie10-viewport-bug-workaround.js'
    ], 'public/js/final.js', 'resources/js');
    
    mix.version(['public/css/login.css', 'public/js/login.js', 'public/css/final.css', 'public/js/final.js']);
});
