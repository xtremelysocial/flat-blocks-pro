/**
 * File:	block-variations.js
 * Theme: 	Flat Blocks
 *
 * Javascript for registering block variations
 *
 * @package
 * @since	1.6.7
 *
 * @link https://developer.wordpress.org/themes/features/block-variations/
 */

const { registerBlockVariation } = wp.blocks;
const { __ } = wp.i18n;

const themeSlug = 'flatblocks';
const textDomain = 'flat-blocks';

registerBlockVariation( 'core/spacer', {
	name: 'flatblocks/spacer',
	title: __( 'Flat Blocks: Spacer', 'flat-blocks' ),
	keywords: [ 'space', 'spacer', 'spacing' ],
	attributes: {
		className: 'flatblocks-spacer',
		height: '180px',
	},
	isActive: ( blockAttributes ) =>
		blockAttributes.height && '180px' === blockAttributes.height,
} );

registerBlockVariation( 'core/separator', {
	name: 'flatblocks/separator',
	title: __( 'Flat Blocks: Separator', 'flat-blocks' ),
	keywords: [ 'separator', 'hr', 'horizontal', 'rule' ],
	attributes: {
		className: 'flatblocks-separator',
		border: {
			style: 'solid',
			width: '0 0 6px',
		},
	},
	isActive: ( blockAttributes ) =>
		blockAttributes.border && 'solid' === blockAttributes.border.style && '0 0 6px' === blockAttributes.border.width,
} );
