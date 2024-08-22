<?php
/**
 * File:	compat-wp.php
 * Theme:	Flat Blocks
 *
 * Checks the WordPress version and loads any additional code and/or CSS needed
 * for compatibility. 
 * 
 * @package flat-blocks
 * @since	1.6.3
 */

/**
 * Enqueue custom block styles.
 */
/* 
add_action( 'wp_enqueue_scripts', 'flatblocks_pro_styles' );
//add_action( 'enqueue_block_assets', 'flatblocks_pro_styles' );

if ( ! function_exists( 'flatblocks_pro_styles' ) ) :

	function flatblocks_pro_styles() {

		// Get version for caching
		$theme_version = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;
		
		// Load custom block styles
		wp_enqueue_style( 
			'flatblocks-pro-custom-styles', 
			get_template_directory_uri() . '/pro/assets/css/pro-custom-styles.css', 
			array('flatblocks-base'),
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
 */

/**
 * Enqueue additional editor scripts.
 */
/* 
add_action( 'admin_init', 'flatblocks_pro_editor_styles' );

if ( ! function_exists( 'flatblocks_pro_editor_styles' ) ) :

	function flatblocks_pro_editor_styles() {

		// Load Flat Blocks PRO CSS styles
		add_editor_style(
			'/pro/assets/css/pro-custom-styles.css'
		);

	}
endif;
 */

/**
 * Register custom block styles only if WordPress version less than 6.6.
 */

//if ( ! function_exists( 'flatblocks_register_compat_block_styles' ) ) :
if ( version_compare( get_bloginfo( 'version' ), '6.6', '<' ) and 
	( ! function_exists( 'flatblocks_register_compat_block_styles' ) ) ) :

	add_filter( 'flatblocks_custom_block_styles', 'flatblocks_register_compat_block_styles' );

	function flatblocks_register_compat_block_styles( $theme_styles ) {

		/* 
		 * Define custom styles and what blocks they apply to. 
		 * 
		 * Note that the prefix 'is-style-' will automatically be added to the names.
		 */
		$compat_styles = array(
			'template-header' 	=> array( esc_html__('Site Header', 'flat-blocks'),
				array( 'template-part' ),
				'inline_style' 	=> '
.is-style-template-header {
	background-color: var(--wp--preset--color--base);
	//color: var(--wp--preset--color--contrast);
	padding-top: var(--wp--preset--spacing--40);
	padding-bottom: var(--wp--preset--spacing--40);
	border: 1px solid var(--wp--custom--border--color);
	border-width: 0 0 1px; 
}'
			),
			'template-title' 	=> array( esc_html__('Page & Post Title', 'flat-blocks'),
				array( 'template-part' ),
				'inline_style' 	=> '
.is-style-template-title {
	background-color: var(--wp--preset--color--primary);
	color: var(--wp--preset--color--primary-alt);
	//padding-top: var(--wp--preset--spacing--60);
	//padding-bottom: var(--wp--preset--spacing--60);
}'
			),
			'template-footer' 	=> array( esc_html__('Site Footer', 'flat-blocks'),
				array( 'template-part' ),
				'inline_style' 	=> '
.is-style-template-footer {
	background-color: var(--wp--preset--color--dark);
	color: var(--wp--preset--color--foreground-alt);
	padding-top: var(--wp--preset--spacing--40);
	padding-bottom: var(--wp--preset--spacing--60);
}
.is-style-template-footer:has(.is-style-template-footer-alt) {
	padding-bottom: 0;
}'
			),
			'template-footer-alt' 	=> array( esc_html__('Site Footer Info', 'flat-blocks'),
				array( 'template-part' ),
				'inline_style' 	=> '
.is-style-template-footer-alt {
	background-color: var(--wp--preset--color--dark-alt);
	color: var(--wp--preset--color--foreground-alt);
	padding-top: var(--wp--preset--spacing--40);
	padding-bottom: var(--wp--preset--spacing--40);
}'
			),
			'template-post-meta' 	=> array( esc_html__('Post Meta', 'flat-blocks'),
				array( 'template-part' ),
				'inline_style' 	=> '
.is-style-template-post-meta {
	background-color: var(--wp--preset--color--neutral);
	color: var(--wp--preset--color--dark);
	border: 1px solid var(--wp--custom--border--color);
	border-radius: var(--wp--custom--border--radius);
	padding: var(--wp--preset--spacing--40);
}'
			),
			'template-comments' 	=> array( esc_html__('Site Comments', 'flat-blocks'),
				array( 'template-part' ),
				'inline_style' 	=> '
.is-style-template-comments {
	background-color: var(--wp--preset--color--neutral);
	color: var(--wp--preset--color--dark);
	border: 1px solid var(--wp--custom--border--color);
	border-radius: var(--wp--custom--border--radius);
	padding: var(--wp--preset--spacing--40);
	margin-top: var(--wp--preset--spacing--40) !important;
}'
			),
			'template-sidebar' 	=> array( esc_html__('Site Sidebar', 'flat-blocks'),
				array( 'template-part' ),
				'inline_style' 	=> '
.is-style-template-sidebar {
	background-color: var(--wp--preset--color--neutral);
	color: var(--wp--preset--color--dark);
	border: 1px solid var(--wp--custom--border--color);
	border-radius: var(--wp--custom--border--radius);
	padding: 0 var(--wp--preset--spacing--40);
}'
			),
		);

		return $theme_styles ? $theme_styles + $compat_styles : $compat_styles;	
	}
