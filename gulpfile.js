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
    mix.styles([
	    'toolkit-startup.css',
	    'application-startup.css',
	    'side-comments.css',
	    'default-theme.css',
	    'custom.css',
    ]);
    mix.scripts([
	    'application.js',
	    'toolkit.js',
	    'popover.js',
	    'bootstrap-hover-dropdown.min.js',
    ]);
    mix.scripts([
	    'jquery.min.js',
	    'jquery.pjax.js',
    ], 'public/js/jquery.js');

});
