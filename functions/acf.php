<?php

/*--------------------------------------------------------*\
	Add Options Page for Global Site Options
\*--------------------------------------------------------*/

if ( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Global Settings',
		'menu_title'	=> 'Global Settings',
		'menu_slug' 	=> 'global-theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}