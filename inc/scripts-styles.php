<?php
// Version, updated by gulp task
if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', 'vt1662632968032' );
}

/**
 * Enqueue scripts and styles.
 */
function vibrantfoods_scripts() {
	// Slick slider
	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/plugins/slick/slick.css', array(), _S_VERSION );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/plugins/slick/slick.min.js', array( 'jquery' ), _S_VERSION, true );

	wp_enqueue_style( 'vibrantfoods-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'vibrantfoods-style', 'rtl', 'replace' );

	// Nav script
	// wp_enqueue_script( 'vibrantfoods-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// Lite youtube embeds
	wp_enqueue_script( 'lite-youtube-embed', get_template_directory_uri() . '/js/lite-yt-embed.js', array(), _S_VERSION, true );

	// site scripts
	wp_enqueue_script( 'vibrantfoods-js', get_template_directory_uri() . '/js/site.js', array(), _S_VERSION, true );

	// parallax 
	wp_enqueue_script( 'vibrantfoods-parallax', get_template_directory_uri() . '/js/parallax.js', array( 'jquery' ), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vibrantfoods_scripts' );