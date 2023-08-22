const defaultConfig = require("@wordpress/scripts/config/webpack.config.js");

function snakeToCamel(str) {
	return str.replace(/([-_][a-z])/g, (group) =>
		group.toUpperCase().replace("-", "").replace("_", ""),
	);
}

/**
 * For Typescript files (located `~/src/js/folder-name/index.ts)`)
 * Array of strings modeled after folder names (e.g. 'about-kingdom-one')
 *
 * NOTE: Make sure to import scss files in TS file and not below.
 */
const jsFiles = [
	"communications",
	"front-page",
	"get-started",
	"hr-page",
	"k1-about",
	"pricing",
];

const blockTypes = ["hero", "testimonials-slider", "header", "footer"];
const swipers = ["testimonials", "services", "brands"];

/**
 * For SCSS files (no leading `_`)
 * Array of strings modeled after scss names (e.g. 'we-are-kingdom-one')
 *  */
const styleSheets = []; // for scss only

module.exports = {
	...defaultConfig,
	...{
		entry: function () {
			const entries = {
				global: `./src/index.js`,
				"vendors/fontawesome": `./src/js/vendors/global/fontawesome.js`,
				"vendors/bootstrap": `./src/js/vendors/global/bootstrap.js`,
				"vendors/vendors": `./src/styles/vendors/vendors.scss`,
			};

			if (swipers.length > 0) {
				swipers.forEach((jsFile) => {
					const jsFileOutput = `vendors/sliders/${jsFile}-slider`;
					entries[
						jsFileOutput
					] = `./src/js/vendors/swipers/${jsFile}-slider.ts`;
				});
			}
			if (blockTypes.length > 0) {
				blockTypes.forEach((jsFile) => {
					const jsFileOutput = `blocks/${jsFile}`;
					entries[jsFileOutput] = `./our-blocks/${jsFile}.tsx`;
				});
			}
			if (jsFiles.length > 0) {
				jsFiles.forEach((jsFile) => {
					const jsFileOutput = snakeToCamel(jsFile);
					entries[jsFileOutput] = `./src/js/${jsFile}/index.ts`;
				});
			}

			if (styleSheets.length > 0) {
				styleSheets.forEach((styleSheet) => {
					const styleSheetOutput = snakeToCamel(styleSheet);
					entries[
						styleSheetOutput
					] = `./src/styles/pages/${styleSheet}.scss`;
				});
			}
			return entries;
		},

		output: {
			path: __dirname + `/dist`,
			filename: `[name].js`,
		},
	},
};
