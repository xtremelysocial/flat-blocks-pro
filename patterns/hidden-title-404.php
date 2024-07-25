<?php
 /**
  * Title: 404 Page Title
  * Slug: flat-blocks/hidden-title-404
  * Categories: flatblocks, text
  * Block Types:
  * Inserter: false
  * Description: 404 page title as pattern so can allow for language translations
  */
?>

<!-- wp:heading {"level":1,"align":"wide","fontSize":"larger","className":"entry-title wp-block-post-title"} -->
<h1 class="alignwide entry-title wp-block-post-title has-larger-font-size" id="404-title"><?php echo __("Oops! That page can’t be found", "flat-blocks"); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"entry-subtitle","fontSize":"medium"} -->
<p class="entry-subtitle has-medium-font-size"><?php echo __("Or as techies would say, its a '404 Error'", "flat-blocks"); ?></p>
<!-- /wp:paragraph -->
