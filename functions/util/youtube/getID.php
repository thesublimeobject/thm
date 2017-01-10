<?php

/*--------------------------------------------------------*\
	Get Youtube Video ID from Source
\*--------------------------------------------------------*/

function getYoutubeStillFrame($source) {
	$source = explode('?', $source);
	$image = $source[0] . '/hqdefault.jpg';
	$image = str_replace('www.youtube', 'img.youtube', $image);
	$image = str_replace('embed', 'vi', $image);
	return $image;
}
