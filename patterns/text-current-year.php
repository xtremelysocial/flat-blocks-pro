<?php
 /**
  * Title: Current Year
  * Slug: flat-blocks/text-current-year
  * Categories: flatblocks, text
  * Inserter: false
  * viewportWidth: 640
  * Description: Current year (e.g. 2024)
  */

// Display the current year
echo sprintf( 
	'<!-- wp:paragraph --><p>%s</p>
<!-- /wp:paragraph -->',
	date( 'Y' )
);
