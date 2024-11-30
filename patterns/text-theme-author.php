<?php
 /**
  * Title: Theme Author
  * Slug: flat-blocks/text-theme-author
  * Categories: flatblocks, text
  * viewportWidth: 640
  * Description: Theme author with link
  */

// Get the theme attributes
$theme = wp_get_theme();

// Display the theme author with link
echo sprintf( 
	'<!-- wp:paragraph --><p>
<a href="%s" target="_blank">%s</a></p>
<!-- /wp:paragraph -->',
	$theme->get( 'AuthorURI' ),
	$theme->get( 'Author' )
);
