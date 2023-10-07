<?php
/**
 * The helper functions to use
 *
 * @since 1.3
 * @package KingdomOne
 */

/** Gets SVG from `~/assets/svgs`
 *
 * @param string $file  the filename
 * @param bool   $as_image_src base-encode svg or return pure svg code
 * @param bool   $echo echo/return toggle
 */
function k1_get_svg_asset( string $file, bool $as_image_src = false, bool $echo = true ) {
	$svg = file_get_contents( get_template_directory() . '/src/assets/svgs/' . $file . '.svg' );
	if ( $as_image_src ) {
		$svg = 'data:image/svg+xml;base64,' . base64_encode( $svg );
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
 * @param string $file the name of the image
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
 * @param string  $id The id you set in webpack.config.js.
 * @param ?array  $deps array of dependencies.
 * @param ?string $location the subfolder inside the `dist` to find the file
 */
function k1_enqueue_page_style( string $id, ?array $deps = array( 'main' ), ?string $location = 'pages' ) {
	$file_path  = get_stylesheet_directory() . "/dist/{$location}";
	$file_uri   = get_stylesheet_directory_uri() . "/dist/{$location}";
	$asset_file = "{$file_path}/{$id}.asset.php";

	if ( file_exists( $asset_file ) ) {
		$asset      = include $asset_file;
		$total_deps = array_merge( $deps, array( 'main' ) );
			wp_enqueue_style(
				$id,
				"{$file_uri}/{$id}.css",
				$total_deps,
				$asset['version']
			);
	} else {
		wp_enqueue_style(
			$id,
			"{$file_uri}/{$id}.css",
			$deps,
			null,
		);
	}
}

/**
 * Enqueues the page script.
 *
 * @param string  $id The id you set in webpack.config.js.
 * @param ?array  $deps array of dependencies.
 * @param ?string $location the subfolder inside the `dist` to find the file
 */
function k1_enqueue_page_script( string $id, ?array $deps = array( 'main' ), ?string $location = 'pages' ) {
	$file_path  = get_stylesheet_directory() . "/dist/{$location}";
	$file_uri   = get_stylesheet_directory_uri() . "/dist/{$location}";
	$asset_file = "{$file_path}/{$id}.asset.php";

	if ( file_exists( $asset_file ) ) {
		$asset = include $asset_file;

		wp_enqueue_script(
			$id,
			"{$file_uri}/{$id}.js",
			$asset['dependencies'] ?? $deps,
			$asset['version'],
			true
		);
	} else {
		wp_enqueue_script(
			$id,
			"{$file_uri}/{$id}.js",
			$deps,
			null,
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
function k1_enqueue_page_assets( string $id, ?array $deps = array(), ?string $location = 'pages' ) {
	$default_deps = array(
		'styles'  => array( 'main' ),
		'scripts' => array( 'main' ),
	);

	$deps = wp_parse_args( $deps, $default_deps );
	k1_enqueue_page_style( $id, $deps['styles'], $location );
	k1_enqueue_page_script( $id, $deps['scripts'], $location );
}