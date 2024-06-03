<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */
?>



<?php
if (!defined('ABSPATH')) {
    die('-1');
}
global $post;
    $event_id    = $post->ID;
   
    $events_label_singular = tribe_get_event_label_singular();
    $events_label_plural   = tribe_get_event_label_plural();

    $organizer_ids = tribe_get_organizer_ids();
    $multiple      = count($organizer_ids) > 1;

    $phone      = tribe_get_organizer_phone();
    $email      = tribe_get_organizer_email();
    $website    = tribe_get_organizer_website_link();
    $start_time = tribe_get_start_date($event_id, false, 'g:ia');
    $end_time   = tribe_get_end_date($event_id, false, 'g:ia');
 //print_r($start_time);
    // CMB2
    $post_id = get_the_ID();
    $prefix = '_edubin_';
    //$defaults = edumax_generate_defaults();

    $tbe_event_countdown = get_theme_mod('tbe_event_countdown', $defaults['tbe_event_countdown']); 
    $tbe_event_maps = get_theme_mod('tbe_event_maps', $defaults['tbe_event_maps']); 
    $tbe_start_time = get_theme_mod('tbe_start_time', $defaults['tbe_start_time']); 
    $tbe_end_time = get_theme_mod('tbe_end_time', $defaults['tbe_end_time']); 
    $tbe_website = get_theme_mod('tbe_website', $defaults['tbe_website']); 
    $tbe_phone = get_theme_mod('tbe_phone', $defaults['tbe_phone']); 
    $tbe_email = get_theme_mod('tbe_email', $defaults['tbe_email']); 
    $tbe_organizer_ids = get_theme_mod('tbe_organizer_ids', $defaults['tbe_organizer_ids']); 
    $tbe_location = get_theme_mod('tbe_location', $defaults['tbe_location']); 
    $tbe_content_before_massage = get_theme_mod('tbe_content_before_massage', $defaults['tbe_content_before_massage']); 
    $tbe_content_after_massage = get_theme_mod('tbe_content_after_massage', $defaults['tbe_content_after_massage']); 

    $event_website = get_post_meta($post_id, '_EventURL' ,true);

?>
 
