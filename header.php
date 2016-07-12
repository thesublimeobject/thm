<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>

	<?php 
	if ( strpos($_SERVER['HTTP_HOST'], 'com') > -1 || strpos($_SERVER['HTTP_HOST'], 'io') > -1 ) {
		echo '<link rel="stylesheet" href="/bld/screen.min.css"></link>';
	} else {
		echo '<link rel="stylesheet" href="/bld/screen.css"></link>';
	}

	wp_head(); ?>
</head>

<body>
	<div class="wrapper">
		<header class="header">
			<div class="ctn">
				<nav class="nav"></nav>
			</div>
		</header>	