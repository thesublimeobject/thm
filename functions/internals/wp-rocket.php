<?php

/*--------------------------------------------------------*\
	Redirect via WP Rocket
\*--------------------------------------------------------*/

add_filter( 'before_rocket_htaccess_rules', 'thm__redirects' );

function thm__redirects($marker) {
	$redirection .= 'RewriteEngine On' . PHP_EOL;
	$redirection .= 'RewriteCond %{HTTP_HOST} ^www\.(.*)$ [NC]' . PHP_EOL;
	$redirection .= 'RewriteRule ^(.*)$ http://%1/$1 [R=301,L]' . PHP_EOL;
	$redirection .= 'RewriteCond %{HTTP_HOST} ^datera.de [NC,OR]' . PHP_EOL;
	$redirection .= 'RewriteCond %{HTTP_HOST} ^daterainc.com [NC]' . PHP_EOL;
	$redirection .= 'RewriteRule ^(.*)$ http://datera.io/$1 [L,R=301,NC]' . PHP_EOL . PHP_EOL;
	$marker = $redirection . $marker;
	return $marker;
}
