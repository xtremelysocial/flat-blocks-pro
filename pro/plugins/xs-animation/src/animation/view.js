/**
 * File:	xs-animation/view.js
 * Plugin:	Animation & Visibility Plugin
 *
 * Javascript for animation on the FRONT-END
 *
 * @package xs-animation
 * @since	1.0
 */

/*
 * This code finds the scroll animation styles and add "animation-active" CSS class
 * to them when the user scrolls to them. Notice the searchSelector and animationClass
 * match what is in animation/style.scss (build/style-index.css).
 *
 * This code for the intersection observer method is loosely based on the following:
 * https://daltonwalsh.com/blog/using-the-intersection-observer/
 * https://stackoverflow.com/questions/71553185/problem-with-using-intersectionobserver-to-trigger-css-animation
 */
( function ( $ ) {

	/*
	 * We only need to monitor for scrolling animation, but for both "animate auto" ones
	 * on parent items as well as on individual elements. We need to set the active class
	 * to trigger the animation itself.
	 */
	const parentSelector = 'animate__auto__';
	const animationSelector = 'animate__';
	const animationExcludeSelector = 'animate__hover__';
	const animationClass = 'animate__animated';

	/*
	 * Adding class to parent lets it's settings default to the children
	 * Removing class after animation helps prevent it from re-triggering
	 *
	 * Note: Don't change these unless you change the CSS too!
	 */
	const addClassToParent = false; 
	const removeClassAfterAnimation = true;

	/*
	 * This IntersectionObserver monitors for the user scrolling to an animation element
	 * and adds the animation class to it.
	 */
	const animationObserver = new IntersectionObserver( ( entries ) => {
		entries.forEach( ( entry ) => {
			if ( entry.isIntersecting ) {
				entry.target.classList.add( animationClass );
// 				console.log('entry.target.classList:', entry.target.classList); //TEST
			}
		} );
	} );

	/*
	 * Select the PARENT animation elements and observe their children.
	 * If the CHILD is a columns block or latest posts grid then push the animation
	 * down again to the GRANDCHILDREN.
	 *
	 * When the animation is complete stop observing and remove the animation-active
	 * class. This prevents the animations from happening again when the user goes to
	 * another page and returns.
	 */
	document
		.querySelectorAll( "[class*=" + parentSelector + "]" )
		.forEach( ( parent ) => {
			if ( addClassToParent ) parent.classList.add( animationClass );
// 			console.log('parent.classList:', parent.classList); //TEST

			const children = Array.from( parent.children );
			children.forEach( ( child ) => {
				if ( addClassToParent ) child.classList.add( animationClass );

				if (
					child.classList.contains( '.wp-block-columns' ) ||
					( child.classList.contains( 'wp-block-latest-posts' ) &&
						child.classList.contains( 'is-grid' ) )
				) {
					const grandChildren = Array.from( child.children );
					grandChildren.forEach( ( grandChild ) => {
// 						console.log('grandChild.classList:', grandChild.classList); //TEST
						animationObserver.observe( grandChild );
						grandChild.addEventListener(
							'animationend',
							function () {
								animationObserver.unobserve( grandChild );
								if (removeClassAfterAnimation) grandChild.classList.remove( animationClass );
							}
						);
					} );
				} else {
// 					console.log('child.classList:', child.classList); //TEST
					animationObserver.observe( child );
					child.addEventListener( 'animationend', function () {
						animationObserver.unobserve( child );
						if (removeClassAfterAnimation) child.classList.remove( animationClass );
					} );
				}
			} );
		} );

	/*
	 * Select the DIRECT animation elements and observe them.
	 */
	const querySelector = "[class*=" +
		animationSelector +
		"]:not([class*=" +
		parentSelector +
		"]):not([class*=" +
		animationExcludeSelector +
		"]):not(" +
		animationClass +
		")";
	//console.log('querySelector' + querySelector); //TEST
	
	document
		.querySelectorAll(querySelector)
		.forEach( ( animation ) => {
			//console.log('direct.classList:', animation.classList); //TEST		
			
			animationObserver.observe( animation );
			animation.addEventListener( 'animationend', function () {
				animationObserver.unobserve( animation );
				if (removeClassAfterAnimation) animation.classList.remove( animationClass );
			} );
		} );
} )( jQuery );
