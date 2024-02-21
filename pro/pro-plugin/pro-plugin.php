<?php
/**
 * Plugin Name:       	Flat Blocks PRO
 * Plugin URI:  		https://xtremelysocial.com/wordpress/
 * Description:       	Flat Blocks PRO Theme Plugin
 * Requires at least: 	6.2
 * Requires PHP:      	7.4
 * Version:           	0.1.0
 * Author:            	XtremelySocial
 * Author URI:  		https://xtremelysocial.com
 * License:     		GPL-2.0+
 * License URI:       	https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       	flatblocks-pro
 *
 * @package           	flatblocks-pro
 */

/**
 * Flat Blocks PRO Plugin includes the following features, loaded in different ways
 * as follows:
 *
 * Animation Control - /animation/index.js adds an animation control to various blocks
 * 		and loads the necessary CSS.
 *
 * 		/animation/index-animation.php loads the view-animation.js necessary for the
 *		scroll animations to work.
 *
 * Visibility Control - /visibility/index.js adds an visibility control to various blocks.
 *
 */

// Define our build directory
define ('FBP_PLUGIN_ACTIVE', true);

// Define our build directory
define ('FBP_BUILD_DIR', __DIR__ . '/build/');

// Define our plugin version from the build directory
if ( file_exists ( FBP_BUILD_DIR . 'index.asset.php' ) ) {
	$asset_file = include( FBP_BUILD_DIR . 'index.asset.php');
	define ('FBP_VERSION', $asset_file['version']);
} else {
	define ('FBP_VERSION', '0.1.0');
}

// Load the animation javascript on the front-end
// if ( file_exists ( FBP_BUILD_DIR . 'animation/animation.php' ) ) {
// 	require_once( FBP_BUILD_DIR . 'animation/animation.php' );
// }

/**
 * Load the pugin's CSS and Javascript on the back-end (only)
 */
add_action( 'enqueue_block_editor_assets', 'flatblocks_pro_load_block_editor_assets' );

function flatblocks_pro_load_block_editor_assets() {

	// Always load the plugin's main index.js. It will load all the individual
	// feature's index.js files too.
	if ( file_exists ( FBP_BUILD_DIR . 'index.asset.php' ) ) {
		$asset_file = include( FBP_BUILD_DIR . 'index.asset.php');
		wp_enqueue_script(
			'flatblocks-pro-editor',
			FBP_BUILD_DIR . 'index.js',
			$asset_file['dependencies'],
			$asset_file['version']
			//FBP_VERSION
		);
	}

	// If the plugin has an editor stylesheet, then load it
	if ( file_exists ( FBP_BUILD_DIR . 'index.css' ) ) {
		wp_enqueue_style(
			'flatblocks-pro-editor',
			FBP_BUILD_DIR . 'index.css',
			array(),
			//$asset_file['version']
			FBP_VERSION
		);
	}
}

/**
 * Load the plugin's Style CSS and Javascript on the front-end (only)
 */
add_action( 'enqueue_block_assets', 'flatblocks_pro_load_block_assets' );

function flatblocks_pro_load_block_assets() {

	/* Only do this for the front-end */
	if ( is_admin() ) {
		return;
	}

	// If the plugin has front-end javascript, then load it
// 	if ( file_exists ( FBP_BUILD_DIR . 'view.asset.php' ) ) {
	if ( file_exists ( FBP_BUILD_DIR . 'view.js' ) ) {
// 		$asset_file = include( FBP_BUILD_DIR . 'view.asset.php');
		wp_enqueue_script(
			'flatblocks-pro',
			FBP_BUILD_DIR . 'view.js',
			array('jquery'),
// 			$asset_file['dependencies'],
// 			$asset_file['version']
			FBP_VERSION,
			$in_footer = true
		);
	}

    // Load the plugin's main style-index.css
	if ( file_exists ( FBP_BUILD_DIR . 'style-index.css' ) ) {
		wp_enqueue_style(
			'flatblocks-pro',
			FBP_BUILD_DIR . 'style-index.css',
			array(),
			FBP_VERSION
		);
	}
}
