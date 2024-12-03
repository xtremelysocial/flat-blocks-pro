<?php
/**
 * File:	wp-compatibility.php
 * Theme:	Flat Blocks PRO
 *
 * Checks the WordPress version and loads any additional code and/or CSS needed
 * for compatibility. 
 * 
 * TO-DO: Remove this when theme requires WordPress v6.6+.
 * 
 * @package flat-blocks-pro
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
// 		$theme_version = wp_get_theme()->get( 'Version' );
// 		$version_string = is_string( $theme_version ) ? $theme_version : false;
		if ( file_exists ( get_template_directory() . '/assets/css/wp-compat.asset.php' ) ) {
			$asset_file = include( get_template_directory() . '/assets/css/wp-compat.asset.php' );
			$compat_css_version = $asset_file['version'] ?? false;
		} else {
			$compat_css_version = wp_get_theme()->get( 'Version' ) ?? false;
		}
		
		// Load custom block styles
		wp_enqueue_style( 
			'flatblocks-compat-styles', 
			get_template_directory_uri() . '/assets/css/wp-compat.css', 
			array('flatblocks-base'),
			$compat_css_version
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
			'image-border' 		=> array( esc_html__('Border', 'flat-blocks'), 
				array('image', 'gallery' )
			),
			'image-round-border' => array( esc_html__('Rounded w/Border', 'flat-blocks'), 
				array('image' )
			),
			'image-computer-screen' => array( esc_html__('Computer Screen', 'flat-blocks'), 
				array('image' )
			),
			'image-tablet-phone-screen' => array( esc_html__('Tablet/Phone Screen', 'flat-blocks'), 
				array('image' )
			),
			'image-no-border'	=> array( esc_html__('No Border', 'flat-blocks'), 
				array('post-featured-image' )
			),
			'no-padding' 		=> array( esc_html__('No Padding', 'flat-blocks'), 
				array('column', 'media-text' )
			),
			'center-on-mobile' 	=> array( esc_html__('Center on Mobile', 'flat-blocks'), 
				array('columns' )
				//array('columns', 'group' )
			),
			'thick-gap' 		=> array( esc_html__('Thick Gap', 'flat-blocks'), 
				array('columns' )
			),
			'no-gap' 			=> array( esc_html__('No Gap', 'flat-blocks'), 
				array('columns' )
			),
			'bullets' 			=> array( esc_html__('Bullets', 'flat-blocks'), 
				array('latest-posts', 'latest-comments' )
			),
			'list-checkmarks' 	=> array( esc_html__('Checkmarks', 'flat-blocks'), 
				array('list', 'page-list' )
			),
			'list-plain' 		=> array( esc_html__('Plain', 'flat-blocks'), 
				array('list', 'page-list', 'categories' )
			),
			'list-plain-centered' => array( esc_html__('Plain Centered', 'flat-blocks'), 
				array('list', 'page-list', 'categories' )
			),
			'alignwide' 		=> array( esc_html__('Align Wide', 'flat-blocks'), 
				array('paragraph' )
			),
			'link-underline' 	=> array( esc_html__('Underline Link', 'flat-blocks'), 
				array('paragraph', 'list', 'list-item', 'categories', 'latest-posts', 'latest-comments', 'page-list', 'post-title', 'post-terms')
			),
			'link-no-underline' => array( esc_html__('No Underline Link', 'flat-blocks'), 
				array('paragraph', 'list', 'list-item', 'categories', 'latest-posts', 'latest-comments', 'page-list', 'post-title', 'post-terms')
			),
			'link-underline-hover' => array( esc_html__('Underline Hover', 'flat-blocks'), 
				array('paragraph', 'list', 'list-item', 'categories', 'latest-posts', 'latest-comments', 'page-list', 'post-title', 'post-terms', 'site-title')
			),
			'arrow-icon' 		=> array( esc_html__('Arrow Icon', 'flat-blocks'), 
				array('paragraph' )
			),
			'arrow-icon-no-text' => array( esc_html__('Arrow No Text', 'flat-blocks'), 
				array('paragraph' )
			),
			'no-icon' 			=> array( esc_html__('No Icon', 'flat-blocks'), 
				array('post-author-name', 'post-date', 'post-terms' )
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
			'fixed-menu' 		=> array( esc_html__('Fixed Menu', 'flat-blocks'), 
				array('navigation' )
			),
		);

		return $theme_styles ? $theme_styles + $compat_styles : $compat_styles;	
	}
endif;
