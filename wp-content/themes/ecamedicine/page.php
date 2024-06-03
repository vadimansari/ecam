<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Eca_Ecamedicine
 * @since Eca_Ecamedicine
 */

get_header();
?>
<div class="BannerTop"><div class="container">
<div class="woocommerce defaultPage">
<nav class="woocommerce-breadcrumb" aria-label="Breadcrumb">
	<a href="<?php bloginfo('url');?>">Home</a>&nbsp;/&nbsp;<span><?php the_title();?></span></nav>
</div>
<h1><?php the_title();?></h1></div></div>
<div class="container">
<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content/content-page' );

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.
?>
</div>
<?php
get_footer();
