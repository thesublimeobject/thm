<?php 
/*
Template Name: Contact
*/
get_header(); ?>

<section class="slider">
	<?php 
		if ( get_field( 'slides' ) ) : 
		$x = 1; 
	?>
	<ul class="not-sldr">
		<?php while( has_sub_field( 'slides' ) ) : ?>
		<li class="each-slide slide-<?php echo $x; ?>" style="background: url(<?php echo the_sub_field( 'background' ); ?>) no-repeat center center; background-size: cover;">
			<div class="sldr-content contact-cap">
				<div class="fix-wrap">
					<div class="cap-inner">
						<h1><?php the_sub_field( 'main_heading' ); ?></h1>
						<div class="landing-cap"><?php the_sub_field( 'sub_heading' ); ?></div>
					</div>
				</div>
			</div>
		</li>
		<?php endwhile; ?>
	</ul>
	<?php endif; ?>
	<div class="fix-wrap">
		<div class="feature-pager">
			<?php 
				$x = 0;
				while( has_sub_field( 'slides' ) ) :
				$y = $x++;
			?>
			<a data-slide-index="<?php echo $y; ?>" href="" class=""><?php echo $y; ?></a>
			<?php endwhile; ?>
		</div>
	</div>
</section>

<section class="contact">
	<div class="fix-wrap">
		<section class="contact-inner">
			<div class="ic-line">
				<hr>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/i.png" alt="<?php echo get_field( 'contact' ); ?>">
			</div>
			<h2><?php echo get_field( 'contact_title' ); ?></h2>
			<div class="contact-ctn">
				<div class="contact-map">
					<img src="<?php echo get_field( 'contact_map' ); ?>" alt="">
				</div>
				<div class="contact-info">
				<?php while (has_sub_field( 'contact_information' )) : ?>
					<div class="each-info">
						<div class="contact-icon"><img src="<?php echo the_sub_field( 'contact_icon' ); ?>"></div>
						<h4 class="contact-title"><?php echo the_sub_field( 'contact_title' ); ?></h4>
						<div class="contact-content"><?php echo the_sub_field( 'contact_content' ); ?></div>
					</div>
				<?php endwhile; ?>
				</div>
			</div>
		</section>
	</div>
</section>

<?php get_footer(); ?>