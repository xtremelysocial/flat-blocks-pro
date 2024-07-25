/**
 * File:	smoothscroll.js
 * Theme: 	Flat Blocks
 * 
 * Javascript for smooth scrolling internal links.
 *
 * @package flat-blocks
 * @since	1.0
 * 
 * This excellent code comes from https://css-tricks.com/snippets/jquery/smooth-scrolling/
 * with the addition of $(document).ready(function(), some conditions for backward 
 * compatibility with Bootstrap, and to select our specific fixed header CSS.
 */
 
( function( $ ) {
	
	$(document).ready(function() {

		/*
		 * Figure out top offset from fixed headers height and/or admin bar
		 */
		const fixedHeader = $('.wp-site-blocks > header:has(.is-style-fixed-header)');
		const scrollHeader = $('header.site-header.is-style-scroll-header');
		const adminBar = $('#wpadminbar');

		var topOffset = 0;
		if (fixedHeader.length > 0) { 
			//console.log('fixedHeader.outerHeight: ' + fixedHeader.outerHeight()); //TEST
			topOffset = topOffset + fixedHeader.outerHeight();
		} else if (scrollHeader.length > 0) {
			//console.log('scroll.outerHeight: ' + scrollHeader.outerHeight()); //TEST
			topOffset = topOffset + scrollHeader.outerHeight();
		}
		if (adminBar.length > 0) topOffset = topOffset + adminBar.outerHeight();
		//console.log('topOffset: ' + topOffset); //TEST
		
		/*
		 * If we have a top offset, then select all the comment elements with a name 
		 * (id='comment-99') and set their scroll offset.
		 */
		if ( topOffset) {
			const comments = $('[id*=comment-]');
			//if ( comments.length > 0 ) {
			comments.each(function() {
				$(this).css('scroll-margin-top', topOffset + 'px');
			});
			//}
		}
		
		/* 
		 * Select all internal links with hashes (#), but remove links that don't 
		 * actually link to anything. Also remove bootstrap tabs and collapsible
		 * content.
		 */ 
		const links = $('a[href*="#"]')
			//.not('[href="#"]')
			.not('[href="#0"]')
			.not('[data-toggle="tab"]')
			.not('[data-toggle="collapse"]');

		// When clicked, smoothly scroll to the element
		links.click(function(event) {
			if (
				location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
				&& 
				location.hostname == this.hostname
			) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				if (target.length) {
					event.preventDefault();
					$('html, body').animate({
				  		scrollTop: ( target.offset().top - topOffset )
					}, 1000);
				}
			}
		});
	});
	
} )( jQuery );