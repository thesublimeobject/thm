<!doctype html>
<html class="no-js">
<!--[if IE]><div style='clear: both; height: 112px; padding:0; position: relative;'><a href="http://www.theie9countdown.com/ie-users-info"><img src="http://www.theie9countdown.com/assets/badge_iecountdown.png" border="0" height="112" width="348" alt="" /></a></div><![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<link rel="stylesheet" type="text/css" href="//cloud.typography.com/7655652/762784/css/fonts.css" />
	<?php wp_head(); ?>
</head>

<body>
	<div class="wrapper">
		<header class="header">
			<div class="ctn">
				<div class="header-top">
					<span data-picture data-alt="Virtual Instruments" class="logo">
						<span data-src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.min.png"></span>
					</span>
					<nav class="u-nav">
						<?php 
							$args = array ( 'menu' => 'Universal Navigation', 'container' => false );
							wp_nav_menu( $args );
						?>
					</nav>
				</div>
				<div class="header-btm">
					<nav class="nav">
						<?php 
							$args = array ( 'menu' => 'Navigation', 'container' => false );
							wp_nav_menu( $args );
						?>				
					</nav>
				</div>
			</div>
		</header>
		<div class="header-fill"></div>
