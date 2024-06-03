<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @version 4.6.19
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// The address string via tribe_get_venue_details will often be populated even when there's
// no address, so let's get the address string on its own for a couple of checks below.
$venue_address = tribe_get_address();

// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>

<!-- Event Image -->
<?php echo tribe_event_featured_image( null, 'large' ); ?>

<div class="event-list-content">
	<!-- Event Title -->
	<?php do_action( 'tribe_events_before_the_event_title' ) ?>
	<h3 class="tribe-events-list-event-title">
		<a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
			<?php the_title() ?>
		</a>
	</h3>
	<?php do_action( 'tribe_events_after_the_event_title' ) ?>

	<!-- Event Meta -->
	<?php do_action( 'tribe_events_before_the_meta' ) ?>
	<div class="tribe-events-event-meta">
		<div class="author <?php echo esc_attr( $has_venue_address ); ?>">

			<!-- Schedule & Recurrence Details -->
			<div class="tribe-event-schedule-details">
				<i class="fa fa-clock-o"></i>
				<?php echo tribe_events_event_schedule_details() ?>
			</div>

			<?php if ( $venue_details ) : ?>
				<!-- Venue Display Info -->
				<div class="tribe-events-venue-details">
					<i class="fa fa-map-marker"></i>
				<?php
					$address_delimiter = empty( $venue_address ) ? ' ' : ', ';

					// These details are already escaped in various ways earlier in the process.
					echo implode( $address_delimiter, $venue_details );

					if ( tribe_show_google_map_link() ) {
						echo tribe_get_map_link_html();
					}
				?>
				</div> <!-- .tribe-events-venue-details -->
			<?php endif; ?>

		</div>
	</div><!-- .tribe-events-event-meta -->

	<?php do_action( 'tribe_events_after_the_meta' ) ?>
	
</div>

