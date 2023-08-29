<?php
/**
 * Extends the original theme to make a Block Theme
 */

/** Require Parent Class */
require_once __DIR__ . '/class-theme-init.php';

/** Require Custom Block Class */
require_once __DIR__ . '/block-factory/class-custom-block.php';

/** Block Theme Initializer (on top of standard init) */
class K1_Block_Theme extends Theme_Init {
	public function __construct() { // phpcs:ignore
		parent::__construct();
		add_action( 'after_setup_theme', array( $this, 'block_theme_supports' ) );
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_k1_scripts' ) );
		add_action( 'init', array( $this, 'register_blocks' ) );
	}

	/** Register Block-Theme-Specific Supports */
	public function block_theme_supports() {
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive_embeds' );
		add_image_size( 'heroBanner', 3840, 2160 );
	}

	/** Registers Custom Blocks */
	public function register_blocks() {

		$swipers = array( 'brands-slider', 'testimonials-slider', 'services-slider', 'relationship-first-slider' );
		foreach ( $swipers as $swiper ) {
			$the_swiper_block = $this->register_swiper( $swiper );
			if ( is_wp_error( $the_swiper_block ) ) {
				echo $the_swiper_block->get_error_message();
			}
		}

		$dynamic_blocks = array( 'hero', 'site-header', 'site-footer', 'key-services' );
		foreach ( $dynamic_blocks as $block ) {
			new Custom_Block( $block, BlockType::dynamic );
		}

		$static_blocks = array();
		foreach ( $static_blocks as $block ) {
			new Custom_Block( $block, BlockType::static );
		}
	}

	/** Registers the Swiper script (without enqueue) so it can be called later
	 *
	 * @param string $swiper the name of the swiper
	 */
	private function register_swiper( string $swiper ) {
		$script_dependencies = require_once dirname( __DIR__, 2 ) . "/dist/vendors/sliders/{$swiper}.asset.php";
		$swiper_deps         = array_merge( $script_dependencies['dependencies'], array( 'main' ) );

		// Registers JS
		$swiper_script_registered = wp_register_script(
			$swiper,
			get_stylesheet_directory_uri() . "/dist/vendors/sliders/{$swiper}.js",
			$swiper_deps,
			$script_dependencies['version'],
			true
		);

		if ( $swiper_script_registered ) {
			new Custom_Block( $swiper, BlockType::static, $script_dependencies, array( $swiper ), array( 'script_handles' => array( $swiper ) ) );
		} else {
			return new WP_Error( 'swiper_script_registration_failure', "{$swiper} script not registered!" );
		}
	}
}
