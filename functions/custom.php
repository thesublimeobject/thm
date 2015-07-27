<?php

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
	Get the Content with Formatting
\*--------------------------------------------------------*/

function get_content() {
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

/*--------------------------------------------------------*\
	TweetPHP
\*--------------------------------------------------------*/

include dirname(__FILE__) . './../inc/tweet-php/TweetPHP.php';

function get_tweets() {
	$TweetPHP = new TweetPHP(array(
		'consumer_key'              => 'oBJeB81z5K6Rww28NfNyrg',
		'consumer_secret'           => '8ZG7fxQGbXFaRQrXezlDWAZYEpcIXlIRdgrtejldFLY',
		'access_token'              => '26304269-doIvI2DtmjxVBLkXzK8K22yRoooYs26Ierk0qw',
		'access_token_secret'       => 'n94elJkQ1sJp6H9QUQzwDwhhBxF4sPfZjSnEhTd8LQ',
		'twitter_screen_name'       => 'NorwestVP',
		'tweets_to_display'			=> 2,
		'ignore_replies'        	=> false,
		'ignore_retweets'       	=> false
	));

	return $TweetPHP->get_tweet_array();
}

/*--------------------------------------------------------*\
	Get Nums
\*--------------------------------------------------------*/

function get_nums( $i ) {
	$nums = array( 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten');
	return $nums[$i];
}