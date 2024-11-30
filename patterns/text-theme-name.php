<?php
/**
 * Title: Theme Name
 * Slug: flat-blocks/text-theme-name
 * Categories: flatblocks, text
 * viewportWidth: 640
 * Description: Theme name with link
 */

// Get the theme attributes
$theme = wp_get_theme();

// Display the theme name with link
echo sprintf( 
	'<!-- wp:paragraph --><p>
<a href="%s" target="_blank">%s</a></p>
<!-- /wp:paragraph -->',
	$theme->get( 'ThemeURI' ),
	$theme->get( 'Name' )
);
