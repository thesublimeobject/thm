<!-- Critical -->
<style type="text/css"><?php echo get__file('/build/critical.min.css'); ?></style>

<!-- Main -->
<?php $html = "";

# Production CSS File
if ( strpos($_SERVER['HTTP_HOST'], 'com') > -1 || strpos($_SERVER['HTTP_HOST'], 'io') > -1 ) {
	$stylesheet = '/build/app.min.css';
	$ga = true;
}

# Development
else {
	$stylesheet = '/build/app.css';
	$ga = false;
}

#  Output
$html .= '<link rel="preload" href="'.$stylesheet.'" as="style" onload="this.rel=\'stylesheet\'">';
$html .= '<noscript><link rel="stylesheet" href="'.$stylesheet.'"></noscript>';

echo $html; ?>