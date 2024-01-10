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
 * @since	1.0
 */

// Load Admin Edit Link
if ( apply_filters( 'flatblocks_pro_load_admin_edit', $default = true ) ) {
	if ( file_exists( get_template_directory() . '/pro/inc/pro-admin-edit.php' ) ) {
		require_once get_template_directory() . '/pro/inc/pro-admin-edit.php';
	}
}

// Load custom block styles
if ( apply_filters( 'flatblocks_pro_load_custom_styles', $default = true ) ) {
	if ( file_exists( get_template_directory() . '/pro/inc/pro-custom-styles.php' ) ) {
		require_once get_template_directory() . '/pro/inc/pro-custom-styles.php';
	}
}

// Load block patterns
if ( apply_filters( 'flatblocks_pro_load_patterns', $default = true ) ) {
	if ( file_exists( get_template_directory() . '/pro/inc/pro-patterns.php' ) ) {
		require_once get_template_directory() . '/pro/inc/pro-patterns.php';
	}
}

// Load animation and visibility styles and scripts (this is for XtremelySocial.com ONLY)
if ( apply_filters( 'flatblocks_pro_load_animation', $default = true ) ) {
	if ( file_exists( get_template_directory() . '/pro/inc/pro-animation.php' ) ) {
		require_once get_template_directory() . '/pro/inc/pro-animation.php';
	}
}

// Load Jetpack Plugin styles and scripts only if that plugin is active
if ( apply_filters( 'flatblocks_pro_load_jetpack', $default = true ) ) {
	if ( class_exists('Jetpack') && file_exists( get_template_directory() . '/pro/inc/pro-jetpack.php' ) ) {
		require_once get_template_directory() . '/pro/inc/pro-jetpack.php';
	}
}

// Load Woo Commerce Plugin styles and scripts only if that plugin is active
if ( apply_filters( 'flatblocks_pro_load_woocommerce', $default = true ) ) {
	if ( class_exists('woocommerce') && file_exists( get_template_directory() . '/pro/inc/pro-woocommerce.php' ) ) {
		require_once get_template_directory() . '/pro/inc/pro-woocommerce.php';
	}
}
