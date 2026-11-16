<?php
/**
 * Charlottesville Playwrights Collective theme setup.
 */

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
} );
add_action( 'wp_enqueue_scripts', function () {
	// Fonts (Courier Prime) are self-hosted and declared in style.css.
	wp_enqueue_style(
		'cpc-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
} );
