<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;
session_start();
$_SESSION['product_id'] = get_the_ID();
$_SESSION['precentage_required'] = get_field('precentage-required');
$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

if ( ! $short_description ) {
	return;
}

?>
<div class="woocommerce-product-details__short-description">
	<?php echo $short_description; // WPCS: XSS ok. ?>
</div>

<?php
// custom work
//if (!is_user_logged_in()) {
    $topicID = get_field('select_topic');
    
    
    if ($topicID) {
?>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                var topicID = <?php echo json_encode($topicID); ?>;
                var buttons = document.querySelectorAll(".elementor-size-sm");

                buttons.forEach(function(button) {

                    button.addEventListener("click", function(event) {
                        event.preventDefault(); // Prevent default action if the button is a link or submit button
                        alert(button); // Debugging alert to confirm the correct button
                        window.location.href = '/ecamedicine/quiz-page/?topicID=' + topicID;
                        return false; // Ensure the default action is prevented
                    });
                });
            });
        </script>


<?php
    }
//}
?>