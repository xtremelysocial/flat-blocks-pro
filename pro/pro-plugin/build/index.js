/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/animation/constants.js":
/*!************************************!*\
  !*** ./src/animation/constants.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   allAnimationOptions: () => (/* binding */ allAnimationOptions),
/* harmony export */   animationElementBlocks: () => (/* binding */ animationElementBlocks),
/* harmony export */   animationElementOptions: () => (/* binding */ animationElementOptions),
/* harmony export */   animationHoverBlocks: () => (/* binding */ animationHoverBlocks),
/* harmony export */   animationHoverOptions: () => (/* binding */ animationHoverOptions),
/* harmony export */   animationParentBlocks: () => (/* binding */ animationParentBlocks),
/* harmony export */   animationParentOptions: () => (/* binding */ animationParentOptions),
/* harmony export */   animationPrefix: () => (/* binding */ animationPrefix),
/* harmony export */   attentionOptions: () => (/* binding */ attentionOptions),
/* harmony export */   delayOptions: () => (/* binding */ delayOptions),
/* harmony export */   entranceOptions: () => (/* binding */ entranceOptions),
/* harmony export */   hoverOptions: () => (/* binding */ hoverOptions),
/* harmony export */   parentOptions: () => (/* binding */ parentOptions),
/* harmony export */   repeatOptions: () => (/* binding */ repeatOptions),
/* harmony export */   speedOptions: () => (/* binding */ speedOptions)
/* harmony export */ });
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
const {
  __
} = wp.i18n;

/* Animation Label and CSS class prefix */
const animationPrefix = 'animate__';

// export const animationLabel = __( 'Animation' );

/* This is the default animation, which is no animation */
const defaultOption = [{
  label: __('No Animation'),
  value: ''
}];

/* These are all the parent/group animations */
const parentOptions = [{
  label: __('Auto Entrance and Hover'),
  value: 'auto__all'
}, {
  label: __('Auto Entrance'),
  value: 'auto__enter'
}, {
  label: __('Auto Hover'),
  value: 'hover__auto'
}];

/* These are all the entrance on scroll animations */
const entranceOptions = [{
  label: __('Fade In'),
  value: 'fadeIn'
}, {
  label: __('Fade In Up'),
  value: 'fadeInUp'
}, {
  label: __('Fade In Down'),
  value: 'fadeInDown'
}, {
  label: __('Fade In Left'),
  value: 'fadeInLeft'
}, {
  label: __('Fade In Right'),
  value: 'fadeInRight'
}, {
  label: __('Slide In Up'),
  value: 'slideInUp'
}, {
  label: __('Slide In Down'),
  value: 'slideInDown'
}, {
  label: __('Slide In Left'),
  value: 'slideInLeft'
}, {
  label: __('Slide In Right'),
  value: 'slideInRight'
}, {
  label: __('Zoom In'),
  value: 'zoomIn'
}, {
  label: __('Zoom In Up'),
  value: 'zoomInUp'
}, {
  label: __('Zoom In Down'),
  value: 'zoomInDown'
}, {
  label: __('Zoom In Left'),
  value: 'zoomInLeft'
}, {
  label: __('Zoom In Right'),
  value: 'zoomInRight'
}];

/* These are all the attention-getters on scroll animations */
const attentionOptions = [{
  label: __('Bounce'),
  value: 'bounce'
}, {
  label: __('Flash'),
  value: 'flash'
}, {
  label: __('Pulse'),
  value: 'pulse'
}, {
  label: __('Rubber Band'),
  value: 'rubberBand'
}, {
  label: __('Shake Horizontal'),
  value: 'shakeX'
}, {
  label: __('Shake Vertical'),
  value: 'shakeY'
}, {
  label: __('Head Shake'),
  value: 'headShake'
}, {
  label: __('Swing'),
  value: 'swing'
}, {
  label: __('Ta Da'),
  value: 'tada'
}, {
  label: __('Wobble'),
  value: 'wobble'
}, {
  label: __('Jello'),
  value: 'jello'
}, {
  label: __('Heartbeat'),
  value: 'heartBeat'
}];

