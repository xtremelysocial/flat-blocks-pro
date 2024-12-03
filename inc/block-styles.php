<?php
/**
 * File:	block-styles.php
 * Theme:	Flat Blocks PRO
 * 
 * As of Flat Blocks v1.8, custom block styles are all defined in /styles/blocks/*.json.
 * This function can be used by child themes to register additional ones via PHP. 
 * 
 * Note that some of this theme's custom styles still require CSS and that is in 
 * /assets/css/flat-blocks.css and /assets/css/block-styles.css.
 * 
 * TO-DO: Remove this or move it to wp-compatibility.php when theme requires WordPress
 * v6.6+ and Flat Blocks Classic child theme is updated to not use it. 
 * 
 * @package flat-blocks-pro
 * @since	1.0
 */

/**
 * Register Custom Block Styles
 */
add_action( 'init', 'flatblocks_register_block_styles' );

if ( ! function_exists( 'flatblocks_register_block_styles' ) ) :

	function flatblocks_register_block_styles() {

		/* 
		 * Build a list of custom block styles and what blocks they apply to. The
		 * actual style will have a prefix of 'is-style-'.
		 */
		$custom_styles = array(
			//'example' => array( __('Example Custom Style', 'flat-blocks'), 
			//	array( 'group', 'columns' )
			//),
		);
		
		/* Apply filter to the custom styles list so child themes can override */
		$custom_styles = apply_filters( 'flatblocks_custom_block_styles', $custom_styles );
		
		/* 
		 * Loop through each style and create the custom style for each of its blocks.
		 * 
		 * TO-DO: Once minimum WordPress version is 6.6, the array of blocks can be sent
		 * to register_block_style instead of looping through each block.
		 */
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
			}
		}
		
	}
endif;
