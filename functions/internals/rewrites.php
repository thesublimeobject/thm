<?php

/*--------------------------------------------------------*\
	Custom Post Types URL Rewrites ==> Team
\*--------------------------------------------------------*/

//add_filter('post_type_link', 'set__team__slug', 1, 3);

function set__team__slug( $link, $post = 0 ) {
	if ( $post->post_type == 'team' ) {
		$name = strtolower(preg_replace('/[\s_]/', '-', $post->post_title));
		return home_url( 'about#team--' . $name );
	} else {
		return $link;
	}
}

//add_action( 'init', 'set__team__rewrite' );

function set__team__rewrite() {
	add_rewrite_rule(
		'team/([0-9]+)?$',
		'index.php?post_type=team&p=$matches[1]',
		'top' 
	);
}