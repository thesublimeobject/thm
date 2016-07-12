<?php

/*--------------------------------------------------------*\
	TweetPHP
\*--------------------------------------------------------*/

require_once dirname(__FILE__) . './../inc/tweet-php/TweetPHP.php';

function get_tweets() {
	$TweetPHP = new TweetPHP(array(
		'consumer_key'              => 'oBJeB81z5K6Rww28NfNyrg',
		'consumer_secret'           => '8ZG7fxQGbXFaRQrXezlDWAZYEpcIXlIRdgrtejldFLY',
		'access_token'              => '26304269-doIvI2DtmjxVBLkXzK8K22yRoooYs26Ierk0qw',
		'access_token_secret'       => 'n94elJkQ1sJp6H9QUQzwDwhhBxF4sPfZjSnEhTd8LQ',
		'twitter_screen_name'       => 'ClientTwitterHandle',
		'tweets_to_display'			=> 2,
		'ignore_replies'        	=> false,
		'ignore_retweets'       	=> false
	));

	return $TweetPHP->get_tweet_array();
}

/*--------------------------------------------------------*\
    SimplePIE Implementation
\*--------------------------------------------------------*/

// require_once dirname(__FILE__) . './../inc/simplepie/autoloader.php' );
// require_once dirname(__FILE__) . './../inc/simpledom/simple_dom.php' );

// function get__rssfeed() {
// 	$feed = new SimplePie();
// 	$feed->set_feed_url( '' );
// 	$feed->set_cache_location( dirname(__FILE__) . './../inc//simplepie/cache' );
// 	$feed->init();
// 	$feed->handle_content_type();
// 	return $feed->get_items();
// }

/*--------------------------------------------------------*\
    Get Modal
\*--------------------------------------------------------*/
function get__modal($content, $id, $video = false, $new_classes = null ) {
	$md__html = ''
	$classes = 'modal';

	// Set Modal Classes
	if($new__classes !== null && gettype($new__classes) === 'array') {
		foreach($new_classes as $class) {
			$classes .= " {$class}";
		}
	} else if ($new_classes !== null && gettype($new__classes) === 'string') {
		$classes .= " {$new_classes}";
	}

	// Build Output
	$md__html .= "<div class='{$classes}' id='{$id}'>";
	if($video === false) {
		$md__html .= "<div class='modal__content'>{$content}</div>";
	} else {
		$md__html .= $content;
	}
	$md__html .= "<div class='modal__close'></div>";
	$md__html .= "</div>";

	return $md__html;
}