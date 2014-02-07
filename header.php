<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<!--[if IE]><div style='clear: both; height: 112px; padding:0; position: relative;'><a href="http://www.theie9countdown.com/ie-users-info"><img src="http://www.theie9countdown.com/assets/badge_iecountdown.png" border="0" height="112" width="348" alt="" /></a></div><![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
    <link href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/styl/bld/screen.prefixed.css" media="screen, projection" rel="stylesheet" />
    <script type="text/javascript" src="http://fast.fonts.net/jsapi/60f18f5a-8f6c-435f-88f4-591e02562ff1.js"></script>
	<?php wp_head(); ?>
</head>

<body>
	<div class="wrapper">
		<header class="header">
			<div class="u-nav-ctn">
				<div class="fix-wrap">
					<figure class="logo">
						<a href="/">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Senior Concierge Logo">
						</a>
					</figure>
					<nav class="u-nav">
						<?php 
							$args = array ( 'menu' => 'Universal Navigation', 'container' => false );
							wp_nav_menu( $args );
						?>
					</nav>
					<div class="sidr-btn-ctn">
						<a href="#sidr" id="press" class="navicon-btn x">
							<div class="navicon"></div>
						</a>
					</div>
				</div>
			</div>
		</header>

		<nav id="sidr">
			<div class="sidr-inner">
				<h3>JFCS</h3>
				<div class="nav-m">
					<ul>
					<?php 
						$args = array ( 'menu' => 'Navigation', 'container' => false );
						wp_nav_menu( $args );
						$args = array ( 'title_li' => '', 'include' => '162,278,24' );
						wp_list_pages($args);
					?>	
					</ul>				
				</div>
				<div class="u-nav-m">
					<?php 
						$args = array ( 'menu' => 'Universal Navigation', 'container' => false );
						wp_nav_menu( $args );
					?>			
				</div>
			</div>
		</nav>

