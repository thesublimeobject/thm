<?php

/*--------------------------------------------------------*\
	Custom Post Types
\*--------------------------------------------------------*/

add_action('init', 'thm_posts_register');

function thm_posts_register() {

	// # News ------>

	// $labels = array(
	// 	'name' => _x('News', 'post type general name'),
	// 	'singular_name' => _x('News', 'post type singular name'),
	// 	'add_new' => _x('Add New', 'News'),
	// 	'add_new_item' => __('Add New News'),
	// 	'edit_item' => __('Edit News'),
	// 	'new_item' => __('New News'),
	// 	'view_item' => __('View News'),
	// 	'search_items' => __('Search News'),
	// 	'not_found' => __('Nothing found'),
	// 	'not_found_in_trash' => __('Nothing found in Trash'),
	// 	'parent_item_colon' => ''
	// );
	 
	// $args = array(
	// 	'labels' => $labels,
	// 	'public' => true,
	// 	'publicly_queryable' => true,
	// 	'show_ui' => true,
	// 	'query_var' => true,
	// 	'capability_type' => 'post',
	// 	'hierarchical' => false,
	// 	'has_archive' => false,
	// 	'menu_position' => null,
	// 	'supports' => array('title', 'editor', 'thumbnail'),
	// 	'rewrite' => true,
	// 	'show_in_nav_menus' => true,
	// );
	
	// register_post_type('news' , $args);


	// # Press ------>

	// $labels = array(
	// 	'name' => _x('Press', 'post type general name'),
	// 	'singular_name' => _x('Press', 'post type singular name'),
	// 	'add_new' => _x('Add New', 'Press'),
	// 	'add_new_item' => __('Add New Press'),
	// 	'edit_item' => __('Edit Press'),
	// 	'new_item' => __('New Press'),
	// 	'view_item' => __('View Press'),
	// 	'search_items' => __('Search Press'),
	// 	'not_found' => __('Nothing found'),
	// 	'not_found_in_trash' => __('Nothing found in Trash'),
	// 	'parent_item_colon' => ''
	// );
	 
	// $args = array(
	// 	'labels' => $labels,
	// 	'public' => true,
	// 	'publicly_queryable' => true,
	// 	'show_ui' => true,
	// 	'query_var' => true,
	// 	'capability_type' => 'post',
	// 	'hierarchical' => false,
	// 	'has_archive' => false,
	// 	'menu_position' => null,
	// 	'supports' => array('title', 'editor', 'thumbnail'),
	// 	'rewrite' => true,
	// 	'show_in_nav_menus' => true,
	// );
	
	// register_post_type('press' , $args);


	// # Events ------>

	// $labels = array(
	// 	'name' => _x('Events', 'post type general name'),
	// 	'singular_name' => _x('Events', 'post type singular name'),
	// 	'add_new' => _x('Add New', 'Events'),
	// 	'add_new_item' => __('Add New Events'),
	// 	'edit_item' => __('Edit Events'),
	// 	'new_item' => __('New Events'),
	// 	'view_item' => __('View Events'),
	// 	'search_items' => __('Search Events'),
	// 	'not_found' => __('Nothing found'),
	// 	'not_found_in_trash' => __('Nothing found in Trash'),
	// 	'parent_item_colon' => ''
	// );
	 
	// $args = array(
	// 	'labels' => $labels,
	// 	'public' => true,
	// 	'publicly_queryable' => true,
	// 	'show_ui' => true,
	// 	'query_var' => true,
	// 	'capability_type' => 'post',
	// 	'hierarchical' => false,
	// 	'has_archive' => false,
	// 	'menu_position' => null,
	// 	'supports' => array('title', 'editor', 'thumbnail'),
	// 	'rewrite' => true,
	// 	'show_in_nav_menus' => true,
	// );
	
	// register_post_type('events' , $args);


	// # Blog ------>

	// $labels = array(
	// 	'name' => _x('Blog', 'post type general name'),
	// 	'singular_name' => _x('Blog', 'post type singular name'),
	// 	'add_new' => _x('Add New', 'Blog'),
	// 	'add_new_item' => __('Add New Blog'),
	// 	'edit_item' => __('Edit Blog'),
	// 	'new_item' => __('New Blog'),
	// 	'view_item' => __('View Blog'),
	// 	'search_items' => __('Search Blog'),
	// 	'not_found' => __('Nothing found'),
	// 	'not_found_in_trash' => __('Nothing found in Trash'),
	// 	'parent_item_colon' => ''
	// );
	 
	// $args = array(
	// 	'labels' => $labels,
	// 	'public' => true,
	// 	'publicly_queryable' => true,
	// 	'show_ui' => true,
	// 	'query_var' => true,
	// 	'capability_type' => 'post',
	// 	'hierarchical' => false,
	// 	'has_archive' => false,
	// 	'menu_position' => null,
	// 	'supports' => array('title', 'editor', 'thumbnail'),
	// 	'rewrite' => true,
	// 	'show_in_nav_menus' => true,
	// );
	
	// register_post_type('blog' , $args);


	// # Team ------>

	// $labels = array(
	// 	'name' => _x('Team', 'post type general name'),
	// 	'singular_name' => _x('Team', 'post type singular name'),
	// 	'add_new' => _x('Add New', 'Team'),
	// 	'add_new_item' => __('Add New Team'),
	// 	'edit_item' => __('Edit Team'),
	// 	'new_item' => __('New Team'),
	// 	'view_item' => __('View Team'),
	// 	'search_items' => __('Search Team'),
	// 	'not_found' => __('Nothing found'),
	// 	'not_found_in_trash' => __('Nothing found in Trash'),
	// 	'parent_item_colon' => ''
	// );
	 
	// $args = array(
	// 	'labels' => $labels,
	// 	'public' => true,
	// 	'publicly_queryable' => true,
	// 	'show_ui' => true,
	// 	'query_var' => true,
	// 	'capability_type' => 'post',
	// 	'hierarchical' => false,
	// 	'has_archive' => false,
	// 	'menu_position' => null,
	// 	'supports' => array('title', 'editor', 'thumbnail'),
	// 	'rewrite' => true,
	// 	'show_in_nav_menus' => true,
	// );
	
	// register_post_type('team' , $args);


	// # Companies ------>

	// $labels = array(
	// 	'name' => _x('Companies', 'post type general name'),
	// 	'singular_name' => _x('Companies', 'post type singular name'),
	// 	'add_new' => _x('Add New', 'Companies'),
	// 	'add_new_item' => __('Add New Companies'),
	// 	'edit_item' => __('Edit Companies'),
	// 	'new_item' => __('New Companies'),
	// 	'view_item' => __('View Companies'),
	// 	'search_items' => __('Search Companies'),
	// 	'not_found' => __('Nothing found'),
	// 	'not_found_in_trash' => __('Nothing found in Trash'),
	// 	'parent_item_colon' => ''
	// );
	 
	// $args = array(
	// 	'labels' => $labels,
	// 	'public' => true,
	// 	'publicly_queryable' => true,
	// 	'show_ui' => true,
	// 	'query_var' => true,
	// 	'capability_type' => 'post',
	// 	'hierarchical' => false,
	// 	'has_archive' => false,
	// 	'menu_position' => null,
	// 	'supports' => array('title', 'editor', 'thumbnail'),
	// 	'rewrite' => true,
	// 	'show_in_nav_menus' => true,
	// );
	
	// register_post_type('companies' , $args);
}

/*--------------------------------------------------------*\
	Register Custom Taxonomies
\*--------------------------------------------------------*/

// add_action('init', 'register_tax');

// function register_tax() {
// 	register_taxonomy ( 
// 		'team_categories', 
// 		'team', 
// 		array(
// 			'labels' => array(
// 				'name' => 'Category',
// 				'add_new_item' => 'Add New Category',
// 				'new_item_name' => 'New Category'
// 			),
// 			'show_ui' => true,
// 			'hierarchical' => true,
// 			'show_tagcloud' => false
// 		) 
// 	);
// }