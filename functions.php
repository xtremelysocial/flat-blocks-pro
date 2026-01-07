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

		// Don't load these by default because this theme handles them in theme.json.
		// https://github.com/WordPress/gutenberg/blob/trunk/packages/block-library/src/theme.scss
		if ( apply_filters( 'flatblocks_additional_core_styles', false ) ) {		
			add_theme_support( 'wp-block-styles' );
		}

		// This sets the standard post thumbnail image size for the blog.
		// It is cropped with 16:9 aspect ratio.
		set_post_thumbnail_size( 1100, 619, array( 'left', 'top' ) );
				
		// Also add this as a selectable size in the Block Editor
		add_image_size( 'cropped-large', 1100, 619, array( 'left', 'top' ) );

		// And add a smaller size for recent posts in columns
		add_image_size( 'cropped-thumbnail', 760, 428, array( 'left', 'top' ) );
		
		// Enqueue the styles needed for the editor. This is done here instead of 
		// with enqueue_block_assets() so that the styles don't interfere with the 
		// Editor UI itself. Note that the RTL styles will automatically be used
		// when needed.
		$editor_styles = array(
			'/assets/css/flat-blocks.css',
			'/assets/css/blocks/block-styles.css',
			'/assets/css/editor-styles.css',
// 			get_template_directory_uri() . '/style.css' //XS
		);

		// Allow child themes to override the list of editor styles to load
		apply_filters( 'flatblocks_editor_styles', $editor_styles );

		// Load the editor styles
		add_editor_style( $editor_styles ); 

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
		if ( apply_filters( 'flatblocks_allow_page_excerpts', true ) ) {
			add_post_type_support( 'page', 'excerpt' );		
		}
	}
endif;

/**
 * Load the themes PHP include files, such as block bindings and block patterns
 */
 
// Build array of include files relative to theme root
$includes = array (
	'/inc/block-patterns.php',
// 	'/pro/flat-blocks-pro.php', //PRO
);

// Allow child themes to override the list of PHP files to load
$includes = apply_filters( 'flatblocks_load_includes', $includes );

// Load each of the include files
foreach ( $includes as $include ) {
	if ( file_exists( get_template_directory() . $include ) ) {
		include_once get_template_directory() . $include;
	}
}

/* 
 * By default, WordPress loads separate stylesheets for CORE blocks, instead of a 
 * combined wp-block-library stylesheet. Uncomment the following line to have it load 
 * CORE blocks in a single file.
 */
// add_filter( 'should_load_separate_core_block_assets', '__return_false', 11 );

/* 
 * By default, WordPress loads block scripts and stylesheets on demand ONLY if the 
 * blocks are included in the page. Uncomment the following line to have it load all 
 * assets regardless.
 */
// add_filter( 'should_load_block_assets_on_demand', '__return_false' );

/* 
 * This THEME also loads individual block CSS by default. Uncomment the following 
 * line to have it load the single combined /assets/css/blocks/block-styles.css file.
 */
// add_filter( 'flatblocks_load_separate_block_assets', '__return_false' );

/*
 * Load the core theme CSS files on the front-end and then load block styles either 
 * individually or combined.
 */
// add_action( 'enqueue_block_assets', 'flatblocks_load_styles' );
add_action( 'wp_enqueue_scripts', 'flatblocks_load_styles' );

if ( apply_filters( 'flatblocks_load_separate_block_assets', true ) ) {
	add_action( 'init', 'flatblocks_load_block_styles' ); 
} else {
// 	add_action( 'enqueue_block_assets', 'flatblocks_load_combined_block_styles' );
	add_action( 'wp_enqueue_scripts', 'flatblocks_load_combined_block_styles' );
}

if ( ! function_exists( 'flatblocks_load_styles' ) ) :

	function flatblocks_load_styles() {

		// Build array of CSS styles to load. Include the local path.
		$styles = array (
			get_template_directory() . '/assets/css/flat-blocks.css',
// 			get_template_directory() . '/style.css', //XS
		);

		// If child theme, load it's stylesheet
		if ( is_child_theme() ) {
			$styles[] = get_stylesheet_directory() . '/style.css';
		}

		// Allow child themes to override the list of CSS files to load
		$includes = apply_filters( 'flatblocks_load_styles', $styles );

		// Load each of the CSS styles
		foreach ( $styles as $style ) {
			flatblocks_enqueue_style( $style );
		}

		// On front-end only, load smooth scrolling javascript
		if ( ! is_admin()
			AND file_exists( get_template_directory() . '/assets/js/smoothscroll.js' ) ) {

			$theme_version = wp_get_theme()->get( 'Version' ) ?? false;			
			wp_enqueue_script( 
				'flatblocks-smoothscroll', 
				get_template_directory_uri() . '/assets/js/smoothscroll.js', 
				array('jquery'), 
				$theme_version, 
				$in_footer = true 
			);
		}
	} 
endif;

/**
 * Load COMBINED Block CSS styles if NOT flatblocks_load_separate_block_assets.
 */
if ( ! function_exists( 'flatblocks_load_combined_block_styles' ) ) :

	function flatblocks_load_combined_block_styles() {
		flatblocks_enqueue_style( 
			get_template_directory() . '/assets/css/blocks/block-styles.css'
		);
	}
endif;

/**
 * Load INDIVIDUAL Block CSS styles if flatblocks_load_separate_block_assets.
 */
