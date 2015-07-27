<?php

/*--------------------------------------------------------*\
	Scripts
\*--------------------------------------------------------*/

function jquery_init() {
	if ( !is_admin() ) {
		wp_dequeue_script('jquery');
	}
}
add_action('init', 'jquery_init');