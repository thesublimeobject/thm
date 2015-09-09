<div class="share-bar">
	<p class="share-bar__title">Share</p>
	<ul class="share-bar__social">
	<?php  

		# Logo needs to be set per site for FB sharing.
		# Also, functionality for Instagram share is not imlemented.

		# Vars
		$html = '';
		$title = str_replace( ' ', '%20', get_the_title() );
		$site_title = urlencode( '//' . $_SERVER['HTTP_HOST'] );
		$link = urlencode(get_the_permalink());
		$excerpt = str_replace( '+', '%20', urlencode( get_the_excerpt() ) );
		$logo = ''; 

		# Twitter?
		if ( get_field( 'is_twitter', 'option' ) ) {

			$icon_array = get_field( 'twitter_icon', 'option' );
			$icon = $icon_array['url'];

			$html .= '<li class="share-bar__item">';
			$html .= '<img src="' . $icon . '">';
			$html .= '<a href="https://twitter.com/intent/tweet?source=' . $link . '&text=' . $title . ':%20' . $link . '&via=' . get_field( 'twitter_url', 'option' ) . '"></a>';
			$html .= '</li>';
		}

		# Facebook?
		if ( get_field( 'is_facebook', 'option' ) ) {

			$icon_array = get_field( 'facebook_icon', 'option' );
			$icon = $icon_array['url'];

			$html .= '<li class="share-bar__item">';
			$html .= '<img src="' . $icon . '">';
			$html .= '<a href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=' . $link . '&amp;p[images][0]=' . $logo . '&amp;p[title]=' . $title . '"></a>';
			$html .= '</li>';
		}

		# Linkedin?
		if ( get_field( 'is_linkedin', 'option' ) ) {

			$icon_array = get_field( 'linkedin_icon', 'option' );
			$icon = $icon_array['url'];

			$html .= '<li class="share-bar__item">';
			$html .= '<img src="' . $icon . '">';
			$html .= '<a href="http://www.linkedin.com/shareArticle?mini=true&url=' . $link .'F&title=' . $title . '&summary=' . $excerpt . '&source=' . $site_title . '"></a>';
			$html .= '</li>';
		}

		# Instagram?
		if ( get_field( 'is_instagram', 'option' ) ) {

			$icon_array = get_field( 'instagram_icon', 'option' );
			$icon = $icon_array['url'];

			$html .= '<li class="share-bar__item">';
			$html .= '<img src="' . $icon . '">';
			$html .= '<a href="' . get_field( 'instagram_url' ) . '"></a>';
			$html .= '</li>';
		}

		if ( !empty( $html ) ) echo $html;
	?>
	</ul>
</div>