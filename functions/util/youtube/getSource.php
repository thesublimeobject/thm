<?php

/*--------------------------------------------------------*\
	Extract Source from Youtube iFrame
\*--------------------------------------------------------*/

require __DIR__ . '/../../../vendor/autoload.php';
use PHPHtmlParser\Dom;

function getIFrameSource($embed) {
	$dom = new Dom;
	$dom->load($embed);
	$iframe = $dom->find('iframe');
	$source = $iframe->getAttribute('data-src');
	return $source;
}
