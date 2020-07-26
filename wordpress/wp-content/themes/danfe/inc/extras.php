<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package danfe
 */
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function danfe_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

// Add design layout of sidebar
	global $danfe_theme_options;
    $danfe_theme_options    = danfe_get_theme_options();
    $designlayout = esc_attr($danfe_theme_options['danfe-layout']);
	$classes[]    = $designlayout;
	return $classes;
}
add_filter( 'body_class', 'danfe_body_classes' );
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function danfe_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}

}
add_action( 'wp_head', 'danfe_pingback_header');

