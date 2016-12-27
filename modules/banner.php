<?php 
	$html = '';
	$banners = get_sub_field( 'banner__item' );
	$length = count( $banners );


	$block__classes = ['block','block--banner'];
	if($length > 1) $block__classes[] = 'block--banner-carousel';
	if(is_page(array('home')) || is_front_page()) $block__classes[] = 'block--banner-home';
	$section__classes = join( $block__classes, " " );

	
?>
<section class="<?php echo $section__classes; ?>">
	<ul class="banner__slider" id="banner__slider">
	<?php  
		
		if ($length > 1) $html .= '<ul class="banner__slider" id="banner__slider">';
		
		foreach ( $banners as $i => $banner ) {

			# Vars
			$title 	  = $banner['title'];
			$subtitle = $banner['subtitle'];
			$content = $banner['has__content'] ? $banner['content'] : null;
			$buttons  = $banner['buttons'];
			$bg__image = $banner['bg__image'];
			$bg__url   = $bg__image['url'];

			# Lazyload all except first banner image
			if ( $i == 0 ) {
				$bg = 'style="background-image: url(' . $bg__url . ')"';
			} else {
				$bg = 'data-bg="url(' . $bg__url . ')"';
			}

			# Begin Output
			if ($length > 1) {
				$html .= '<li class="banner__item" data-slidr="' . get_nums( $i ) . '" ' . $bg . '>';
			} else {
				$html .= '<div class="banner__item">';
			}

			$html .= '<div class="block__container"><div class="banner__container">';

			# Title
			if ( !!$title ) $html .= '<h1 class="banner__title">' . $title . '</h1>';

			# Subtitle
			if ( !!$subtitle ) $html .= '<h2 class="banner__subtitle">' . $subtitle . '</h2>';

			# Buttons
			if ( !empty($buttons) ) {
				$html .= '<div class="banner__buttons">';
				foreach( $buttons as $button ) {
					$button__text = $button['button_text'];
					$button__link = $button['button_link'];
					$is__modal = $button['is_modal'];

					if ( $is__modal ) {
						$html .= '<a href="' . $button__link . '" class="md-trigger">' . $button__text . '</a>';
					} else {
						$html .= '<a href="' . $button__link . '">' . $button__text . '</a>';
					}
				}
				$html .= '</div>';
			}
			$html .= '</div></div>';

			if ($length > 1) {
				$html .= '</li>';
			} else {
				$html .= '</div>';
			}
		}

		if($length > 1) $html .= '</ul>';
		echo $html;
	?>
	</ul>
</section>