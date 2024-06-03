<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Eca_Ecamedicine
 * @since Eca_Ecamedicine
 */

?>
<?php
$footerPhoneNumber = get_field('footer_phone_number', 'option');
$logoFooter = get_field('logo_footer', 'option');
$logoBelowSection = get_field('logo_footer_copy', 'option');
$emailAddress = get_field('email_address', 'option');
$addressSection = get_field('address_section', 'option');
$facebook = get_field('facebook_link', 'option');
$twitter = get_field('twitter', 'option');
$linkedin = get_field('linkedin', 'option');
$instagram = get_field('instagram', 'option');
$youtube = get_field('youtube', 'option');
$copyrightSection = get_field('copyright_section', 'option');
?>
<footer class="footerWrap">
    <div class="container">

        <div class="newletter">
            <div class="text">Subscribe to our newsletter</div>
            <div class="newsletterForm">
                <?php echo do_shortcode('[newsletter_form]'); ?>
            </div>
        </div>

        <div class="footerMain">
            <div class="block">
                <ul>
                    <?php if ($footerPhoneNumber) {
                        $footerPhone = preg_replace("/[^0-9]/", "", $footerPhoneNumber);
                    ?>
                        <li><a href="tel:<?php echo $footerPhone; ?>"><?php echo $footerPhoneNumber; ?></a></li>
                    <?php } ?>
                    <?php if ($emailAddress) { ?>
                        <li><a href="mailto:<?php echo $emailAddress; ?>"><?php echo $emailAddress; ?></a></li>
                    <?php } ?>
                    <li><a href="https://ecamedicine.com/">www.ecamedicine.com</a></li>
                </ul>
            </div>
            <div class="block">
                <div class="footerLogo">
                    <?php if ($logoFooter) { ?>
                        <a href="<?php bloginfo('url'); ?>"><img src="<?php echo $logoFooter; ?>" alt="logo" /></a>
                    <?php } else { ?><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/footerLogo.png" alt="logo Static" /></a><?php } ?>
                </div>
                <?php if ($logoBelowSection) { ?>
                    <p><?php echo $logoBelowSection; ?></p>
                <?php } ?>
            </div>
            <div class="block">
                <div class="addressF">
                    <?php if ($addressSection) { ?>
                        <p><?php echo $addressSection; ?></p>
                    <?php } ?>
                </div>
            </div>

            <div class="block">
                <h3>Feature Links</h3>
                <?php wp_nav_menu(array('menu' => 'Feature_Links',)); ?>
            </div>
            <div class="block">
                <h3>Feature Links</h3>


                <div class="socialIcon">
                    <?php if ($facebook) { ?>
                        <a href="<?php echo $facebook; ?>" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" width="9.938" height="18.555" viewBox="0 0 9.938 18.555">
                                <path id="Icon_awesome-facebook-f" data-name="Icon awesome-facebook-f" d="M10.9,10.437l.515-3.358H8.189V4.9a1.679,1.679,0,0,1,1.893-1.814h1.465V.227A17.863,17.863,0,0,0,8.947,0C6.293,0,4.559,1.608,4.559,4.52V7.079H1.609v3.358h2.95v8.118h3.63V10.437Z" transform="translate(-1.609)" />
                            </svg>
                        </a>
                    <?php } ?>
                    <?php if ($twitter) { ?>
                        <a href="<?php echo $twitter; ?>" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" width="16.076" height="14.531" viewBox="0 0 16.076 14.531">
                                <path id="Path_76" data-name="Path 76" d="M96.725,100H99.19L93.8,106.155l6.335,8.376H95.18l-3.885-5.08-4.446,5.08H84.382l5.76-6.584L84.064,100h5.087l3.512,4.643Zm-.865,13.055h1.366L88.409,101.4H86.943Z" transform="translate(-84.064 -100)" />
                            </svg>
                        </a>
                    <?php } ?>
                    <?php if ($linkedin) { ?>
                        <a href="<?php echo $linkedin; ?>" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" width="17.532" height="17.531" viewBox="0 0 17.532 17.531">
                                <path id="Icon_awesome-linkedin-in" data-name="Icon awesome-linkedin-in" d="M3.924,17.532H.29V5.827H3.924ZM2.1,4.231a2.115,2.115,0,1,1,2.1-2.125A2.123,2.123,0,0,1,2.1,4.231Zm15.423,13.3H13.9v-5.7c0-1.358-.027-3.1-1.89-3.1-1.89,0-2.179,1.475-2.179,3v5.8H6.2V5.827H9.687v1.6h.051a3.819,3.819,0,0,1,3.439-1.89c3.679,0,4.355,2.422,4.355,5.569v6.43Z" transform="translate(0 -0.001)" />
                            </svg>
                        </a><?php } ?>
                    <?php if ($instagram) { ?>
                        <a href="<?php echo $instagram; ?>" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" width="18.293" height="18.293" viewBox="0 0 18.293 18.293">
                                <g id="Icon_feather-instagram" data-name="Icon feather-instagram" transform="translate(-2 -2)">
                                    <path id="Path_77" data-name="Path 77" d="M7.073,3H15.22a4.073,4.073,0,0,1,4.073,4.073V15.22a4.073,4.073,0,0,1-4.073,4.073H7.073A4.073,4.073,0,0,1,3,15.22V7.073A4.073,4.073,0,0,1,7.073,3Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <path id="Path_78" data-name="Path 78" d="M18.547,14.716A3.259,3.259,0,1,1,15.8,11.97a3.259,3.259,0,0,1,2.745,2.745Z" transform="translate(-4.142 -4.082)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <path id="Path_79" data-name="Path 79" d="M26.25,9.75h0" transform="translate(-10.623 -3.084)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </g>
                            </svg>
                        </a><?php } ?>
                    <?php if ($youtube) { ?>
                        <a href="<?php echo $youtube; ?>" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" width="20.803" height="15.064" viewBox="0 0 20.803 15.064">
                                <g id="Icon_feather-youtube" data-name="Icon feather-youtube" transform="translate(-0.749 -5.25)">
                                    <path id="Path_80" data-name="Path 80" d="M20.4,8.123a2.439,2.439,0,0,0-1.7-1.755A63.182,63.182,0,0,0,11.151,6s-6.036,0-7.545.4A2.439,2.439,0,0,0,1.9,8.158,25.444,25.444,0,0,0,1.5,12.8a25.443,25.443,0,0,0,.4,4.676,2.439,2.439,0,0,0,1.7,1.685c1.509.4,7.545.4,7.545.4s6.036,0,7.545-.4a2.439,2.439,0,0,0,1.7-1.755,25.443,25.443,0,0,0,.4-4.606,25.443,25.443,0,0,0-.4-4.676Z" transform="translate(0)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                                    <path id="Path_81" data-name="Path 81" d="M14.625,18.458l5.045-2.869L14.625,12.72Z" transform="translate(-5.448 -2.789)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                                </g>
                            </svg>
                        </a><?php } ?>
                </div>
            </div>

            <div class="block">
                <h3>Support</h3>
                <?php wp_nav_menu(array('menu' => 'Support',)); ?>
            </div>

        </div>
    </div>
    <div class="copyright-block">
        <div class="container">
            <div class="copyright">
                © <?php the_time('Y'); ?> <?php echo $copyrightSection; ?>
            </div>
            <!-- <div class="ds">
            Design and developed by:<a href="#"><img src="<?php //bloginfo('template_url');
                                                            ?>/assets/images/ds-logo.png"> Dotsquares</a>
          </div> -->
        </div>
    </div>

    <?php if (is_product()) { ?>
        <div class="productPopup" id="back-to-top">
            <div class="container">
                <?php
                global $product;
                // Replace 123 with your actual product ID
                $product_id = $product->get_id();  // Use get_id() method instead of accessing id directly
                $product = wc_get_product($product_id);

                if ($product) {
                    $product_name = $product->get_name();
                    $product_price = $product->get_price_html();
                    $product_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail');
                ?>
                    <div class="footer-product">
                        <h2><?php echo esc_html($product_name); ?></h2>
                        <p><?php echo $product_price; ?></p>
                        <?php if ($product_image) : ?>
                            <img src="<?php echo esc_url($product_image[0]); ?>" alt="<?php echo esc_attr($product_name); ?>">
                        <?php endif; ?>
                        <?php if ('m22-master-course-in-rhinoplasty-and-otoplasty-essentials-and-advanced' === $post->post_name) { ?>
                            <a class="button add_to_cart_button " href="#" style="float: right;">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text">Register Now</span>
                                </span>
                            </a>
                        <?php } else { ?>
                            <form class="cart" action="<?php echo esc_url(home_url('/?add-to-cart=' . $product_id)); ?>" method="post" enctype='multipart/form-data'>
                                <div class="quantity">
                                    <label for="quantity_<?php echo esc_attr($product_id); ?>">Qty:</label>
                                    <input type="number" id="quantity_<?php echo esc_attr($product_id); ?>" class="input-text qty text" step="1" min="1" max="<?php echo esc_attr($product->get_stock_quantity()); ?>" name="quantity" value="1" title="Qty" size="4" inputmode="numeric">
                                </div>
                                <button type="submit" class="button add_to_cart_button " data-product_id="<?php echo esc_attr($product_id); ?>" rel="nofollow">Add to cart</button>

                            </form><?php } ?>
                    </div>
                <?php
                } else {
                    echo '<p>Invalid product ID.</p>';
                }
                ?>




            </div>
        </div>
    <?php } ?>

</footer>

<?php wp_footer(); ?>
<!-- javascript -->
<!-- <script src="<?php //bloginfo('template_url');
                    ?>/assets/js/jquery.min.js"></script> -->
<script src="<?php bloginfo('template_url'); ?>/assets/js/owl.carousel.js"></script>

<script>

</script>

<script>
    jQuery(document).ready(function() {
        jQuery('.mobile-btn').click(function() {
            jQuery('.mainNav').toggleClass('showNav');
            jQuery('body').toggleClass('opacityBg');
        });
        jQuery(".sub-menu-toggle").on("click", function() {
            jQuery(this).parent().closest('li').toggleClass('active-nav')
        });
        //jQuery('.menu-header_menu-container .menu li').click(function () {
        //	jQuery(this).parent().toggleClass('activeNav');
        // });
    });
</script>


<script>
    jQuery(function($) {
        $('.heroSlider').owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            nav: true,
            items: 1,
            responsive: {
                0: {
                    items: 1
                },
            }
        })

        $('.teamSlider').owlCarousel({
            loop: true,
            margin: 25,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
        $('.clientReveiw').owlCarousel({
            loop: true,
            margin: 25,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
        $('.stagePaddingSlide').owlCarousel({
            loop: true,
            margin: 25,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            }
        })
    });
    jQuery(document).ready(function($) {
        $('.woocommerce-account #account_email').prop('readonly', true);

        //product details
        $('.tabContent .woocommerce-Tabs-panel--description p').each(function() {
            $(this).nextAll().hide();
        });

        //product details popup
        if ($('#back-to-top').length) {
            var scrollTrigger = 1200, // px
                backToTop = function() {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#back-to-top').addClass('show');
                    } else {
                        $('#back-to-top').removeClass('show');
                    }
                };
            backToTop();
            $(window).on('scroll', function() {
                backToTop();
            });
            // $('#back-to-top').on('click', function(e) {
            //     e.preventDefault();
            //     $('html,body').animate({
            //         scrollTop: 0
            //     }, 500);
            // });
        }

    });
</script>
<style>
    .tnp-subscription label {
        display: none;
    }

    .productPopup {
        display: none;
    }
</style>
</body>

</html>