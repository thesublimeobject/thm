<?php # General Utility Functions

$root = $_SERVER['DOCUMENT_ROOT'];

/*--------------------------------------------------------*\
	Echo Code with Pre
\*--------------------------------------------------------*/

function pre( $data ) {
	echo '<pre>'; 
	print_r( $data );
	echo '</pre>';
	echo '<br><br>';
	echo '----------------------';
}

/*--------------------------------------------------------*\
	cURL Get Contents
\*--------------------------------------------------------*/

function curl_get_content($url) {
	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	$output = curl_exec( $ch );
	curl_close( $ch );
	return $output;
}

/*--------------------------------------------------------*\
	Get File
\*--------------------------------------------------------*/

function get__file($filename) {

	# Append DOCROOT
	$filename = $_SERVER['DOCUMENT_ROOT'] . $filename;

	if (is_file($filename)) {
		ob_start();
		include $filename;
		$contents = ob_get_contents();
		ob_end_clean();
		return $contents;
	}
	return false;
}


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

/*--------------------------------------------------------*\
	How long ago was it?
\*--------------------------------------------------------*/

function time__elapsed($time) {

	# How much time since then?
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

/*--------------------------------------------------------*\
	Get Nums
\*--------------------------------------------------------*/

function get__nums( $i ) {
	$nums = array('one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen','fourteen','fifteen', 'sixteen','seventeen','eighteen','nineteen','twenty','twentyone','twentytwo','twentythree','twentyfour','twentyfive','twentysix','twentyseven', 'twentyeight','twentynine','thirty','thirtyone','thirtytwo','thirtythree','thirtyfour','thirtyfive','thirtysix','thirtyseven','thirtyeight', 'thirtynine','forty','fortyone','fortytwo','fortythree','fortyfour','fortyfive','fortysix','fortyseven','fortyeight','fortynine','fifty', 'fiftyone','fiftytwo','fiftythree','fiftyfour','fiftyfive','fiftysix','fiftyseven','fiftyeight','fiftynine','sixty','sixtyone','sixtytwo', 'sixtythree','sixtyfour','sixtyfive','sixtysix','sixtyseven','sixtyeight','sixtynine','seventy','seventyone','seventytwo','seventythree', 'seventyfour','seventyfive','seventysix','seventyseven','seventyeight','seventynine','eighty','eightyone','eightytwo','eightythree', 'eightyfour','eightyfive','eightysix','eightyseven','eightyeight','eightynine','ninety','ninetyone','ninetytwo','ninetythree','ninetyfour','ninetyfive','ninetysix','ninetyseven','ninetyeight','ninetynine','onehundred','onehundredone', 'onehundredtwo', 'onehundredthree', 'onehundredfour', 'onehundredfive', 'onehundredsix', 'onehundredseven', 'onehundredeight', 'onehundrednine', 'onehundredten', 'onehundredeleven', 'onehundredtwelve', 'onehundredthirteen', 'onehundredfourteen', 'onehundredfifteen', 'onehundredsixteen', 'onehundredseventeen', 'onehundredeighteen', 'onehundrednineteen', 'onehundredtwenty', 'onehundredtwentyone', 'onehundredtwentytwo', 'onehundredtwentythree', 'onehundredtwentyfour', 'onehundredtwentyfive', 'onehundredtwentysix', 'onehundredtwentyseven', 'onehundredtwentyeight', 'onehundredtwentynine', 'onehundredthirty', 'onehundredthirtyone', 'onehundredthirtytwo', 'onehundredthirtythree', 'onehundredthirtyfour', 'onehundredthirtyfive', 'onehundredthirtysix', 'onehundredthirtyseven', 'onehundredthirtyeight', 'onehundredthirtynine', 'onehundredforty', 'onehundredfortyone', 'onehundredfortytwo', 'onehundredfortythree', 'onehundredfortyfour', 'onehundredfortyfive', 'onehundredfortysix', 'onehundredfortyseven', 'onehundredfortyeight', 'onehundredfortynine', 'onehundredfifty', 'onehundredfiftyone', 'onehundredfiftytwo', 'onehundredfiftythree', 'onehundredfiftyfour', 'onehundredfiftyfive', 'onehundredfiftysix', 'onehundredfiftyseven', 'onehundredfiftyeight', 'onehundredfiftynine', 'onehundredsixty', 'onehundredsixtyone', 'onehundredsixtytwo', 'onehundredsixtythree', 'onehundredsixtyfour', 'onehundredsixtyfive', 'onehundredsixtysix', 'onehundredsixtyseven', 'onehundredsixtyeight', 'onehundredsixtynine', 'onehundredseventy', 'onehundredseventyone', 'onehundredseventytwo', 'onehundredseventythree', 'onehundredseventyfour', 'onehundredseventyfive', 'onehundredseventysix', 'onehundredseventyseven', 'onehundredseventyeight', 'onehundredseventynine', 'onehundredeighty', 'onehundredeightyone', 'onehundredeightytwo', 'onehundredeightythree', 'onehundredeightyfour', 'onehundredeightyfive', 'onehundredeightysix', 'onehundredeightyseven', 'onehundredeightyeight', 'onehundredeightynine', 'onehundredninety', 'onehundredninetyone', 'onehundredninetytwo', 'onehundredninetythree', 'onehundredninetyfour', 'onehundredninetyfive', 'onehundredninetysix', 'onehundredninetyseven', 'onehundredninetyeight', 'onehundredninetynine');
	return $nums[$i];
}