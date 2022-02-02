// webpack.mix.js

let mix = require('laravel-mix');
mix.disableNotifications();
mix.browserSync({
	proxy: 'http://localhost/ppob-tailwind',
});
mix
	.minify(
		'node_modules/tw-elements/dist/js/index.min.js',
		'js/tailwind-elements.js'
	)
	.postCss('src/css/tailwind.css', 'css')
	.options({
		processCssUrls: false,
		postCss: [
			require('postcss-import'),
			require('tailwindcss'),
			require('autoprefixer'),
			require('cssnano')({
				preset: 'default',
			}),
		],
	})
	.setPublicPath('assets');
