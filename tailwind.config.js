module.exports = {
	content: [
		'./app/views/**/*.php',
		'./app/views/**/**/*.php',
		'./app/views/**/**/**/*.php',
		'./app/controllers/*.php',
		'./node_modules/tw-elements/dist/js/**/*.js',
	],
	darkMode: 'class',
	theme: {
		extend: {
			scale: {
				200: '2',
				300: '3',
				400: '4',
				500: '5',
				600: '6',
			},
		},
	},
	plugins: [require('tw-elements/dist/plugin')],
};
