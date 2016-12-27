<?php
/*--------------------------------------------------------*\
	VARIABLES
\*--------------------------------------------------------*/
	$html = "";
	$has_title = get_sub_field('is_title');
	$has_subtitle = get_sub_field('is_subtitle');
	$has_sidebar = get_sub_field( 'is_sidebar' );
	# Get Titles and Subtitles if they exist
	if ( $has_title ) {
		$title = get_sub_field( 'title' );
	}
	if ( $has_subtitle ) {
		$subtitle = get_sub_field( 'subtitle' );
	}
	
	# Content
	$content = get_sub_field( 'content' );

	# Background 
	$bg__image = get_sub_field( 'background_image' );
	$bg__color = get_sub_field( 'background_color' );
	if(!!$bg__image) {
		$bg__url = $bg__image['url'];
		$bg = 'background-image: url(' . $bg__url . ')';
	} else if(!!$bg__color) {
		$bg = 'background-color: ' . $bg__color;
	} else {
		$bg = null;
	}
	
	//$buttons = get_sub_field( 'buttons' );
	//$icons = get_sub_field( 'is_icons' );

/*--------------------------------------------------------*\
	Custom IDs, Classes, and Styles
\*--------------------------------------------------------*/
	$id = get_sub_field( 'section_id' );
	$custom__classes = get_sub_field('section_classes');
	$sidebar__class = $has_sidebar ? 'content--sidebar' : "";
	

	# Text Align
	$align = get_sub_field('text_align');
	$block__align = $align
		? "block--content-".$align
		: "block--content-left";

	# Content Classes
	$block__classes = ["block", "block--content", $block__align, $custom__classes];
	$block__styles = $bg ? [$bg] : "";
	$content__classes = ["content", $sidebar__class];

/*--------------------------------------------------------*\
	Build $HTML Output
\*--------------------------------------------------------*/
	$html .= "<div class='". join($content__classes, " ") ."'>";
	# Titles
	if($has_title || $has_subtitle) {
		$html .= "<div class='block__header'>";
		if($has_title) $html .= "<h1 class='block__title'>".$title."</h1>";
		if($has_subtitle) $html .= "<h2 class='block__subtitle'>".$subtitle."</h2>";
		$html .= "</div>";
	}
	# Content
	if(!!$content) $html.= "<div class='block__main'>".$content."</div>";

	// # Icons
	// if ( $icons ) {

		// 	$icons = get_sub_field( 'icons' );
		// 	$count = count( $icons );

		// 	$html .= '<div class="block__icons block__icons--' . $count . '">';

		// 	foreach ( $icons as $icon ) {

		// 		# Vars
		// 		$title = $icon['title'];
		// 		$content = $icon['content'];
		// 		$svg = $icon['icon'];

		// 		# Output
		// 		$html .= '<div class="icon__item">';
		// 		$html .= '<div class="icon__container">';
		// 		$html .= curl_get_content( $_SERVER['HTTP_HOST'] . '/bld/img/icons/' . $svg . '.svg' );
		// 		$html .= '</div>';

		// 		if ( $title ) $html .= '<p class="icon__title">' . $title . '</p>';
		// 		if ( $content ) $html .= '<div class="icon__content">' . $content . '</div>';

		// 		$html .= '</div>';
		// 	}

		// 	$html .= '</div>';
	// }
	$html .= "</div>";
?>

<section class="<?php echo join($block__classes, " "); ?>" 
<?php if(!empty($block__styles)) {echo "style='".join($block__styles,"; ")."'";} ?> <?php if( $id ) echo 'id="'.$id.'"'; ?>>
	<div class="block__container">

		<?php
		
			echo $html;
			if ( !!$sidebar ) {
				$html .= '<aside class="content__sidebar">';

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