endif;


/*
 * Unregister block variations with javascript
 */

/* 
if ( ! function_exists( 'flatblocks_block_variations' ) ) :

	add_action( 'enqueue_block_editor_assets', 'flatblocks_block_variations' );

	function flatblocks_block_variations() {
		wp_enqueue_script(
			'flatblocks-block-variations',
			get_theme_file_uri( 'assets/js/block-variations.js' ),
			array( 
				'wp-blocks', 
				'wp-dom-ready',
				'wp-i18n',
				'wp-edit-post' // only needed if unregistering blocks
			),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}
endif;
 */

/* 
 * Hide our site template parts from the inserter. This still allows users to change
 * the style variation in the Styles Editor, but they can't add the style to blocks.
 */
/* 
///////if ( version_compare( get_bloginfo( 'version' ), '6.6', '>=' ) ) :

	add_filter( 'block_type_metadata', 'flatblocks_block_variations', 20 ); 
	 
	function flatblocks_block_variations( $metadata ) {
	
		//if ( ! isset( $metadata['name'] ) || 'core/group' !== $metadata['name'] ) {
		if ( ! isset( $metadata['name'] ) || 'core/template-part' !== $metadata['name'] ) {
				return $metadata;
		}
		
		//$metadata['supports']['color'] = true;
		$metadata['supports']['color']['gradient'] = true;		
		//$metadata['supports']['spacing'] = true;
		$metadata['supports']['spacing']['margin'] = true;
		$metadata['supports']['spacing']['padding'] = true;
		$metadata['supports']['spacing']['blockGap'] = true;
		$metadata['supports']['postion'] = true;
		$metadata['supports']['shadow'] = true;
		$metadata['supports']['typography'] = true;
		//$metadata['supports']['typography']['fontSize'] = true;
		//$metadata['supports']['typography']['lineHeight'] = true;
		//$metadata['supports']['typography']['textAlign'] = true;

		//$metadata['supports']['inserter'] = false; //TEST
		//var_dump($metadata['styles'], $metadata['variations']); //TEST
		
		// Check if 'supports' key exists.
		//if ( isset( $metadata['styles'] ) ) {

// 			$disable_styles = array(
// 				'template-header',
// 				'template-title',
// 				'template-aside',
// 				'template-footer',
// 				'template-footer-alt'
// 			);
// 
// 			// Disable the inserter for these styles			
// 			foreach ( $disable_styles as $style ) {
// 				//if ( isset( $metadata['styles'][$style] ) ) {
// 					$metadata['styles'][$style]['supports']['inserter'] = false;
// 				//}
// 			}
		//}
				
		return $metadata;
	}
///////endif;
 */
