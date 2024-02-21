/**
 * File:	animation/constants.js
 * Plugin:	Flatblocks PRO Theme Plugin
 *
 * Constants for the animation features of our plugin
 *
 * @package flatblocks-pro
 * @since	1.0
 */

/* Import dependencies */
const { __ } = wp.i18n;

/* Animation Label and CSS class prefix */
export const animationPrefix = 'animate__';

// export const animationLabel = __( 'Animation' );

/* This is the default animation, which is no animation */
const defaultOption = [
	{
		label: __( 'No Animation' ),
		value: '',
	}
];

/* These are all the parent/group animations */
export const parentOptions = [
	{
		label: __( 'Auto Entrance and Hover' ),
		value: 'auto__all',
	},
	{
		label: __( 'Auto Entrance' ),
		value: 'auto__enter',
	},
	{
		label: __( 'Auto Hover' ),
		value: 'hover__auto',
	}
];

/* These are all the entrance on scroll animations */
export const entranceOptions = [
	{
		label: __( 'Fade In' ),
		value: 'fadeIn',
	},
	{
		label: __( 'Fade In Up' ),
		value: 'fadeInUp',
	},
	{
		label: __( 'Fade In Down' ),
		value: 'fadeInDown',
	},
	{
		label: __( 'Fade In Left' ),
		value: 'fadeInLeft',
	},
	{
		label: __( 'Fade In Right' ),
		value: 'fadeInRight',
	},
	{
		label: __( 'Slide In Up' ),
		value: 'slideInUp',
	},
	{
		label: __( 'Slide In Down' ),
		value: 'slideInDown',
	},
	{
		label: __( 'Slide In Left' ),
		value: 'slideInLeft',
	},
	{
		label: __( 'Slide In Right' ),
		value: 'slideInRight',
	},
	{
		label: __( 'Zoom In' ),
		value: 'zoomIn',
	},
	{
		label: __( 'Zoom In Up' ),
		value: 'zoomInUp',
	},
	{
		label: __( 'Zoom In Down' ),
		value: 'zoomInDown',
	},
	{
		label: __( 'Zoom In Left' ),
		value: 'zoomInLeft',
	},
	{
		label: __( 'Zoom In Right' ),
		value: 'zoomInRight',
	},
];

/* These are all the attention-getters on scroll animations */
export const attentionOptions = [
	{
		label: __( 'Bounce' ),
		value: 'bounce',
	},
	{
		label: __( 'Flash' ),
		value: 'flash',
	},
	{
		label: __( 'Pulse' ),
		value: 'pulse',
	},
	{
		label: __( 'Rubber Band' ),
		value: 'rubberBand',
	},
	{
		label: __( 'Shake Horizontal' ),
		value: 'shakeX',
	},
	{
		label: __( 'Shake Vertical' ),
		value: 'shakeY',
	},
	{
		label: __( 'Head Shake' ),
		value: 'headShake',
	},
	{
		label: __( 'Swing' ),
		value: 'swing',
	},
	{
		label: __( 'Ta Da' ),
		value: 'tada',
	},
	{
		label: __( 'Wobble' ),
		value: 'wobble',
	},
	{
		label: __( 'Jello' ),
		value: 'jello',
	},
	{
		label: __( 'Heartbeat' ),
		value: 'heartBeat',
	},
]

/* These are all the hover animations */
export const hoverOptions = [
	{
		label: __( 'Hover Grow' ),
		value: 'hover__grow',
	},
	{
		label: __( 'Hover Slide Up' ),
		value: 'hover__slideUp',
	},
// 	{
// 		label: __( 'Hover Bounce' ),
// 		value: 'hover__bounce',
// 	},
// 	{
// 		label: __( 'Hover Pulse' ),
// 		value: 'hover__pulse',
// 	},
// 	{
// 		label: __( 'Hover Heartbeat' ),
// 		value: 'hover__heartBeat',
// 	}
];

/* All Animation options */
export const allAnimationOptions = [
	...defaultOption,
	...parentOptions,
	...hoverOptions,
	...entranceOptions,
	...attentionOptions
];

/*
 * Parent blocks have auto-animate, auto-fade, auto-hover, plus all the
 * entrance options.
 */
export const animationParentBlocks = [
	'core/group',
	'core/columns',
	'core/cover',
// 	'core/gallery',
// 	'jetpack/tiled-gallery',
];

// Parent block options
export const animationParentOptions = [
	...defaultOption,
	...parentOptions,
	...entranceOptions,
	...attentionOptions
];

// Hover blocks have the hover options and all the entrance animations */
export const animationHoverBlocks = [
	'core/buttons',
	'core/button',
	'core/image',
	'core/paragraph',
	'xtremelysocial/dashicons'
];

// Hover block options
export const animationHoverOptions = [
	...defaultOption,
	...hoverOptions,
	...entranceOptions,
	...attentionOptions
];

/*
 * Individual element blocks have all the entrance and attention-getting
 * animations
 */
export const animationElementBlocks = [
// 	'core/group',
// 	'core/columns',
// 	'core/cover',
// 	'core/buttons',
// 	'core/button',
// 	'core/column',
// 	'core/image',
// 	'core/paragraph',
// 	'xtremelysocial/dashicons',
	'core/column',
	'core/gallery',
	'jetpack/tiled-gallery',
	'core/heading',
	'core/list',
	'core/quote',
	'core/pullquote',
	'core/site-title',
	'core/site-tagline',
	'core/post-title',
	'core/post-excerpt',
	'core/latest-posts',
	'core/table',
];

// Element block options
export const animationElementOptions = [
	...defaultOption,
	...entranceOptions,
	...attentionOptions
];

export const speedOptions = [
	{
		label: __( 'Normal' ),
		value: '',
	},
	{
		label: __( 'Slow' ),
		value: 'slow',
	},
	{
		label: __( 'Slower' ),
		value: 'slower',
	},
	{
		label: __( 'Fast' ),
		value: 'fast',
	},
	{
		label: __( 'Faster' ),
		value: 'faster',
	},
];

export const delayOptions = [
	{
		label: __( 'No Delay' ),
		value: '',
	},
	{
		label: __( 'Delay 1x' ),
		value: 'delay-1s',
	},
	{
		label: __( 'Delay 2x' ),
		value: 'delay-2s',
	},
	{
		label: __( 'Delay 3x' ),
		value: 'delay-3s',
	},
// 	{
// 		label: __( 'Delay 4x' ),
// 		value: 'delay-4s',
// 	},
// 	{
// 		label: __( 'Delay 5x' ),
// 		value: 'delay-5s',
// 	},
];

export const repeatOptions = [
	{
		label: __( 'Only Once' ),
		value: '',
	},
	{
		label: __( 'Repeat 2x' ),
		value: 'repeat-2',
	},
	{
		label: __( 'Repeat 3x' ),
		value: 'repeat-3',
	},
	{
		label: __( 'Infinite' ),
		value: 'infinite',
	},
];
