<?php
/**
 * File:	functions.php
 * Theme:	Flat Blocks
 * 
 * Flat Blocks functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package flat-blocks
 * @since	1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
add_action( 'after_setup_theme', 'flatblocks_support' );

if ( ! function_exists( 'flatblocks_support' ) ) :

	function flatblocks_support() {

		// Add support for additional core block styles. e.g. Separator width, left 
		// border color on quotes, etc. See here for full list:
		// https://github.com/WordPress/gutenberg/blob/trunk/packages/block-library/src/theme.scss
		//
		// NOTE: As of WordPress v6.3, these are loaded AFTER the ones from theme.json so 
		// they are overriding this theme and the user's settings! Don't load these by
		// default, but allow child themes to override that.		
		if ( apply_filters( 'flatblocks_additional_core_styles', $addl_core_styles ?? false ) ) {		
			add_theme_support( 'wp-block-styles' );
		}

		// This sets the standard post thumbnail image size for the blog
		// It is cropped with 16:9 aspect ratio so that widths and heights are the same
		set_post_thumbnail_size( 1100, 619, array( 'left', 'top' ) );
				
		// Also add this as a selectable size in the Block Editor
		add_image_size( 'cropped-large', 1100, 619, array( 'left', 'top' ) );

		// And add a smaller size for recent posts in columns
		add_image_size( 'cropped-thumbnail', 760, 428, array( 'left', 'top' ) );
		
		// Enqueue only the editor styles for now. Additional ones will be loaded
		// later.
		add_editor_style( 
			array(
				'/assets/css/editor-styles.css'
			)
		);

		// Register four nav menus if Gutenberg is activated (otherwise the 
		// __experimentalMenuLocation attribute isn't available)
		if ( defined( 'IS_GUTENBERG_PLUGIN' ) && IS_GUTENBERG_PLUGIN ) {
			register_nav_menus( array(
				'header' 	=> __( 'Header Menu', 'flat-blocks' ),
				'footer' 	=> __( 'Footer Menu', 'flat-blocks' ),
				'footer-1' 	=> __( 'Footer Menu Alt 1', 'flat-blocks' ),
				'footer-2' 	=> __( 'Footer Menu Alt 2', 'flat-blocks' ),
				'footer-3' 	=> __( 'Footer Menu Alt 3', 'flat-blocks' )
			) );
		}

		// Allow excerpts on pages so users can control what shows in searches, etc.
		if ( apply_filters( 'flatblocks_allow_page_excerpts', $allow_page_excerpts ?? true ) ) {
			add_post_type_support( 'page', 'excerpt' );		
		}
		
	}
endif;

/* 
 * Tell WordPress to load only the block styles for blocks in use on a particular page
 */
add_filter( 'should_load_separate_core_block_assets', '__return_false' );
//add_filter( 'should_load_separate_core_block_assets', '__return_true' );

/* 
 * Tell the theme to load only the block styles for blocks in use 
 */
add_filter( 'flatblocks_should_load_separate_block_assets', '__return_false' );
//add_filter( 'flatblocks_should_load_separate_block_assets', '__return_true' );

/**
 * Enqueue FRONT-END ONLY and/or BACK-END styles and scripts depending on 
 * flatblocks_should_load_separate_block_assets.
 */
if ( apply_filters( 'flatblocks_should_load_separate_block_assets', $separate_theme_block_assets ?? false ) ) {
	add_action( 'enqueue_block_assets', 'flatblocks_front_end_styles' );
} else {
	add_action( 'wp_enqueue_scripts', 'flatblocks_front_end_styles' );
}

