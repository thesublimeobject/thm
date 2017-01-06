<?php

/*--------------------------------------------------------*\
	Register Custom Taxonomies
\*--------------------------------------------------------*/

add_action('init', 'menlo__registerTaxonomies');

function menlo__registerTaxonomies() {
	$taxonomies = [
		'news--categories' => [
			'post__type' => 'news',
			'name' => 'Category',
		],

		'portfolio--categories' => [
			'post__type' => 'portfolio',
			'name' => 'Category',
		],

		'team--categories' => [
			'post__type' => 'team',
			'name' => 'Category',
		],
	];

	foreach ($taxonomies as $key => $value) {
		register_taxonomy($key, $value['post__type'], [
			'labels' => array(
				'name' => $value['name'],
				'add_new_item' => 'Add New ' . $value['name'],
				'new_item_name' => 'New ' . $value['name']
			),
			'show_ui' => true,
			'hierarchical' => true,
			'show_tagcloud' => false
		]);
	}
}