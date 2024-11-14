<?php
/**
 * File:	wp-compatibility.php
 * Theme:	Flat Blocks
 *
 * Checks the WordPress version and loads any additional code and/or CSS needed
 * for compatibility. 
 * 
 * @package flat-blocks
 * @since	1.6.4
 */

/**
 * If WordPress version <6.6, enqueue custom block styles on front-end and back-end
 */
if ( version_compare( get_bloginfo( 'version' ), '6.6', '<' ) AND 
	( file_exists( get_stylesheet_directory() . '/assets/css/wp-compat.css' ) ) ) :

	add_action( 'enqueue_block_assets', 'flatblocks_compat_styles' );

	function flatblocks_compat_styles() {

		// Get version for caching
		$theme_version = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;
		
		// Load custom block styles
		wp_enqueue_style( 
			'flatblocks-compat-styles', 
			get_template_directory_uri() . '/assets/css/wp-compat.css', 
			array('flatblocks-base'),
			$version_string
		);
		wp_style_add_data( 'flatblocks-compat-styles', 'rtl', 'replace' );
	}	
endif;

/**
 * If WordPress version <6.6, register custom block styles
 */
if ( version_compare( get_bloginfo( 'version' ), '6.6', '<' ) and 
	( ! function_exists( 'flatblocks_register_compat_block_styles' ) ) ) :

	add_filter( 'flatblocks_custom_block_styles', 'flatblocks_compat_block_styles' );

	function flatblocks_compat_block_styles( $theme_styles ) {

		// Define custom styles and what blocks they apply to. 
		$compat_styles = array(
			'rounded-corners' => array( esc_html__('Rounded Corners', 'flat-blocks'), 
				array('group', 'columns', 'column', 'cover', 'media-text', 'comments')
			),
			'rounded-border' 	=> array( esc_html__('Border', 'flat-blocks'), 
				array('group', 'columns', 'column', 'cover', 'media-text', 'comments')
			),
			'thick-rounded-border' => array( esc_html__('Thick Border', 'flat-blocks'), 
				array('group', 'columns', 'column', 'cover', 'media-text', 'comments')
			),
			'thick' 			=> array( esc_html__('Thick', 'flat-blocks'), 
				array('separator' )
			),
			'thick-wide' 		=> array( esc_html__('Wide Thick', 'flat-blocks'), 
				array('separator' )
			),
			'button-alt' 		=> array( esc_html__('Button Alt', 'flat-blocks'), 
				array('button' )
			),
			'button-outline-alt' => array( esc_html__('Outline Alt', 'flat-blocks'), 
				array('button' )
			),
			'button-alt-2' 		=> array( esc_html__('Button Alt 2', 'flat-blocks'), 
				array('button' )
			),
			'button-outline-alt-2' => array( esc_html__('Outline Alt 2', 'flat-blocks'), 
				array('button' )
			),
		);

		return $theme_styles ? $theme_styles + $compat_styles : $compat_styles;	
	}
endif;
