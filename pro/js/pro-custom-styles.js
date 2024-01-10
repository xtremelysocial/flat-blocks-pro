/**
 * Theme:	Flat Blocks PRO
 * File:	pro-custom-styles.js
 * 
 * jquery script for scrolling fixed header
 *
 * @package flat-blocks-pro
 * @since	1.0
 */

/* 
 * Trigger alternate fixed header on user scroll past the threshold
 */
( function( $ ) {

	/////const headerSelector = '.is-style-scroll-header'; // The CSS selector for the header
	//const headerScrollSelector = '#content-start'; // The ID of the content start div
	const headerClass = 'header-active'; // The CSS class to add
	const headerScrollPos = 88; // How far to scroll before adding the class

	/////var header = document.querySelector('.is-style-scroll-header');
	//var contentStart = document.querySelector('#content-start'); //document.getElementById('content-start');
	//console.log('contentStart', contentStart); //TEST
	//console.log('header.classList', header?.classList); //TEST

	const scrollHeader = $('.is-style-scroll-header');
	//console.log('scrollHeader', scrollHeader); //TEST

	if ( scrollHeader.length > 0 ) {

		$(window).scroll(function() {
			var scroll = $(window).scrollTop();
			if (scroll >= headerScrollPos ) {
				console.log('adding active header class'); //TEST
				//$('.is-style-scroll-header').addClass( headerClass );
				scrollHeader.addClass( headerClass );
			} else {
				//$('.is-style-scroll-header').removeClass( headerClass );
				scrollHeader.removeClass( headerClass );
				console.log('remove active header class'); //TEST
			}
		});

	}

} )( jQuery );
