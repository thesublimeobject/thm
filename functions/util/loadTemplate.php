<?php

/*--------------------------------------------------------*\
	Load Template Part (for saving to vars)
\*--------------------------------------------------------*/

function load__template($filename) {
	ob_start();
	get_template_part($filename[0], $filename[1]);
	$contents = ob_get_contents();
	ob_end_clean();
	return $contents;
}