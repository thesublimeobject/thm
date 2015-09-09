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
	Get the Content with Formatting
\*--------------------------------------------------------*/

function get_content() {
	$content = get_the_content();
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

/*--------------------------------------------------------*\
	Remove Empty <p> tags from the_content()
\*--------------------------------------------------------*/

function remove_empty_p( $content ) {
	$content = force_balance_tags( $content );
	$content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
	$content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
	return $content;
}

add_filter('the_content', 'remove_empty_p', 20, 1);

/*--------------------------------------------------------*\
	Get Featured Image URL
\*--------------------------------------------------------*/

function get_post_thumbnail_url( $size ) {
	$id = get_post_thumbnail_id();
	$src = wp_get_attachment_image_src($id, $size);
	$url = $src[0];
	$bg = 'style="background-image: url(' . $url . '");';
	return $bg;
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