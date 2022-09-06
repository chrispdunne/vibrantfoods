<?php
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vibrantfoods_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vibrantfoods_content_width', 1158 );
}
add_action( 'after_setup_theme', 'vibrantfoods_content_width', 0 );