<?php
/**
 * Theme:	Flat Blocks PRO
 * File:	pro-patterns.php
 * 
 * Loads the PRO HTML block patterns. 
 * 
 * @package flat-blocks-pro
 * @since	1.0
 */


/* Add the extra PRO theme patterns */
add_filter('flatblocks_block_patterns', 'flatblocks_pro_block_patterns' );

function flatblocks_pro_block_patterns( $block_patterns ) {

	$pro_patterns = array(
		'query-loop-3-columns' => array( 
			'title' => __( 'Query Loop 3 Column Image Grid', 'flat-blocks' ),
			'categories' => array ( 'flatblocks', 'query' ),
			'blockTypes' => array ('core/query')
		),
		'query-loop-colored-3-columns' => array( 
			'title' => __( 'Query Loop 3 Column Colored Image Grid', 'flat-blocks' ),
			'categories' => array ( 'flatblocks', 'query', 'featured' ),
			'blockTypes' => array ('core/query')
		)/*,
		'query-loop-4-columns' => array( 
			'title' => __( 'Query Loop 4 Column Image Grid', 'flat-blocks' ),
			'categories' => array ( 'flatblocks', 'query' ),
			'blockTypes' => array ('core/query')
		)*/
	);
	return $block_patterns ? $block_patterns + $pro_patterns : $pro_patterns;	
}
