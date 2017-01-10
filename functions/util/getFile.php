<?php

/*--------------------------------------------------------*\
	Get File
\*--------------------------------------------------------*/

function get__file($filename, $absolute = false) {

	if ($absolute === true) {
		$path = $_SERVER['DOCUMENT_ROOT'] . $filename;
	}

	else if (strpos($filename, 'svg') > -1 && !$absolute) {
		$path = $_SERVER['DOCUMENT_ROOT'] . '/build/img/icons' . $filename;
	}

	else if (strpos($filename, 'php') > -1 && !$absolute) {
		$path = $_SERVER['DOCUMENT_ROOT'] . '/cnt/themes/' . $filename;
	}

	else {
		$path = $_SERVER['DOCUMENT_ROOT'] . $filename;
	}

	if (is_file($path)) {
		ob_start();
		include $path;
		$contents = ob_get_contents();
		ob_end_clean();
		return $contents;
	}

	return 'file does not exist at PATH: ' . $path;
}
