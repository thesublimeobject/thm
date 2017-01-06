<?php

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
	Remove Admin Bar for non-admins
\*--------------------------------------------------------*/

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	show_admin_bar(false);
}

/*--------------------------------------------------------*\
	Post Thumbnails
\*--------------------------------------------------------*/

if (function_exists( 'add_theme_support' )) {
	add_theme_support( 'post-thumbnails' );
	$sizes = [
		'2400',
		'1800',
		'1440',
		'1280',
		'1024',
		'768',
		'480',
		'240',
	];	

	foreach ($sizes as $size) {
		add_image_size($size, intval($size), 9999);
	}
}

/*--------------------------------------------------------*\
	Register Ajax
\*--------------------------------------------------------*/

function st_ajaxurl() { ?>
	<script>var ajaxurl = "<?php echo admin_url('admin-ajax.php') ?>";</script>
<?php }

add_action('wp_head','st_ajaxurl');

/*--------------------------------------------------------*\
	HTML5 Search Form
\*--------------------------------------------------------*/

add_theme_support('html5', array( 'search-form' ));

/*--------------------------------------------------------*\
	Add MIME Types
\*--------------------------------------------------------*/

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/*--------------------------------------------------------*\
	Clean Up
\*--------------------------------------------------------*/

function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
}

add_action('init', 'removeHeadLinks');
