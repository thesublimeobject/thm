<?php 
	$title = get_sub_field( 'title' );
	$subtitle = get_sub_field( 'subtitle' );
	$content = get_sub_field( 'content' );
	$bg_image = get_sub_field( 'background_image' );
	$bg_url = $bg_image['url'];
	$bg = 'style="background-image: url(' . $bg_url . ')"';
	$buttons = get_sub_field( 'buttons' );
	$icons = get_sub_field( 'is_icons' );
	$sidebar = get_sub_field( 'is_sidebar' );
	$id = get_sub_field( 'section_id' );

	# Text Align
	$align = get_sub_field( 'text_align' );
	if ( $align == 'left' || empty( $align ) ) {
		$block_align = 'block__content--left';
	} elseif ( $align == 'center' ) {
		$block_align = 'block__content--center';
	} elseif ( $align == 'right' ) {
		$block_align = 'block__content--right';
	}
?>

<section class="block block__content <?php echo $block_align; ?>" <?php if ( $bg_image ) echo $bg; if ( $id ) echo 'id="' . $id . '"'; ?>>
	<div class="ctn">
		<?php if ( $sidebar ) echo '<div class="block__content--with-sidebar">'; ?>
		<div class="block__header">
		<?php 

			# Title
			if ( $title ) {
				echo '<h1 class="block__title">' . $title . '</h1>';
			}

			# Subtitle
			if ( $subtitle ) {
				echo '<h2 class="block__subtitle">' . $subtitle . '</h2>';
			}
		?>
		</div>
		<div class="block__main">
			<?php

				# Content
				if ( $content ) echo '<div class="cnt">' . $content . '</div>'; 

				# Icons
				if ( $icons ) {

					$html = '';
					$icons = get_sub_field( 'icons' );
					$count = count( $icons );

					$html .= '<div class="block__icons block__icons--' . $count . '">';

					foreach ( $icons as $icon ) {

						# Vars
						$title = $icon['title'];
						$content = $icon['content'];
						$svg = $icon['icon'];

						# Output
						$html .= '<div class="icon__item">';
						$html .= '<div class="icon__container">';
						$html .= curl_get_content( $_SERVER['HTTP_HOST'] . '/bld/img/icons/' . $svg . '.svg' );
						$html .= '</div>';

						if ( $title ) $html .= '<p class="icon__title">' . $title . '</p>';
						if ( $content ) $html .= '<div class="icon__content">' . $content . '</div>';

						$html .= '</div>';
					}

					$html .= '</div>';
					echo $html;
				}

				# Buttons
				if ( $buttons ) {
					echo '<div class="block__buttons">';
					foreach ( $buttons as $button ) {
						$button_text = $button['button_text'];
						$button_link = $button['button_link'];
						$is_modal = $button['is_modal'];

						if ( $is_modal ) {
							echo '<a href="' . $button_link . '" class="btn md-trigger">' . $button_text . '</a>';
						} else {
							echo '<a href="' . $button_link . '" class="btn">' . $button_text . '</a>';
						}
					}
					echo '</div>';
				}

			?>
		</div>
		<?php 
			if ( $sidebar ) {
				$html = '';
				$html .= '</div>'; 
				$html .= '<aside class="block__sidebar">';

				# Get Sidebar Media
				if ( get_sub_field( 'sidebar_media' ) != 'none' ) {
					$sidebar_image = get_sub_field( 'sidebar_image' );

					$html .= '<figure class="sidebar__figure">';
					$html .= '<img src="' . $sidebar_image['url'] . '">';
					$html .= '<figcaption class="sidebar__caption">' . get_sub_field( 'sidebar_media_caption' ) . '</figcaption>';
					$html .= '</figure>';
				}

				$html .= '</aside>';
				echo $html;
			}
		?>
	</div>
</section>