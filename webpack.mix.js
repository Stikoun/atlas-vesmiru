const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.options({
	terser: {
		extractComments: false,
	},
});

mix.browserSync({
	proxy: "http://localhost:8888/",
    notify: false,
    open: false,
    files: [
        "app/Views/**/*.twig"
    ]
});

mix.sass('assets/sass/app.scss', 'assets/dist').options({
    processCssUrls: false,
    postCss: [
        require('autoprefixer'),
    ],
});

mix.js('assets/js/app.js', 'assets/dist');
