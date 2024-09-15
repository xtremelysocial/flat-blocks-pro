// WordPress webpack config.
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

// Plugins.
const WebpackWatchedGlobEntries = require('webpack-watched-glob-entries-plugin');
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const RemoveEmptyScriptsPlugin = require( 'webpack-remove-empty-scripts' );
// const webpack-fix-style-only-entries = require( 'webpack-fix-style-only-entries' );
//const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
// const CopyPlugin = require("copy-webpack-plugin");

// Utilities.
// const glob = require("glob");
const path = require( 'path' );

// const mapFilenamesToEntries = pattern => glob
//   .sync(pattern)
//   .reduce((entries, filename) => {
//     const [, name] = filename.match(/([^/]+)\.scss$/)
//     return { ...entries, [name]: filename }
//   }, {})

// package.json sets the default source to ./src and output to ./assets/css
// so entry and output below should be relative to those.
module.exports = {
	...defaultConfig,
	...{	
// 	entry: {
// 		//'theme-pack': './src/index.js',
// 		...mapFilenamesToEntries('./src/themes/*.main.scss')
// 	}	
// 	entry: {
// 		'flat-blocks': './src/scss/flat-blocks.scss',
// 	},
	
	 entry: WebpackWatchedGlobEntries.getEntries(
		  [ 
			path.resolve(__dirname, 'src/scss/**/*.scss'),
			path.resolve(__dirname, 'pro/src/scss/**/*.scss'),
// 			path.resolve(__dirname, 'src/scss/*.scss'),
// 			path.resolve(__dirname, 'src/scss/blocks/*.scss'),
// 			path.resolve(__dirname, 'entry/**/*.js'),
// 			path.resolve(__dirname, 'more/entries/**/*.js')
		  ],
		  {
			  // Optional glob options that are passed to glob.sync()
// 			  ignore: '**/*.test.js'
			  ignore: '**/_*.scss'
		  }
		),
		
// 		entry: {
// 			...glob.sync('./src/scss/*.scss').reduce((acc, curr) => {
//                 return {...acc, [path.basename(curr, ".scss")]: curr}
//             }, {}),			
// 			...glob.sync("./src/scss/blocks/*.scss").reduce((acc, curr) => {
//                 return {...acc, [path.basename(curr, ".scss")]: curr}
//             }, {}),			
// 			...glob.sync("./pro/src/scss/*.scss").reduce((acc, curr) => {
//                 return {...acc, [path.basename(curr, ".scss")]: './pro/assets/css/' + curr}
//             }, {}),
// 		},

// 		entry: {
// 			'flat-blocks': './src/scss/flat-blocks.scss',
// 			'editor-styles': './src/scss/editor-styles.scss',
// 			'block-styles': './src/scss/block-styles.scss',
// 			'wp-compat': './src/scss/wp-compat.scss',
// 			'blocks/calendar': './src/scss/blocks/calendar.scss',
// 			'blocks/comments': './src/scss/blocks/comments.scss',
// 			'blocks/details': './src/scss/blocks/details.scss',
// 			'blocks/latest-comments': './src/scss/blocks/latest-comments.scss',
// 			'blocks/latest-posts': './src/scss/blocks/latest-posts.scss',
// 			'blocks/list': './src/scss/blocks/list.scss',
// 			'blocks/media-text': './src/scss/blocks/media-text.scss',
// 			'blocks/post-author': './src/scss/blocks/post-author.scss',
// 			'blocks/post-comments-count': './src/scss/blocks/post-comments-count.scss',
// 			'blocks/post-comments-form': './src/scss/blocks/post-comments-form.scss',
// 			'blocks/post-date': './src/scss/blocks/post-date.scss',
// 			'blocks/post-excerpt': './src/scss/blocks/post-excerpt.scss',
// 			'blocks/post-featured-image': './src/scss/blocks/post-featured-image.scss',
// 			'blocks/post-terms': './src/scss/blocks/post-terms.scss',
// 			'blocks/query-pagination': './src/scss/blocks/query-pagination.scss',
// 			'blocks/query': './src/scss/blocks/query.scss',
// 			'blocks/separator': './src/scss/blocks/separator.scss',
// 			'blocks/social-links': './src/scss/blocks/social-links.scss',
// 			'blocks/table': './src/scss/blocks/table.scss',
// // 			...glob.sync('./src/scss/blocks/*.scss').reduce((acc, curr) => {
// //                 //return {...acc, [path.resolve( __dirname, path.basename(curr, '.scss') )]: curr}
// //                 //return {...acc, [path.resolve(__dirname + './assets/css/blocks/') + path.basename(curr, ".scss")]: curr}
// //                 return {...acc, [path.basename(curr, ".scss")]: curr}
// //             }, {}),			
// 			'./../../pro/assets/css/pro-custom-styles': './pro/src/scss/pro-custom-styles.scss',
// 			'./../../pro/assets/css/pro-jetpack': './pro/src/scss/pro-jetpack.scss',
// 			'./../../pro/assets/css/pro-woocommerce': './pro/src/scss/pro-woocommerce.scss',
// 		},
// 		
// 		output: {
//         	filename: 'pro/[name].js'
//     	},
// 		output: {
// // 			filename: '[name].css',
// // 			path: path.resolve(__dirname, './pro/assets/css'),
// 			filename: '[name].js',
// 			path: path.resolve(__dirname, './pro/assets/css'),
// // 			chunkFilename: '[id].[chunkhash].css'
// 		},

    	module: {
			rules: [
				{
					test: /\.(sa|sc|c)ss$/,
					use: [
						{ loader: MiniCssExtractPlugin.loader },
						{ loader: 'css-loader' },
						{ loader: 'sass-loader', options: {
							//sourceMap: false,
							sassOptions: {
								outputStyle: 'expanded', // turn of minification
							},
						} },
					],
				},
			],
		},
		
		plugins: [
			// Include WP's plugin config.
			...defaultConfig.plugins,

			// Load multiple entry points plugin
			new WebpackWatchedGlobEntries(),
			
			// Load minimize CSS plugin so we can turn off minimizing above
			// with outputStyle: 'expanded'
			new MiniCssExtractPlugin(),

			// Removes the empty `.js` files generated by webpack but
			// sets it after WP has generated its `*.asset.php` file.
			//new webpack-fix-style-only-entries(),
			
			new RemoveEmptyScriptsPlugin( {
				stage: RemoveEmptyScriptsPlugin.STAGE_AFTER_PROCESS_PLUGINS,
			} ),
		],

		mode: 'development',
		//devtool: 'source-map',
		devtool: false, // turn off source maps
		//optimization: {
		//    minimize: false,
		//}
	},
};
