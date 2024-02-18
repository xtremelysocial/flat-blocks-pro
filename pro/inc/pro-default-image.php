<?php
/**
 * File:		pro-default-image.php
 * Theme:		Flat Blocks PRO
 * 
 * Load a default post featured image when there isn't one
 * 
 * @package 	flat-blocks-pro
 */

/**
 * Set a default post featured image if there isn't one already
 */
add_filter( 'post_thumbnail_html', 'fbp_filter_post_thumbnail_html', 10, 5 );

if ( ! function_exists('fbp_filter_post_thumbnail_html') ) :
 
	function fbp_filter_post_thumbnail_html( 
		$html, 
		$pid, 
		$post_thumbnail_id, 
		$size, 
		$attr 
	) {

		/* If no post featured image, but there is a post, then set the default image */
		if ( ! $html && $pid ) {
	
			$default_image = get_template_directory_uri() . '/assets/images/image-lines-blue.jpg';
			$default_image = apply_filters( 'flatblocks_default_image_url', $default_image, $pid );

			$image_alt = esc_attr( get_the_title( $pid ) );
			$image_alt = apply_filters( 'flatblocks_default_image_alt', $image_alt, $pid );
			
			$html = sprintf(
				'<img src="%s" alt="%s" />',
				$default_image,
				$image_alt
			);
		}

		return $html;
	}

endif;