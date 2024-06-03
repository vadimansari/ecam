<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Eca_Ecamedicine
 * @since Eca_Ecamedicine
 */

get_header();

$description = get_the_archive_description();
?>
<div class="BannerTop"><div class="container">
<div class="woocommerce defaultPage">
<nav class="woocommerce-breadcrumb" aria-label="Breadcrumb">
	<a href="<?php bloginfo('url');?>">Home</a>&nbsp;/&nbsp;<span><?php the_archive_title( '' ); ?></span></nav>
</div>
<h1><?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?></h1>
<?php if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
</div></div>
<div class="container">
<?php if ( have_posts() ) : ?>



	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
	<?php endwhile; ?>

	<?php twenty_twenty_one_the_posts_navigation(); ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>
</div>
<?php
get_footer();