if ( ! function_exists( 'flatblocks_front_end_styles' ) ) :

	function flatblocks_front_end_styles() {

		// Get version for caching
		$theme_version = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;

		// Always load base theme style
		if ( file_exists( get_template_directory() . '/assets/css/flat-blocks.css' ) ) {
			wp_enqueue_style( 
				'flatblocks-base', 
				get_template_directory_uri() . '/assets/css/flat-blocks.css', 
				array(), 
				$version_string
			);
		}
				
		// If not loading separate block styles, then load combined block styles
		if ( ! apply_filters( 'flatblocks_should_load_separate_block_assets', $separate_theme_block_assets ?? false ) 
			and file_exists( get_template_directory() . '/assets/css/custom-styles.css' ) ) {

			wp_enqueue_style(
				'flatblocks-custom-styles',
				get_template_directory_uri() . '/assets/css/custom-styles.css',
				array('flatblocks-base'),
				$version_string
			);
		}
		
		// Load theme style
		// Note: Not needed because there is no CSS in it
		/*wp_enqueue_style( 
			'flatblocks-style', 
			get_template_directory_uri() . '/style.css', 
			array('flatblocks-base'),
			$version_string
		);*/
		
		// As a courtesy, add the child theme Custom Styles CSS if it exists
		if ( is_child_theme() && file_exists( get_stylesheet_directory() . '/assets/css/custom-styles.css' ) ) {
			wp_enqueue_style( 
				'flatblocks-child-custom-styles', 
				get_stylesheet_directory_uri() . '/assets/css/custom-styles.css', 
				//array('flatblocks-base', 'flatblocks-custom-styles'),
				array('flatblocks-base'),
				$version_string 
			);
		}

		// As a courtesy, add the child theme CSS if it exists
		if ( is_child_theme() && file_exists( get_stylesheet_directory() . '/style.css' ) ) {
			wp_enqueue_style( 
				'flatblocks-child-style', 
				get_stylesheet_directory_uri() . '/style.css', 
				//array('flatblocks-base', 'flatblocks-custom-styles'),
				array('flatblocks-base'),
				$version_string 
			);
		}

		// On front-end only, load smooth scrolling javascript
		if ( !is_admin()
			and file_exists( get_template_directory() . '/assets/js/smoothscroll.js' ) ) {

			wp_enqueue_script( 
				'flatblocks-smoothscroll', 
				get_template_directory_uri() . '/assets/js/smoothscroll.js', 
				array('jquery'), 
				$version_string, 
				$in_footer = true 
			);
		}
		
	} 
endif;

/**
 * Enqueue FRONT-END AND BACK-END styles and scripts
 * 
 * NOTE: These styles and scripts will be loaded into the font-end, but also into the 
 * Block Editor iFrame, which is necessary for certain styles, such as the built-in 
 * Dashicons.
 */
add_action( 'enqueue_block_assets', 'flatblocks_block_assets' );	

if ( ! function_exists( 'flatblocks_block_assets' ) ) :
	function flatblocks_block_assets() {	
		wp_enqueue_style( 'dashicons' );
	}
endif;

/**
 * Enqueue BACK-END ONLY styles and scripts IF NOT 
 * flatblocks_should_load_separate_block_assets.
 */
if (! apply_filters( 'flatblocks_should_load_separate_block_assets', $separate_theme_block_assets ?? false ) ) {
	add_action( 'admin_init', 'flatblocks_back_end_styles' );
}

if ( ! function_exists( 'flatblocks_back_end_styles' ) ) :

	function flatblocks_back_end_styles() {

		// Add the theme's base styles and custom block styles
		add_editor_style( 
			array(
				'/assets/css/flat-blocks.css',
				'/assets/css/custom-styles.css'
			)
		);

		// As a courtesy, add the child theme CSS files to the Block Editor too.
		if ( is_child_theme() ) {

			if ( file_exists( get_stylesheet_directory() . '/assets/css/custom-styles.css' ) ) {
				add_editor_style(
					get_stylesheet_directory_uri() . 'assets/css/custom-styles.css'
				);
			}

			if ( file_exists( get_stylesheet_directory() . '/style.css' ) ) {
				add_editor_style(
					get_stylesheet_directory_uri() . '/style.css'
				);
			}
		}
	}
endif;

/**
 * Load BLOCK-specific CSS styles on the FRONT-END AND BACK-END if
 * flatblocks_should_load_separate_block_assets.
 */
if ( apply_filters( 'flatblocks_should_load_separate_block_assets', $separate_theme_block_assets ?? false ) ) {
	/////add_action( 'wp_enqueue_scripts', 'flatblocks_load_block_styles' );
	add_action( 'init', 'flatblocks_load_block_styles' ); 
}

if ( ! function_exists( 'flatblocks_load_block_styles' ) ) :

	function flatblocks_load_block_styles() {

		// Get the theme version
		$theme_version = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;

		// Load the styles for the individual blocks
		$block_path = '/assets/css/blocks/';
		$block_styles = glob( get_theme_file_path($block_path) . '*.css' );
 
		foreach ( $block_styles as $block_name ) {

			// Remove the path and .css extension from the name
			$block_name = str_replace( array(get_theme_file_path($block_path), '.css'), '', $block_name );

			// Load the block style
			// Note: WordPress will decide whether to enqueue or inline the style
			wp_enqueue_block_style( "core/$block_name", array(
				'handle' => "flatblocks-block-$block_name",
				'src'    => get_theme_file_uri( $block_path . "$block_name.css" ),
				'path'   => get_theme_file_path( $block_path . "$block_name.css" ),
				'deps'	 => array( 'flatblocks-base' ), 
				'ver'	 => $version_string
			) );
			
		} // foreach		
	}
endif;

/**
 * Load custom block styles and block patterns (and PRO features if purchased)
 *
 */
