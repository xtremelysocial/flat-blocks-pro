<?php
/**
 * File:	flat-blocks-pro.php
 * Theme:	Flat Blocks PRO
 * 
 * Adds the PRO version featurs to the Flat Blocks Theme
 *
 * Loads PRO custom block styles (CSS and JS)
 * Loads PRO block patterns
 * Loads CSS for Jetpack Plugin, if active
 * Loads CSS for Woo Commerce Plugin, if active
 * 
 * @package flat-blocks-pro
 */

/*
 * This entire function can be overridden by a child theme. Just declare the function 
 * and set the array to the files to include. You don't need to use the if not function
 * exists wrapper in your child theme.
 */
if ( ! function_exists('fbp_load_includes') ) :

	function fbp_load_includes() {

		/* Build array of include files */
		$includes = array (
			'/pro/inc/pro-admin-edit.php',
			'/pro/inc/pro-custom-styles.php',
			'/pro/inc/pro-default-image.php',
			'/pro/inc/pro-login-page.php',
			'/pro/inc/pro-patterns.php',
			'/pro/inc/pro-animation.php', // only for XtremelySocial.com
			);


		/* Add Flatblocks PRO Plugin if that plugin is NOT active */
		if ( ! defined('FBP_PLUGIN_ACTIVE') || FBP_PLUGIN_ACTIVE !== true ) {
			$includes[] = '/pro/plugin/flatblocks-pro.php';
		}

		/* Add Jetpack support if that plugin is active */
		if ( class_exists( 'Jetpack' ) ) {
			$includes[] = '/pro/inc/pro-jetpack.php';
		}

		/* Add Woocommerce support if that plugin is active */
		if ( class_exists( 'woocommerce' ) ) {
			$includes[] = '/pro/inc/pro-woocommerce.php';
		}

		/* Load each of the includes */
		foreach ( $includes as $include ) {
			if ( file_exists( get_template_directory() . $include ) ) {
				include_once get_template_directory() . $include;
			}
		}

	}

endif;

/*
 * Load the include files for PRO features
 */
fbp_load_includes();
