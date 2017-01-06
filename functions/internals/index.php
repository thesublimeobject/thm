<?php

/*--------------------------------------------------------*\
	Internals
\*--------------------------------------------------------*/

$internals = [
	'menus',
	'settings',
	//'search',
	'posts',
	// 'rewrites',
	'scripts',
	'taxonomies',
	// 'wp-rocket',
];

foreach ($internals as $internal) {
	include_once $internal . '.php';
}
