<?php
class K1_Theme_Cleaner {
	public function __construct() {
		$this->disable_discussion();
	}

	public function alter_post_types() {
		$post_types = array( 'post', 'page' );
		foreach ( $post_types as $post_type ) {
			$this->disable_post_type_support( $post_type );
		}
	}

	protected function disable_post_type_support( $post_type ) {
		$supports = array( 'comments', 'trackbacks', 'revisions' );
		foreach ( $supports as $support ) {
			if ( post_type_supports( $post_type, $support ) ) {
				remove_post_type_support( $post_type, $support );
			}
		}
	}

	/**
	 * Provide an array of handles to dequeue
	 *
	 * @param array $handles the handles of scripts to dequeue
	 */
	protected function remove_wordpress_styles( array $handles ) {
		foreach ( $handles as $handle ) {
			wp_dequeue_style( $handle );
		}
	}

	/** Disable Comments and Pings */
	public function disable_discussion() {
		// Close comments on the front-end
		add_filter( 'comments_open', '__return_false', 20, 2 );
		add_filter( 'pings_open', '__return_false', 20, 2 );

		// Hide existing comments
		add_filter( 'comments_array', '__return_empty_array', 10, 2 );

		// Remove comments page in menu
		add_action(
			'admin_menu',
			function () {
				remove_menu_page( 'edit-comments.php' );
			}
		);

		// Remove comments links from admin bar
		add_action(
			'init',
			function () {
				if ( is_admin_bar_showing() ) {
					remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
				}
			}
		);
	}
}