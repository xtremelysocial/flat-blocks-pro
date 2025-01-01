<?php
/**
 * File:	block-variations.php
 * Theme:	Flat Blocks PRO
 * 
 * Adds our custom block variations for header and footer
 * 
 * @package flat-blocks-pro
 * @since	1.6.7
 */

/*
 * NOTE: This method registers true block variations meaning they appear as 
 * separate blocks in the Editor.
 * 
 * @link https://developer.wordpress.org/themes/features/block-variations/
 */

/*
 * Register block variations with javascript
 */
if ( ! function_exists( 'flatblocks_register_block_variations' ) ) :

	function flatblocks_register_block_variations() {
		wp_enqueue_script(
			'flatblocks-block-variations',
			get_theme_file_uri( 'assets/js/block-variations.js' ),
			array( 
				'wp-blocks', 
				'wp-dom-ready',
				'wp-i18n'
			),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}

endif;
add_action( 'enqueue_block_editor_assets', 'flatblocks_register_block_variations' );

/*
 * NOTE: This method registers true block variations, meaning they appear as 
 * separate blocks in the Editor. They don't appear as custom styles, so the user
 * can't edit the properties, unfortunately.
 * 
 * @link https://developer.wordpress.org/news/2024/03/14/how-to-register-block-variations-with-php/ 
 * @requires WordPress v6.5
 * 
 */
// if ( ! function_exists( 'flatblocks_register_block_variations' ) ) :
// 
// 	function flatblocks_block_type_variations( $variations, $block_type ) {
// 	
// 		if ( 'core/media-text' === $block_type->name ) {
// 			$variations[] = array(
// 				'name'       => 'flatblocks-media-right',
// 				'title'      => __( 'Media & Text: Right', 'flat-blocks' ),
// 				'isActive'   => array(
// 					'mediaPosition' 
// 				),
// 				'attributes' => array(
// 					'mediaPosition' => 'right'
// 				)
// 			);
// 		}
// 	
// 		var_dump($variations);
// 		return $variations;
// 	}
// 	endif;
// 
// add_filter( 'get_block_type_variations', 'flatblocks_block_type_variations', 10, 2 );

/*
 * NOTE: This method can be used to alter ANY block metadata, including registering 
 * block variations or custom styles or added block supports features. 
 */
// function flatblocks_block_type_metadata( $metadata ) {
// 
//     if ( ! isset( $metadata['name'] ) ) {
//         return $metadata;
//     }
// 
// 	switch ($metadata['name']) {
// 
// 		case 'core/separator':
// 			$metadata['supports']['__experimentalBorder'] = true;
// 			$metadata['supports']['border'] = true;
// 			break;
// 	
// 		case 'core/group':
// // 			$metadata['supports']['__experimentalBorder'] = true;
// 
// 			$metadata['styles'][] = array(
// 				'name' => 'group-header', 
// 				'label' => __('Group Header') 
// 			);
// 
// 			$metadata['variations'][] = array(
// 				'name' => 'group-header', 
// 				'title' => __( 'Group Header', 'flat-blocks' ),
// 			);
// 
// // 			$metadata['variations'][] = array(
// // 				'name' => 'group-footer', 
// // 				'title' => __( 'Flat Blocks: Footer', 'flat-blocks' ),
// // 			);
// // 
// // 			$metadata['variations'][] = array(
// // 				'name' => 'group-footer-info', 
// // 				'title' => __( 'Flat Blocks: Footer Info', 'flat-blocks' ),
// // 			);
// 			break;
// 	}
// 
//     return $metadata;
// }
// add_filter( 'block_type_metadata', 'flatblocks_block_type_metadata' ); 

// /* 
// * Alter Block Styles: Add Text Color to Separator Block
// */
// function flatblocks_block_type_metadata( $metadata ) {
// 
// 	switch ($metadata['name']) {
// 
// 		case 'core/separator':
// 			//$metadata['supports']['color'] = true;
// 			$metadata['supports']['color']['text'] = true;
// 			$metadata['supports']['color']['__experimentalDefaultControls']['text'] = true;
// 			$metadata['supports']['color']['background'] = false;
// 			$metadata['supports']['color']['__experimentalDefaultControls']['background'] = false;
// 			break;
// 	}
// 
//     return $metadata;
// }
// add_filter( 'block_type_metadata', 'flatblocks_block_type_metadata', 99 ); 

// /*
// 		"anchor": true,
// 		"align": [ "center", "wide", "full" ],
// 		"color": {
// 			"enableContrastChecker": false,
// 			"__experimentalSkipSerialization": true,
// 			"gradients": true,
// 			"background": true,
// 			"text": false,
// 			"__experimentalDefaultControls": {
// 				"background": true
// 			}
// 		},
// 		"spacing": {
// 			"margin": [ "top", "bottom" ]
// 		},
// 		"interactivity": {
// 			"clientNavigation": true
// 		}
// */