<?php 
	$banners = get_sub_field( 'banner_item' );
?>
<section class="block block__banner">
	<ul class="banner__slider" id="banner__slider">
	<?php  
		$html = '';
		foreach ( $banners as $i => $banner ) {

			# Vars
			$title = $banner['title'];
			$subtitle = $banner['subtitle'];
			$buttons = $banner['buttons'];
			$bg_image = $banner['background_image'];
			$bg_url = $bg_image['url'];

			# Lazyload all except first banner image
			if ( $i == 0 ) {
				$bg = 'style="background-image: url(' . $bg_url . ')"';
			} else {
				$bg = 'data-bg="url(' . $bg_url . ')"';
			}

			# Begin Output
			$html .= '<li class="banner__item" data-slidr="' . get_nums( $i ) . '" ' . $bg . '>';
			$html .= '<div class="banner__content">';

			# Title
			if ( $title ) {
				$html .= '<h1 class="banner__title">' . $title . '</h1>';
			}

			# Subtitle
			if ( $subtitle ) {
				$html .= '<h2 class="banner__subtitle">' . $subtitle . '</h2>';
			}

			# Buttons
			if ( $buttons ) {
				$html .= '<div class="banner__buttons">';
				foreach( $buttons as $button ) {
					$button_text = $button['button_text'];
					$button_link = $button['button_link'];
					$is_modal = $button['is_modal'];

					if ( $is_modal ) {
						$html .= '<a href="' . $button_link . '" class="md-trigger">' . $button_text . '</a>';
					} else {
						$html .= '<a href="' . $button_link . '">' . $button_text . '</a>';
					}
				}
				$html .= '</div>';
			}
			$html .= '</div>';
			$html .= '</li>';
		}
		echo $html;
	?>
	</ul>
</section>