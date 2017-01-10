<?php

/*--------------------------------------------------------*\
	Get the Content with Formatting
\*--------------------------------------------------------*/

function getContent($opts = []) {

	# Defaults
	static $defaults = [
		'excerpt' => false, 
		'images' => true, 
		'headings' => true, 
		'links' => true,
	];
	$options = array_merge($defaults, $opts);

	# Content
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);

	# Remove Images
	if ($options['images'] === false) {
		$content = preg_replace('/<img[^>]+./', '', $content);
	}

	# Remove Headings
	if ($options['headings'] === false) {
		$content = preg_replace('/<h[1-6]>[^>]+./', '', $content);
	}

	# Remove Links
	if ($options['links'] === false) {
		$content = preg_replace('/<a[^>]+./', '', $content);
	}

	# Return Excerpt
	if ($options['excerpt'] !== false) {
		$content = strip_tags($content, '');
		return splitToSentence($content, $options['excerpt']);
	}

	return $content;
}
