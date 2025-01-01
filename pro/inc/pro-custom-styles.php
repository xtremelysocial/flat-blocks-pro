<?php
/**
 * File:		pro-custom-styles.php
 * Theme:		Flat Blocks PRO
 *
 * Loads the PRO custom styles and CSS. 
 * 
 * @package 	flat-blocks-pro
 */

/**
 * Enqueue custom PRO block styles.
 */
add_action( 'wp_enqueue_scripts', 'flatblocks_pro_styles' );
//add_action( 'enqueue_block_assets', 'flatblocks_pro_styles' );

if ( ! function_exists( 'flatblocks_pro_styles' ) ) :

	function flatblocks_pro_styles() {

		// Get version for caching
		$theme_version = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;
// 		var_dump(get_template_directory_uri() . '/assets/css/pro/pro-custom-styles.css'); //TEST
		
		// Load custom block styles
		wp_enqueue_style( 
			'flatblocks-pro-custom-styles', 
			get_template_directory_uri() . '/assets/css/pro/pro-custom-styles.css', 
			array('flat-blocks'),
			$version_string
		);
		
		// Load scroll-header javascript, but only on front-end
		//if ( !is_admin() ) {
			wp_enqueue_script( 
				'flatblocks-pro-custom-styles', 
				get_template_directory_uri() . '/pro/assets/js/pro-custom-styles.js', 
				array('jquery'), 
				$version_string, 
				true 
			);
		//}
	}
endif;		

/**
 * Enqueue additional PRO editor scripts.
 */
add_action( 'admin_init', 'flatblocks_pro_editor_styles' );

if ( ! function_exists( 'flatblocks_pro_editor_styles' ) ) :

	function flatblocks_pro_editor_styles() {

		// Load Flat Blocks PRO CSS styles
		add_editor_style(
			'/assets/css/pro/pro-custom-styles.css'
		);

	}
endif;