/* These are all the hover animations */
const hoverOptions = [{
  label: __('Hover Grow'),
  value: 'hover__grow'
}, {
  label: __('Hover Slide Up'),
  value: 'hover__slideUp'
}
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
const allAnimationOptions = [...defaultOption, ...parentOptions, ...hoverOptions, ...entranceOptions, ...attentionOptions];

/*
 * Parent blocks have auto-animate, auto-fade, auto-hover, plus all the
 * entrance options.
 */
const animationParentBlocks = ['core/group', 'core/columns', 'core/cover'
// 	'core/gallery',
// 	'jetpack/tiled-gallery',
];

// Parent block options
const animationParentOptions = [...defaultOption, ...parentOptions, ...entranceOptions, ...attentionOptions];

// Hover blocks have the hover options and all the entrance animations */
const animationHoverBlocks = ['core/buttons', 'core/button', 'core/image', 'core/paragraph', 'xtremelysocial/dashicons'];

// Hover block options
const animationHoverOptions = [...defaultOption, ...hoverOptions, ...entranceOptions, ...attentionOptions];

/*
 * Individual element blocks have all the entrance and attention-getting
 * animations
 */
const animationElementBlocks = [
// 	'core/group',
// 	'core/columns',
// 	'core/cover',
// 	'core/buttons',
// 	'core/button',
// 	'core/column',
// 	'core/image',
// 	'core/paragraph',
// 	'xtremelysocial/dashicons',
'core/column', 'core/gallery', 'jetpack/tiled-gallery', 'core/heading', 'core/list', 'core/quote', 'core/pullquote', 'core/site-title', 'core/site-tagline', 'core/post-title', 'core/post-excerpt', 'core/latest-posts', 'core/table'];

// Element block options
const animationElementOptions = [...defaultOption, ...entranceOptions, ...attentionOptions];
const speedOptions = [{
  label: __('Normal'),
  value: ''
}, {
  label: __('Slow'),
  value: 'slow'
}, {
  label: __('Slower'),
  value: 'slower'
}, {
  label: __('Fast'),
  value: 'fast'
}, {
  label: __('Faster'),
  value: 'faster'
}];
const delayOptions = [{
  label: __('No Delay'),
  value: ''
}, {
  label: __('Delay 1x'),
  value: 'delay-1s'
}, {
  label: __('Delay 2x'),
  value: 'delay-2s'
}, {
  label: __('Delay 3x'),
  value: 'delay-3s'
}
// 	{
// 		label: __( 'Delay 4x' ),
// 		value: 'delay-4s',
// 	},
// 	{
// 		label: __( 'Delay 5x' ),
// 		value: 'delay-5s',
// 	},
];
const repeatOptions = [{
  label: __('Only Once'),
  value: ''
}, {
  label: __('Repeat 2x'),
  value: 'repeat-2'
}, {
  label: __('Repeat 3x'),
  value: 'repeat-3'
}, {
  label: __('Infinite'),
  value: 'infinite'
}];

/***/ }),

/***/ "./src/animation/edit.js":
/*!*******************************!*\
  !*** ./src/animation/edit.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _utils_utils__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../utils/utils */ "./src/utils/utils.js");
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./constants */ "./src/animation/constants.js");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./style.scss */ "./src/animation/style.scss");

/**
 * File:	animation/index.js
 * Plugin:	Flatblocks PRO Theme Plugin
 *
 * Sets up and renders our animation control on supported blocks
 *
 * @package flatblocks-pro
 * @since	1.0
 */

/**
 * Import needed functions
 */


//import { getOptionFromClassName, updateOptionClass } from './utils';


// Internal dependencies.

const {
  createHigherOrderComponent
} = wp.compose;
const {
  Fragment
} = wp.element;
const {
  InspectorControls
} = wp.editor;
const {
  PanelBody,
  SelectControl
} = wp.components;
const {
  addFilter
} = wp.hooks;
const {
  __
} = wp.i18n;
const showAnimationOptions = true; //false;

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */

