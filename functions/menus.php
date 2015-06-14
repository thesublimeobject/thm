<?php

/*--------------------------------------------------------*\
	Register Navigation Menu
\*--------------------------------------------------------*/

function thm_register_menus() {
	register_nav_menus(
		array(
			'nav' => 'Navigation',
			'u-nav' => 'Utility Navigation'
		)
	);
}
add_action( 'init', 'thm_register_menus' );