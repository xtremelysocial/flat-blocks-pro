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
 * Enqueue custom block styles.
 */
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

/**
 * Enqueue additional editor scripts.
 */
add_action( 'admin_init', 'flatblocks_pro_editor_styles' );

if ( ! function_exists( 'flatblocks_pro_editor_styles' ) ) :

	function flatblocks_pro_editor_styles() {

		// Load Flat Blocks PRO CSS styles
		add_editor_style(
			'/pro/assets/css/pro-custom-styles.css'
		);

	}
endif;

/**
 * Register custom block styles.
 */
add_filter( 'flatblocks_custom_block_styles', 'flatblocks_pro_register_block_styles' );
 
if ( ! function_exists( 'flatblocks_pro_register_block_styles' ) ) :

	function flatblocks_pro_register_block_styles( $theme_styles ) {

		/* 
		 * Define custom styles and what blocks they apply to. 
		 * 
		 * Note that the prefix 'is-style-' will automatically be added to the names.
		 */
		$pro_styles = array(
			'scroll-header' 		=> array( esc_html__('Scroll Header', 'flat-blocks'),
				array( 'group' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'
			),
			'drop-shadow' 		=> array( esc_html__('Drop Shadow', 'flat-blocks'), 
				array( 'post-template', 'group' ),
				'style_handle'	=> 'flatblocks-pro-custom-styles'
			),
			'alternate-colors' 		=> array( esc_html__('Alternate Colors', 'flat-blocks'),
				array( 'post-template' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'
			),
			'separator' 		=> array( esc_html__('Separator', 'flat-blocks'), 
				array( 'heading' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'
			),
			'button-alt' 		=> array( esc_html__('Alt Style', 'flat-blocks'), 
				array( 'button' ),
				'style_handle'	=> 'flatblocks-pro-custom-styles'
			),
			'button-outline-alt' => array( esc_html__('Alt Outline Style', 'flat-blocks'), 
				array( 'button' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'
			),
			'button-alt-2' 		=> array( esc_html__('Alt 2 Style', 'flat-blocks'), 
				array( 'button' ),
				'style_handle'	=> 'flatblocks-pro-custom-styles'
			),
			'button-outline-alt-2' => array( esc_html__('Alt 2 Outline Style', 'flat-blocks'), 
				array( 'button' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'
			),
			'nav-dividers' 		=> array( esc_html__('Dividers', 'flat-blocks'), 
				array('navigation' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'				
			),
			'arrow-up-icon' 	=> array( esc_html__('Arrow Up Icon', 'flat-blocks'), 
				array('navigation-link' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'				
			),
			'list-dividers' 		=> array( esc_html__('Dividers', 'flat-blocks'), 
				array('list', 'page-list', 'categories', 'latest-posts', 'latest-comments' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'				
			),
			'no-auto-icon' 		=> array( esc_html__('No Icon', 'flat-blocks'), 
				array( 'paragraph' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'
			),
			'table-colored' 	=> array( esc_html__('Colored', 'flat-blocks'), 
				array( 'table' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'
			),
			'table-alternate'	=> array( esc_html__('Alternate Colors', 'flat-blocks'), 
				array( 'table' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'
			),
/* 
			'equal-grid' 		=> array( esc_html__('Equal Grid', 'flat-blocks'), 
				array( 'group' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'
			),
			'equal-flex' 		=> array( esc_html__('Equal Flex', 'flat-blocks'), 
				array( 'group' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'
			),
 */
// 			'equal-cells' 		=> array( esc_html__('Equal Cells', 'flat-blocks'), 
// 				array( 'group' ),
// 				'style_handle' 	=> 'flatblocks-pro-custom-styles'
// 			),
// 			'angled-top-up' 	=> array( esc_html__('Angled Top Up', 'flat-blocks'),
// 				array( 'group', 'cover', 'image' ),
// 				'style_handle' 	=> 'flatblocks-pro-custom-styles'
// 			),
// 			'angled-top-down' 	=> array( esc_html__('Angled Top Down', 'flat-blocks'),
// 				array( 'group', 'cover', 'image' ),
// 				'style_handle' 	=> 'flatblocks-pro-custom-styles'
// 			),
// 			'angled-bottom-up' 	=> array( esc_html__('Angled Bottom Up', 'flat-blocks'),
// 				array( 'group', 'cover', 'image' ),
// 				'style_handle' 	=> 'flatblocks-pro-custom-styles'
// 			),
// 			'angled-bottom-down' 	=> array( esc_html__('Angled Botto Down', 'flat-blocks'),
// 				array( 'group', 'cover', 'image' ),
// 				'style_handle' 	=> 'flatblocks-pro-custom-styles'
// 			),
// 			'angled-top-up-bottom-up' 	=> array( esc_html__('Angled Top Up Bottom Up', 'flat-blocks'),
// 				array( 'group', 'cover', 'image' ),
// 				'style_handle' 	=> 'flatblocks-pro-custom-styles'
// 			),
// 			'angled-top-up-bottom-down' 	=> array( esc_html__('Angled Top Up Bottom Down', 'flat-blocks'),
// 				array( 'group', 'cover', 'image' ),
// 				'style_handle' 	=> 'flatblocks-pro-custom-styles'
// 			),
// 			'angled-top-down-bottom-up' 	=> array( esc_html__('Angled Top Down Bottom Up', 'flat-blocks'),
// 				array( 'group', 'cover', 'image' ),
// 				'style_handle' 	=> 'flatblocks-pro-custom-styles'
// 			),
// 			'angled-top-down-bottom-down' 	=> array( esc_html__('Angled Top Down Bottom Down', 'flat-blocks'),
// 				array( 'group', 'cover', 'image' ),
// 				'style_handle' 	=> 'flatblocks-pro-custom-styles'
// 			),
// 			/*'curved-top-up' 	=> array( esc_html__('Curved Top Up', 'flat-blocks'),
// 				array( 'group', 'cover', 'image' ),
// 				'style_handle' 	=> 'flatblocks-pro-custom-styles'
// 			),*/
// 			'curved-top-down' 	=> array( esc_html__('Curved Top Down', 'flat-blocks'),
// 				array( 'group', 'cover', 'image' ),
// 				'style_handle' 	=> 'flatblocks-pro-custom-styles'
// 			),
// 			'curved-bottom-up' 	=> array( esc_html__('Curved Bottom Up', 'flat-blocks'),
// 				array( 'group', 'cover', 'image' ),
// 				'style_handle' 	=> 'flatblocks-pro-custom-styles'
// 			)
		);

		return $theme_styles ? $theme_styles + $pro_styles : $pro_styles;	
	}
endif;

