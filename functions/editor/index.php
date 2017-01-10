<?php
function init() {
	if (is_admin()) {
		add_action('init', 'tinyMCE__setup');
	}
}

function tinyMCE__setup() {
	if ((!current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' )) || get_user_option( 'rich_editing' ) !== 'true') {
		return;
	}

	add_filter( 'mce_external_plugins', 'theme__button');
	add_filter( 'mce_buttons', 'add__toolbarButton');
}

function theme__button($plugin__array) {
	$plugin__array['addButton'] = '/cnt/themes/' . wp_get_theme()->template . '/functions/editor/addButton.js';
	return $plugin__array;
}

function add__toolbarButton($buttons) {
	array_push($buttons, 'addButton');
	return $buttons;
}

init();