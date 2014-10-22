<!doctype html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<?php wp_head(); ?>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/lib/modernizr.min.js"></script>
</head>

<body>
	<div class="wrapper">
		<header class="header">
			<div class="ctn">
				<div class="logo"><a href="/">
					<img src="" alt="">
				</a></div>
				<nav class="nav">
					<?php 
						$args = array ( 'menu' => 'Navigation', 'container' => false );
						wp_nav_menu( $args );
					?>
				</nav>
			</div>
		</header>	