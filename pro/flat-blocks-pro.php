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
// 			'/pro/inc/pro-users-taxonomy.php',
// 			'/pro/inc/pro-animation.php', // only for XtremelySocial.com
			);


		/* Add XS Animation Plugin if that plugin is NOT active */
// 		if ( ! defined('XS_ANIMATION_PLUGIN') || XS_ANIMATION_PLUGIN !== true ) {
// 		//if ( ! class_exists( 'XS_Animation_Plugin' ) ) {
// 			$includes[] = '/pro/plugins/xs-animation/xs-animation.php';
// 		}

		/* Add Jetpack support if that plugin is active */
		if ( class_exists( 'Jetpack' ) ) {
			$includes[] = '/pro/inc/pro-jetpack.php';
		}

		/* Add Woocommerce support if that plugin is active */
		if ( class_exists( 'woocommerce' ) ) {
			$includes[] = '/pro/inc/pro-woocommerce.php';
		}

		$includes = apply_filters( 'flatblocks_pro_load_includes', $includes );

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
