<?php

/*--------------------------------------------------------*\
	Scripts
\*--------------------------------------------------------*/

function thm_enqueue_scripts() {
	$time = time();
	if ( ( strpos( $_SERVER['HTTP_HOST'], 'dev' ) == true && strpos( $_SERVER['HTTP_HOST'], 'kbddev' ) == false ) || strpos( $_SERVER['HTTP_HOST'], 'local' ) == true ) {
		wp_enqueue_script( 'main', THEME_DIR . '/bld/app.js', array('jquery'), $time, true );
	} else {
		wp_enqueue_script( 'main', THEME_DIR . '/bld/app.min.js', array('jquery'), $time, true );
	}
}

add_action( 'wp_enqueue_scripts', 'thm_enqueue_scripts' );