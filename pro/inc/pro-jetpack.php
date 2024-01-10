<?php
/**
 * File:	pro-jetpack.php
 * Theme:	Flat Blocks PRO
 * 
 * Handles the Jetpack plugin styling for the PRO version of Flat Blocks
 * 
 * Loads CSS for Jetpack Plugin
 * 
 * @package flat-blocks-pro
 * @since	1.0
 */

/**
 * Enqueue jetpack front-end styles and scripts.
 */
add_action( 'wp_enqueue_scripts', 'flatblocks_pro_jetpack_styles' );
//add_action( 'enqueue_block_assets', 'flatblocks_pro_jetpack_styles' );

if ( ! function_exists( 'flatblocks_pro_jetpack_styles' ) ) :

	function flatblocks_pro_jetpack_styles() {

		// Get version for caching
		$theme_version = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;
		
		// Load Jetpack styles if that plugin is active
		if ( class_exists('Jetpack') && file_exists( get_template_directory() . '/pro/css/pro-jetpack.css' ) ) {
			wp_enqueue_style( 
				'flatblocks-pro-jetpack-styles', 
				get_template_directory_uri() . '/pro/css/pro-jetpack.css', 
				array( 'flatblocks-base' ), 
				$version_string 
			);
		}
		
	} //end function
endif;		

/**
 * Enqueue Jetpack editor styles and scripts.
 * 
 */
add_action( 'admin_init', 'flatblocks_pro_jetpack_editor_styles' );

if ( ! function_exists( 'flatblocks_pro_jetpack_editor_styles' ) ) :

	function flatblocks_pro_jetpack_editor_styles() {

		// Load Jetpack styles if that plugin is active
		if ( class_exists('Jetpack') && file_exists( get_template_directory() . '/pro/css/pro-jetpack.css' ) ) {
			add_editor_style(
				'/pro/css/pro-jetpack.css'
			);
		}

	} //end function
endif;

/**
 * Register custom block styles.
 */
add_filter( 'flatblocks_custom_block_styles', 'flatblocks_pro_register_jetpack_block_styles' );

if ( ! function_exists( 'flatblocks_pro_register_jetpack_block_styles' ) ) :

	function flatblocks_pro_register_jetpack_block_styles( $theme_styles ) {

		/* 
		 * Define custom styles and what blocks they apply to. Note that the prefix 
		 * 'is-style-' will automatically be added to the names.
		 */
		$jetpack_styles = array(
			'no-icon' 			=> array( esc_html__('No Icon', 'flat-blocks'), 
				array( 'jetpack/contact-info', 'jetpack/email', 'jetpack/phone' ),
				'style_handle' 	=> 'flatblocks-pro-jetpack-styles'
			)
		);

		//return array_merge( $theme_styles, $jetpack_styles );
		//return $theme_styles + $jetpack_styles;
		return $theme_styles ? $theme_styles + $jetpack_styles : $jetpack_styles;
		
	} //end function
endif;
