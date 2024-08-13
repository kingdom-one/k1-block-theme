const defaultConfig = require('@wordpress/scripts/config/webpack.config.js');
const getWebpackEntryPoints =
	require('@wordpress/scripts/utils/config').getWebpackEntryPoints;

const defaultEntries = getWebpackEntryPoints('script')();
const customEntries = {
	'global': `./src/index.js`,
	'vendors/fontawesome': `./src/js/vendors/global/fontawesome.js`,
	'vendors/bootstrap': `./src/js/vendors/global/bootstrap.js`,
	'vendors/fonts': `./src/styles/vendors/_fonts.scss`,
};

const jsFiles = [
	'communications',
	'front-page',
	'get-started',
	'hr-page',
	'k1-about',
	'pricing',
];
const entries = {
	...defaultEntries,
	...customEntries,
	...() => {
		const entries = {};
		if (jsFiles.length > 0) {
			jsFiles.forEach((jsFile) => {
				const jsFileOutput = snakeToCamel(jsFile);
				entries[
					`pages/${jsFileOutput}`
				] = `./src/js/${jsFile}/index.ts`;
			});
		}
		return entries;
	},
};

module.exports = {
	...defaultConfig,
	...{
		entry: entries,
		output: {
			path: __dirname + `/dist`,
			filename: `[name].js`,
		},
	},
};

function snakeToCamel(str) {
	return str.replace(/([-_][a-z])/g, (group) =>
		group.toUpperCase().replace('-', '').replace('_', ''),
	);
}
