/**
 * File:	pro-custom-styles.js
 * Theme:	Flat Blocks PRO
 *
 * jquery script for scrolling fixed header
 *
 * @package
 */

/*
 * Trigger alternate fixed header on user scroll past the threshold
 */
( function( $ ) {
	/*
	 * scrollHeader		element		Class selector for our scroll header
	 * minScrollPos		integer		Minimum scroll position to trigger active class. This
	 * 								should be at least the min height of the header which
	 *								is 88.
	 * scrollInterval	integer		Number of milliseconds delay
	 * activeClass		string		CSS class for when the target is scrolled to
	 */
	const scrollHeader 	= $( '.is-style-scroll-header' );

	if ( scrollHeader.length > 0 ) {
		const minScrollPos 	= scrollHeader.outerHeight() ?? 88;
		const scrollInterval = 250;
		const activeClass 	= 'header-active';

		// Trigger when the user scrolls
		let didScroll = false;
		let scroll = 0;
		$( window ).scroll( function() {
			didScroll = true;
		} );

		// But only evaluate the scroll position every 250ms for performance reasons
		setInterval( function() {
			if ( didScroll ) {
				didScroll = false;
				scroll = $( window ).scrollTop();
				if ( scroll >= minScrollPos ) {
					console.log( 'adding active header class' ); //TEST
					scrollHeader.addClass( activeClass );
				} else {
					scrollHeader.removeClass( activeClass );
					console.log( 'remove active header class' ); //TEST
				}
			}
		}, scrollInterval );
	}
}( jQuery ) );
