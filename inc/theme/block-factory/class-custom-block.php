<?php
/** Block Factory */

/**
 * Custom Block
 * Description: Generates a WordPress Block
 * */
class Custom_Block {
	/** The Block Name
	 *
	 * @var string
	 */
	public string $name = '';

	/**
	 * Constructor
	 *
	 * @param string     $name the name of the block
	 * @param array|null $asset_file [optional] the asset.php file
	 * @param string[]   $script_handles the name of the handles
	 * @param ?array     $block_args custom block args
	 */
	public function __construct( string $name, $asset_file = null, $script_handles = array(), $block_args = array() ) {
		$this->name = $name;
		$this->register_dynamic_block_type( $asset_file, $script_handles, $block_args );
	}

	/**
	 * Registers Block Type Scripts
	 *
	 * @param ?array $asset_file block asset_file override
	 * @param ?array $script_handles script handles to add to dependencies
	 * @param ?array $block_args custom block args
	 */
	private function register_dynamic_block_type( ?array $asset_file, array $script_handles = array(), $block_args = array() ) {
		$block_name          = $this->name;
		$script_dependencies = $asset_file ?? require dirname( __DIR__, 3 ) . "/dist/blocks/{$block_name}.asset.php";
		$total_deps          = array_merge( $script_dependencies['dependencies'], $script_handles );
		$script_name         = "{$block_name}BlockScript";
		$style_name          = "{$block_name}-style";
		$the_block           = 'k1-block-theme/' . $block_name;

		// Registers JS
		$block_script = wp_register_script(
			$script_name,
			get_stylesheet_directory_uri() . "/dist/blocks/{$block_name}.js",
			$total_deps,
			$script_dependencies['version'],
			true
		);

		if ( ! $block_script ) {
			new WP_Error( 'block_registration_error', $block_name . 'failed to register its script!' );
		}
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

		$block_type_args = array(
			'editor_script'   => $script_name,
			'style_handles'   => array( $style_name ),
			'render_callback' => array( $this, 'the_render_callback' ),
		);

		$total_block_type_args = array_merge( $block_type_args, $block_args );
		$block_loaded          = register_block_type( $the_block, $total_block_type_args );

		if ( false === $block_loaded ) {
			new WP_Error( 'block_load_failure', "{$block_name} failed to load!" );
		}
	}

	/** The PHP Render callback function
	 *
	 * @param array    $attributes the block attributes
	 * @param string   $content the block contents
	 * @param WP_Block $block the nested block
	 * @return string the HTML
	 */
	public function the_render_callback( array $attributes, string $content, $block ): string|false { // phpcs:ignore
		$template_file = "/our-blocks/{$this->name}.php";
		ob_start();
		require get_theme_file_path( $template_file );
		return ob_get_clean();
	}
}
