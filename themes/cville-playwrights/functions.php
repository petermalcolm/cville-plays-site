<?php
/**
 * Charlottesville Playwrights Collective theme setup.
 */

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );

	// A menu spot at the top right, edited under Appearance → Menus.
	register_nav_menus(
		array(
			'primary' => __( 'Top menu', 'cville-playwrights' ),
		)
	);
} );

/**
 * Shown in the top menu spot until a menu is assigned to it in Appearance → Menus.
 */
function cpc_nav_fallback() {
	$links = array(
		__( 'About', 'cville-playwrights' )     => home_url( '/about/' ),
		__( 'Portfolio', 'cville-playwrights' ) => home_url( '/portfolio/' ),
	);

	echo '<ul class="cpc-nav__list">';
	foreach ( $links as $label => $url ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( $label ) );
	}
	echo '</ul>';
}

add_action( 'wp_enqueue_scripts', function () {
	// Fonts (Courier Prime) are self-hosted and declared in style.css.
	wp_enqueue_style(
		'cpc-style',
		get_stylesheet_uri(),
		array(),
		filemtime( get_stylesheet_directory() . '/style.css' ) // changes with the file, so browsers fetch new CSS
	);

	// Shrinks the sticky header on scroll.
	wp_enqueue_script(
		'cpc-header',
		get_theme_file_uri( 'assets/js/header.js' ),
		array(),
		filemtime( get_theme_file_path( 'assets/js/header.js' ) ),
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);
} );
