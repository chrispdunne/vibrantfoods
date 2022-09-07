<?php
/**
 * Vibrant Foods functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vibrant_Foods
 */

 /**
 * require all the *.php files in the /inc/ folder
 *
 * @param array $exclusions files to exclude from requirements
 * @return void
 */
function vibrantfoods_load_theme_files($exclusions = [
    'widgets.php',
	'jetpack.php',
	]) {
    foreach (glob(get_template_directory() . '/inc/*.php') as $filename) {
        if (!in_array(basename($filename), $exclusions)) require $filename;
    }
}
vibrantfoods_load_theme_files();