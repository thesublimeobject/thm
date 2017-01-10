<?php

/*--------------------------------------------------------*\
	Get Featured Image URL
\*--------------------------------------------------------*/

function getPostThumbnailURL($size = 'full', $style = true, $id = false) {
	global $post;
	$id = $id !== false ? $id : $post->ID;
	$thumbnail__id = get_post_thumbnail_id( $id );
	$src = wp_get_attachment_image_src($thumbnail__id, $size);

	if ($style) {
		return 'style="background-image: url(' . $src[0] . ')"';
	}

	return $src[0];
}
