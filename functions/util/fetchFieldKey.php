<?php

/*--------------------------------------------------------*\
	ACF Fetch Field Key
\*--------------------------------------------------------*/

function acf__fetchFieldKey($field_name, $post_id) {
	global $wpdb;
	$acf_fields = $wpdb->get_results(
		$wpdb->prepare( 
			"SELECT ID, post_parent, post_name 
			FROM $wpdb->posts 
			WHERE post_excerpt=%s 
			AND post_type=%s", 
			$field_name, 
			'acf-field' 
		) 
	);

	switch (count($acf__fields)) {

		// field does not exist
		case 0:
			return false;

		// one field
		case 1: 
			return $acf__fields[0]->post_name;
	}

	// get IDs of all field groups for this post
	$fieldGroups_IDs = [];
	$fieldGroups = acf_get_field_groups(['post_id' => $post_id]);
	foreach ( $fieldGroups as $fieldGroup ) {
		$fieldGroups_IDs[] = $fieldGroup['ID'];
	}
	
	// check if field is part of one of the field groups and return the first one
	foreach ( $acf__fields as $acf_field ) {
		if (in_array($acf_field->post_parent, $fieldGroups_IDs)) {
			return $acf__fields[0]->post_name;
		}
	}

	return false;
}
