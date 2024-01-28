<?php
/**
 * File:	pro-animation.php
 * Theme:	Flat Blocks PRO
 * 
 * Handles the animation and visibility for the PRO version of Flat Blocks
 * 
 * Loads animation and visibility CSS, JS, and custom block styles
 * 
 * @package flat-blocks-pro
 * @since	1.0
 */

/**
 * Enqueue animation front-end styles and scripts.
 */
add_action( 'wp_enqueue_scripts', 'flatblocks_pro_animation_styles' );	
//add_action( 'enqueue_block_assets', 'flatblocks_pro_animation_styles' );

if ( ! function_exists( 'flatblocks_pro_animation_styles' ) ) :

	function flatblocks_pro_animation_styles() {

		// Get version for caching
		$theme_version = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;

		// Load animation CSS styles
		wp_enqueue_style( 
			'flatblocks-pro-animation-styles', 
			get_template_directory_uri() . '/pro/css/pro-animation.css', 
			array('flatblocks-base'),
			$version_string
		);

		// Load animation javascript, but only on front-end
		if ( !is_admin() ) {
			wp_enqueue_script( 
				'flatblocks-pro-animation', 
				get_template_directory_uri() . '/pro/js/pro-animation.js', 
				array('jquery'), 
				$version_string, 
				true 
			);
		}
				
	} //end function
endif;	

/**
 * Enqueue animation editor styles and scripts.
 */
add_action( 'admin_init', 'flatblocks_pro_animation_editor_styles' );

if ( ! function_exists( 'flatblocks_pro_animation_editor_styles' ) ) :

	function flatblocks_pro_animation_editor_styles() {

		// Load animation CSS into the editor
		add_editor_style(
			'/pro/css/pro-animation.css'
		);
		
		// Load animation javascript
		/*wp_enqueue_script( 
			'flatblocks-animation', 
			get_template_directory_uri() . '/pro/js/pro-animation.js', 
			array('jquery'), 
			$version_string, 
			true 
		);*/

	} //end function
endif;

/**
 * Register animation block styles.
 */
add_filter( 'flatblocks_custom_block_styles', 'flatblocks_pro_register_animation_block_styles' );
 
if ( ! function_exists( 'flatblocks_pro_register_animation_block_styles' ) ) :

	function flatblocks_pro_register_animation_block_styles( $theme_styles = array() ) {
	
		/* Define all blocks we want to allow for certain animations */
		$all_blocks = array(
			'group', 'columns', 'column', 'cover', 'gallery', 'image',
			'buttons', 'button', 'latest-posts', 'heading', 'paragraph', 'list', 
			'quote', 'pullquote', 'site-title', 'site-tagline', 'post-excerpt'
		);

		/* 
		 * Define animations and what blocks they apply to. Note that the prefix 
		 * 'is-style-' will be added to the names.
		 */
		$animation_styles = array(
			'show-on-mobile'	=> array( esc_html__('Show on Mobile', 'flat-blocks'), 
				array( 'group', 'image', 'navigation-item', 'navigation-link' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'
			),
			'hide-on-tablet' 	=> array( esc_html__('Hide on Tablet', 'flat-blocks'), 
				array( 'group', 'image', 'navigation-item', 'navigation-link' ),
				'style_handle' => 'flatblocks-pro-custom-styles'
			),
			'show-on-tablet'	=> array( esc_html__('Show on Tablet', 'flat-blocks'), 
				array( 'group', 'image', 'navigation-item', 'navigation-link' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'
			),
			'hide-on-desktop' 	=> array( esc_html__('Hide on Desktop', 'flat-blocks'), 
				array( 'group', 'image', 'navigation-item', 'navigation-link' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'
			),
			'show-on-desktop'	=> array( esc_html__('Show on Desktop', 'flat-blocks'), 
				array( 'group', 'image', 'navigation-item', 'navigation-link' ),
				'style_handle' 	=> 'flatblocks-pro-custom-styles'
			),		
			'animated-scroll-auto-animate' 	=> array( esc_html__('Auto Animate', 'flat-blocks'), 
				array('group', 'columns', 'cover', 'buttons', 'latest-posts' ),
				'style_handle' => 'flatblocks-pro-animation-styles'
			),
			'animated-auto-hover'			=> array( esc_html__('Auto Hover', 'flat-blocks'), 
				array('group', 'columns', 'cover' ),
				'style_handle' => 'flatblocks-pro-animation-styles'
			),
			'animated-hover-grow'			=> array( esc_html__('Hover Grow', 'flat-blocks'), 
				array('buttons', 'button'),
				'style_handle' => 'flatblocks-pro-animation-styles'
			),
			'animated-hover-slideUp'			=> array( esc_html__('Hover Slide Up', 'flat-blocks'), 
				array('group', 'buttons', 'button'),
				'style_handle' => 'flatblocks-pro-animation-styles'
			),
			'animated-hover-zoom'			=> array( esc_html__('Hover Zoom', 'flat-blocks'), 
				array('gallery', 'cover', 'image'),
				'style_handle' => 'flatblocks-pro-animation-styles'
			),
			'animated-scroll-auto-fade'		=> array( esc_html__('Auto Fade', 'flat-blocks'), 
				array('group', 'columns', 'cover' ),
				'style_handle' => 'flatblocks-pro-animation-styles'
			),
			'animated-scroll-fadeInUp'		=> array( esc_html__('Fade Up', 'flat-blocks'), 
				$all_blocks,
				'style_handle' => 'flatblocks-pro-animation-styles'
			),
			'animated-scroll-fadeInLeft'		=> array( esc_html__('Fade Left', 'flat-blocks'),
				$all_blocks,
				'style_handle' => 'flatblocks-pro-animation-styles'
			),
			'animated-scroll-fadeInRight'	=> array( esc_html__('Fade Right', 'flat-blocks'),
				$all_blocks,
				'style_handle' => 'flatblocks-pro-animation-styles'
			)
		);
		
		//return array_merge( $theme_styles, $animation_styles );
		//return $theme_styles + $animation_styles;
		return $theme_styles ? $theme_styles + $animation_styles : $animation_styles;

	} //end function
endif;

