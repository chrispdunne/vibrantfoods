<?php

//===============
// UPDATE POST TO NEWS
//===============
function vibrantfoods_change_post_label() {
  global $menu;
  global $submenu;
  $menu[5][0] = 'News';
  $submenu['edit.php'][5][0] = 'News';
  $submenu['edit.php'][10][0] = 'Add News';
  // $submenu['edit.php'][16][0] = 'News Tags';
}
function vibrantfoods_change_post_object() {
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'News';
  $labels->singular_name = 'News';
  $labels->add_new = 'Add News';
  $labels->add_new_item = 'Add News';
  $labels->edit_item = 'Edit News';
  $labels->new_item = 'News';
  $labels->view_item = 'View News';
  $labels->search_items = 'Search News';
  $labels->not_found = 'No News found';
  $labels->not_found_in_trash = 'No News found in Trash';
  $labels->all_items = 'All News';
  $labels->menu_name = 'News';
  $labels->name_admin_bar = 'News';
}

add_action( 'admin_menu', 'vibrantfoods_change_post_label' );
add_action( 'init', 'vibrantfoods_change_post_object' );

// remove tags taxonomy from posts
function vibrantfoods_unregister_taxonomy(){
  register_taxonomy( 'post_tag', null );
}
add_action('init', 'vibrantfoods_unregister_taxonomy');


//===============
// ADD POST TYPES
//===============

function vibrantfoods_post_types() {
    // Brands
    $brand_lables = array(
        'name'               => 'Brands',
		'singular_name'      => 'Brand',
		'menu_name'          => 'Brands',
		'name_admin_bar'     => 'Brand',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Brand',
		'new_item'           => 'New Brand',
		'edit_item'          => 'Edit Brand',
		'view_item'          => 'View Brand',
		'all_items'          => 'All Brands',
		'search_items'       => 'Search Brands',
		'parent_item_colon'  => 'Parent Brands:',
		'not_found'          => 'No Brands found.',
		'not_found_in_trash' => 'No Brands found in Trash.'
    );
    $brand_args = array(
      'public'             => true,
      'labels'             => $brand_lables,
      'menu_icon'          => 'dashicons-admin-site-alt3',
      'has_archive'        => true,
      'rewrite'            => array( 'slug' => 'brands_all' ),
      'supports'           => array(
            'title',
            'editor',   
            'thumbnail',
            'excerpt'
        ),
    );
    register_post_type( 'brand', $brand_args );
}
add_action( 'init', 'vibrantfoods_post_types' );