<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	
	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="/build/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="/build/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/build/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/build/favicons/manifest.json">
	<link rel="mask-icon" href="/build/favicons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">

	<!-- Stylesheets -->
	<?php echo get__file( '/cnt/themes/menlo/header/header--css.php', true ); ?>

	<!-- WP Head -->
	<?php wp_head(); ?>
	
	<!-- Google Analytics -->
</head>