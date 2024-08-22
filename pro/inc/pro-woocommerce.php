<?php
/**
 * File:	pro-woocommerce.php
 * Theme:	Flat Blocks PRO
 * 
 * Handles the Woo Commerce plugin styling for the PRO version of Flat Blocks
 * 
 * @package flat-blocks-pro
 */

/**
 * Enqueue Woo Commerce front-end styles and scripts.
 */
add_action( 'wp_enqueue_scripts', 'flatblocks_pro_woocommerce_styles' );
//add_action( 'enqueue_block_assets', 'flatblocks_pro_woocommerce_styles' );

if ( ! function_exists( 'flatblocks_pro_woocommerce_styles' ) ) :

	function flatblocks_pro_woocommerce_styles() {

		// Get version for caching
		$theme_version = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;

		// Load Woo Commerce styles if that plugin is active
		if ( class_exists( 'woocommerce' ) && file_exists( get_template_directory() . '/pro/assets/css/pro-woocommerce.css' ) ) {
			wp_enqueue_style( 
				'flatblocks-woo-commerce-styles', 
				get_template_directory_uri() . '/pro/assets/css/pro-woocommerce.css', 
				array( 'flatblocks-base' ), 
				$version_string 
			);
		}
		
	}
endif;

/**
 * Enqueue Woo Commerce editor styles and scripts.
 * 
 */
add_action( 'admin_init', 'flatblocks_pro_woocommerce_editor_styles' );

if ( ! function_exists( 'flatblocks_pro_woocommerce_editor_styles' ) ) :

	function flatblocks_pro_woocommerce_editor_styles() {

		// Load Woo Commerce styles if that plugin is active
		if ( class_exists( 'woocommerce' ) && file_exists( get_template_directory() . '/pro/assets/css/pro-woocommerce.css' ) ) {
			add_editor_style(
				'/pro/assets/css/pro-woocommerce.css'
			);
		}

	}
endif;
