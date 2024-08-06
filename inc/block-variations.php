<?php
/**
 * File:	block-variations.php
 * Theme:	Flat Blocks
 * 
 * Adds all of our custom styles for selection in the Block Editor
 * 
 * Note the corresponding CSS is in /assets/css/custom-variations.css and 
 * /assets/styles/custom-fixedheader.css
 * 
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 * 
 * @package flat-blocks
 * @since	1.6.2
 */

/* 
 * First setup our block variations array and allow child themes or plugins to
 * override them. This is run one time at WordPress init.
 */
// if ( ! function_exists( 'flatblocks_register_block_variations' ) ) :
// endif;
// add_action( 'init', 'flatblocks_register_block_variations' );

/* 
 * Then as each core block is registered, add our block variations from the array.
 */
if ( ! function_exists( 'flatblocks_add_block_variations' ) ) :

	function flatblocks_add_block_variations( $metadata ) {
	
	    if ( ! isset( $metadata['name'] ) ) {
        	return $metadata;
	    }

		/* 
		 * Define custom styles and what blocks they apply to. Note that the prefix 
		 * 'is-style-' will automatically be added to the names.
		 */
		$custom_variations = array(
			'core/navigation' => array(
				array('fixed-menu', esc_html__('Fixed Menu', 'flat-blocks' ) )
			),
			'core/group' => array(
				array('fixed-header', esc_html__('Fixed Header', 'flat-blocks') ),
				array('no-padding', esc_html__('No Padding', 'flat-blocks') ),
				array('rounded-border', esc_html__('Border', 'flat-blocks') ), 
				array('thick-rounded-border', esc_html__('Thick Border', 'flat-blocks') )
			),
			'core/cover' => array(
				array('cover-border', esc_html__('Borders', 'flat-blocks') ), 
				array('cover-rounded-corners', esc_html__('Rounded Corners', 'flat-blocks') )
			),
			'core/media-text' => array(
				array('media-text-border', esc_html__('Border', 'flat-blocks') ), 
			),
/* 
			
			'image-border' 		=> array( esc_html__('Border', 'flat-blocks'), 
				array('image' )
			),
			'image-round-border' => array( esc_html__('Round Border', 'flat-blocks'), 
				array('image' )
			),
			'image-computer-screen' => array( esc_html__('Computer Screen', 'flat-blocks'), 
				array('image' )
			),
			'image-tablet-phone-screen' => array( esc_html__('Phone/Tablet Screen', 'flat-blocks'), 
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
			'rounded-border' 	=> array( esc_html__('Border', 'flat-blocks'), 
				array('group', 'column', 'post-comments' )
			),
			'thick-rounded-border' => array( esc_html__('Thick Border', 'flat-blocks'), 
				array('group' )
			),
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
				array('paragraph', 'list-item', 'categories', 'latest-posts', 'latest-comments', 'page-list', 'post-title', 'post-terms')
			),
			'link-no-underline' => array( esc_html__('No Underline Link', 'flat-blocks'), 
				array('paragraph', 'list-item', 'categories', 'latest-posts', 'latest-comments', 'page-list', 'post-title', 'post-terms')
			),
			'link-underline-hover' => array( esc_html__('Underline Hover', 'flat-blocks'), 
				array('paragraph', 'list-item', 'categories', 'latest-posts', 'latest-comments', 'page-list', 'post-title', 'post-terms')
			),
			'arrow-icon' 		=> array( esc_html__('Arrow Icon', 'flat-blocks'), 
				array('paragraph' )
			),
			'arrow-icon-no-text' => array( esc_html__('Arrow No Text', 'flat-blocks'), 
				array('paragraph' )
			)
 */
		);
		
		/* Apply filter to the custom styles list so child themes can override */
		$custom_variations = apply_filters( 'flatblocks_custom_block_variations', $custom_variations );
		
		/* 
		 * Loop through each style and create the custom style for each of its blocks.
		 * 
		 * TO-DO: THIS SHOULD FIND THE BLOCK INSTEAD OF LOOPING THROUGH THE WHOLE ARRAY
		 */
		//foreach ( $custom_variations as $custom_style => [$label, $blocks, $style_handle_or_inline] ) {
		foreach ( $custom_variations as $block => $variations ) {

			// If no slug, then use core/
			if ( stripos( $block, '/' ) === false ) $block = 'core/' . $block;
			
			// Skip if current block doesn't have any block variations
			if ( $block != $metadata['name']  ) {
				continue;
			}

			// Loop through each block and register the custom style
			foreach ( $variations as $variation ) {

				// Parse out variation slug and label	
				//$slug = ( isset($variation[0]) and is_array($variation[0]) ) ? $variation[1] : array();
				//$label = $variation[0] ?? ucwords( str_ireplace( '-', ' ', $custom_style ) );
				list($slug, $label) = $variation;
				
				$metadata['styles'][] = array( 
					'name' => $slug, 
					'label' => $label
				);
			} // $variations
		} // $custom_variations
		
		return $metadata;
	}
endif;
add_filter( 'block_type_metadata', 'flatblocks_add_block_variations' ); 

