<?php

/**
 * Template Name: Quize Page
 * Template Post Type: page
 */

session_start();
get_header();
/* Start the Loop */
?>



<?php

//if (!is_user_logged_in()) {
?>
    <?php
    if (isset($_GET['topicID'])) {
        $topicID = $_GET['topicID'];
		$_SESSION['topicID'] = $_GET['topicID'];
		echo $topicID;
        // Now you can use $topicID in your logic
         "Topic ID: " . htmlspecialchars($topicID);
    } else {
        echo "No Topic ID found.";
    }
	$product_id = $_SESSION['product_id'];
    $precentage_required = $_SESSION['precentage_required'];
	//echo $precentage_required;
    ?>

    <?php
    if (!empty($topicID)) {

        $query_args = array(
            'post_type' => 'assignment',
            'posts_per_page' => -1, // Number of products to display
            //'orderby' => 'rand', // Random order
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'topic',
                    'field' => 'term_id', // Change the field to term_id
                    'terms' => $topicID, // Use the term ID instead of the slug
                ),
            ),
        );
        $query = new WP_Query($query_args);
        // Retrieve the count of found posts
        $post_count = $query->found_posts;

     ?>
      <div class="registrationWrap">
    <div class="containerFull">
        <?php if ($query->have_posts()) { ?>
            <?php $i = 1;
            while ($query->have_posts()) {
                $query->the_post(); ?>
                <div class="form-step <?php echo $i === 1 ? 'active' : ''; ?>" id="step-<?php echo $i; ?>">
                    <div class="registrationMain">
                        <div class="FromMain">
                            <div class="score">
                                <span class="count"><?php echo $i; ?> - <?php echo $post_count; ?></span>
                                <?php $percentage = ($i / $post_count) * 100; ?>
								<span class="percentage"><?php echo round($percentage); ?>%</span>
                            </div>
                            <h2><span class="counting">0<?php echo $i; ?></span> <?php the_title(); ?></h2>
                            <?php if (have_rows('add_options')) : ?>
                                <div class="answerBox">
                                    <?php while (have_rows('add_options')) : the_row();
                                        $option_title = get_sub_field('option_title');
                                        $range = get_sub_field('range'); ?>
                                        <div class="options" data-range="<?php echo $range; ?>">
                                            <?php echo $option_title; ?>
                                            <?php  echo $range; ?>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php else : ?>
                                <p>No options available.</p>
                            <?php endif; ?>
                            <?php echo $precentage_required; ?>
                            <div class="action">
                                <?php if ($i == 1) { ?>
                                    <a class="next-step btnBorder">Next</a>
                                <?php } elseif ($i > 1) {
                                    if ($i == $post_count) { ?>
                                        <p>Selected options: <span id="selectedOptions"></span></p>
                                        <a class="submit-form btnBorder">Submit</a>
                                    <?php } else { ?>
                                        <a class="next-step btnBorder">Next</a>
                                    <?php }
                                } ?>
                            </div>
                        </div>
                        <div class="registerImg">
                        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
                        if($url){?>
                        <img src="<?php echo $url;?>" alt="assigment<?php echo $post->ID;?>" />
                        <?php }else{
                        ?>
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/doctors-using-laptop.jpg" alt="assigment" />
                            <?php }?>
                        </div>
                    </div>
                   
                </div>
            <?php $i++;
            }
            wp_reset_postdata();
        } else {
            echo 'No questions found.';
        } ?>
        
    </div>
    
</div>
<style>
    .form-step {
        display: none;
    }
    .form-step.active {
        display: block;
    }
</style>
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $(document).ready(function() {
    // Multi-step form logic
    var currentStep = 1;
    var formSteps = $('.form-step');
    var nextButtons = $('.next-step');
    var prevButtons = $('.prev-step');
    var submitButton = $('.submit-form');
    var selectedOptionsDisplay = $('#selectedOptions');
    var selectedOptions = []; // Array to store selected options

    function showStep(step) {
        formSteps.removeClass('active');
        $('#step-' + step).addClass('active');
    }

    nextButtons.click(function() {
        // Check if any option is selected before proceeding
        var options = $('.form-step.active .options.active');
        if (options.length > 0) {
            currentStep++;
            showStep(currentStep);
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Please select an option before proceeding.'
            });
        }
    });

    prevButtons.click(function() {
        currentStep--;
        showStep(currentStep);
    });

    submitButton.click(function() {
        // Check if any option is selected before submitting
        var options = $('.form-step.active .options.active');
        var topicID = <?php echo json_encode($topicID); ?>;

        // Get the $precentage_required value
        var precentageRequired = <?php echo json_encode($precentage_required); ?>;
        //alert(precentageRequired);


        if (options.length > 0 ) {
            var totalRange = 0;
            $('.options.active').each(function() {
                totalRange += parseInt($(this).data('range'));
            });

            if (totalRange >= precentageRequired) {
                window.location.href = '/ecamedicine/student-registration/';
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Not Qualified',
                    text: 'You did not qualify for registration.'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/ecamedicine/quiz-page/?topicID=' + topicID;
                    }
                });
            }
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Please select an option before submitting.'
            });
        }
    });

    showStep(currentStep);

    // Options selection logic
    $('.answerBox .options').click(function() {
       
        // Remove active class from all options
        var parent = $(this).closest('.answerBox');
        parent.find('.options').removeClass('active');
        // Add active class to the clicked option
        $(this).addClass('active');
        // Store the selected option value
        var step = $(this).closest('.form-step').attr('id').split('-')[1];
        selectedOptions[step - 1] = $(this).text().trim();
        // Update the selected options display
        selectedOptionsDisplay.text(selectedOptions.join(', '));
        //alert(selectedOptions);
    });
});


</script>



    <?php } ?>
<?php // } ?>

<?php
get_footer();
