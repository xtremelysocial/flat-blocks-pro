<?php
/**
 * Theme:	Flat Blocks PRO
 * File:	pro-patterns.php
 * 
 * Loads the PRO HTML block patterns. 
 * 
 * @package flat-blocks-pro
 */


/* Add the extra PRO theme patterns */
add_filter('flatblocks_block_patterns', 'flatblocks_pro_block_patterns' );

function flatblocks_pro_block_patterns( $block_patterns ) {

	$pro_patterns = array(
		'pro-footer-3-blocks-image-curved' => array( 
			'title' => __( 'PRO Footer Curved Image w/3 Blocks', 'flat-blocks' ),
			//'categories' => array ( 'flatblocks', 'footer' ),
			'categories' => array ( 'flatblocks' ),
			//'blockTypes' => array ('footer')
			'inserter' => false
		),
		'pro-query-loop-3-columns' => array( 
			'title' => __( 'PRO Query Loop 3 Column Image Grid', 'flat-blocks' ),
			'categories' => array ( 'flatblocks', 'query' ),
			'blockTypes' => array ('core/query')
		),
		'pro-query-loop-colored-3-columns' => array( 
			'title' => __( 'PRO Query Loop 3 Column Colored Image Grid', 'flat-blocks' ),
			'categories' => array ( 'flatblocks', 'query', 'featured' ),
			'blockTypes' => array ('core/query')
		)/*,
		'pro-query-loop-4-columns' => array( 
			'title' => __( 'PRO Query Loop 4 Column Image Grid', 'flat-blocks' ),
			'categories' => array ( 'flatblocks', 'query' ),
			'blockTypes' => array ('core/query')
		)*/
	);
	return $block_patterns ? $block_patterns + $pro_patterns : $pro_patterns;	
}
