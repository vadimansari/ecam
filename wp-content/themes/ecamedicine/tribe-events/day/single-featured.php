<?php
/**
 * List View Single Featured Event
 * This file contains one featured event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-featured.php
 *
 * @version 4.5.6
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
// CMB2
$post_id = edubin_get_id();
$prefix = '_edubin_';
$defaults = edubin_generate_defaults();

$tbe_price = get_theme_mod('tbe_price', $defaults['tbe_price']); 
?>
<div class="edubin-event-image">
    <!-- Event Image -->
    <?php echo tribe_event_featured_image( null, 'large' ); ?>
            <a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more" rel="bookmark">
                <?php esc_html_e( 'Read More', 'edubin' ) ?>
            </a>
    <!-- Event Cost -->
    <?php if ( tribe_get_cost() && $tbe_price) : ?>
        <div class="tribe-events-event-cost">
            <span class="ticket-cost"><?php echo tribe_get_cost( null, true ); ?></span>
            <?php
                do_action( 'tribe_events_inside_cost' )
            ?>
        </div>
    <?php endif; ?>
</div>

<div class="edubin-event-loop-content">
    <!-- Event Title -->
    <?php do_action( 'tribe_events_before_the_event_title' ) ?>
    <h2 class="tribe-events-list-event-title">
        <a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
            <?php the_title() ?>
        </a>
    </h2>
    <?php do_action( 'tribe_events_after_the_event_title' ) ?>

    <!-- Event Meta -->
    <?php do_action( 'tribe_events_before_the_meta' ) ?>
    <div class="tribe-events-event-meta">
        <div class="author <?php echo esc_attr( $has_venue_address ); ?>">

            <div class="tribe-event-schedule-details">
                <?php echo tribe_events_event_schedule_details() ?>
            </div>

        </div>
    </div>
    <?php do_action( 'tribe_events_after_the_meta' ) ?>

    <div class="edubin-event-content-wrapper">
        <!-- Event Content -->
        <?php do_action( 'tribe_events_before_the_content' ) ?>
        <div class="tribe-events-list-event-description tribe-events-content">
            <p class="edubin-event-excerpt">
                <?php echo wp_trim_words(tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ), 20); ?>
            </p>

        </div>
        <?php
        do_action( 'tribe_events_after_the_content' );
        ?>
    </div>
</div>
