<?php // phpcs:ignore
require_once dirname(__FILE__) . '/class-k1-theme-cleaner.php';
class Theme_Init extends K1_Theme_Cleaner { // phpcs:ignore
	private array $dependencies = array(); // phpcs:ignore

	public function __construct() { // phpcs:ignore
		parent::__construct();
		$this->load_files();
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_k1_scripts' ) );
		add_action( 'after_setup_theme', array( $this, 'k1_theme_supports' ) );
		add_action( 'after_setup_theme', array( $this, 'register_k1_menus' ) );
		add_action( 'init', array( $this, 'alter_post_types' ) );
	}

	/** Loads required files */
	private function load_files() {
		require_once dirname( __FILE__, 2 ) . '/component-classes/class-content-sections.php';
		require_once dirname( __FILE__ ) . '/class-k1-nav-walker.php';
		require_once dirname( __FILE__ ) . '/theme-functions.php';

		$this->dependencies['bootstrap']   = require_once dirname( __FILE__, 3 ) . '/dist/vendors/bootstrap.asset.php';
		$this->dependencies['fontawesome'] = require_once dirname( __FILE__, 3 ) . '/dist/vendors/fontawesome.asset.php';
		$this->dependencies['vendors']     = require_once dirname( __FILE__, 3 ) . '/dist/vendors/vendors.asset.php';
		$this->dependencies['main']        = require_once dirname( __FILE__, 3 ) . '/dist/global.asset.php';
	}

	/**
	 * Adds scripts with the appropriate dependencies
	 */
	public function enqueue_k1_scripts() {
		// JS
		wp_enqueue_script(
			'bootstrap',
			get_template_directory_uri() . '/dist/vendors/bootstrap.js',
			array(),
			$this->dependencies['bootstrap']['version'],
			true
		);
		wp_enqueue_script(
			'fontawesome',
			get_template_directory_uri() . '/dist/vendors/fontawesome.js',
			array(),
			$this->dependencies['fontawesome']['version'],
			false
		);
		wp_enqueue_script(
			'main',
			get_template_directory_uri() . '/dist/global.js',
			array( 'bootstrap', 'fontawesome' ),
			$this->dependencies['main']['version'],
			true
		);

		// CSS
		wp_enqueue_style(
			'vendors',
			get_template_directory_uri() . '/dist/vendors/vendors.css',
			array(),
			$this->dependencies['vendors']['version']
		);
		wp_enqueue_style(
			'main',
			get_template_directory_uri() . '/dist/global.css',
			array( 'vendors' ),
			$this->dependencies['main']['version']
		);

		wp_localize_script( 'main', 'k1SiteData', array( 'rootUrl' => home_url() ) );
	}

	/** Handle Theme Supports */
	public function k1_theme_supports() {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
	}

	/** Register Menus */
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