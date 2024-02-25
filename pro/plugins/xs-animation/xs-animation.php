<?php
/**
 * Plugin Name:       	Animation & Visibility
 * Plugin URI:  		https://xtremelysocial.com/wordpress/xs-animation/
 * Description:       	Animation & Visibility Plugin by XtremelySocial
 * Requires at least: 	6.2
 * Requires PHP:      	7.4
 * Version:           	0.1.0
 * Author:            	XtremelySocial
 * Author URI:  		https://xtremelysocial.com
 * License:     		GPL-2.0+
 * License URI:       	https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       	xs-animation
 *
 * @package           	xs-animation
 */

/**
 * Animation & Visibility Plugin includes the following features, loaded in different ways
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
define ('XS_ANIMATION_PLUGIN_ACTIVE', true);

// Define our build directory
define ('XSA_BUILD_DIR', __DIR__ . '/build/');

// Define our plugin version from the build directory
if ( file_exists ( XSA_BUILD_DIR . 'index.asset.php' ) ) {
	$asset_file = include( XSA_BUILD_DIR . 'index.asset.php');
	define ('XSA_VERSION', $asset_file['version']);
} else {
	define ('XSA_VERSION', '0.1.0');
}

/**
 * Load the pugin's CSS and Javascript on the back-end (only)
 */
add_action( 'enqueue_block_editor_assets', 'xs_animation_load_block_editor_assets' );

function xs_animation_load_block_editor_assets() {

	// Always load the plugin's main index.js. It will load all the individual
	// feature's index.js files too.
	if ( file_exists ( XSA_BUILD_DIR . 'index.asset.php' ) ) {
		$asset_file = include( XSA_BUILD_DIR . 'index.asset.php');
		wp_enqueue_script(
			'flatblocks-pro-editor',
			XSA_BUILD_DIR . 'index.js',
			$asset_file['dependencies'],
			$asset_file['version']
			//XSA_VERSION
		);
	}

	// If the plugin has an editor stylesheet, then load it
	if ( file_exists ( XSA_BUILD_DIR . 'index.css' ) ) {
		wp_enqueue_style(
			'flatblocks-pro-editor',
			XSA_BUILD_DIR . 'index.css',
			array(),
			//$asset_file['version']
			XSA_VERSION
		);
	}
}

/**
 * Load the plugin's Style CSS and Javascript on the front-end (only)
 */
add_action( 'enqueue_block_assets', 'xs_animation_load_block_assets' );

function xs_animation_load_block_assets() {

	/* Only do this for the front-end */
	if ( is_admin() ) {
		return;
	}

	// If the plugin has front-end javascript, then load it
// 	if ( file_exists ( XSA_BUILD_DIR . 'view.asset.php' ) ) {
	if ( file_exists ( XSA_BUILD_DIR . 'view.js' ) ) {
// 		$asset_file = include( XSA_BUILD_DIR . 'view.asset.php');
		wp_enqueue_script(
			'flatblocks-pro',
			XSA_BUILD_DIR . 'view.js',
			array('jquery'),
// 			$asset_file['dependencies'],
// 			$asset_file['version']
			XSA_VERSION,
			$in_footer = true
		);
	}

    // Load the plugin's main style-index.css
	if ( file_exists ( XSA_BUILD_DIR . 'style-index.css' ) ) {
		wp_enqueue_style(
			'flatblocks-pro',
			XSA_BUILD_DIR . 'style-index.css',
			array(),
			XSA_VERSION
		);
	}
}
