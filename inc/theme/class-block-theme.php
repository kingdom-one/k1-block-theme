<?php // phpcs:ignore
require_once dirname( __FILE__ ) . '/class-theme-init.php';
/** Block Theme Initializer (on top of standard init) */
class Block_Theme extends Theme_Init {
	public function __construct() { // phpcs:ignore
		add_action( 'after_setup_theme', array( $this, 'block_theme_supports' ) );
		add_action( 'init', array( $this, 'register_blocks' ) );
	}

	/** Register Block-Theme-Specific Supports */
	public function block_theme_supports() {
		add_theme_support( 'editor-styles' );
		// load frontend css in the editor screen. TODO: Refactor me
		add_editor_style( array( 'dist/global.css', 'dist/vendors/vendors.css', 'dist/frontPage.css' ) );
	}

	/** Registers Custom Blocks */
	public function register_blocks() {
		$blocks = array( 'hero', 'hero-content' );
		foreach ( $blocks as $block_name ) {
			$this->register_block_type( $block_name );
		}
	}

	/** Registers Block Type Scripts
	 *
	 * @param string $block_name the name of the block
	 */
	private function register_block_type( string $block_name ) {
		$script_dependencies = require dirname( __FILE__, 3 ) . "/dist/blocks/{$block_name}.asset.php";
		$script_name         = "{$block_name}BlockScript";
		wp_register_script( $script_name, get_stylesheet_directory_uri() . "/dist/blocks/{$block_name}.js", $script_dependencies['dependencies'], $script_dependencies['version'], true );
		$block = register_block_type(
			"k1-block-theme/{$block_name}",
			array(
				'editor_script' => $script_name,
			)
		);
	}
}