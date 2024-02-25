/**
 * File:	webpack.config.js
 * Plugin:	Animation & Visibility Plugin
 *
 * Customize the build process for our plugin. Specifically, it also copies over any
 * view-*.js files into the /build directory. For example, view-index.js to load
 * javascript on the front-end.
 *
 * @package xs-animation
 */

const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );
const CopyWebpackPlugin = require( 'copy-webpack-plugin' );

/* Setup entry points and plugins */
module.exports = {
    ...defaultConfig,
    entry: {
        index: path.resolve( process.cwd(), 'src', 'index.js' ),
//         view:  path.resolve( process.cwd(), 'src', 'view.js' ),
    },
	plugins: [
		...defaultConfig.plugins,

		// Copy javascript files from /src to /build
		new CopyWebpackPlugin( {
			patterns: [
				{
					from: 'animation/view.js',
					context: 'src',
					noErrorOnMissing: false,
				},
			],
		} ),
	],
};
