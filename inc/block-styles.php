<?php
/**
 * File:	block-styles.php
 * Theme:	Flat Blocks
 * 
 * Adds all of our custom styles for selection in the Block Editor
 * 
 * Note the corresponding CSS is in /assets/css/custom-styles.css and 
 * /assets/styles/custom-fixedheader.css
 * 
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 * 
 * @package flat-blocks
 * @since	1.0
 */

if ( ! function_exists( 'flatblocks_register_block_styles' ) ) :

	function flatblocks_register_block_styles() {

		/* 
		 * Define custom styles and what blocks they apply to. Note that the prefix 
		 * 'is-style-' will automatically be added to the names.
		 */
		$custom_styles = array(
			'fixed-menu' 		=> array( esc_html__('Fixed Menu', 'flat-blocks'), 
				array('navigation' )
			),
// 			'fixed-header' 		=> array( esc_html__('Fixed Header', 'flat-blocks'), 
// 				array('group' )
// 			),
// 			'button-alt' => array( esc_html__('Button Alt', 'flat-blocks'), 
// 				array('button' )
// 			),
// 			'button-outline-alt' => array( esc_html__('Outline Alt', 'flat-blocks'), 
// 				array('button' )
// 			),
// 			'button-alt-2' => array( esc_html__('Button Alt 2', 'flat-blocks'), 
// 				array('button' )
// 			),
// 			'button-outline-alt-2' => array( esc_html__('Outline Alt 2', 'flat-blocks'), 
// 				array('button' )
// 			),
// 			'cover-border' 		=> array( esc_html__('Border', 'flat-blocks'), 
// 				array('cover' )
// 			),
// 			'cover-rounded-corners' => array( esc_html__('Rounded Corners', 'flat-blocks'), 
// 				array('cover' )
// 			),
// 			'media-text-border' => array( esc_html__('Border', 'flat-blocks'), 
// 				array('media-text' )
// 			),
// 			'media-text-thick-border' => array( esc_html__('Thick Border', 'flat-blocks'), 
// 				array('media-text' )
// 			),
			'image-border' 		=> array( esc_html__('Border', 'flat-blocks'), 
				array('image' )
			),
			'image-round-border' => array( esc_html__('Rounded w/Border', 'flat-blocks'), 
				array('image' )
			),
			'image-border' 		=> array( esc_html__('Image Border', 'flat-blocks'), 
				array( 'gallery' )
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
			'thick' 			=> array( esc_html__('Thick', 'flat-blocks'), 
				array('separator' )
			),
			'thick-wide' 		=> array( esc_html__('Thick Wide', 'flat-blocks'), 
				array('separator' )
			),
			'bullets' 			=> array( esc_html__('Bullets', 'flat-blocks'), 
				array('latest-posts', 'latest-comments' )
			),
			'no-padding' 		=> array( esc_html__('No Padding', 'flat-blocks'), 
				array('group', 'column' )
			),
// 			'rounded-border' 	=> array( esc_html__('Border', 'flat-blocks'), 
// 				array('group', 'columns', 'column', 'comments', 'post-comments' )
// 			),
// 			'thick-rounded-border' => array( esc_html__('Thick Border', 'flat-blocks'), 
// 				array('group', 'columns', 'column', 'comments', 'post-comments' )
// 			),
			'no-gap' 			=> array( esc_html__('No Gap', 'flat-blocks'), 
				array('columns' )
			),
			'thick-gap' 		=> array( esc_html__('Thick Gap', 'flat-blocks'), 
				array('columns' )
			),
			'center-on-mobile' 	=> array( esc_html__('Center on Mobile', 'flat-blocks'), 
				array('columns' )
			),
			'no-read-more' 		=> array( esc_html__('No Read More', 'flat-blocks'), 
				array('post-excerpt' )
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
			'no-icon' 			=> array( esc_html__('No Icon', 'flat-blocks'), 
				array('post-author', 'post-date', 'post-terms' )
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
			)
		);
		
		/* Apply filter to the custom styles list so child themes can override */
		$custom_styles = apply_filters( 'flatblocks_custom_block_styles', $custom_styles );
		
		/* 
		 * Loop through each style and create the custom style for each of its blocks.
		 * 
		 * TO-DO: Once minimum WordPress version is 6.6, the array of blocks can be sent
		 * to register_block_style instead of looping through each block.
		 */
		//foreach ( $custom_styles as $custom_style => [$label, $blocks, $style_handle_or_inline] ) {
		foreach ( $custom_styles as $custom_style => $properties ) {
			$label = $properties[0] ?? ucwords( str_ireplace( '-', ' ', $custom_style ) );
			$blocks = ( isset($properties[1]) and is_array($properties[1]) ) ? $properties[1] : array();

			// Loop through each block and register the custom style
			foreach ( $blocks as $block ) {
							
				// If no slug, then use core/
				if ( stripos( $block, '/' ) === false ) $block = 'core/' . $block;
				
				register_block_style(
					$block,
					array(
						'name'  => $custom_style,
						'label' => $label,
						'inline_style' => $properties['inline_style'] ?? '',
						'style_handle' => $properties['style_handle'] ?? ''
					)
				);
			} //end foreach $custom_styles
		} //end foreach $blocks
		
	}
endif;
add_action( 'init', 'flatblocks_register_block_styles' );

/* 
 * Add block attributes for color, typography, spacing, etc. back for Template Parts.
 * This allows users to change these in the Settings UI!
 */
///////if ( version_compare( get_bloginfo( 'version' ), '6.6', '>=' ) ) :
/* 
if ( ! function_exists( 'flatblocks_block_variations' ) ) :

	add_filter( 'block_type_metadata', 'flatblocks_block_variations', 20 ); 
	 
	function flatblocks_block_variations( $metadata ) {
	
		//if ( ! isset( $metadata['name'] ) || 'core/group' !== $metadata['name'] ) {
		if ( ! isset( $metadata['name'] ) || 'core/template-part' !== $metadata['name'] ) {
				return $metadata;
		}

		// Allow colors		
		$metadata['supports']['color'] = [
			'background' => true,
			'text' => true,
			'gradients' => true,
			'heading' => true,
			'button' => true
		];

		// Allow Spacing		
		$metadata['supports']['spacing'] = [
			'margin' => true,
			'padding' => true,
			'blockGap' => true
		];

		// Allow typography
		//$metadata['supports']['typography'] = true;
		$metadata['supports']['typography']['fontSize'] = true;
		//$metadata['supports']['typography']['lineHeight'] = true;
		//$metadata['supports']['typography']['textAlign'] = true;

		// Allow other properties
		$metadata['supports']['align'] = true;
		$metadata['supports']['postion'] = true;
		$metadata['supports']['shadow'] = true;
				
		return $metadata;
	}
endif;
 */
