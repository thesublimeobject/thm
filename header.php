<!doctype html>
<html>
<?php locate_template( 'header/header--head.php', true ); ?>
<body>
<?php
	$pageSlug = !is_single() ? getSlug()['page__slug'] : 'single--' . camelCase($post->$post_type);
	$wrapperClass = ['wrapper', 'wrapper--'.$pageSlug];
	echo '<div class="' . join(' ', $wrapperClass) . '">';

	locate_template( 'header/header--main.php', true );
?>