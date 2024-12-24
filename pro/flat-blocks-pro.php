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
 * Load the include files for PRO features
 */
// if ( ! function_exists('fbp_load_includes') ) :
// 
// 	function fbp_load_includes() {

		/* Build array of include files relative to the current path */
		$includes = array (
			'/pro/inc/pro-admin-edit.php',
			'/pro/inc/pro-custom-styles.php',
			'/pro/inc/pro-default-image.php',
			'/pro/inc/pro-login-page.php',
			'/pro/inc/pro-patterns.php',
		);

		/* Add Jetpack support if that plugin is active */
		if ( class_exists( 'Jetpack' ) ) {
			$includes[] = '/pro/inc/pro-jetpack.php';
		}

		/* Add Woocommerce support if that plugin is active */
		if ( class_exists( 'woocommerce' ) ) {
			$includes[] = '/pro/inc/pro-woocommerce.php';
		}

		$includes = apply_filters( 'flatblocks_pro_load_includes', $includes );
// 		var_dump($includes); //TEST
		
		/* Load each of the includes */
		foreach ( $includes as $include ) {
			if ( file_exists( get_template_directory() . $include ) ) {
				include_once get_template_directory() . $include;
// 			} else { //TEST
// 				echo 'CANNOT find ' . get_template_directory() . $include; //TEST
			}
		}

// 	}
// 
// endif;
// fbp_load_includes();
