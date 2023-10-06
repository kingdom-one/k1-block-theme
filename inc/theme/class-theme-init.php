<?php
/**
 * The Original Theme Init
 *
 * @package KingdomOne
 */

// Loads Cleanup Functions
require_once __DIR__ . '/class-k1-theme-cleaner.php';

/**
 * Enqueues most assets and setups
 */
class Theme_Init extends K1_Theme_Cleaner {
	/** Constructor */
	public function __construct() {
		parent::__construct();
		$this->load_files();
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_k1_scripts' ) );
		add_action( 'after_setup_theme', array( $this, 'k1_theme_supports' ) );
		add_action( 'after_setup_theme', array( $this, 'register_k1_menus' ) );
		add_action( 'init', array( $this, 'alter_post_types' ) );
	}

	/** Loads required files */
	private function load_files() {
		require_once dirname( __DIR__, 1 ) . '/component-classes/class-content-sections.php';
		require_once __DIR__ . '/class-k1-nav-walker.php';
		require_once __DIR__ . '/theme-functions.php';
	}

	/**
	 * Adds scripts with the appropriate dependencies
	 */
	public function enqueue_k1_scripts() {
		$bootstrap = require_once get_template_directory() . '/dist/vendors/bootstrap.asset.php';
		wp_enqueue_script(
			'bootstrap',
			get_template_directory_uri() . '/dist/vendors/bootstrap.js',
			$bootstrap['dependencies'],
			$bootstrap['version'],
			array( 'strategy' => 'defer' )
		);
		wp_enqueue_style(
			'bootstrap',
			get_template_directory_uri() . '/dist/vendors/bootstrap.css',
			$bootstrap['dependencies'],
			$bootstrap['version']
		);

		$fontawesome = require_once get_template_directory() . '/dist/vendors/fontawesome.asset.php';
		wp_enqueue_script(
			'fontawesome',
			get_template_directory_uri() . '/dist/vendors/fontawesome.js',
			$fontawesome['dependencies'],
			$fontawesome['version'],
			array( 'strategy' => 'async' )
		);
		$fonts = require_once get_template_directory() . '/dist/vendors/fonts.asset.php';
		wp_enqueue_style(
			'fonts',
			get_template_directory_uri() . '/dist/vendors/fonts.css',
			$fonts['dependencies'],
			$fonts['version']
		);

		$main = require_once get_template_directory() . '/dist/global.asset.php';
		wp_enqueue_script(
			'main',
			get_template_directory_uri() . '/dist/global.js',
			array_unique( array_merge( $main['dependencies'], array( 'bootstrap' ) ) ),
			$main['version'],
			array( 'strategy' => 'defer' )
		);

		wp_enqueue_style(
			'main',
			get_template_directory_uri() . '/dist/global.css',
			array_unique( array_merge( $main['dependencies'], array( 'bootstrap', 'fonts' ) ) ),
			$main['version']
		);

		wp_localize_script(
			'main',
			'k1SiteData',
			array( 'rootUrl' => home_url() )
		);

		$this->remove_wordpress_styles( array( 'classic-theme-styles', 'dashicons' ) );
	}

	/** Handle Theme Supports */
	public function k1_theme_supports() {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
	}

	/** Registers Menus */
	public function register_k1_menus() {
		register_nav_menus(
			array(
				'primary_menu' => __( 'Primary Menu', 'k1' ),
				'mobile_menu'  => __( 'Mobile Menu', 'k1' ),
				'footer_menu'  => __( 'Footer Menu', 'k1' ),
			)
		);
	}
}
