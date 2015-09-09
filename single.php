<?php 
	get_header();
	while (have_posts()): the_post();

	# Vars
	$title = get_the_title();
	$content = get_content();

	# Featured Image?
	if ( has_post_thumbnail() ) {
		$id = get_post_thumbnail_id();
		$bg = get_post_thumbnail_url( 'full' );
?>

<section class="block block__banner--single" <?php echo $bg; ?>>
	<div class="ctn">
		<div class="block__main">
			<h1 class="banner__title"><?php echo $title; ?></h1>
		</div>
	</div>
</section>

<?php } ?>

<section class="block block__single">
	<div class="ctn">
	<?php 
		# If there is not a featured image, put the title in the header.
		if ( !has_post_thumbnail() ) {
			$html = '';
			$html .= '<div class="block__header">';
			$html .= '<h1 class="block__title">' . $title . '</h1>';
			$html .= '</div>';
			echo $html;
		} 
	?>
		<div class="block__main">
			<?php

				# Content Section
				echo '<article class="cnt">';
				echo $content;

				# If Share Bar is Selected?
				get_template_part( 'inc/loop', 'share' ); 

				echo '</article>';


				# If Recent Posts Sidebar is Selected?
				echo '<aside class="single__sidebar">';

				# Get Current Post Type
				$type = get_post_type();

				# Run Query for Post Type
				$args = array( 'post_type' => $type, 'posts_per_page' => 3 );
				$loop = new WP_Query( $args );

				if ( $loop->have_posts() ):

					$html = '';

					# Sidebar Title
					$html .= '<h3 class="single__sidebar-title">Recent ' . $type . 's</h3>';

					$html .= '<ul class="recent-posts">';

					# Loop
					while ( $loop->have_posts() ): $loop->the_post();

						$title = get_the_title();
						$link = get_permalink();
						$html .= '<li class="recent-post-item">' . '<a href="' . $link . '">' . $title . '</a></li>';
						
					endwhile;
					
					$html .= '<ul>';
					echo $html;

				endif;

				echo '</aside>';


				# If Recent Posts Slider is Selected
				$html = '';
				$html .= '<div class="recent-posts__container">';
				$html .= '<div class="recent-posts__slider" id="recent-posts__slider">';

				# Post Type
				$type = get_post_type();

				# Loop
				$loop = new WP_Query( array( 'post_type' => $type, 'posts_per_page' => 20 ) );
				while ( $loop->have_posts() ): $loop->the_post();

					# Vars
					$title = get_the_title();
					$link = get_permalink();
					$bg = get_post_thumbnail_url( 'full' );

					# Slider Item
					$html .= '<div class="recent-posts__slider-item" ' . $bg . '>';
					$html .= '<h3 class="recent-posts__slider-item-title">' . $title . '</h3>';
					$html .= '<a href="' . $link . '"></a>';
					$html .= '</div>';

				endwhile;

				$html .= '</div>';
				$html .= '</div>';
				echo $html;
			?>
		</div>
	</div>
</section>


<?php 
	endwhile; 
	get_footer(); 
?>