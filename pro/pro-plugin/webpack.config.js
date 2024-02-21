/**
 * File:	webpack.config.js
 * Plugin:	Flatblocks PRO Theme Plugin
 *
 * Customize the build process for our plugin. Specifically, it also copies over any
 * view-*.js files into the /build directory. For example, view-index.js to load
 * javascript on the front-end.
 *
 * @package flatblocks-pro
 * @since	1.0
 */

const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );
const CopyWebpackPlugin = require( 'copy-webpack-plugin' );
// const DependencyExtractionWebpackPlugin = require('@wordpress/dependency-extraction-webpack-plugin')
// const webpack = require('webpack');

/* Setup entry points and plugins */
module.exports = {
    ...defaultConfig,
    entry: {
        index: path.resolve( process.cwd(), 'src', 'index.js' ),
//         view:  path.resolve( process.cwd(), 'src', 'view.js' ),
    },
	plugins: [
		...defaultConfig.plugins,
// 		new DependencyExtractionWebpackPlugin(),
// 		new webpack.ProvidePlugin({
// 		  $: "jquery",
// 		  jQuery: "jquery"
// 		}),
		// Copy javascript files from /src to /build
		new CopyWebpackPlugin( {
			patterns: [
				{
// 					from: '**/view-*.js',
					from: 'animation/view.js',
					context: 'src',
					noErrorOnMissing: false,
				},
			],
		} ),
	],
// 	externals: {
//     	jquery: 'jQuery',
//   	},
};
