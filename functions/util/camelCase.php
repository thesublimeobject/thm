<?php

/*--------------------------------------------------------*\
	Convert to CamelCase

	TODO: more robust search and replace.
\*--------------------------------------------------------*/

function camelCase($string) {
	return lcfirst(str_replace(' ', '', ucwords(str_replace('-', ' ', $string))));
}
