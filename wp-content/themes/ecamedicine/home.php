<?php

/**
 * Template Name: Home Page
 * Template Post Type: page
 */


get_header();
?>
<section>
	<div class="mainSlider">
		<?php // Hero main section
		$args = array(
			'post_type' => 'allslider',
			'posts_per_page' => 1,
			'order' => 'ASC',
		);
		$query = new WP_Query($args);
		if ($query->have_posts()) {
		?><?php while ($query->have_posts()) {
				$query->the_post();
				$slidesImages = get_field('slides_images');

			?>
		<div class="owl-carousel owl-theme heroSlider">
			<?php while (have_rows('slides_images')) : the_row();
					$addNewImags = get_sub_field('add_new_imags');;
			?>
				<div class="item">
					<img src="<?php echo $addNewImags; ?>" />
				</div>
			<?php endwhile; ?>
		</div>

		<div class="sliderText">
			<div class="containerFull">
				<div class="content">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
					<?php echo do_shortcode('[wpdreams_ajaxsearchlite]');?>

					<div class="links">
						<a href="/online-aesthetic-medicine-surgery-courses/">Online Courses</a>
						<a href="/aesthetic-hands-on-courses/">Hands-on Courses</a>
					</div>
				</div>
			</div>
		</div>
<?php }
		} ?>
	</div>
</section>
<?php
/* Start the Loop */
while (have_posts()) :
	the_post();
	get_template_part('template-parts/content/content-page');

	// If comments are open or there is at least one comment, load up the comment template.
	if (comments_open() || get_comments_number()) {
		comments_template();
	}
endwhile; // End of the loop.

get_footer();
