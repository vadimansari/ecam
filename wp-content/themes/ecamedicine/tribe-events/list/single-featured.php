<?php
/**
 * List View Single Featured Event
 * This file contains one featured event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-featured.php
 *
 * @version 4.6.19
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();
// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';
// Organizer
$organizer = tribe_get_organizer();

echo tribe_event_featured_image( null, 'large' );
// CMB2
$post_id = edubin_get_id();
$prefix = '_edubin_';
$defaults = edubin_generate_defaults();

$tbe_price = get_theme_mod('tbe_price', $defaults['tbe_price']); 
$tbe_archive_meta = get_theme_mod('tbe_archive_meta', $defaults['tbe_archive_meta']); 
?>

<!-- Event Title -->
<?php do_action( 'tribe_events_before_the_event_title' ) ?>
<h3 class="tribe-events-list-event-title">
	<a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
		<?php the_title() ?>
	</a>
</h3>
<?php do_action( 'tribe_events_after_the_event_title' ) ?>

<!-- Event Meta -->
<?php if ($tbe_archive_meta) : ?>
	<?php do_action( 'tribe_events_before_the_meta' ) ?>
	<div class="tribe-events-event-meta">
		<div class="author <?php echo esc_attr( $has_venue_address ); ?>">

			<div class="tribe-event-schedule-details">
				<?php echo tribe_events_event_schedule_details() ?>
			</div>

			<?php if ( $venue_details ) : ?>
				<div class="tribe-events-venue-details">
					<?php echo implode( ', ', $venue_details ); ?>
					<?php
					if ( tribe_show_google_map_link() ) {
						echo tribe_get_map_link_html();
					}
					?>
				</div> 
			<?php endif; ?>

		</div>
	</div>
	<?php do_action( 'tribe_events_after_the_meta' ) ?>
<?php endif; ?>
<!-- Event Cost -->
<?php if ( tribe_get_cost()  && $tbe_price) : ?>
	<div class="tribe-events-event-cost featured-event">
		<span class="ticket-cost"><?php echo esc_html( tribe_get_cost( null, true ) ); ?></span>
		<?php
			do_action( 'tribe_events_inside_cost' )
		?>
	</div>
<?php endif; ?>

<!-- Event Content -->
<?php do_action( 'tribe_events_before_the_content' ) ?>
<div class="tribe-events-list-event-description tribe-events-content">
	<?php echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>
</div>
<?php
do_action( 'tribe_events_after_the_content' );
