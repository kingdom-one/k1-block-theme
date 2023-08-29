<?php
/** Inits the Theme with standard functions and loaded files */

/** Require Parent Class */
require_once __DIR__ . '/class-k1-theme-cleaner.php';

/** Init Theme */
class Theme_Init extends K1_Theme_Cleaner {
	/** The Asset Dependencies
	 *
	 * @var array $dependencies
	 */
	private array $dependencies = array();

	/** Build the Class */
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

		$this->dependencies['bootstrap']   = require_once dirname( __DIR__, 2 ) . '/dist/vendors/bootstrap.asset.php';
		$this->dependencies['fontawesome'] = require_once dirname( __DIR__, 2 ) . '/dist/vendors/fontawesome.asset.php';
		$this->dependencies['vendors']     = require_once dirname( __DIR__, 2 ) . '/dist/vendors/vendors.asset.php';
		$this->dependencies['main']        = require_once dirname( __DIR__, 2 ) . '/dist/global.asset.php';
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
			array( 'strategy' => 'defer' )
		);
		wp_enqueue_script(
			'fontawesome',
			get_template_directory_uri() . '/dist/vendors/fontawesome.js',
			array(),
			$this->dependencies['fontawesome']['version'],
			array( 'strategy' => 'async' )
		);
		wp_enqueue_script(
			'main',
			get_template_directory_uri() . '/dist/global.js',
			array( 'bootstrap', 'fontawesome' ),
			$this->dependencies['main']['version'],
			array( 'strategy' => 'defer' )
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
