<?php
/**
 * File:	block-bindings.php
 * Theme:	Flat Blocks
 * 
 * Register various block bindings, such as Current Year, Theme Name, and Theme Author
 * for use in the Editor.
 * 
 * @package flat-blocks
 * @since	1.9.4
 */

/**
 * Register the block bindings
 */

add_action( 'init', 'flatblocks_register_block_bindings' );

function flatblocks_register_block_bindings() {

	// Current Year
	register_block_bindings_source( 'flat-blocks/current-year', array(
		'label'              => __( 'CurrentYear', 'flat-blocks' ),
		'get_value_callback' => 'flatblocks_current_year_binding'
	) );
	
	// Theme Name
	register_block_bindings_source( 'flat-blocks/theme-name', array(
		'label'              => __( 'ThemeName', 'flat-blocks' ),
		'get_value_callback' => 'flatblocks_theme_name_binding'
	) );
	
	// Theme Author
	register_block_bindings_source( 'flat-blocks/theme-author', array(
		'label'              => __( 'ThemeAuthor', 'flat-blocks' ),
		'get_value_callback' => 'flatblocks_theme_author_binding'
	) );
	
}

/* Current Year binding source */
function flatblocks_current_year_binding() {
	return date( 'Y' );
}

/* Theme Name binding source */
function flatblocks_theme_name_binding() {
	$theme = wp_get_theme();
	return sprintf( 
		'<a href="%s" target="_blank">%s</a>',
		$theme->get( 'ThemeURI' ) ?? 'https://xtremelysocial.com/wordpress/flat-blocks',
		$theme->get( 'Name' ) ?? 'Flat Blocks'
	);
}

/* Theme Author binding source */
function flatblocks_theme_author_binding() {
	$theme = wp_get_theme();
	return sprintf( 
		'<a href="%s" target="_blank">%s</a>',
		$theme->get( 'AuthorURI' ) ?? 'https://xtremelysocial.com/',
		$theme->get( 'Author' ) ?? 'XtremelySocial'
	);
}
