<?php

/*--------------------------------------------------------*\
	Custom Post Types
\*--------------------------------------------------------*/

add_action('init', 'thm_posts_register');

function thm_posts_register() {

	$labels = array(
		'name' => _x('News', 'post type general name'),
		'singular_name' => _x('News', 'post type singular name'),
		'add_new' => _x('Add New', 'News'),
		'add_new_item' => __('Add New News'),
		'edit_item' => __('Edit News'),
		'new_item' => __('New News'),
		'view_item' => __('View News'),
		'search_items' => __('Search News'),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
	 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail'),
		'rewrite' => true,
		'show_in_nav_menus' => true,
	);
	
	register_post_type('news' , $args);
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