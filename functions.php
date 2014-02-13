<?php

define("THEME_DIR", get_template_directory_uri());

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size();
}

function jfcs_register_menus() {
	register_nav_menus(
		array(
			'u-nav' => __( 'Universal Navigation'),
		)
	);
}
add_action( 'init', 'jfcs_register_menus' );

/* _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ Posts _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ */

// function jfcs_posts_register() {
	
// 	$labels = array(
// 		'name' => _x('Board of Directors', 'post type general name'),
// 		'singular_name' => _x('Board of Directors', 'post type singular name'),
// 		'add_new' => _x('Add New', 'Board of Directors'),
// 		'add_new_item' => __('Add New Board of Directors'),
// 		'edit_item' => __('Edit Board of Directors'),
// 		'new_item' => __('New Board of Directors'),
// 		'view_item' => __('View Board of Directors'),
// 		'search_items' => __('Search Board of Directors'),
// 		'not_found' => __('Nothing found'),
// 		'not_found_in_trash' => __('Nothing found in Trash'),
// 		'parent_item_colon' => ''
// 	);
	 
// 	$args = array(
// 		'labels' => $labels,
// 		'public' => true,
// 		'publicly_queryable' => true,
// 		'show_ui' => true,
// 		'query_var' => true,
// 		'capability_type' => 'post',
// 		'hierarchical' => false,
// 		'menu_position' => null,
// 		'supports' => array('title', 'editor', 'thumbnail'),
// 		'rewrite' => true,
// 		'show_in_nav_menus' => true,
// 	);
 
// 	register_post_type('board' , $args);

// }
 
// add_action('init', 'jfcs_posts_register');

/* _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ SCRIPTS _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ */


function nwc_enqueue_styles() {
    wp_register_style( 'screen', get_template_directory_uri() . '/assets/styl/bld/screen.css', array(), '1', 'all' );
    wp_enqueue_style( 'screen' );
}
add_action( 'wp_enqueue_scripts', 'nwc_enqueue_styles' );

function nwc_enqueue_scripts() {
	wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/bld/main.min.js', array('jquery'), true);
}

add_action('wp_enqueue_scripts', 'jfcs_enqueue_scripts');


?>