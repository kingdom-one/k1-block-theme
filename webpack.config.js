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
				"vendors/fonts": `./src/styles/vendors/_fonts.scss`,
			};

			if (jsFiles.length > 0) {
				jsFiles.forEach((jsFile) => {
					const jsFileOutput = snakeToCamel(jsFile);
					entries[
						`pages/${jsFileOutput}`
					] = `./src/js/${jsFile}/index.ts`;
				});
			}

			// if (styleSheets.length > 0) {
			// 	styleSheets.forEach((styleSheet) => {
			// 		const styleSheetOutput = snakeToCamel(styleSheet);
			// 		entries[
			// 			styleSheetOutput
			// 		] = `./src/styles/pages/${styleSheet}.scss`;
			// 	});
			// }
			return entries;
		},

		output: {
			path: __dirname + `/dist`,
			filename: `[name].js`,
		},
	},
};
