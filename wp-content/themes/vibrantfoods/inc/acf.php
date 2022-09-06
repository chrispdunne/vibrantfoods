<?php
// Return true if ACF is enabled
function isACF(){
	return is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ? true : false;
}

// ACF Options page
if( function_exists('acf_add_options_page') ) {
	
	// acf_add_options_page can be duplicated to create additional menu level entries
	acf_add_options_page(array(
		'page_title' 	=> 'Company info',
		'menu_title'	=> 'Company info',
		'menu_slug' 	=> 'company-info',
		'capability'	=> 'edit_posts',
		'icon_url' 		=> 'dashicons-info',
		'redirect'		=> true
	));

	// use acf_add_options_sub_page to add sub-menus

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Contact details',
	// 	'menu_title'	=> 'Contact details',
	// 	'parent_slug'	=> 'site-settings',
	// ));
}