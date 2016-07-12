<?php
/*--------------------------------------------------------*\
	Remove Admin Bar for non-admins
\*--------------------------------------------------------*/

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	show_admin_bar(false);
}

/*--------------------------------------------------------*\
	Custom Button
\*--------------------------------------------------------*/

function get__button($link, $text) {

	# New tab?
	$new = false;
	$url = parse_url( $link );
	if ( !empty( $url['host'] ) && $url['host'] !== $_SERVER['HTTP_HOST'] ) {
		$new = true;
	}

	# HTML
	$button = $new ? '<a href="' . $link . '" class="button" target="_blank">' : '<a href="' . $link . '" class="button">';
	$button .= $text;
	// $button .= '<span class="button__arrow">';
	// $button .= get__file( '/bld/img/icons/arrow--right.svg' );
	// $button .= '</span>';
	$button .= '</a>';
	return $button;
}

/*--------------------------------------------------------*\
	Post Thumbnails
\*--------------------------------------------------------*/

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size();

	add_image_size('x-lg', 1800, 9999);
	add_image_size('lg', 1280, 9999);
	add_image_size('md', 768, 9999);
	add_image_size('sm', 640, 9999);
	add_image_size('x-sm', 480, 9999);
	add_image_size('tiny', 200, 9999);
}

/*--------------------------------------------------------*\
	Get Theme Directory Path
\*--------------------------------------------------------*/

function get_theme_name() {
	$theme_path = explode('/', get_template_directory());
	$dirname = $theme_path[ count( $theme_path ) - 1 ]; ?>
	<script>
	var dirname = "<?php echo $dirname; ?>";
	</script>
<?php }

add_action('wp_head','get_theme_name');

/*--------------------------------------------------------*\
	Register Ajax
\*--------------------------------------------------------*/

function st_ajaxurl() { ?>
	<script>
	var ajaxurl = "<?php echo admin_url('admin-ajax.php') ?>";
	</script>
<?php }

add_action('wp_head','st_ajaxurl');

/*--------------------------------------------------------*\
	HTML5 Search Form
\*--------------------------------------------------------*/

add_theme_support( 'html5', array( 'search-form' ) );

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
}

add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );