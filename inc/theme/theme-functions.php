<?php //phpcs:ignore
/**
 * The helper functions to use
 *
 * @since 1.3
 */



/** Gets SVG from `~/assets/svgs`
 *
 * @param string $file  the filename
 * @param bool   $as_image_src base-encode svg or return pure svg code
 * @param bool   $echo echo/return toggle
 */
function k1_get_svg_asset( string $file, bool $as_image_src = false, bool $echo = true ) {	
	$svg = file_get_contents( get_template_directory() . '/src/assets/svgs/' . $file . '.svg' );
	if ($as_image_src) {
		$svg = 'data:image/svg+xml;base64,' . base64_encode($svg);
	}
	
	if ( $echo ) {
		echo $svg;
	} else {
		return $svg;
	}
	
}

/**
 * Gets an image asset from `src/assets/images`
 *
 * @param string $file the name of the iamge
 * @param string $extension the filetype
 * @param string $folder the folder to add (defaults to empty string). If nested, leave off closing '/'
 * @param bool   $echo echo / return toggle
 */
function k1_get_image_asset_url( string $file, string $extension, string $folder = '', $echo = true ) {
	if ( empty( $folder ) ) {
		$url = get_template_directory_uri() . "/src/assets/images/{$file}.{$extension}";
	}
	$url = get_template_directory_uri() . "/src/assets/images/{$folder}/{$file}.{$extension}";
	if ( $echo ) {
		echo $url;
	} else {
		return $url;
	}
}

/**
 * Enqueues the page style.
 *
 * @param string $id The id you set in webpack.config.js.
 * @param array  $deps Optional array of dependencies.
 */
function k1_enqueue_page_style( string $id, array $deps = array( 'main' ) ) {
	$total_deps = array_merge( $deps, array( 'main' ) );
	wp_enqueue_style(
		$id,
		get_stylesheet_directory_uri() . "/dist/{$id}.css",
		$total_deps,
		filemtime( get_stylesheet_directory() . "/dist/{$id}.css" )
	);
}

/**
 * Enqueues the page script.
 *
 * @param string $id The id you set in webpack.config.js.
 * @param array  $deps Optional array of dependencies.
 */
function k1_enqueue_page_script( string $id, array $deps = array( 'main' ) ) {
	$asset_file = get_stylesheet_directory() . "/dist/{$id}.asset.php";

	if ( file_exists( $asset_file ) ) {
		$asset = require $asset_file;

		wp_enqueue_script(
			$id,
			get_stylesheet_directory_uri() . "/dist/{$id}.js",
			$asset['dependencies'] ?? $deps,
			$asset['version'],
			true
		);
	} else {
		wp_enqueue_script(
			$id,
			get_stylesheet_directory_uri() . "/dist/{$id}.js",
			$deps,
			filemtime( get_stylesheet_directory() . "/dist/{$id}.js" ),
			true
		);
	}
}

/**
 * Enqueues both the page style and script.
 *
 * @param string $id The id you set in webpack.config.js.
 * @param array  $deps Associative array of dependencies for styles and scripts.
 */
function k1_enqueue_page_assets( string $id, array $deps = array() ) {
	$default_deps = array(
		'styles'  => array( 'main' ),
		'scripts' => array( 'main' ),
	);

	$deps = wp_parse_args( $deps, $default_deps );
	k1_enqueue_page_style( $id, $deps['styles'] );
	k1_enqueue_page_script( $id, $deps['scripts'] );
}