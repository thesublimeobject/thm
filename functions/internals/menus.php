<?php

/*--------------------------------------------------------*\
	Register Navigation Menu
\*--------------------------------------------------------*/

function menlo__registerMenus() {
	register_nav_menus([
		'nav' => 'Navigation', 
	]);
}

add_action( 'init', 'menlo__registerMenus' );