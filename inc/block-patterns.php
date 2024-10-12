<?php
/**
 * File:	block-patterns.php
 * Theme:	Flat Blocks
 * 
 * Remove core block patterns and load our HTML block patterns. 
 *
 * Note that PHP block patterns are loaded automatically by WordPress. This is to 
 * remove the bult-in patterns and to add our html-based patterns.
 * 
 * @package flat-blocks
 * @since	1.0
 */

// Include the block pattern helper functions
if ( ! file_exists( get_template_directory() . '/inc/pattern-functions.php' ) ) exit;
require_once get_template_directory() . '/inc/pattern-functions.php';

// Register the block patterns
if ( ! function_exists( 'flatblocks_register_block_patterns' ) ) :

	function flatblocks_register_block_patterns() {

		// WordPress v6.2 already has categories for featured, header, query, text, 
		// buttons, gallery, column, banner, footer, call-to-action, team, testimonials,
		// services, contract, about, portfolio, and media. However, the columns category
		// doesn't appear to be working.

		// Add our own block pattern categories
		$block_pattern_categories = array(
			'flatblocks'	=> array( 'label' => __( 'All Flat Blocks', 'flat-blocks' ) ),
			'column'   		=> array( 'label' => __( 'Columns', 'flat-blocks' ) ),				
			'page'    		=> array( 'label' => __( 'Pages', 'flat-blocks' ) ),
			//'cover'   	=> array( 'label' => __( 'Cover Images', 'flat-blocks' ) ),				
			//'banner'   	=> array( 'label' => __( 'Banners', 'flat-blocks' ) ),				
			//'image'   	=> array( 'label' => __( 'Images', 'flat-blocks' ) ),
			//'testimonial'   => array( 'label' => __( 'Testimonials (Flat Blocks)', 'flat-blocks' ) ),				
		);
		
		/**
		 * Filters the theme block pattern categories.
		 *
		 * @param array[] $block_pattern_categories {
		 *     An associative array of block pattern categories, keyed by category name.
		 *
		 *     @type array[] $properties {
		 *         An array of block category properties.
		 *
		 *         @type string $label A human-readable label for the pattern category.
		 *     }
		 * }
		 */
		$block_pattern_categories = apply_filters( 'flatblocks_block_pattern_categories', $block_pattern_categories );

		foreach ( $block_pattern_categories as $name => $properties ) {
			if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
				register_block_pattern_category( $name, $properties );
			}
		}
		
		// Define the list of patterns with translatable titles
		$block_patterns = array(
			'buttons-call-to-action' => array( 
				'title' => __( 'Call to Action', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'buttons', 'call-to-action', 'featured' )
			),
			'buttons-call-to-action-2-columns' => array( 
				'title' => __( 'Call to Action 2 Columns', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'buttons', 'call-to-action', 'column', 'featured' )
			),
			'buttons-call-to-action-rounded' => array( 
				'title' => __( 'Call to Action Rounded', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'buttons', 'call-to-action', 'featured' )
			),
			'columns-features-2-columns' => array( 
				'title' => __( 'Features with 2 Columns', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column' )
			),
			'columns-features-3-columns' => array( 
				'title' => __( 'Features with 3 Columns', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column', 'featured' )
			),
			'columns-features-4-columns' => array( 
				'title' => __( 'Features with 4 Columns', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column', 'featured' )
			),
			'columns-map-static' => array( 
				'title' => __( 'Static Map and Address', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column', 'featured' )
			),
			'columns-map-jetpack' => array( 
				'title' => __( 'Jetpack Map and Address', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column' )
			),
			'columns-pricing-table-3-columns' => array( 
				'title' => __( 'Pricing Table 3 Columns', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column', 'featured' )
			),
			'columns-pricing-table-4-columns' => array( 
				'title' => __( 'Pricing Table 4 Columns', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column', 'featured' )
			),
			'columns-recent-posts-3-columns' => array( 
				'title' => __( 'Recent Posts with 3 Columns', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column' )
			),
			'columns-sidebar-left' => array( 
				'title' => __( 'Content with Left Sidebar', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column' )
			),
			'columns-sidebar-right' => array( 
				'title' => __( 'Content with Right Sidebar', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column' )
			),
			'columns-social-media-3-columns' => array( 
				'title' => __( 'Social Media Icons with 3 Columns', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column', 'featured' )
			),
			'columns-social-media-4-columns' => array( 
				'title' => __( 'Social Media Icons with 4 Columns', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column', 'featured' )
			),
			'columns-team-3-people' => array( 
				'title' => __( '3 Team Members', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column', 'team', 'featured' )
			),
			'columns-team-4-people' => array( 
				'title' => __( '4 Team Members', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column', 'team', 'featured' )
			),
			'cover-scroll-home-header' => array( 
				'title' => __( 'Cover Home Page with Site Title, Tagline, and Scroll Arrow', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner' )
			),
			'cover-scroll-page-header' => array( 
				'title' => __( 'Cover Featured Image with Page / Post Title, Excerpt, and Scroll Arrow', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner', 'featured' )
			),
			'cover-scroll-colored-blocks' => array( 
				'title' => __( 'Cover Colored Blocks w/Scroll Arrow', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner', 'featured' )
			),
			'cover-bokeh' => array( 
				'title' => __( 'Cover Bokeh', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner' )
			),
			'cover-book' => array( 
				'title' => __( 'Cover Book', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner' )
			),
			'cover-building' => array( 
				'title' => __( 'Cover Building', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner' )
			),
			'cover-city-night' => array( 
				'title' => __( 'Cover City at Night', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner' )
			),
			'cover-colored-chalk' => array( 
				'title' => __( 'Cover Colored Chalk', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner' )
			),
			'cover-desk-light' => array( 
				'title' => __( 'Cover Desk (light)', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner', 'featured' )
			),
			'cover-desk-dark' => array( 
				'title' => __( 'Cover Desk (dark)', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner' )
			),
			'cover-desk-meeting' => array( 
				'title' => __( 'Cover Desk w/Meeting', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner' )
			),
			'cover-geodesic-lights' => array( 
				'title' => __( 'Cover Geodesic Lights', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner' )
			),
			'cover-guitars' => array( 
				'title' => __( 'Cover Guitars', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner' )
			),
			'cover-man-on-rocks' => array( 
				'title' => __( 'Cover Man on Rocks', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner' )
			),
			'cover-notebooks' => array( 
				'title' => __( 'Cover Notebooks', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner' )
			),
			'cover-typewriter' => array( 
				'title' => __( 'Cover Typewriter', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'banner' )
			),
// 			'cover-scroll-media-text' => array( 
// 				'title' => __( 'Media w/2 Text Blocks and Scroll to Content', 'flat-blocks' ),
// 				'categories' => array ('flatblocks', 'banner' )
// 			),
// 			'media-text-2-blocks' => array( 
// 				'title' => __( 'Media w/2 Text Blocks', 'flat-blocks' ),
// 				'categories' => array ('flatblocks', 'banner', 'featured' )
// 			),
			'image-gallery' => array( 
				'title' => __( 'Image Gallery', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column', 'gallery', 'media' )
			),
			'image-left-and-right-text' => array( 
				'title' => __( 'Image with Left and Right Text', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'column', 'media', 'banner', 'featured' )
			),
			'image-computer-screen' => array( 
				'title' => __( 'Computer Screen Image with Title and Text Above', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'media', 'text' )
			),
			'image-static-map' => array( 
				'title' => __( 'Image of Static Map', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'media' )
			),
			'text-social-icons-huge' => array( 
				'title' => __( 'Social Icons Huge', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'text' )
			),
			'text-title-and-subtitle' => array( 
				'title' => __( 'Title and Subtitle', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'text', 'banner' )
			),
			'text-title-and-subtitle-with-bg-image' => array( 
				'title' => __( 'Title and Subtitle with Background Image', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'text', 'media', 'banner', 'featured' )
			),
			'text-title-and-text' => array( 
				'title' => __( 'Title and Text', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'text', 'banner' )
			),
			'text-testimonial' => array( 
				'title' => __( 'Testimonial', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'text', 'media', 'testimonials' )
			),
			'text-faq' => array( 
				'title' => __( 'Frequently Asked Questions (FAQ)', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'text', 'featured' )
			),
			'query-loop-1-column' => array( 
				'title' => __( 'Query Loop 1 Column', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'query' ),
				'blockTypes' => array ('core/query')
			),
			'query-loop-2-columns' => array( 
				'title' => __( 'Query Loop 2 Columns (Default)', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'query' ),
				'blockTypes' => array ('core/query')
			),
			'query-loop-sidebar-left' => array( 
				'title' => __( 'Query Loop with Left Sidebar', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'query' ),
				'blockTypes' => array ('core/query')
			),
			'query-loop-sidebar-right' => array( 
				'title' => __( 'Query Loop with Right Sidebar', 'flat-blocks' ),
				'categories' => array ('flatblocks', 'query' ),
				'blockTypes' => array ('core/query')
			)
		);
				
		// Allow child themes to alter the block patterns list
		$block_patterns = apply_filters( 'flatblocks_block_patterns', $block_patterns );

		// Allow child themes to alter whether core WordPress patterns are removed or not
		if ( apply_filters( 'flatblocks_remove_core_patterns', $default = true ) ) {

			// First remove the core WordPress block patterns if we're registering any
			if ( is_array( $block_patterns ) && count( $block_patterns ) > 0 ) {
			
				remove_theme_support( 'core-block-patterns' );

				// Above still doesn't remove core/query, core/social-links, headers or
				// footers, so get rid of them as long as we've registed at least one
				// pattern.
				$patterns = WP_Block_Patterns_Registry::get_instance()->get_all_registered();
				foreach ( $patterns as $pattern ) {
					if (
						! empty( $pattern['blockTypes'] ) &&
						is_array( $pattern['blockTypes'] )
						) {

						if (
							in_array( 'core/query', $pattern['blockTypes'] ) ||
							in_array( 'core/social-links', $pattern['blockTypes'] ) ||
							in_array( 'core/template-part/header', $pattern['blockTypes'] ) ||
							in_array( 'core/template-part/footer', $pattern['blockTypes'] )
						) {
							unregister_block_pattern( $pattern['name'] );
						}
				
					}
					
				}
				
			}

		}

		// Then loop through all our patterns and register them
		foreach ( $block_patterns as $name => $properties ) {
		
			// Get the HTML contents and replace partial URL's
			$image_root = isset($properties['imageRoot']) ? $properties['imageRoot'] : get_template_directory_uri();
			$content = flatblocks_get_block_pattern( 
				$name, 
				$image_root
			);
			if ( $content ) {
											
					// Register the block pattern
					// Note to Theme Reviewers: The title is language translatable
					// even though a variable is used because of the translations 
					// in the above array.				
					register_block_pattern(
						'flat-blocks/' . $name,
						array(
							'title'      => $properties['title'],
							'categories' => isset( $properties['categories'] ) ? $properties['categories'] : null,
							'inserter' 	 => isset ( $properties['inserter'] ) ? $properties['inserter'] : true,
							'blockTypes' => isset ( $properties['blockTypes'] ) ? $properties['blockTypes'] : null,
							'viewportWidth' => isset ( $properties['viewportWidth'] ) ? $properties['viewportWidth'] : null,
							'content'    => $content
						)
					);

			}
			
		}
		
	} 
endif;
add_action( 'init', 'flatblocks_register_block_patterns' );
