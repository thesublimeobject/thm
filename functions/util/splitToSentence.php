<?php

/*--------------------------------------------------------*\
	Split Content By Sentences
\*--------------------------------------------------------*/

function splitToSentence($content, $count) {
	$sentence = explode('. ', $content);
	$snippet = '';
	$sentence__count = 0;
	foreach ($sentence as $s) {
		if ($sentence__count < $count) {
			$snippet .= $s . '. ';
			$sentence__count++;
		} else {
			break;
		}
	}
	return $snippet;
}
