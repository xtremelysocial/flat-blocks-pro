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
import classnames from 'classnames';

//import { getOptionFromClassName, updateOptionClass } from './utils';
import {
	inArray,
	getOptionFromClass,
	updateOptionClass
} from '../utils/utils';

// Internal dependencies.
import {
	//animationLabel,
	animationPrefix,
	allAnimationOptions,
	animationParentBlocks,
	animationParentOptions,
	animationHoverBlocks,
	animationHoverOptions,
	animationElementBlocks,
	animationElementOptions,
	parentOptions,
	speedOptions,
	delayOptions,
	repeatOptions,
	attentionOptions
} from './constants';

const { createHigherOrderComponent } = wp.compose;
const { Fragment } = wp.element;
const { InspectorControls } = wp.editor;
const { PanelBody, SelectControl } = wp.components;
const { addFilter } = wp.hooks;
const { __ } = wp.i18n;

const showAnimationOptions = true; //false;

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */

/* Load our animation stylesheet */
import './style.scss';

/*
 * Animation Control
 */

/**
 * Create HOC to add Animation control to inspector controls of block.
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
		if (
			! animationParentBlocks.includes( name ) &&
			! animationHoverBlocks.includes( name ) &&
			! animationElementBlocks.includes( name )
		) {
			return <BlockEdit { ...props } />;
		}

		// Function to handle setting the CSS class based on the selected option
		const onSelectOption = ( newOption, oldOption ) => setAttributes( {
			className: updateOptionClass(
				className,
				animationPrefix,
				oldOption === newOption ? '' : newOption,
				oldOption
			)
		} );

		/* Set the animations list based on the block type */
		let animationOptions = '';
		if ( animationParentBlocks.includes( name ) ) {
			animationOptions = animationParentOptions;
		} else if ( animationHoverBlocks.includes( name ) ) {
			animationOptions = animationHoverOptions;
		} else {
			animationOptions = animationElementOptions;
		};

		// Get the current animation
		const currentAnimation = getOptionFromClass(
			className,
			animationPrefix,
			allAnimationOptions
		);

		// Get the current speed
		const currentSpeed = getOptionFromClass(
			className,
			animationPrefix,
			speedOptions
		);

		// Get the current delay
		const currentDelay = getOptionFromClass(
			className,
			animationPrefix,
			delayOptions
		);

		// Get the current repeat
		const currentRepeat = getOptionFromClass(
			className,
			animationPrefix,
			repeatOptions
		);

		/* Setup whether to display animation options */
		let showOptions = false;
		let showRepeat = false;
		if ( showAnimationOptions ) {
			//showOptions = currentAnimation != 'auto__all' && currentAnimation != 'auto__enter' && currentAnimation != 'hover__auto' && currentAnimation != 'hover__grow' && currentAnimation != 'hover__slideUp' && currentAnimation != '';
			showOptions = currentAnimation != '' && currentAnimation != 'hover__auto' && currentAnimation != 'hover__grow' && currentAnimation != 'hover__slideUp';

// 			console.log(showOptions, attentionOptions, animationPrefix, currentAnimation, inArray( attentionOptions, animationPrefix, currentAnimation )); //TEST
// 			if ( showOptions && inArray( attentionOptions, animationPrefix, currentAnimation ) ) {
			console.log(showOptions, attentionOptions, currentAnimation, inArray( attentionOptions, currentAnimation )); //TEST
			if ( showOptions && inArray( attentionOptions, currentAnimation ) ) {
				showRepeat = true;
			}
		}
		let disableOptions = ! showOptions;
// 		console.log('currentAnimation', currentAnimation, animationOptions); //TEST

		return (
			<Fragment>
				<BlockEdit { ...props } />
				<InspectorControls>
					<PanelBody title={ __( 'Animation' ) } initialOpen={ true }>

						<SelectControl
							label={ __( 'Animation' ) }
							value={ currentAnimation }
							options={ animationOptions }
							onChange={ ( selectedAnimationOption ) => {
								onSelectOption(
									selectedAnimationOption,
									currentAnimation,
									animationPrefix
								);
							} }
						/>

						{ showOptions && (
						<>

							<SelectControl
								label={ __( 'Speed' ) }
								value={ currentSpeed }
								options={ speedOptions }
								disabled={ disableOptions }
								onChange={ ( selectedSpeedOption ) => {
									onSelectOption(
										selectedSpeedOption,
										currentSpeed
									);
								} }
							/>

							<SelectControl
								label={ __( 'Delay' ) }
								value={ currentDelay }
								options={ delayOptions }
								disabled={ disableOptions }
								onChange={ ( selectedDelayOption ) => {
									onSelectOption(
										selectedDelayOption,
										currentDelay
									);
								} }
							/>

							{ showRepeat && (
								<SelectControl
									label={ __( 'Repeat' ) }
									value={ currentRepeat }
									options={ repeatOptions }
									disabled={ disableOptions }
									onChange={ ( selectedRepeatOption ) => {
										onSelectOption(
											selectedRepeatOption,
											currentRepeat
										);
									} }
								/>
							) }

						</>
					) }

					</PanelBody>
				</InspectorControls>
			</Fragment>
		);
	};
}, 'withAdditionalControls' );
addFilter(
	'editor.BlockEdit',
	'flatblocks-pro/animation-control/with-additional-controls',
	withAdditionalControls
);
