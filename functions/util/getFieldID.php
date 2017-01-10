<?php

/*--------------------------------------------------------*\
	ACF Fetch Field Key ==> Simple Version
\*--------------------------------------------------------*/

function getFieldID($obj) {
	$key = $obj['key'];
	$key__split = explode('_', $key);
	return $key__split[1];
}
