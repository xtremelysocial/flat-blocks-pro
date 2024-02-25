/**
 * File:	utils/utils.js
 * Plugin:	Animation & Visibility Plugin
 *
 * Utility functions for the our plugin
 *
 * @package xs-animation
 * @since	1.0
 */

// WordPress dependencies.
import TokenList from '@wordpress/token-list';

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
export const inArray = (
	haystack = [],
// 	prefix = '',
	needle = ''
) => {
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
	return haystack.findIndex( option => option.value == needle ) >= 0;
}

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
export const getOptionFromClass = (
	className,
	prefix,
	options
) => {
	const list = new TokenList( className );

	const style = options.find( ( option ) =>
		list.contains( `${ prefix }${ option.value }` )
	);

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
export const updateOptionClass = (
	className,
	prefix,
	newOption = '',
	oldOption = ''
) => {
	const list = new TokenList( className );

	if ( oldOption ) {
		list.remove( `${ prefix }${ oldOption }` );
	}

	if ( newOption ) {
		list.add( `${ prefix }${ newOption }` );
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
