/**
 * File:	pro-custom-styles.js
 * Theme:	Flat Blocks PRO
 * 
 * jquery script for scrolling fixed header
 *
 * @package flat-blocks-pro
 */

/* 
 * Trigger alternate fixed header on user scroll past the threshold
 */
( function( $ ) {

	/* 
	 * scrollHeader		element		Class selector for our scroll header
	 * activeClass		string		CSS class for when the target is scrolled to
	 * minScrollPos		integer		Minimum scroll position to trigger active class. This
	 * 								should be at least the min height of the header which
	 *								is 88. 
	 * scrollInterval	integer		Number of milliseconds delay
	 */
	const scrollHeader 	= $('.is-style-scroll-header');
	const minScrollPos 	= scrollHeader.outerHeight() ?? 88;
	const scrollInterval = 250;
	const activeClass 	= 'header-active';

	if ( scrollHeader.length > 0 ) {

		// Trigger when the user scrolls
		var didScroll = false;
		var scroll = 0;
		$(window).scroll(function() {
			didScroll = true;
		});

		// But only evaluate the scroll position every 250ms for performance reasons
		setInterval(function() {
			if ( didScroll ) {
				didScroll = false;
				scroll = $(window).scrollTop();
				if (scroll >= minScrollPos ) {
					console.log('adding active header class'); //TEST
					scrollHeader.addClass( activeClass );
				} else {
					scrollHeader.removeClass( activeClass );
					console.log('remove active header class'); //TEST
				}
			}
		}, scrollInterval);
	}
} )( jQuery );