/* Load our animation stylesheet */


/*
 * Animation Control
 */

/**
 * Create HOC to add Animation control to inspector controls of block.
 */
const withAdditionalControls = createHigherOrderComponent(BlockEdit => {
  return props => {
    // Extract properties and methods
    const {
      name,
      attributes: {
        className
      },
      setAttributes
    } = props;

    // Do nothing if it's not one of our blocks to extend
    if (!_constants__WEBPACK_IMPORTED_MODULE_3__.animationParentBlocks.includes(name) && !_constants__WEBPACK_IMPORTED_MODULE_3__.animationHoverBlocks.includes(name) && !_constants__WEBPACK_IMPORTED_MODULE_3__.animationElementBlocks.includes(name)) {
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, {
        ...props
      });
    }

    // Function to handle setting the CSS class based on the selected option
    const onSelectOption = (newOption, oldOption) => setAttributes({
      className: (0,_utils_utils__WEBPACK_IMPORTED_MODULE_2__.updateOptionClass)(className, _constants__WEBPACK_IMPORTED_MODULE_3__.animationPrefix, oldOption === newOption ? '' : newOption, oldOption)
    });

    /* Set the animations list based on the block type */
    let animationOptions = '';
    if (_constants__WEBPACK_IMPORTED_MODULE_3__.animationParentBlocks.includes(name)) {
      animationOptions = _constants__WEBPACK_IMPORTED_MODULE_3__.animationParentOptions;
    } else if (_constants__WEBPACK_IMPORTED_MODULE_3__.animationHoverBlocks.includes(name)) {
      animationOptions = _constants__WEBPACK_IMPORTED_MODULE_3__.animationHoverOptions;
    } else {
      animationOptions = _constants__WEBPACK_IMPORTED_MODULE_3__.animationElementOptions;
    }
    ;

    // Get the current animation
    const currentAnimation = (0,_utils_utils__WEBPACK_IMPORTED_MODULE_2__.getOptionFromClass)(className, _constants__WEBPACK_IMPORTED_MODULE_3__.animationPrefix, _constants__WEBPACK_IMPORTED_MODULE_3__.allAnimationOptions);

    // Get the current speed
    const currentSpeed = (0,_utils_utils__WEBPACK_IMPORTED_MODULE_2__.getOptionFromClass)(className, _constants__WEBPACK_IMPORTED_MODULE_3__.animationPrefix, _constants__WEBPACK_IMPORTED_MODULE_3__.speedOptions);

    // Get the current delay
    const currentDelay = (0,_utils_utils__WEBPACK_IMPORTED_MODULE_2__.getOptionFromClass)(className, _constants__WEBPACK_IMPORTED_MODULE_3__.animationPrefix, _constants__WEBPACK_IMPORTED_MODULE_3__.delayOptions);

    // Get the current repeat
    const currentRepeat = (0,_utils_utils__WEBPACK_IMPORTED_MODULE_2__.getOptionFromClass)(className, _constants__WEBPACK_IMPORTED_MODULE_3__.animationPrefix, _constants__WEBPACK_IMPORTED_MODULE_3__.repeatOptions);

    /* Setup whether to display animation options */
    let showOptions = false;
    let showRepeat = false;
    if (showAnimationOptions) {
      //showOptions = currentAnimation != 'auto__all' && currentAnimation != 'auto__enter' && currentAnimation != 'hover__auto' && currentAnimation != 'hover__grow' && currentAnimation != 'hover__slideUp' && currentAnimation != '';
      showOptions = currentAnimation != '' && currentAnimation != 'hover__auto' && currentAnimation != 'hover__grow' && currentAnimation != 'hover__slideUp';

      // 			console.log(showOptions, attentionOptions, animationPrefix, currentAnimation, inArray( attentionOptions, animationPrefix, currentAnimation )); //TEST
      // 			if ( showOptions && inArray( attentionOptions, animationPrefix, currentAnimation ) ) {
      console.log(showOptions, _constants__WEBPACK_IMPORTED_MODULE_3__.attentionOptions, currentAnimation, (0,_utils_utils__WEBPACK_IMPORTED_MODULE_2__.inArray)(_constants__WEBPACK_IMPORTED_MODULE_3__.attentionOptions, currentAnimation)); //TEST
      if (showOptions && (0,_utils_utils__WEBPACK_IMPORTED_MODULE_2__.inArray)(_constants__WEBPACK_IMPORTED_MODULE_3__.attentionOptions, currentAnimation)) {
        showRepeat = true;
      }
    }
    let disableOptions = !showOptions;
    // 		console.log('currentAnimation', currentAnimation, animationOptions); //TEST

    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, {
      ...props
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
      title: __('Animation'),
      initialOpen: true
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
      label: __('Animation'),
      value: currentAnimation,
      options: animationOptions,
      onChange: selectedAnimationOption => {
        onSelectOption(selectedAnimationOption, currentAnimation, _constants__WEBPACK_IMPORTED_MODULE_3__.animationPrefix);
      }
    }), showOptions && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
      label: __('Speed'),
      value: currentSpeed,
      options: _constants__WEBPACK_IMPORTED_MODULE_3__.speedOptions,
      disabled: disableOptions,
      onChange: selectedSpeedOption => {
        onSelectOption(selectedSpeedOption, currentSpeed);
      }
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
      label: __('Delay'),
      value: currentDelay,
      options: _constants__WEBPACK_IMPORTED_MODULE_3__.delayOptions,
      disabled: disableOptions,
      onChange: selectedDelayOption => {
        onSelectOption(selectedDelayOption, currentDelay);
      }
    }), showRepeat && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
      label: __('Repeat'),
      value: currentRepeat,
      options: _constants__WEBPACK_IMPORTED_MODULE_3__.repeatOptions,
      disabled: disableOptions,
      onChange: selectedRepeatOption => {
        onSelectOption(selectedRepeatOption, currentRepeat);
      }
    })))));
  };
}, 'withAdditionalControls');
addFilter('editor.BlockEdit', 'flatblocks-pro/animation-control/with-additional-controls', withAdditionalControls);

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _animation_edit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./animation/edit */ "./src/animation/edit.js");
/* harmony import */ var _visibility_edit__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./visibility/edit */ "./src/visibility/edit.js");
/**
 * File:	index.js
 * Plugin:	Flatblocks PRO Theme Plugin
 *
 * Loads the various modules for our plugin in the Editor
 *
 * @package flatblocks-pro
 * @since	1.0
 */

