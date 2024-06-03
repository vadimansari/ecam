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
<div class="subtitle-cover sub-title" style="background-image:url(/wp-content/uploads/2021/12/header.jpg);background-size: cover;background-position: 50% 50%;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                
        <ol class="breadcrumb">
            <li><a href="/" class="breadcrumb_home"><i class="fas fa-home"></i></a></li>
            <li class="active">
                <?php the_title();?>
            </li>
        </ol>
                </div>
        </div>

        <div class="row">
            <div class="col-12">
           
                    <h2 class="page-leading"><?php the_title();?></h2>            </div>
        </div>
    </div>
</div>

<?php
if (!defined('ABSPATH')) {
    die('-1');
}

    // CMB2
   // $post_id = edubin_get_id();
    //$prefix = '_edubin_';
   // $defaults = edubin_generate_defaults();

    $post_id              = get_the_ID();
    $prefix = '_edubin_';
    //$defaults = edumax_generate_defaults();

    $edubin_tribe_events_layout = get_theme_mod( 'edubin_tribe_events_layout', $defaults['edubin_tribe_events_layout']  );
?>
         
<?php if ($edubin_tribe_events_layout == 'layout_2'): ?>
    
    <?php get_template_part('tribe-events/custom-template/single', 'layout_2');?>

<?php else :  ?>

    <?php get_template_part('tribe-events/custom-template/single', 'layout_1');?>

<?php endif ?>

