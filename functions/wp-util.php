<?php # Wordpress Specific Utility Functions

/*--------------------------------------------------------*\
	Get the Content with Formatting
\*--------------------------------------------------------*/

function get_content() {
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

/*--------------------------------------------------------*\
	Get the Content without Images
\*--------------------------------------------------------*/

function get_content_noimages() {
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return preg_replace('/<img[^>]+./', '', $content);
}

/*--------------------------------------------------------*\
	Get the Content with no headings?
\*--------------------------------------------------------*/

function get_excerpt_noHeaders() {
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	$content = preg_replace('/<h[1-6]>[^>]+./', '', $content);
	$content = preg_replace('/<a[^>]+./', '', $content);
	return substr($content, 0, 350) . '...';
}

/*--------------------------------------------------------*\
	Remove Empty <p> tags from the_content()
\*--------------------------------------------------------*/

function remove_empty_p( $content ) {
	$content = force_balance_tags( $content );
	$content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
	$content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
	return $content;
}

add_filter('the_content', 'remove_empty_p', 20, 1);

/*--------------------------------------------------------*\
	Button Shortcode
\*--------------------------------------------------------*/

function kbd__button( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link' => '/',
	), $atts));

	// get button
	$button = get__button($link, $content);

	// return
	return '<div class="button__container">' . $button . '</div>';
}

add_shortcode( 'button', 'kbd__button' );


/*--------------------------------------------------------*\
	Get Featured Image URL
\*--------------------------------------------------------*/

function get_post_thumbnail_url( $size ) {
	$id = get_post_thumbnail_id();
	$src = wp_get_attachment_image_src($id, $size);
	$url = $src[0];
	$bg = 'style="background-image: url(' . $url . ')"';
	return $bg;
}

/*--------------------------------------------------------*\
	Get Parent Slug
\*--------------------------------------------------------*/

function get_parent_slug() {
	global $post;
	if (!empty($post)) {
		if ($post->post_parent == 0) return '';
		$post_data = get_post($post->post_parent);
		return $post_data->post_name;
	} else {
		return 'error';		
	}
}

function get_parent_id() {
	global $post;
	if ($post->post_parent == 0) return '';
	$post_data = get_post($post->post_parent);
	return $post_data->ID;
}

function getPageSlug() {
	global $post;
	return !empty($post) ? $post->post_name : 'error';
}


/*--------------------------------------------------------*\
	Get Array of Tags
\*--------------------------------------------------------*/

function get__tags($type) {

	$tags = [];
	$args = array( 'post_type' => $type, 'posts_per_page' => 9999 );
	$loop = new WP_Query( $args );
	while ($loop->have_posts()): $loop->the_post();

		$tags = wp_get_post_tags( get_the_ID() );
		foreach( $tags as $tag ) {
			array_push($resourcesTags, $tag);
		}

	endwhile;

	$tags = array_unique($tags, SORT_REGULAR);
	return $tags;
}

/*--------------------------------------------------------*\
	Get Authors
\*--------------------------------------------------------*/

function get__authors($type) {

	# Init Array
	$authors = array();

	# Loop
	$args = array( 'post_type' => $type, 'posts_per_page' => 9999 );
	$loop = new WP_Query( $args );
	while ($loop->have_posts()): $loop->the_post();

		# Fetch author and push onto array
		$author = get_the_author();
		if ( strtolower($author) !== 'p9' && strtolower($author) !== 'admin' ) {
			array_push($authors, $author);
		}

	endwhile;

	# Remove duplicates
	$authors = array_unique( $authors );

	# Sort by Alpha
	usort($authors, function($a, $b) {
		return strcmp( explode(' ', $a)[1], explode(' ', $b)[1] );
	});
	
	# Return
	return $authors;
}

/*--------------------------------------------------------*\
	Pagination
\*--------------------------------------------------------*/

function get__pagination($post__type, $count) {

	$html = '';
	$html .= '<ul class="pagination">';
	$count = ceil( wp_count_posts( $post__type )->publish / $count ); 
	for ( $i = 1; $i <= $count; $i++ ) {
		$html .= '<li class="pagination__item" data-page="' . $i . '">' . $i . '</li>';
	}
	$html .= '</ul>';

	return $html;
}

/*--------------------------------------------------------*\
	Recently Modified?
\*--------------------------------------------------------*/

# Until first return true...

function recently__modified($post__type) {

	# Have any posts changed?
	$has__changed = false;

	# Loop
	$args = array( 'post_type' => $post__type, 'posts_per_page' => 1000 );
	$loop = new WP_Query( $args );
	while ($loop->have_posts()): $loop->the_post();

		# Vars
		$mod = strtotime(get_the_modified_date());
		$now = time();
		$day = (24 * 60 * 60);

		if ( $now - $mod < $day ) {
			$has__changed = true;
			break;
		}
	endwhile;

	return $has__changed;
}

/*--------------------------------------------------------*\
	ACF Fetch Field Key - Move to ACF?
\*--------------------------------------------------------*/

function acf_get_field_key( $field_name, $post_id ) {
	global $wpdb;
	$acf_fields = $wpdb->get_results( $wpdb->prepare( "SELECT ID,post_parent,post_name FROM $wpdb->posts WHERE post_excerpt=%s AND post_type=%s" , $field_name , 'acf-field' ) );
	// get all fields with that name.
	switch ( count( $acf_fields ) ) {
		case 0: // no such field
			return false;
		case 1: // just one result. 
			return $acf_fields[0]->post_name;
	}
	// result is ambiguous
	// get IDs of all field groups for this post
	$field_groups_ids = array();
	$field_groups = acf_get_field_groups( array(
		'post_id' => $post_id,
	));
	foreach ( $field_groups as $field_group )
		$field_groups_ids[] = $field_group['ID'];
	
	// Check if field is part of one of the field groups
	// Return the first one.
	foreach ( $acf_fields as $acf_field ) {
		if ( in_array($acf_field->post_parent,$field_groups_ids) )
			return $acf_fields[0]->post_name;
	}
	return false;
}