/**
 * Here we import each of our "modules" edit.js file which loads any
 * needed javascript and CSS for the Editor.
 */



/***/ }),

/***/ "./src/utils/utils.js":
/*!****************************!*\
  !*** ./src/utils/utils.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   getOptionFromClass: () => (/* binding */ getOptionFromClass),
/* harmony export */   inArray: () => (/* binding */ inArray),
/* harmony export */   updateOptionClass: () => (/* binding */ updateOptionClass)
/* harmony export */ });
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/token-list */ "@wordpress/token-list");
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_token_list__WEBPACK_IMPORTED_MODULE_0__);
/**
 * File:	utils/utils.js
 * Plugin:	Flatblocks PRO Theme Plugin
 *
 * Utility functions for the our plugin
 *
 * @package flatblocks-pro
 * @since	1.0
 */

// WordPress dependencies.


/*
 * Function: inArray - Determine if an element is in an array
 *
 * Parameters:
 * haystack		array		Two-dimensional array of options
 * prefix		string 		Element prefix (e.g. animate__)
 * needle:		string		Element to find in the array
 *
 * Output:
 * CSS Class (string)
 */
const inArray = (haystack = [],
// 	prefix = '',
needle = '') => {
  //return haystack.findIndex( let result = (arr) => arr.includes( needle ) );
  //return haystack.findIndex( isLargeNumber = (element) => element > 13; );
  // 	const element = haystack.find( ( needle ) =>
  // 		haystack.contains( `${ prefix }${ needle }` )
  // 	);
  // 	return undefined !== element ? true : false;
  // 	function found ( search, index ) {
  // 		return haystack[index].includes( search );
  // 	}
  // 	return haystack.findIndex ( found );
  // 	return haystack.findIndex( option => option.value == `${ prefix }${ needle }` );
  return haystack.findIndex(option => option.value == needle) >= 0;
};

