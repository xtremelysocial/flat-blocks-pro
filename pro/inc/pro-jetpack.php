<?php
/**
 * File:		pro-jetpack.php
 * Theme:		Flat Blocks PRO
 * 
 * Handles the Jetpack plugin styling for the PRO version of Flat Blocks
 * 
 * @package 	flat-blocks-pro
 */

/* 
add_filter( "taxonomy_template", 'load_our_custom_tax_template');
function load_our_custom_tax_template ($tax_template) {
	echo 'tax_template=' . $tax_template; //TEST
//   if (is_tax('jetpack-portfolio')) {
//     $tax_template = dirname(  __FILE__  ) . '/templates/archive-jetpack-portfolio.html';
//   }
  return $tax_template;
}
 */

/* 
add_filter( 'archive_template', 'get_custom_post_type_template' );

function get_custom_post_type_template( $archive_template ) {

	//echo 'archive_template=' . $archive_template; //TEST

    //global $post;

	global $_wp_current_template_id; //, $_wp_current_template_content, $wp_embed, $wp_query;

	echo 'template_id=' . $_wp_current_template_id; //TEST

//      if ( is_post_type_archive ( 'jetpack-portfolio' ) ) {
//           $archive_template = dirname( __FILE__ ) . '/archive-jetpack-portfolio.html';
//      }
     return $archive_template;
}
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
				array( 'flatblocks-base' ), 
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
add_filter( 'flatblocks_custom_block_styles', 'flatblocks_pro_register_jetpack_block_styles' );

if ( ! function_exists( 'flatblocks_pro_register_jetpack_block_styles' ) ) :

	function flatblocks_pro_register_jetpack_block_styles( $theme_styles ) {

		/* 
		 * Define custom styles and what blocks they apply to. Note that the prefix 
		 * 'is-style-' will automatically be added to the names.
		 */
		$jetpack_styles = array(
			'no-icon' 			=> array( esc_html__('No Icon', 'flat-blocks-pro'), 
				array( 'jetpack/contact-info', 'jetpack/email', 'jetpack/phone' ),
				'style_handle' 	=> 'flatblocks-pro-jetpack-styles'
			)
		);

		return $theme_styles ? $theme_styles + $jetpack_styles : $jetpack_styles;
		
	}
endif;
