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
import classnames from 'classnames';

//import { removeClassWithPrefix } from '../utils/utils';
//import { getVisibilityFromClassName, updateVisibilityClass } from '../utils/utils';
//import { getVisibilityFromClassName, updateVisibilityClass } from './utils';
import { getOptionFromClass, updateOptionClass } from '../utils/utils';

//import { assign, merge } from lodash;
// const { assign, merge } = lodash;

const { createHigherOrderComponent } = wp.compose;
const { Fragment } = wp.element;
const { InspectorControls } = wp.editor;
const { PanelBody, SelectControl } = wp.components;
const { addFilter } = wp.hooks;
const { __ } = wp.i18n;

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './style.scss';

/*
 * Visibility Control
 */
const visibilityPrefix = 'has-visibility-';

// Enable visibility control on the following blocks
const visibilityBlocks = [
	'core/group',
	'core/columns',
	'core/cover',
	'core/image',
	'core/navigation-link',
	'core/home-link',
];

// Available visibility control options
const visibilityOptions = [
	{
		label: __( 'Always Visibile' ),
		value: '',
	},
	{
		label: __( 'Hide on Mobile' ),
		value: 'hide-on-mobile',
	},
	{
		label: __( 'Show on Mobile' ),
		value: 'show-on-mobile',
	},
	{
		label: __( 'Hide on Tablet' ),
		value: 'hide-on-tablet',
	},
	{
		label: __( 'Show on Tablet' ),
		value: 'show-on-tablet',
	},
	{
		label: __( 'Hide on Desktop' ),
		value: 'hide-on-desktop',
	},
	{
		label: __( 'Show on Desktop' ),
		value: 'show-on-desktop',
	},
];

/**
 * Create HOC to add Visibility control to inspector controls of block.
 */
const withAdditionalControls = createHigherOrderComponent( ( BlockEdit ) => {
	return ( props ) => {
		// Extract properties and methods
		const {
			name,
			attributes: { className },
			setAttributes,
		} = props;

		// Do nothing if it's not one of our blocks to extend
		if ( ! visibilityBlocks.includes( name ) ) {
			return <BlockEdit { ...props } />;
		}

		// Get the current visibility
		const currentVisibility = getOptionFromClass(
			className,
			visibilityPrefix,
			visibilityOptions
		);

		// Handle setting the CSS Class based on visibility option
		const onSelectVisibility = ( visibility ) => setAttributes( {
			className: updateOptionClass(
				className,
				visibilityPrefix,
				currentVisibility === visibility ? '' : visibility,
				currentVisibility
			),
			//console.log('className after selection:', className);
		} );

		return (
			<Fragment>
				<BlockEdit { ...props } />
				<InspectorControls>
					<PanelBody
						title={ __( 'Visibility' ) }
						initialOpen={ true }
					>
						<SelectControl
							label={ __( 'Visibility' ) }
							value={ currentVisibility }
							options={ visibilityOptions }
							onChange={ ( selectedVisibilityOption ) => {
								onSelectVisibility( selectedVisibilityOption );
							} }
						/>
					</PanelBody>
				</InspectorControls>
			</Fragment>
		);
	};
}, 'withAdditionalControls' );
addFilter(
	'editor.BlockEdit',
	'flatblocks-pro/visibility-control/with-additional-controls',
	withAdditionalControls
);