if ( ! function_exists( 'flatblocks_load_block_styles' ) ) :

	function flatblocks_load_block_styles() {

		// Setup block styles path
		$block_path = '/assets/css/blocks/';

		// Get Block CSS build version from the combined block style asset
		if ( file_exists ( get_template_directory() . $block_path. 'block-styles.asset.php' ) ) {
			$asset_file = include( get_template_directory() . $block_path . 'block-styles.asset.php' );
			$block_css_version = $asset_file['version'] ?? false;
		} else {
			$block_css_version = wp_get_theme()->get( 'Version' ) ?? false;
		}

		// Load the styles for the individual blocks
		$block_styles = glob( get_theme_file_path($block_path) . '*.css' ); 
		foreach ( $block_styles as $block_name ) {

			// Remove the path and .css extension from the name
			$block_name = str_replace( array(get_theme_file_path($block_path), '.css'), '', $block_name );

			// Skip the RTL versions and instead add them as a replacement
			if ( strpos( $block_name, '-rtl' ) === false) {

				// Load the block style. WordPress will decide whether to enqueue or 
				// inline the style. Add RTL language support too.
				wp_enqueue_block_style( "core/$block_name", array(
					'handle' => "flatblocks-block-$block_name",
					'src'    => get_theme_file_uri( $block_path . "$block_name.css" ),
					'path'   => get_theme_file_path( $block_path . "$block_name.css" ),
					'deps'	 => array( 'flat-blocks' ), 
					'ver'	 => $block_css_version
				) );
				wp_style_add_data( "flatblocks-block-$block_name", 'rtl', 'replace' );
			}			
		}
	}
endif;

/**
 * If flatblocks_always_load_dashicons is true, then they will always be loaded. If not,
 * they will be conditionally loaded if used on the page or post. 
 * 
 * Note that enqueue_block_assets is needed for them to be included in the Editor.
 */
// add_filter( 'flatblocks_always_load_dashicons', '__return_true' );
 
if ( apply_filters( 'flatblocks_always_load_dashicons', false ) 
	OR is_admin() ) {
	add_action( 'enqueue_block_assets', 'flatblocks_load_dashicons' );
} else {
	add_filter( 'render_block', 'flatblocks_dashicons_in_use', 10, 2 );
}

/* 
 * Load core WordPress Dashicons and our Dashicons CSS
 */
if ( ! function_exists( 'flatblocks_load_dashicons' ) ) :
	function flatblocks_load_dashicons() {	
	
		//Load core WordPress Dashicons
		wp_enqueue_style( 'dashicons' );

		// Load our Dashicons styles
		flatblocks_enqueue_style ( 
			get_template_directory() . '/assets/css/dashicons-styles.css' 
		);
	}
endif;

/*
 * Load Dashicons ONLY if used on the page
 */ 
if ( ! function_exists( 'flatblocks_dashicons_in_use' ) ) :

	function flatblocks_dashicons_in_use( $block_content = '', $block = [] ) {	

		if ( preg_match( '/(class=\")(.*?)dashicons-(.*?)\"/', $block_content, $matches) ) {
			flatblocks_load_dashicons();
		}	
		return $block_content;
	}
endif;

/**
 * Additional Filters
 */

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
 * #page and #wrapper anchors for scroll-to-top. We use #page and WordPress.org
 * theme preview uses #wrapper.
 */
add_action( 'wp_body_open', 'flatblocks_body_open' );

if ( ! function_exists( 'flatblocks_body_open' ) ) :
	function flatblocks_body_open() { 
		echo '<a id="page"></a><a id="wrapper"></a>'; 
	}
endif;

/**
 * Since this is a Block-based Theme, remove the old Menus and Widgets admin page links
 */
add_action( 'admin_menu', 'flatblocks_adjust_admin_menu', 999 );

if ( ! function_exists( 'flatblocks_adjust_admin_menu' ) ) :
	function flatblocks_adjust_admin_menu() {
		remove_submenu_page( 'themes.php', 'nav-menus.php' );
		remove_submenu_page( 'themes.php', 'widgets.php' );
	}
endif;

/* 
 * Utility function to enqueue CSS styles
 */
if ( ! function_exists('flatblocks_enqueue_style') ) :

	function flatblocks_enqueue_style( $style ) {

		// Get the CSS build version or use the theme version
		$version = wp_get_theme()->get( 'Version' ) ?? false;
		$asset = str_replace( '.css', '.asset.php', $style );

		if ( file_exists ( $asset ) ) {
			$asset_file = include( $asset );
			if ( $asset_file['version'] ) {
				$version = $asset_file['version'];
			}
		}

		// Get the URI for the style which is needed to enqueue it
		$uri = str_replace( 
			array( get_template_directory(), get_stylesheet_directory() ),
			array( get_template_directory_uri(), get_stylesheet_directory_uri() ), 
			$style 
		);
		
		// Build the style handle from the file name
		$handle = str_replace( 
			array ( get_template_directory(), get_stylesheet_directory(), '/assets/css/', 'blocks/', '.css' ), 
			'', 
			$style 
		);
		
		// Set the dependencies which will all be tied to the base style
		$deps = $handle == 'flat-blocks' ? '' : 'flat-blocks';
		
		// Enqueue the style with the version
		if ( file_exists( $style ) ) {
			wp_enqueue_style( 
				$handle, 
				$uri, 
				$deps, 
				$version
			);

			// Add the RTL version
			$rtl = str_replace( '.css', '-rtl.css', $style );
			if ( file_exists( $rtl ) ) {
				wp_style_add_data( $handle, 'rtl', 'replace' );
			}
		}
	} 
endif;
 