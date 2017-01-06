<?php

/*--------------------------------------------------------*\
	Include all util functions
\*--------------------------------------------------------*/

$functions = [

	# Vars
	'vars',

	# General
	'pre', 
	'getFile',
	'loadTemplate',
	'splitToSentence',
	'timeElapsed',
	'camelCase',

	# Youtube
	'youtube/getID',
	'youtube/getSource',

	# WP
	'getContent',
	'getFeaturedImageURL',
	'getSlug',

	# ACF
	'getFieldID',
	'fetchFieldKey',
];

foreach ($functions as $function) {
	include_once $function . '.php';
}