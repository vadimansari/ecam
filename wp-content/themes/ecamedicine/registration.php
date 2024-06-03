<?php
/*
   * Template name: Registration Form
   */
session_start();
if (isset($_SESSION['topicID'])) {
$topicID = $_SESSION['topicID'];
echo "Topic ID from session: " . htmlspecialchars($topicID);
} else {
echo "No Topic ID found in session.";
}
get_header();
?>
<div class="registrationWrap">
	<div class="containerFull">
		<div class="registrationMain separateRegistor">
			<?php /* Start the Loop */
			while (have_posts()) :
				the_post(); ?>
				<div class="FromMain">
				<h2><?php the_title();?></h2>
					<?php
					the_content();
					//get_template_part('template-parts/content/content-page'); ?>
				</div>
				<div class="rigesterImg">
				<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
                        if($url){?>
                        <img src="<?php echo $url;?>" alt="assigment<?php echo $post->ID;?>" />
                        <?php }else{
                        ?>
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/doctors-using-laptop.jpg" alt="assigment" />
                            <?php }?>
				</div>
			<?php endwhile; // End of the loop.
			?>
		</div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
    // Add placeholders to the registration form input fields
    $('#reg_billing_first_name').attr('placeholder', 'First Name');
    $('#reg_billing_last_name').attr('placeholder', 'Last Name');
	$('#reg_username').attr('placeholder', 'User Name');
    $('#reg_email').attr('placeholder', 'E-mail');
    $('#reg_password').attr('placeholder', 'Password');
	$('#reg_password2').attr('placeholder', 'Password confirmation');
    // Add other placeholders as needed
});

</script>
<?php
get_footer();
