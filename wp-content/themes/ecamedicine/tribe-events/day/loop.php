<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @version 4.4
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
    global $post;
    global $more;
    $more = false;
?>

<div class="tribe-events-loop">

	<?php while ( have_posts() ) : the_post(); ?>
		<?php do_action( 'tribe_events_inside_before_loop' ); ?>

		<!-- Month / Year Headers -->
		<?php tribe_events_list_the_date_headers(); ?>
        <?php
        if(tribe( 'tec.featured_events' )->is_featured(get_the_ID())){
            $event_list_class = 'e-event-featured ';
        }else{
            $event_list_class = 'e-event-not-featured ';
        }
    ?>

		<!-- Event  -->
		<?php
		$post_parent = '';
		if ( $post->post_parent ) {
			$post_parent = ' data-parent-post-id="' . absint( $post->post_parent ) . '"';
		}
		?>
		<div id="post-<?php the_ID() ?>" class="col-md-4 <?php echo esc_html($event_list_class);?><?php tribe_events_event_classes() ?>" <?php echo esc_html($post_parent); ?>>

            <div class="edubin-event-loop-content-wrapper">
                <?php
                $event_type = tribe( 'tec.featured_events' )->is_featured( $post->ID ) ? 'featured' : 'event';

                $event_type = apply_filters( 'tribe_events_list_view_event_type', $event_type );

                tribe_get_template_part( 'list/single', $event_type );
                ?>
            </div>
		</div>

		<?php do_action( 'tribe_events_inside_after_loop' ); ?>
	<?php endwhile; ?>

</div>
