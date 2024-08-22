<?php
 /**
  * Title: Post Date (and Comment Count if Gutenberg Plugin active)
  * Slug: flat-blocks/hidden-post-date
  * Categories: flatblocks, text
  * Block Types:
  * Inserter: false
  * Description: Display the Post Date and if Gutenberg is active, also display the Post
  * Comment Count
  */
?>

<!-- wp:post-date /-->

<?php if ( defined( 'IS_GUTENBERG_PLUGIN' ) && IS_GUTENBERG_PLUGIN ) : ?>
	<!-- wp:post-comments-count /-->
<?php endif;
