<?php
/**
 * Should be pretty quiet in here besides requiring the appropriate files
 * Like style.css, this should really only be used for quick fixes with notes to refactor later.
 *
 * @since 1.0
 */

// Load Required Files
require_once get_template_directory() . '/inc/theme/class-theme-init.php';

// Init Theme
$k1_theme = new Theme_Init();

// =====================================

/** Register Hero Block */
function hero_block() {
	wp_register_script( 'heroBlockScript', get_theme_root_uri() . '/dist/hero.js', array( 'wp-blocks', 'wp-editor' ), '0.1', true );
	register_block_type(
		'k1-block-theme/hero',
		array(
			'editor_script' => 'heroBlockScript',
		)
	);
}
add_action( 'init', 'hero_block' );