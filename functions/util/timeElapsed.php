<?php

/*--------------------------------------------------------*\
	How long ago was it?
\*--------------------------------------------------------*/

function time__elapsed($time) {

	$since__then = time() - $time;

	if ($since__then < 1) return 'now';

	$conversions = array(
		365 * 24 * 60 * 60  =>  'year',
		 30 * 24 * 60 * 60  =>  'month',
		      24 * 60 * 60  =>  'day',
		           60 * 60  =>  'hour',
		                60  =>  'minute',
		                 1  =>  'second'
	);

	$conversions__plural = array(
		'year'   => 'years',
		'month'  => 'months',
		'day'    => 'days',
		'hour'   => 'hours',
		'minute' => 'minutes',
		'second' => 'seconds'
	);

	foreach( $conversions as $secs => $str ) {
		$days = $since__then / $secs;

		if ($days >= 1) {
			$r = round($days);
			return $r . ' ' . ($r > 1 ? $conversions__plural[$str] : $str) . ' ago';
		}
	}
}
