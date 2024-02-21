/**
 * Theme:	Flat Blocks PRO
 * File:	pro-animation.js
 * 
 * jquery script for animation
 *
 * @package flat-blocks-pro
 * @since	1.0
 */

/* 
 * Find the scroll animation styles and add "animation-active" CSS class to them when the
 * user scrolls to them. Notice the searchString and activeClass match what is in 
 * pro-animation.css. 
 * 
 * This code is loosely based on the following:
 * https://daltonwalsh.com/blog/using-the-intersection-observer/
 * https://stackoverflow.com/questions/71553185/problem-with-using-intersectionobserver-to-trigger-css-animation
 */
( function( $ ) {

	/* 
	 * We only need to monitor for scrolling animation, but for both "auto animate" ones
	 * on parent items as well as on individual elements. We need to set the active class
	 * to trigger the animation itself.
	 */
	const parentString = 'is-style-animated-scroll-auto-';
	const searchString = 'is-style-animated-scroll-';
	const activeClass = 'animation-active';

	/* 
	 * An IntersectionObserver monitors for the user scrolling to a particular element.
	 * We'll create a single instance of the observer and user everywhere its needed. 
	 */
	const observer = new IntersectionObserver(entries => {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				//console.log('entry is intersecting: ' + entry); //TEST
				entry.target.classList.add(activeClass);
			}
		})
	});

	/* 
	 * Select the PARENT animation elements and observe their children. 
	 * If the CHILD is a columns block or latest posts grid then push the animation
	 * down again to the GRANDCHILDREN.
	 * 
	 * When the animation is complete stop observing and remove the animation-active 
	 * class. This prevents the animations from happening again when the user goes to 
	 * another page and returns. 
	 */
	document.querySelectorAll("[class*='" + parentString + "']")
		.forEach((parent) => {
			const children = Array.from(parent.children);
			children.forEach((child) => {
				if ( child.classList.contains('.wp-block-columns') || ( child.classList.contains('wp-block-latest-posts') && child.classList.contains('is-grid') ) ) {
					const grandChildren = Array.from(child.children);
					grandChildren.forEach((grandChild) => {
						observer.observe(grandChild);
						grandChild.addEventListener('animationend', function () {
							observer.unobserve(grandChild);
							grandChild.classList.remove(activeClass);
						})
					})
				} else {
					observer.observe(child);
					child.addEventListener('animationend', function () {
						observer.unobserve(child);
						child.classList.remove(activeClass);
					})
				}
			})
		});

	/* 
	 * Select the DIRECT animation elements and observe them.
	 */	
	document.querySelectorAll("[class*='" + searchString + "']:not([class*='" + parentString + "'])")
		.forEach((el) => {
			observer.observe(el);
			el.addEventListener('animationend', function () {
				observer.unobserve(el);
				el.classList.remove(activeClass);
			})
		});

} )( jQuery );