// Add custom block styles
if ( file_exists( get_template_directory() . '/inc/block-styles.php' ) ) {
	require_once get_template_directory() . '/inc/block-styles.php';
}

// As a courtesy, add the child theme block styles if they exist.
if ( file_exists( get_stylesheet_directory() . '/inc/block-styles.php' ) ) {
	require_once get_stylesheet_directory() . '/inc/block-styles.php';
}

// Add block patterns
if ( file_exists( get_template_directory() . '/inc/block-patterns.php' ) ) {
	require_once get_template_directory() . '/inc/block-patterns.php';
}

// As a courtesy, add the child theme patterns if they exist. Note that child
// themes can alternately add .php files in the /patterns directory and they will
// automatically be loaded by WordPress.
if ( file_exists( get_stylesheet_directory() . '/inc/block-patterns.php' ) ) {
	require_once get_stylesheet_directory() . '/inc/block-patterns.php';
}

// Include Pro version features
if ( file_exists( get_template_directory() . '/pro/flat-blocks-pro.php' ) ) {
	require_once get_template_directory() . '/pro/flat-blocks-pro.php';
}

/**
 * Additional Filters
 */

/**
 * #page anchor for scroll-to-top
 * 
 * Add an anchor of #page for our scroll-to-top navigation item. This is needed
 * because there is currently no way to add an id to the wp-site-blocks wrapper and 
 * we need this to be the very first thing on the page.
 */
add_action( 'wp_body_open', 'flatblocks_body_open' );

if ( ! function_exists( 'flatblocks_body_open' ) ) :
	function flatblocks_body_open() { 
		echo '<a id="page"></a><a id="wrapper"></a>'; 
	}
endif;

/**
 * Define our custom template part AREAS
 */
add_filter( 'default_wp_template_part_areas', 'flatblocks_template_part_areas' );

if ( ! function_exists( 'flatblocks_template_part_areas' ) ) :
	function flatblocks_template_part_areas( array $areas ) {

		$new_areas = array( 
			array(
				'area'        => 'title',
				'area_tag'    => 'section',
				'label'       => __( 'Title', 'flat-blocks' ),
				'description' => __( 'Page and post titles plus home page content top', 'flat-blocks' ),
				'icon'        => ''
			),
			array(
				'area'        => 'query',
				'area_tag'    => 'section',
				'label'       => __( 'Query', 'flat-blocks' ),
				'description' => __( 'Site query template', 'flat-blocks' ),
				'icon'        => ''
			),
			array(
				'area'        => 'content',
				'area_tag'    => 'section',
				'label'       => __( 'Content', 'flat-blocks' ),
				'description' => __( 'Content section such as cover and post meta', 'flat-blocks' ),
				'icon'        => ''
			),
			array(
				'area'        => 'menu',
				'area_tag'    => 'section',
				'label'       => __( 'Menu', 'flat-blocks' ),
				'description' => __( 'Navigation Menus', 'flat-blocks' ),
				'icon'        => ''
			)
		);
		return array_merge( $areas, $new_areas );
		
	}
endif;

/**
 * Add our custom image size(s) to the list that user can pick in the editor.
 * Consider: Add Medium Large since it is standard WordPress and seems to be missing.
 */
add_filter( 'image_size_names_choose', 'flatblocks_image_sizes' );

if ( ! function_exists( 'flatblocks_image_sizes' ) ) :
	function flatblocks_image_sizes( $sizes ) {
		return array_merge( $sizes, array(
			//'medium-large' => __( 'Medium Large', 'flat-blocks' ),
			'cropped-thumbnail' => __( 'Post Thumbnail Medium (cropped)', 'flat-blocks' ),
			'cropped-large' => __( 'Post Thumbnail Large (cropped)', 'flat-blocks' )
		) );
	}
endif;

/**
 * Always replace [...] with ... from the excerpt
 */
add_filter( 'excerpt_more', 'flatblocks_excerpt_more' );

if ( ! function_exists( 'flatblocks_excerpt_more' ) ) :
	function flatblocks_excerpt_more( $more ) {
		return '&hellip;';
		//return str_ireplace( '[…]', '&hellip;', $more);
	}
endif;

/**
 * Excerpt in Page or Post Title
 *
 * On pages or single posts only, set excerpt length to 25 words. This is for when it is 
 * used in the Page Title and/or Post Title Template Parts. 
 * 
*/
add_filter('excerpt_length', 'flatblocks_excerpt_length');

if ( ! function_exists( 'flatblocks_excerpt_length' ) ) :
	function flatblocks_excerpt_length ( $words ) {
		return is_singular() ? apply_filters( 'flatblocks_short_excerpt_link', $short_words = 25 ) : $words;
	}
endif;
