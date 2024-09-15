<?php
 /**
  * Title: Index (Blog) Page Title
  * Slug: flat-blocks/hidden-title-index
  * Categories: flatblocks, text
  * Block Types:
  * Inserter: false
  * Description: Index (Blog) page title as pattern so can allow for language translations
  */
?>

<!-- wp:heading {"level":1,"align":"wide","fontSize":"larger","className":"entry-title wp-block-post-title"} -->
<h1 class="alignwide entry-title wp-block-post-title has-larger-font-size" id="index-title"><?php echo __("Blog", "flat-blocks-pro"); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"entry-subtitle","fontSize":"medium"} -->
<p class="entry-subtitle has-medium-font-size"><?php echo __("Our blog posts", "flat-blocks-pro"); ?></p>
<!-- /wp:paragraph -->
