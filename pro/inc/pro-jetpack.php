<?php
/**
 * File:		pro-jetpack.php
 * Theme:		Flat Blocks PRO
 * 
 * Handles the Jetpack plugin styling for the PRO version of Flat Blocks
 * 
 * @package 	flat-blocks-pro
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
		if ( class_exists('Jetpack') && file_exists( get_template_directory() . '/assets/css/pro/pro-jetpack.css' ) ) {
			wp_enqueue_style( 
				'flatblocks-pro-jetpack-styles', 
				get_template_directory_uri() . '/assets/css/pro/pro-jetpack.css', 
				array( 'flat-blocks' ), 
				$version_string 
			);
		}
		
	}
endif;		

/**
 * Enqueue Jetpack editor styles and scripts.
 * 
 */
add_action( 'admin_init', 'flatblocks_pro_jetpack_editor_styles' );

if ( ! function_exists( 'flatblocks_pro_jetpack_editor_styles' ) ) :

	function flatblocks_pro_jetpack_editor_styles() {

		// Load Jetpack styles if that plugin is active
		if ( class_exists('Jetpack') && file_exists( get_template_directory() . '/assets/css/pro/pro-jetpack.css' ) ) {
			add_editor_style(
				'/assets/css/pro/pro-jetpack.css'
			);
		}

	}
endif;

/**
 * Register custom block styles.
 */
add_action( 'init', 'flatblocks_pro_register_jetpack_block_styles' );

if ( ! function_exists( 'flatblocks_pro_register_jetpack_block_styles' ) ) :

	function flatblocks_pro_register_jetpack_block_styles( $theme_styles ) {

		/* 
		 * Define custom styles and what blocks they apply to. Note that the prefix 
		 * 'is-style-' will automatically be added to the names.
		 */
		register_block_style(
			array( 'jetpack/contact-info', 'jetpack/email', 'jetpack/phone' ),
			array(
				'name'  => 'no-icon',
				'label' => __('No Auto Icon', 'flat-blocks-pro'),
				'style_handle' => 'flatblocks-pro-jetpack-styles'
			)
		);
	}
endif;
