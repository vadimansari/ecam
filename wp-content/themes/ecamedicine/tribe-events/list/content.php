<?php
/**
 * List View Content Template
 * The content template for the list view. This template is also used for
 * the response that is returned on list view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/content.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} 
	$defaults = edubin_generate_defaults();
	$event_list_style = get_theme_mod( 'event_list_style', $defaults['event_list_style']);

?>

<div id="tribe-events-content" class="tribe-events-list-2">


	<?php
	/**
	 * Fires before any content is printed inside the list view.
	 */
	do_action( 'tribe_events_list_before_the_content' );
	?>

	<!-- Notices -->
	<?php tribe_the_notices() ?>

	<!-- Events Loop -->
	<?php if ( have_posts() ) : ?>
		<?php do_action( 'tribe_events_before_loop' ); ?>

		<?php if ($event_list_style == '2'): ?>
			<?php tribe_get_template_part( 'list/loop2' ) ?>
		<?php else : ?>
			<?php tribe_get_template_part( 'list/loop' ) ?>
		<?php endif; ?>
		
		<?php do_action( 'tribe_events_after_loop' ); ?>
	<?php endif; ?>

	<?php                   
        the_posts_pagination( array(
            'prev_text' => '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>',
            'next_text' => '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
        ) );
    ?>

</div>
