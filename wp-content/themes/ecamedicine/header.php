<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Eca_Ecamedicine
 * @since Eca_Ecamedicine
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--Stylesheet-->
	<!-- <link href="<?php //bloginfo('template_url');
						?>/assets/css/stylesheet.css" rel="stylesheet" />-->
<link rel="icon" href="<?php bloginfo('template_url'); ?>/assets/images/favicon.ico" type="image/x-icon">
	<link href="<?php bloginfo('template_url'); ?>/assets/images/favicon.png" rel="apple-touch-icon" sizes="76x76">

	<!-- Owl Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/owl.carousel.min.css">
	<style>
		#menu-header_menu .sub-menu #menu-item-43289{display: none;}
		#menu-header_menu .sub-menu #menu-item-43323{display: none;}
	</style>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php
	$logo = get_field('logo', 'option');
	$emailAddress = get_field('email_address', 'option');
	$phoneNumber = get_field('phone_number', 'option');
	?>
	<header>
		<div class="topbar">
			<div class="containerFull">
				<div class="topLink"><?php if ($emailAddress) { ?>
						<a href="mailto:<?php echo $emailAddress; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="18.946" height="14.21" viewBox="0 0 18.946 14.21">
								<path id="Icon_awesome-envelope" data-name="Icon awesome-envelope" d="M18.587,9.192a.223.223,0,0,1,.359.174v7.567A1.777,1.777,0,0,1,17.17,18.71H1.776A1.777,1.777,0,0,1,0,16.933V9.37A.221.221,0,0,1,.359,9.2c.829.644,1.928,1.462,5.7,4.2.781.57,2.1,1.769,3.412,1.761,1.321.011,2.664-1.214,3.415-1.761C16.663,10.658,17.758,9.836,18.587,9.192ZM9.473,13.973c.858.015,2.094-1.081,2.716-1.532,4.91-3.564,5.284-3.874,6.417-4.762a.886.886,0,0,0,.34-.7v-.7A1.777,1.777,0,0,0,17.17,4.5H1.776A1.777,1.777,0,0,0,0,6.276v.7a.891.891,0,0,0,.34.7c1.132.884,1.506,1.2,6.417,4.762C7.379,12.893,8.615,13.988,9.473,13.973Z" transform="translate(0 -4.5)" fill="currentcolor" />
							</svg>

							<span><?php echo $emailAddress; ?></span>

						</a> <?php } ?>
					<?php if ($phoneNumber) {
						$numbers_only = preg_replace("/[^0-9]/", "", $phoneNumber);
						?>
						<a href="tel:<?php echo $numbers_only;?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="18.177" height="18.176" viewBox="0 0 18.177 18.176">
								<path id="Icon_ionic-ios-call" data-name="Icon ionic-ios-call" d="M22.142,18.735A15.268,15.268,0,0,0,18.953,16.6c-.956-.459-1.306-.45-1.983.038-.563.407-.927.786-1.576.644a9.4,9.4,0,0,1-3.166-2.342,9.332,9.332,0,0,1-2.342-3.166c-.137-.653.241-1.013.644-1.576.487-.677.5-1.027.038-1.983A14.966,14.966,0,0,0,8.434,5.026c-.7-.7-.852-.544-1.235-.407a7.028,7.028,0,0,0-1.131.6A3.412,3.412,0,0,0,4.71,6.654c-.27.582-.582,1.666,1.008,4.5a25.084,25.084,0,0,0,4.41,5.882h0l0,0,0,0h0a25.182,25.182,0,0,0,5.882,4.41c2.83,1.59,3.913,1.278,4.5,1.008A3.354,3.354,0,0,0,21.948,21.1a7.028,7.028,0,0,0,.6-1.131C22.686,19.586,22.843,19.43,22.142,18.735Z" transform="translate(-4.49 -4.502)" fill="currentcolor" />
							</svg>

							<span><?php echo $phoneNumber; ?></span>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="containerFull">
			<div class="header">
				<div class="logo">
					<?php if ($logo) { ?>
						<a href="<?php bloginfo('url'); ?>"><img src="<?php echo $logo; ?>" alt="logo" /></a>
					<?php } else { ?><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/main-logo.png" alt="logo Static" /></a><?php } ?>
				</div>
				<div class="rightSection">
					<div class="mainNav">
					<div class="mobile-btn"><span></span></div>
					<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'fallback_cb'     => false,
				)
			);
			?>
					</div>
					<div class="cartUser">
						<div class="userblock">
							<svg xmlns="http://www.w3.org/2000/svg" width="22.4" height="25.012" viewBox="0 0 22.4 25.012">
								<g id="Group_3" data-name="Group 3" transform="translate(-1526.25 -66.25)">
									<g id="Icon_feather-user" data-name="Icon feather-user" transform="translate(1527 67)">
										<path id="Path_1" data-name="Path 1" d="M26.9,30.337V27.725A5.225,5.225,0,0,0,21.675,22.5H11.225A5.225,5.225,0,0,0,6,27.725v2.612" transform="translate(-6 -6.825)" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
										<path id="Path_2" data-name="Path 2" d="M22.45,9.725A5.225,5.225,0,1,1,17.225,4.5,5.225,5.225,0,0,1,22.45,9.725Z" transform="translate(-6.775 -4.5)" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
									</g>
								</g>
							</svg>

							<div class="loginPopup">
								<a href="#"> Login</a>
								<a href="#"> Register</a>
							</div>
						</div>
						<?php $items_count = WC()->cart->get_cart_contents_count(); ?>
						<div class="cartView"><a href="/cart">
							<svg xmlns="http://www.w3.org/2000/svg" width="27.277" height="26.105" viewBox="0 0 27.277 26.105">
								<g id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart" transform="translate(0.75 0.75)">
									<path id="Path_3" data-name="Path 3" d="M14.343,31.172A1.172,1.172,0,1,1,13.172,30,1.172,1.172,0,0,1,14.343,31.172Z" transform="translate(-3.798 -7.738)" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
									<path id="Path_4" data-name="Path 4" d="M30.843,31.172A1.172,1.172,0,1,1,29.672,30,1.172,1.172,0,0,1,30.843,31.172Z" transform="translate(-7.41 -7.738)" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
									<path id="Path_5" data-name="Path 5" d="M1.5,1.5H6.187l3.14,15.689a2.343,2.343,0,0,0,2.343,1.886H23.059A2.343,2.343,0,0,0,25.4,17.189l1.875-9.83H7.358" transform="translate(-1.5 -1.5)" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
								</g>
							</svg>
							<span class="count header-cart-count"><?php if($items_count ){ echo $items_count ;}else{?>0<?php }?></span>

							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>