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
	<?php $category_detail=get_the_category( $post->ID );
	     $link = $category_detail[0]->term_id;
	?>
	<a href="<?php bloginfo('url');?>">Home</a> &nbsp;/&nbsp;<a style="color:#FFF;" href="<?php echo $category_link = get_category_link($link);?>"><?php print_r($category_detail[0]->name);?></a>&nbsp;/&nbsp;<span><?php the_title();?></span></nav>
</div>
<h1><?php the_title();?></h1></div></div>
<div class="container">
<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
			)
		);
	}

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	// Previous/next post navigation.
	$twentytwentyone_next = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' );
	$twentytwentyone_prev = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' );

	$twentytwentyone_next_label     = esc_html__( 'Next post', 'twentytwentyone' );
	$twentytwentyone_previous_label = esc_html__( 'Previous post', 'twentytwentyone' );

	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $twentytwentyone_next_label . $twentytwentyone_next . '</p><p class="post-title">%title</p>',
			'prev_text' => '<p class="meta-nav">' . $twentytwentyone_prev . $twentytwentyone_previous_label . '</p><p class="post-title">%title</p>',
		)
	);
endwhile; // End of the loop.
?>
</div>
<?php
get_footer();
