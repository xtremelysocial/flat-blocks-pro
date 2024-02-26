<?php
/**
 * Plugin Name:       	Animation & Visibility
 * Plugin URI:  		https://xtremelysocial.com/wordpress/xs-animation/
 * Description:       	Animation & Visibility Plugin by XtremelySocial
 * Requires at least: 	6.2
 * Requires PHP:      	7.4
 * Version:           	0.1.0
 * Author:            	XtremelySocial
 * Author URI:  		https://xtremelysocial.com
 * License:     		GPL-2.0+
 * License URI:       	https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       	xs-animation
 *
 * @package           	xs-animation
 */
 
/**
 * Animation & Visibility Plugin includes the following features, loaded in different ways
 * as follows:
 *
 * Animation Control - /animation/index.js adds an animation control to various blocks
 * 		and loads the necessary CSS.
 *
 * 		/animation/index-animation.php loads the view-animation.js necessary for the
 *		scroll animations to work.
 *
 * Visibility Control - /visibility/index.js adds an visibility control to various blocks.
 *
 */

/* Don't allow this file to be loaded directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* Plugin Class to handle instantiation and plugin functions */
if ( ! class_exists( 'XS_Animation_Plugin' ) ) {

	class XS_Animation_Plugin {

		/**
		 * Static property to hold our singleton instance
		 *
		 */
		static $instance = false;


		/**
		 * Public properties to hold our plugin version and dependencies
		 *
		 * These will be filled later in __construct()
		 *
		 */	
		public $version = '';

		public $dependencies = '';
	
		/**
		 * This is our constructor
		 *
		 * @return void
		 */
		private function __construct() {

			// If we have an asset file, get the plugin version and dependencies 
			// from there.
			if ( file_exists ( __DIR__ . '/build/index.asset.php' ) ) {
				$asset_file = include( __DIR__ . '/build/index.asset.php');
				$this->version = $asset_file['version'];
				$this->dependencies = $asset_file['dependencies'];
			}

			// Load the back end assets
			add_action( 'plugins_loaded', array( $this, 'textdomain' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'xs_animation_load_block_editor_assets' ) );

			// Load the front end assets
			add_action( 'enqueue_block_assets', array( $this, 'xs_animation_load_block_assets' ) );
			//add_action( 'wp_enqueue_scripts', array( $this, 'xs_animation_load_block_assets' ) );

		}

		/**
		 * If an instance exists, this returns it.  If not, it creates one and
		 * retuns it.
		 *
		 * @return XS_Animation_Plugin
		 */
		public static function getInstance() {
			//var_dump('hello, world'); //TEST
			if ( !self::$instance )
				self::$instance = new self;
			return self::$instance;
		}

		/**
		 * Setup multiple language support 
		 */
		public function textdomain() {
			load_plugin_textdomain( 
				'xs-animation', 
				false, 
				dirname( plugin_basename( __FILE__ ) ) . '/languages/'
			);
		}

		/**
		 * Load the pugin's CSS and Javascript on the back-end (only)
		 */
		public function xs_animation_load_block_editor_assets() {
			
			if ( file_exists ( __DIR__ . '/build/index.js' ) ) {
				wp_enqueue_script(
					'xs-animation-editor',
					__DIR__ . '/build/index.js',
					$this->dependencies,
					$this->version
				);
			}
		
			// If the plugin has an editor stylesheet, then load it
			if ( file_exists ( __DIR__ . '/build/index.css' ) ) {
				wp_enqueue_style(
					'xs-animation-editor',
					//XSA_BUILD_DIR . 'index.css',
					__DIR__ . '/build/index.css',
					array(),
					$this->version
				);
			}		
		}

		/**
		 * Load the plugin's Style CSS and Javascript on the front-end (only)
		 */
		public function xs_animation_load_block_assets() {

			// Only do this for the front-end
			if ( is_admin() ) {
				return;
			}
		
			// If the plugin has front-end javascript, then load it
			if ( file_exists ( __DIR__ . '/build/view.js' ) ) {
				wp_enqueue_script(
					'xs-animation',
					__DIR__ . '/build/view.js',
					array('jquery'),
					$this->version,
					$in_footer = true
				);
			}
		
			// Load the plugin's main style-index.css
			if ( file_exists ( __DIR__ . '/build/style-index.css' ) ) {
				wp_enqueue_style(
					'xs-animation',
					__DIR__ . '/build/style-index.css',
					array(),
					$this->version,
				);
			}
		}

	/// end class
	}

	// Instantiate our class
	$XS_Animation_Plugin = XS_Animation_Plugin::getInstance();
}	