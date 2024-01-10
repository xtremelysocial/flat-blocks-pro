<?php
/**
 * File:			  admin-edit/index-admin-edit.php
 * Description:       Adds an Edit link to pages and posts for Admins
 *
 * @package           flatblocks-pro
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
			$content = $content . '<p class="edit-post-link has-small-font-size has-text-align-center dashicons dashicons-edit"'
				.' style="display: block">'
				.'<a href="'
				. get_edit_post_link( $post_id )
				. '">' . __("Edit", "flat-blocks")
				. '</a></p>';
		}
		return $content;
	}
endif;
