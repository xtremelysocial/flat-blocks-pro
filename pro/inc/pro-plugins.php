<?php
/**
 * File:	plugin-recommendations.php
 * Theme:	Flat Blocks
 * 
 * This file handles the recommended plugins to go with the Flat Blocks theme.
 * None of them are truly required, but will provide the full set of features 
 * possible for the theme.
 *
 * See https://github.com/thomasgriffin/TGM-Plugin-Activation
 * 
 * @package flat-blocks
 * @since	1.0
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
//require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/pro/plugins/TGM-Plugin-Activation/class-tgm-plugin-activation.php';

/**
 * Register the required plugins for this theme.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
add_action( 'tgmpa_register', 'flatblocks_register_required_plugins' );

function flatblocks_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the WordPress.org repo, then source is also required.
	 * 
	 * To force an update, include a version number higher than the already-installed
	 * version.
	 */
	$plugins = array(

		// XS Block Visibility Plugin (from this theme)
		array(
			'name'               => 'Block Visibility by XtremelySocial',
			'slug'               => 'xs-visibility',
			'source'             => get_template_directory() . '/pro/plugins/xs-visibility/xs-visibility.zip',
// 			'required'           => false,
// 			'version'            => '1.0.0',
// 			'force_activation'   => false,
// 			'force_deactivation' => false,
			'external_url'       => 'https://github.com/xtremelysocial/xs-visibility',
// 			'is_callable'        => '',
		),

		// XS Animation Plugin (from this theme)
		array(
			'name'      		=> 'Animation & Visibility by XtremelySocial',
			'slug'      		=> 'xs-animation',
// 			'source'    		=> 'https://github.com/xtremelysocial/xs-animation',
			'source'             => get_template_directory() . '/pro/plugins/xs-animation/xs-animation.zip',
// 			'version'            => '1.0.0',
			'external_url'      => 'https://github.com/xtremelysocial/xs-animation',
// 			'required' 			=> false,
		),

		// XS Block Shapes Plugin (from this theme)
// 		array(
// 			'name'               => 'Block Shapes by XtremelySocial',
// 			'slug'               => 'xs-shapes',
// 			'source'             => get_template_directory() . '/pro/plugins/xs-shapes/xs-shapes.zip',
// // 			'required'           => false,
// // 			'version'            => '1.0.0',
// // 			'force_activation'   => false,
// // 			'force_deactivation' => false,
// 			'external_url'       => 'https://github.com/xtremelysocial/xs-shapes',
// // 			'is_callable'        => '',
// 		),

		// XS Dashicons Plugin (from this theme)
// 		array(
// 			'name'      		=> 'Dashicons Icon by XtremelySocial',
// 			'slug'      		=> 'xs-dashicons',
// // 			'source'			=> 'https://github.com/xtremelysocial/xs-dashicons/archive/refs/heads/main.zip',
// 			'source'             => get_template_directory() . '/pro/plugins/xs-dashicons/xs-dashicons.zip',
// 			'external_url'      => 'https://github.com/xtremelysocial/xs-dashicons',
// // 			'required' 			=> false,
// 		),

	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );

}