/*
const products = [
  { name: 'Phone', price: 999 },
  { name: 'Computer', price: 1999 },
  { name: 'Tablet', price: 995 },
];

const index = products.findIndex(product => product.price > 1000);
*/
/*
const numbers = [4, 12, 16, 20];

function checkValue(x) {
  return x > document.getElementById("toCheck").value;
}

function myFunction() {
  document.getElementById("demo").innerHTML = numbers.findIndex(checkValue);
}
*/

/*
 * Function: getOptionFromClass - extract an option from a list of CSS classes
 *
 * Parameters:
 * className	string		CSS class(es)
 * prefix		string 		option prefix (e.g. animate__)
 * options:		array		List of all possible options
 *
 * Output:
 * CSS Class (string)
 */
const getOptionFromClass = (className, prefix, options) => {
  const list = new (_wordpress_token_list__WEBPACK_IMPORTED_MODULE_0___default())(className);
  const style = options.find(option => list.contains(`${prefix}${option.value}`));
  return undefined !== style ? style.value : '';
};

/*
 * Function: updateOptionClass  - Remove and add CSS class for options
 *
 * Parameters:
 * className	string		CSS class(es)
 * prefix		string 		option prefix (e.g. animate__)
 * newOption	string		newly selected option to add
 * oldOption	string		old option to remove
 *
 * Output:
 * CSS Class (string)
 */
const updateOptionClass = (className, prefix, newOption = '', oldOption = '') => {
  const list = new (_wordpress_token_list__WEBPACK_IMPORTED_MODULE_0___default())(className);
  if (oldOption) {
    list.remove(`${prefix}${oldOption}`);
  }
  if (newOption) {
    list.add(`${prefix}${newOption}`);
  }
  return list.value;
};

/**
 * Takes a class name and prefix and removes all occurances of
 * that prefix. e.g. removeClassWithPrefix( 'abc-123 abc-xyz def', 'abc-' )
 * returns 'def'.
 */
/*
export const removeClassWithPrefix = ( classNames, prefix = '' ) => {
	return classNames
		? classNames
				.split( ' ' )
				.filter( ( c ) => ! c.startsWith( prefix ) )
				.join( ' ' )
				.trim()
		: '';
};
*/

/***/ }),

/***/ "./src/visibility/edit.js":
/*!********************************!*\
  !*** ./src/visibility/edit.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _utils_utils__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../utils/utils */ "./src/utils/utils.js");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./style.scss */ "./src/visibility/style.scss");

/**
 * File:	visibility/index.js
 * Plugin:	Flatblocks PRO Plugin
 *
 * Adds the Visibility control to supported blocks
 *
 * @package flatblocks-pro
 * @since	1.0
 */

/**
 * Import needed functions
 */


//import { removeClassWithPrefix } from '../utils/utils';
//import { getVisibilityFromClassName, updateVisibilityClass } from '../utils/utils';
//import { getVisibilityFromClassName, updateVisibilityClass } from './utils';


//import { assign, merge } from lodash;
// const { assign, merge } = lodash;

const {
  createHigherOrderComponent
} = wp.compose;
const {
  Fragment
} = wp.element;
const {
  InspectorControls
} = wp.editor;
const {
  PanelBody,
  SelectControl
} = wp.components;
const {
  addFilter
} = wp.hooks;
const {
  __
} = wp.i18n;

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/*
 * Visibility Control
 */
const visibilityPrefix = 'has-visibility-';

// Enable visibility control on the following blocks
const visibilityBlocks = ['core/group', 'core/columns', 'core/cover', 'core/image', 'core/navigation-link', 'core/home-link'];

