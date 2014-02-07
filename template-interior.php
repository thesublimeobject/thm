<?php 
/*
Template Name: Interior
*/
get_header(); ?>

<section class="slider">
	<?php 
		if ( get_field( 'slides' ) ) : 
		$x = 1; 
	?>
	<ul class="sldr">
		<?php while( has_sub_field( 'slides' ) ) : ?>
		<li class="each-slide slide-<?php echo $x; ?>" style="background: url(<?php echo the_sub_field( 'background' ); ?>) no-repeat center center; background-size: cover;">
			<div class="sldr-content">
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

<section class="main">
	<div class="fix-wrap">
		<section class="main-inner">
			<?php while (have_posts()) : the_post(); ?>
			<div class="landing-info">
				<?php the_content(); ?>
			</div>
			<?php endwhile; ?>
		</section>
	</div>
</section>

<?php if (get_field( 'info_title' ) && get_field( 'info_content_left' ) && get_field( 'info_content_right' )) : ?>
<section class="information">
	<div class="fix-wrap">
		<section class="information-inner">
			<div class="ic-line">
				<hr>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/i.png" alt="<?php echo get_field( 'services_title' ); ?>">
			</div>
			<h2><?php echo get_field( 'info_title' ); ?></h2>
			<section class="info-1">
				<div class="info-content-1"><?php echo get_field( 'info_content_left' ); ?></div>
			</section>
			<section class="info-2">
				<div class="info-content-2"><?php echo get_field( 'info_content_right' ); ?></div>
			</section>
		</section>
	</div>
</section>
<?php endif; ?>

<?php if (get_field( 'staff' )) : ?>
<section class="staff">
	<div class="fix-wrap">
		<section class="staff-inner">
			<div class="ic-line">
				<hr>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/people.png" alt="Care Managers">
			</div>
			<div class="staff-ctn">
			<?php while (has_sub_field( 'staff' )) : ?>
				<div class="each-staff">
					<div class="staff-img-hldr">
						<img src="<?php echo the_sub_field( 'image' ); ?>" alt="<?php echo the_sub_field( 'name_position' ); ?>">
					</div>
					<div class="staff-info-hldr">
						<h5 class="staff-name"><?php echo the_sub_field( 'name_position' ); ?></h5>
						<div class="staff-content"><?php echo the_sub_field( 'bio' ); ?></div>
					</div>
				</div>
			<?php endwhile; ?>
			</div>
 		</section>
	</div>
</section>
<?php endif; ?>

<?php if (get_field( 'services' )) : ?>
<section class="services">
	<div class="fix-wrap">
		<section class="services-inner">
			<div class="ic-line">
				<hr>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/squares.png" alt="<?php echo get_field( 'services_title' ); ?>">
			</div>
			<h2><?php echo get_field( 'services_title' ); ?></h2>
			<div class="services-ctn">
				<?php while (has_sub_field( 'services' )) : ?>
				<div class="each-service">
					<div class="service-title-hldr">
						<h4 class="service-title"><?php echo the_sub_field( 'title' ); ?></h4>
					</div>
					<div class="service-content"><?php echo the_sub_field( 'content' ); ?></div>
				</div>
				<?php endwhile; ?>
			</div>
		</section>
	</div>
</section>
<?php endif; ?>

<?php get_footer(); ?>