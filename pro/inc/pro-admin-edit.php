<?php
/**
 * File:		pro-admin-edit.php
 * Theme:		Flat Blocks PRO
 * 
 * Adds an Edit link to pages and posts for Admins
 *
 * @package        flat-blocks-pro
 */

/**
 * Adds an edit post/page link only for site admins
 *
 */
if ( apply_filters( 'flatblocks_pro_add_edit_link', $default = true ) ) {
	add_filter('the_content', 'flatblocks_pro_add_edit_link');
}

if ( ! function_exists( 'flatblocks_pro_add_edit_link' ) ) :
	function flatblocks_pro_add_edit_link ( $content ) {
		$post_id = get_the_ID();
		if( is_singular() and current_user_can( 'edit_post', $post_id ) ) {
			$content .= sprintf(
				'<p class="%s"><a href="%s">%s</a></p>',
				'post-edit-link has-small-font-size has-text-align-center is-style-icon-edit',
				get_edit_post_link( $post_id ),
				__("Edit", "flat-blocks-pro")
			);
		}
		return $content;
	}
endif;

/**
 * But remove our "Edit" from the end of the automatic post excerpt
 */
add_filter( 'get_the_excerpt', 'flatblocks_pro_fix_excerpt' );

function flatblocks_pro_fix_excerpt( $excerpt ) {
	return rtrim( $excerpt, __("Edit", "flat-blocks-pro") ); 
}
