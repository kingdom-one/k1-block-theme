<?php
/**
 * Loads the Block Theme
 *
 * @package KingdomOne
 */

// Grabs Parent
require_once __DIR__ . '/class-theme-init.php';

/** Block Theme Initializer (on top of standard init) */
class K1_Block_Theme extends Theme_Init {
	/** Init Block Theme Supports */
	public function __construct() {
		parent::__construct();
		add_action( 'after_setup_theme', array( $this, 'block_theme_supports' ) );
	}

	/** Register Block-Theme-Specific Supports */
	public function block_theme_supports() {
		add_theme_support( 'editor-styles' );
		add_editor_style( get_template_directory_uri() . '/dist/global.css' );
		add_editor_style( get_template_directory_uri() . '/dist/vendors/bootstrap.css');
	}
}