<div id="event-single" class="pt-120 pb-120 gray-bg">
    <div class="events-area">
        <div class="row">
            <div class="col-lg-8">
                <div class="events-left">

                    <?php while (have_posts()): the_post();?>
                            <div id="post-<?php the_ID();?>" <?php post_class();?>>
                            <!-- Event featured image, but exclude link -->
                            <?php echo tribe_event_featured_image($event_id, 'full', false); ?>

                            <!-- Event content -->
                            <?php if($tbe_content_before_massage) : ?>
                                <?php do_action('tribe_events_single_event_before_the_content')?>
                            <?php endif; ?>

                            <div class="edubin-enevt-content">
                                <?php the_content();?>
                            </div>
                            <!-- .tribe-events-single-event-description -->
                            <?php if($tbe_content_after_massage) : ?>
                                <?php do_action('tribe_events_single_event_after_the_content')?>
                            <?php endif; ?>
                            <!-- Event meta -->
                            <?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>

                            <?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
                            
                        </div> <!-- #post-x -->
                        <?php if (get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option('showComments', false)) {
                            comments_template(); } ?>
                    <?php endwhile; ?>

                </div> <!-- events left -->
            </div>

            <div class="col-lg-4">
                <div class="events-right">
                    <?php if ($tbe_event_countdown == true) :?>
                        <div class="events-coundwon bg_cover" data-overlay="8" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url($event_id, 'thumbnail')); ?>')">
                            <div data-countdown="<?php echo tribe_get_start_date($event_id, false, 'Y/m/d'); ?>"></div>
                            <div class="events-coundwon-btn pt-30">

                                <?php if ( shortcode_exists( 'rtec-registration-form' ) ) { ?>
                                 <div class="edubin-event-register-from">
                                    <!-- Notices -->
                                    <?php tribe_the_notices()?>
                                    <?php echo do_shortcode('[rtec-registration-form]'); ?>    
                                </div>
                                <?php } ?>
                               
                                <div class="tribe-events-single-event-description tribe-events-content">
                                    <?php do_action('tribe_events_single_event_meta_primary_section_end');?>
                                </div>
                            </div>
                        </div> <!-- events countdown -->
                    <?php endif; ?>
                    <div class="events-address mt-30">
                        <ul>
                        <?php if (!empty($event_website) && $event_website): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="cont">
                                         <h6><?php esc_html_e('Event Website', 'edubin');?></h6>
                                         <span><a href="<?php echo $event_website ?>" target="_blank">View Event Website</a></span>
                                    </div>
                                </div> <!-- Website -->
                            </li>
                        <?php endif;?>
                        <?php if (!empty($start_time) && $start_time): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="cont">
                                        <h6><?php esc_html_e('Start Time', 'edubin');?></h6>
                                       <span><?php echo esc_html($start_time); ?></span>
                                    </div>
                                </div> <!-- single address -->
                            </li>
                        <?php endif;?>
                        <?php if (!empty($end_time) && $end_time): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fa fa-bell-slash"></i>
                                    </div>
                                    <div class="cont">
                                       <h6><?php esc_html_e('Finish Time', 'edubin');?></h6>
                                       <span><?php echo esc_html($end_time); ?></span>
                                    </div>
                                </div> <!-- single address -->
                            </li>
                        <?php endif;?>
                        <?php if (!empty($website) && $website): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="cont">
                                         <h6><?php esc_html_e('Website', 'edubin');?></h6>
                                       <span><?php echo wp_kses_post($website); ?></span>
                                    </div>
                                </div> <!-- Website -->
                            </li>
                        <?php endif;?>
                        <?php if (!empty($phone) && $phone): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                         <h6><?php esc_html_e('Phone', 'edubin');?></h6>
                                       <span><?php echo esc_html($phone); ?></span>
                                    </div>
                                </div> <!-- Phone -->
                            </li>
                        <?php endif;?>
                        <?php if (!empty($email)  && $email): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fa fa-envelope-open-o"></i>
                                    </div>
                                    <div class="cont">
                                         <h6><?php esc_html_e('Email', 'edubin');?></h6>
                                       <span><?php echo esc_html($email); ?></span>
                                    </div>
                                </div> <!-- Phone -->
                            </li>
                        <?php endif;?>
                        <?php if (!empty($organizer_ids) && $organizer_ids): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fa fa-bandcamp"></i>
                                    </div>
                                    <div class="cont">
                                         <h6><?php esc_html_e('Organizer', 'edubin');?></h6>
                                        <?php
                                            foreach ($organizer_ids as $organizer) {
                                                if (!$organizer) {
                                                    continue;
                                                }
                                                ?>
                                                <span><?php echo tribe_get_organizer_link($organizer) ?></span>
                                        <?php } ?>
                                    </div>
                                </div> <!-- Phone -->
                            </li>
                        <?php endif;?>
                        <?php if (tribe_address_exists() && tribe_address_exists()): ?>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fa fa-map"></i>
                                    </div>
                                    <div class="cont">
                                        <h6><?php esc_html_e('Location', 'edubin');?></h6>
                                            <address class="event-address">
                                                <?php echo tribe_get_full_address(); ?>
                                                <?php if (tribe_show_google_map_link()): ?>
                                                    <?php echo tribe_get_map_link_html(); ?>
                                                <?php endif;?>
                                            </address>
                                    </div>
                                </div> <!-- Address -->

                            </li>
                        <?php endif;?>
                        </ul>
                        <?php if ($tbe_event_maps == true) :?>
                          <div class="edubin-events-maps">
                                <?php if (get_post_meta( get_the_ID(), 'edubin_cmb2_tribe_events_map_html_code', true )): ?>

                                    <?php echo wpautop(get_post_meta( get_the_ID(), 'edubin_cmb2_tribe_events_map_html_code', true )); ?>

                                <?php else :  // default tribe_event map ?>

                                    <?php $map = tribe_get_embedded_map(); ?>
                                    <?php if (!empty($map)): ?>

                                    <div id="contact-map">
                                        <div class="tribe-events-venue-map">
                                            <?php
                                                // Display the map.
                                                do_action('tribe_events_single_meta_map_section_start');
                                                echo esc_html($map);
                                                do_action('tribe_events_single_meta_map_section_end');
                                            ?>
                                        </div>
                                    </div> <!-- Map -->
                                <?php endif;?>
                                    
                                <?php endif ?>
                          </div>
                        <?php endif; ?>
                    </div> <!-- events address -->
                </div> <!-- events right -->
                <?php if ( is_active_sidebar( 'tribe_event_sidebar' ) ) { ?>
                    <aside id="secondary" class="widget-area tribe-events-bottom-widget">
                        <?php dynamic_sidebar( 'tribe_event_sidebar' ); ?>
                    </aside>
                <?php } ?>

            </div>
        </div> <!-- row -->
    </div> <!-- events-area -->
 </div>