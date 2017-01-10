<script type="text/javascript" src="/build/polyfill.js"></script>
<script type="text/javascript" src="/build/common.js"></script>
<?php $html = '';


$app = '/build/app';
$deferred = '/build/deferred';

# Production
if ( strpos($_SERVER['HTTP_HOST'], 'com') > -1 || strpos($_SERVER['HTTP_HOST'], 'io') > -1 ) { 
	$script__suffix = '.min.js';
	$html .= $app . $script__suffix;
} 

# Development
else {
	$script__suffix = '.js';
	$html .= $app . $script__suffix;
} ?>

<script type="text/javascript" src="<?php echo $html; ?>"></script>
<script type="text/javascript">
	var script = document.createElement('script');
	script.src = '<?php echo $deferred . $script__suffix; ?>'
	document.body.appendChild(script)
</script>
<?php wp_footer(); ?>
