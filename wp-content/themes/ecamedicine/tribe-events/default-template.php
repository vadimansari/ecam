<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Display -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.23
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
?>



<main id="tribe-events-pg-template" class="tribe-events-pg-template">

<?php if (function_exists( 'tribe_events' ) && tribe_is_month() && is_archive()) { ?>

<div class="edubin-events-header-area">
	<div class="row">
		<div class="col-lg-6">
			<h2 class="tribe-events-page-title text-left"><?php echo tribe_get_events_title() ?></h2>
		</div>
		<div class="col-lg-6">
			<div class="edubin-events-search">
				<?php echo do_shortcode( '[events-calendar-search placeholder="Search Events" show-events="5" disable-past-events="false" layout="small"]' ); ?>
			</div>
		</div>
	</div>
</div>

<?php } ?>

	<?php tribe_events_before_html(); ?>
	<?php tribe_get_view(); ?>
	<?php tribe_events_after_html(); ?>
</main> 
<?php
get_footer();