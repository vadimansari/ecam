<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Eca_Ecamedicine
 * @since Eca_Ecamedicine
 */

// Don't show the title if the post-format is `aside` or `status`.
$post_format = get_post_format();
if ( 'aside' === $post_format || 'status' === $post_format ) {
	return;
}
?>

<div class="wrap">
	<?php
	the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );
	twenty_twenty_one_post_thumbnail();
	?>

