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
		
			//var_dump('size:', $size, 'attr:', $attr); //TEST
	
			$default_image = get_template_directory_uri() . '/assets/images/image-lines-blue.jpg';
			$default_image = apply_filters( 'flatblocks_default_image_url', $default_image, $pid );

			$image_alt = esc_attr( get_the_title( $pid ) );
			$image_alt = apply_filters( 'flatblocks_default_image_alt', $image_alt, $pid );
			
			$image_class = $size ? "attachment-{$size} size-{$size} wp-post-image" : 'wp-post-image';
			
			//preg_match( '/max-width\:(.*)px/', $attr['style'], $dimensions );
			preg_match( "/max-width:(\\d+).*max-height:(\\d+)/", $attr['style'], $dimensions);
			$image_dimensions = $dimensions ? "width={$dimensions[1]} height={$dimensions[2]}" : '';
			//var_dump('image_dimensions', $image_dimensions); //TEST
			
			$image_style = $attr['style'] ? $attr['style'] : '';
			$image_style .= $dimensions ? "width:{$dimensions[1]}px;height:{$dimensions[2]}px;" : '';
			
			$html = sprintf(
				'<img src="%s" alt="%s" class="%s" style="%s" %s />',
				$default_image,
				$image_alt,
				$image_class,
				$image_style,
				$image_dimensions
			);
		}

		return $html;
	}

endif;

/**
  * Also make sure that has_post_thumbnail always returns true so the above actually
  * gets called.
  */
add_filter( 'has_post_thumbnail', 'fbp_has_post_thumbnail', 10, 3 );
if ( ! function_exists('fbp_has_post_thumbnail') ) :

	function fbp_has_post_thumbnail( $has_thumbnail, $post, $thumbnail_id ) {
	
		$has_thumbnail = true; 
		return $has_thumbnail; 
	}

endif;