<?php

/*--------------------------------------------------------*\
	Include Function Files
\*--------------------------------------------------------*/

$functions = [
	'globals',
	'util',
	'components',
	'acf',
	'internals',
	'editor',
	'ajax',
];

foreach ($functions as $function) {
	include_once $function . '/index.php';
}