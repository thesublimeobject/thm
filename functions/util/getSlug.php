<?php

/*--------------------------------------------------------*\
	Get Slugs
\*--------------------------------------------------------*/

function getSlug() {
	global $post;

	# Page Slug
	$page__slug = !empty($post) ? $post->post_name : 'error';

	# Parent Slug
	$parent__meta = get_post($post->post_parent);
	$parent__slug = ($post->post_parent !== 0 && !empty($post)) 
		? $parent__meta->post_name 
		: 'error';

	# Parent ID
	$parent__id = ($post->post_parent !== 0 && !empty($post)) 
		? $parent__meta->ID 
		: 'error';

	return [
		'page__slug' => $page__slug,
		'parent__slug' => $parent__slug,
		'parent__id' => $parent__id,
	];
}
