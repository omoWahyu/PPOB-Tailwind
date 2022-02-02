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
		extend: {},
	},
	plugins: [require('tw-elements/dist/plugin')],
};
