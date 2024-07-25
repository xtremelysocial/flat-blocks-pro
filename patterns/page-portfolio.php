<?php
 /**
  * Title: Sample Portfolio Page
  * Slug: flat-blocks/page-portfolio
  * Categories: flatblocks, page
  * Block Types: core/post-content
  * Description: A sample portfolio or home page with cover image, image gallery (for recent works), 3-column features, and call-to-action button
  */
?>

<!-- wp:pattern {"slug":"flat-blocks/cover-geodesic-lights"} /-->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div id="our-portfolio" class="wp-block-group">
<!-- wp:heading {"placeholder":"Our Portfolio"} -->
<h2 class="wp-block-heading" id="our-portfolio">Our Portfolio</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column {"verticalAlignment":"top","className":"is-style-default"} -->
<div class="wp-block-column is-vertically-aligned-top is-style-default">
<!-- wp:paragraph {"placeholder":"Our recent works..."} -->
<p>Our recent works...</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:paragraph {"align":"right","className":"is-style-link-no-underline","placeholder":"See All Works"} -->
<p class="has-text-align-right is-style-link-no-underline"><a href="$#">&gt; See All Works</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"flat-blocks/image-gallery"} /-->

<!-- wp:pattern {"slug":"flat-blocks/columns-features-3-columns"} /-->

<!-- wp:pattern {"slug":"flat-blocks/buttons-call-to-action"} /-->
