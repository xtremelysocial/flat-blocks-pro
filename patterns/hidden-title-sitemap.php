<?php
 /**
  * Title: Site Map Page Title
  * Slug: flat-blocks/hidden-title-sitemap
  * Categories: flatblocks, text
  * Inserter: false
  * Description: Site Map page title as pattern so can allow for language translations
  */
?>

<!-- wp:heading {"level":1,"align":"wide","fontSize":"x-large","className":"entry-title wp-block-post-title"} -->
<h1 class="alignwide entry-title wp-block-post-title has-x-large-font-size" id="sitemap-title"><?php echo __("Site Map", "flat-blocks"); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"entry-subtitle","fontSize":"medium"} -->
<p class="entry-subtitle has-medium-font-size"><?php echo __("Site content, blog categories, and recent posts", "flat-blocks"); ?></p>
<!-- /wp:paragraph -->
