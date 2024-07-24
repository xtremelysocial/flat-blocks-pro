<?php
/**
 * File:	front-page.php
 * Theme:	Flat Blocks
 * 
 * The Front Page template file
 *
 * This template is written in PHP so it can conditionally handle the front page
 * of the website. If the user has the blog set as the front page, it loads the 
 * index.html template which includes the template part Home Page Content Top. If
 * the user has a static page set as the front page, then it loads that page but 
 * also on the blog page it uses home.html instead of index.html template.
 *
 * @package flat-blocks
 * @since 1.2.1
 */

// If blog on front page, then use index.html template. Note that this intentionally
// bypasses home.html which we use to display the blog when a static home page is set. 
// But only do this on the very first page.
if ( 'posts' == get_option( 'show_on_front' ) ) {

	// If not the first page, use the home.html template (which is the default behavior)
	if ( is_paged() ) {
		include( get_query_template( 'home' ) );
	
	// If the very first page, use the index.html template
	} else {
		include( get_query_template( 'home', array('index') ) );
	}
    
// Otherwise, use the static front page's template as set by the user
} else {
    include( get_page_template() );
}