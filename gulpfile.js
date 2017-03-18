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

//mix.less('app.less'); //LESS
//mix.coffee() //CoffeeScript
//mix.style()

// var path = require('path');

elixir(function(mix) {
    mix.sass('app.scss', 'resources/css'); //default output dir = public\css

    mix.styles([
        'libs/bootstrap.min.css',
        'app.css',
        'libs/select2.min.css'
    ], null, 'resources/css');

    mix.scripts([
     'libs/jquery.min.js',
     'libs/bootstrap.min.js',
     'libs/select2.min.js'
    ], null, 'resources/js');

    // mix.styles([ // (css files to merge, output dir, base dir for the css files) -- generates all.css unless specified filename in output dir arg
    // 	'vendor/normalize.css',
    // 	'app.css'
    // ], null, 'public/css');

    // mix.scripts([ // (js files to merge, output dir, base dir for the js files) -- there does not seem to be a default (mz pass 2nd arg for filename n dir)
    // 	'vendor/jquery.js',
    // 	'app.js'
    // ], 'public/output/final.js', 'public/js');

    // gulp with flag --production will minify as well
    
    // mix.phpUnit([] , path.normalize('vendor/bin/phpunit') + ' --verbose').phpSpec();

    // gulp tdd similar with gulp watch for mixing styles n scripts
    
    mix.version(['public/css/all.css', 'public/js/all.js']); //creates a versioned build file with hash - e.g. all-lhasdhsa.css (Can easily reference in view using {{ elixir('css/all.css') }})
});
