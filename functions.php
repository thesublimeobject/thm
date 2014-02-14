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

/*--------------------------------------------------------*\
	Styles and Scripts
\*--------------------------------------------------------*/

function thm_enqueue_styles() {
    wp_register_style( 'screen', get_template_directory_uri() . '/assets/styl/bld/screen.css', array(), '1', 'all' );
    wp_enqueue_style( 'screen' );
}
add_action( 'wp_enqueue_scripts', 'thm_enqueue_styles' );

function thm_enqueue_scripts() {
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/bld/main.min.js', array('jquery'), true);
}

add_action('wp_enqueue_scripts', 'thm_enqueue_scripts');


?>