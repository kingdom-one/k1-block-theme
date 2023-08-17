<?php // phpcs:ignore
require_once dirname( __FILE__ ) . '/class-theme-init.php';
/** Block Theme Initializer (on top of standard init) */
class Block_Theme extends Theme_Init {
	private string $block_name; // phpcs:ignore

	public function __construct() { // phpcs:ignore
		parent::__construct();
		add_action( 'after_setup_theme', array( $this, 'block_theme_supports' ) );
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_k1_scripts' ) );
		add_action( 'init', array( $this, 'register_blocks' ) );
	}

	/** Register Block-Theme-Specific Supports */
	public function block_theme_supports() {
		add_theme_support( 'wp-block-styles' );
		add_image_size( 'heroBanner', 3840, 2160 );
	}

	/** Registers Custom Blocks */
	public function register_blocks() {
		$dynamic_blocks = array( 'hero', 'testimonials-slider' );
		foreach ( $dynamic_blocks as $block_name ) {
			$this->register_dynamic_block_type( $block_name );
		}

	}

	/** Registers Block Type Scripts
	 *
	 * @param string $block_name the name of the block
	 */
	private function register_dynamic_block_type( string $block_name ) {
		$this->block_name    = $block_name;
		$script_dependencies = require_once dirname( __FILE__, 3 ) . "/dist/blocks/{$block_name}.asset.php";
		$script_name         = "{$block_name}BlockScript";
		$style_name          = "{$block_name}-style";
		$the_block           = 'k1-block-theme/' . $block_name;

		// Registers JS
		wp_register_script(
			$script_name,
			get_stylesheet_directory_uri() . "/dist/blocks/{$block_name}.js",
			$script_dependencies['dependencies'],
			$script_dependencies['version'],
			true
		);

		// Enqueues Editor Style
		wp_enqueue_block_style(
			$the_block,
			array(
				'handle' => $style_name,
				'path'   => get_theme_file_path( "/dist/blocks/{$block_name}.css" ),
				'src'    => get_theme_file_uri( "/dist/blocks/{$block_name}.css" ),
				'deps'   => array( 'main' ),
				'ver'    => $script_dependencies['version'],
			)
		);

		$block_loaded = register_block_type(
			$the_block,
			array(
				'editor_script'   => $script_name,
				'style_handles'   => array( $style_name ),
				'render_callback' => array( $this, 'ourRenderCallback' ),
			)
		);

		if ( false === $block_loaded ) {
			new WP_Error( '501', "{$block_name} failed to load!" );
		}
	}

	/** The PHP Render callback function
	 *
	 * @param array    $attributes the block attributes
	 * @param string   $content the block contents
	 * @param WP_Block $block the nested block
	 * @return string the HTML
	 */
	public function ourRenderCallback( array $attributes, string $content, $block ): string {
		$template_file = "/our-blocks/{$this->block_name}.php";
		ob_start();
		require get_theme_file_path( $template_file );
		return ob_get_clean();
	}
}