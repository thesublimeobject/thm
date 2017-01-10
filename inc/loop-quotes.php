<?php 
	$title = get_sub_field( 'title' );
	$quotes = get_sub_field( 'quote_item' );
	$bg_image = get_sub_field( 'background_image' );
	$bg_url = $bg_image['url'];
	$bg = 'style="background-image: url(' . $bg_url . ')"';
?>

<section class="block block--quotes" id="block--quotes" <?php if ( $bg_image ) echo $bg; ?>>
	<div class="ctn">
		<?php  

			# Block Header only if Title? exists.
			if ( get_sub_field( 'title' ) ) {
				$html = '';
				$html .= '<div class="block_header">';
				$html .= '<h1 class="title">' . get_sub_field( 'title' ) . '</h1>';
				$html .= '</div>';
				echo $html;
			}
		?>
		<div class="block__main">
		<?php 
			$html = '';
			$html .= '<ul class="quote__slider" id="quote__slider">';

			# Loop through Quotes
			foreach ( $quotes as $i => $quote ) {

				# Get Field Vars
				$quote_text = $quote['quote_text'];
				$citation = $quote['citation'];

				# Begin Quote Item
				$html .= '<li class="quote__item" data-slidr="' . get_nums($i) . '">';

				# Quote Text
				$html .= '<div class="quote__text">' . $quote_text . '</div>';

				# Citation
				$html .= '<p class="quote__citation">' . $citation . '</p>';

				# Close Quote Item
				$html .= '</li>';

			}

			# Close Slider, Echo HTML
			$html .= '</ul>';
			echo $html;
		?>
		</div>
	</div>
</section>