// Available visibility control options
const visibilityOptions = [{
  label: __('Always Visibile'),
  value: ''
}, {
  label: __('Hide on Mobile'),
  value: 'hide-on-mobile'
}, {
  label: __('Show on Mobile'),
  value: 'show-on-mobile'
}, {
  label: __('Hide on Tablet'),
  value: 'hide-on-tablet'
}, {
  label: __('Show on Tablet'),
  value: 'show-on-tablet'
}, {
  label: __('Hide on Desktop'),
  value: 'hide-on-desktop'
}, {
  label: __('Show on Desktop'),
  value: 'show-on-desktop'
}];

/**
 * Create HOC to add Visibility control to inspector controls of block.
 */
const withAdditionalControls = createHigherOrderComponent(BlockEdit => {
  return props => {
    // Extract properties and methods
    const {
      name,
      attributes: {
        className
      },
      setAttributes
    } = props;

    // Do nothing if it's not one of our blocks to extend
    if (!visibilityBlocks.includes(name)) {
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, {
        ...props
      });
    }

    // Get the current visibility
    const currentVisibility = (0,_utils_utils__WEBPACK_IMPORTED_MODULE_2__.getOptionFromClass)(className, visibilityPrefix, visibilityOptions);

    // Handle setting the CSS Class based on visibility option
    const onSelectVisibility = visibility => setAttributes({
      className: (0,_utils_utils__WEBPACK_IMPORTED_MODULE_2__.updateOptionClass)(className, visibilityPrefix, currentVisibility === visibility ? '' : visibility, currentVisibility)
      //console.log('className after selection:', className);
    });
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, {
      ...props
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
      title: __('Visibility'),
      initialOpen: true
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(SelectControl, {
      label: __('Visibility'),
      value: currentVisibility,
      options: visibilityOptions,
      onChange: selectedVisibilityOption => {
        onSelectVisibility(selectedVisibilityOption);
      }
    }))));
  };
}, 'withAdditionalControls');
addFilter('editor.BlockEdit', 'flatblocks-pro/visibility-control/with-additional-controls', withAdditionalControls);

/***/ }),

/***/ "./src/animation/style.scss":
/*!**********************************!*\
  !*** ./src/animation/style.scss ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/visibility/style.scss":
/*!***********************************!*\
  !*** ./src/visibility/style.scss ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

"use strict";
module.exports = window["React"];

/***/ }),

/***/ "@wordpress/token-list":
/*!***********************************!*\
  !*** external ["wp","tokenList"] ***!
  \***********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["tokenList"];

/***/ }),

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/***/ ((module, exports) => {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
	Copyright (c) 2018 Jed Watson.
	Licensed under the MIT License (MIT), see
	http://jedwatson.github.io/classnames
*/
/* global define */

(function () {
	'use strict';

	var hasOwn = {}.hasOwnProperty;

	function classNames () {
		var classes = '';

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (arg) {
				classes = appendClass(classes, parseValue(arg));
			}
		}

		return classes;
	}

	function parseValue (arg) {
		if (typeof arg === 'string' || typeof arg === 'number') {
			return arg;
		}

		if (typeof arg !== 'object') {
			return '';
		}

		if (Array.isArray(arg)) {
			return classNames.apply(null, arg);
		}

		if (arg.toString !== Object.prototype.toString && !arg.toString.toString().includes('[native code]')) {
			return arg.toString();
		}

		var classes = '';

		for (var key in arg) {
			if (hasOwn.call(arg, key) && arg[key]) {
				classes = appendClass(classes, key);
			}
		}

		return classes;
	}

	function appendClass (value, newClass) {
		if (!newClass) {
			return value;
		}
	
		if (value) {
			return value + ' ' + newClass;
		}
	
		return value + newClass;
	}

	if ( true && module.exports) {
		classNames.default = classNames;
		module.exports = classNames;
	} else if (true) {
		// register as 'classnames', consistent with npm package name
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
			return classNames;
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
}());


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"index": 0,
/******/ 			"./style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunkflatblocks_pro"] = globalThis["webpackChunkflatblocks_pro"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["./style-index"], () => (__webpack_require__("./src/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map