<?php 
/*
Template Name: Home
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

<section class="home">
	<div class="fix-wrap">
		<section class="home-inner">
			<?php while (have_posts()) : the_post(); ?>
			<div class="landing-info">
				<?php the_content(); ?>
			</div>
			<?php endwhile; ?>
			<div class="bkts-ctn">
				<?php while (has_sub_field( 'buckets') ) : ?>
				<div class="bkts">
					<div class="each-bkt">
						<img src="<?php the_sub_field( 'image' ); ?>" alt="">
						<div class="bkt-cap">
							<h4><?php the_sub_field( 'title' ); ?></h4>
							<div class="bkt-content"><?php the_sub_field( 'content' ); ?></div>
						</div>
					</div>
					</a>
				</div>
				<?php endwhile; ?>
			</div>
		</section>
	</div>
</section>


<?php get_footer(); ?>