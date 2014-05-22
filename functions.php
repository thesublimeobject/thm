<?php

define("THEME_DIR", get_template_directory_uri());

/*--------------------------------------------------------*\
	Post Thumbnails
\*--------------------------------------------------------*/

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size();
}

/*--------------------------------------------------------*\
	Register Navigation Menu
\*--------------------------------------------------------*/

function thm_register_menus() {
	register_nav_menus(
		array(
			'u-nav' => __( 'Universal Navigation'),
		)
	);
}
add_action( 'init', 'thm_register_menus' );

/*--------------------------------------------------------*\
	Clean Up
\*--------------------------------------------------------*/

function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

/*--------------------------------------------------------*\
	Styles and Scripts
\*--------------------------------------------------------*/

function thml_enqueue_styles() {
    wp_register_style( 'screen', THEME_DIR . '/bld/screen.min.css', array(), '1', 'all');
    wp_enqueue_style( 'screen' );
}
add_action( 'wp_enqueue_scripts', 'thml_enqueue_styles' );

function thml_enqueue_scripts() {
	wp_enqueue_script( 'main', THEME_DIR . '/bld/bld.min.js', array('jquery'), '1', true);
}

add_action('wp_enqueue_scripts', 'thml_enqueue_scripts');


?>