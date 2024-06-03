<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Eca_Ecamedicine
 * @since Eca_Ecamedicine
 */

// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('twenty_twenty_one_setup')) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Eca_Ecamedicine
	 *
	 * @return void
	 */
	function twenty_twenty_one_setup()
	{

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support('title-tag');

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		// add_theme_support( 'post-thumbnails' );
		// set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__('Primary menu', 'twentytwentyone'),
				'footer'  => esc_html__('Secondary menu', 'twentytwentyone'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');

		// Add support for editor styles.
		add_theme_support('editor-styles');
		$background_color = get_theme_mod('background_color', 'D1E4DD');
		if (127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex($background_color)) {
			add_theme_support('dark-editor-style');
		}

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ($is_IE) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style($editor_stylesheet_path);

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__('Extra small', 'twentytwentyone'),
					'shortName' => esc_html_x('XS', 'Font size', 'twentytwentyone'),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__('Small', 'twentytwentyone'),
					'shortName' => esc_html_x('S', 'Font size', 'twentytwentyone'),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__('Normal', 'twentytwentyone'),
					'shortName' => esc_html_x('M', 'Font size', 'twentytwentyone'),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__('Large', 'twentytwentyone'),
					'shortName' => esc_html_x('L', 'Font size', 'twentytwentyone'),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__('Extra large', 'twentytwentyone'),
					'shortName' => esc_html_x('XL', 'Font size', 'twentytwentyone'),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__('Huge', 'twentytwentyone'),
					'shortName' => esc_html_x('XXL', 'Font size', 'twentytwentyone'),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__('Gigantic', 'twentytwentyone'),
					'shortName' => esc_html_x('XXXL', 'Font size', 'twentytwentyone'),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__('Black', 'twentytwentyone'),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__('Dark gray', 'twentytwentyone'),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__('Gray', 'twentytwentyone'),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__('Green', 'twentytwentyone'),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__('Blue', 'twentytwentyone'),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__('Purple', 'twentytwentyone'),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__('Red', 'twentytwentyone'),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__('Orange', 'twentytwentyone'),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__('Yellow', 'twentytwentyone'),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__('White', 'twentytwentyone'),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__('Purple to yellow', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to purple', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__('Green to yellow', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to green', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__('Red to yellow', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__('Yellow to red', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__('Purple to red', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__('Red to purple', 'twentytwentyone'),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if (is_customize_preview()) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support('starter-content', twenty_twenty_one_get_starter_content());
		}

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Add support for custom line height controls.
		add_theme_support('custom-line-height');

		// Add support for link color control.
		add_theme_support('link-color');

		// Add support for experimental cover block spacing.
		add_theme_support('custom-spacing');

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support('custom-units');

		// Remove feed icon link from legacy RSS widget.
		add_filter('rss_widget_feed_link', '__return_empty_string');
	}
}
add_action('after_setup_theme', 'twenty_twenty_one_setup');

/**
 * Registers widget area.
 *
 * @since Eca_Ecamedicine
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_one_widgets_init()
{

	register_sidebar(
		array(
			'name'          => esc_html__('Footer', 'twentytwentyone'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here to appear in your footer.', 'twentytwentyone'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'twenty_twenty_one_widgets_init');

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Eca_Ecamedicine
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function twenty_twenty_one_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('twenty_twenty_one_content_width', 750);
}
add_action('after_setup_theme', 'twenty_twenty_one_content_width', 0);

/**
 * Enqueues scripts and styles.
 *
 * @since Eca_Ecamedicine
 *
 * @global bool       $is_IE
 * @global WP_Scripts $wp_scripts
 *
 * @return void
 */
function twenty_twenty_one_scripts()
{
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ($is_IE) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style('twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get('Version'));
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style('twenty-twenty-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
	}


	// RTL styles.
	wp_style_add_data('twenty-twenty-one-style', 'rtl', 'replace');

	// Print styles.
	wp_enqueue_style('twenty-twenty-one-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get('Version'), 'print');

	// Responsive styles.
    //wp_enqueue_style('twenty-twenty-one-responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array() , wp_get_theme()
       // ->get('Version'));

	// Threaded comment reply styles.
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// Register the IE11 polyfill file.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills-asset',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get('Version'),
		array('in_footer' => true)
	);

	// Register the IE11 polyfill loader.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills',
		null,
		array(),
		wp_get_theme()->get('Version'),
		array('in_footer' => true)
	);
	wp_add_inline_script(
		'twenty-twenty-one-ie11-polyfills',
		wp_get_script_polyfill(
			$wp_scripts,
			array(
				'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'twenty-twenty-one-ie11-polyfills-asset',
			)
		)
	);

	// Main navigation scripts.
	if (has_nav_menu('primary')) {
		wp_enqueue_script(
			'twenty-twenty-one-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			array('twenty-twenty-one-ie11-polyfills'),
			wp_get_theme()->get('Version'),
			array(
				'in_footer' => false, // Because involves header.
				'strategy'  => 'defer',
			)
		);
	}

	// Responsive embeds script.
	wp_enqueue_script(
		'twenty-twenty-one-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array('twenty-twenty-one-ie11-polyfills'),
		wp_get_theme()->get('Version'),
		array('in_footer' => true)
	);
}
add_action('wp_enqueue_scripts', 'twenty_twenty_one_scripts');

function add_custom_css() {
    // Enqueue your custom CSS file
    wp_enqueue_style('responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), filemtime(get_template_directory() . '/assets/css/responsive.css'));
}

// Add custom CSS after all plugin CSS
add_action('wp_enqueue_scripts', 'add_custom_css', PHP_INT_MAX);



/**
 * Enqueues block editor script.
 *
 * @since Eca_Ecamedicine
 *
 * @return void
 */
function twentytwentyone_block_editor_script()
{

	wp_enqueue_script('twentytwentyone-editor', get_theme_file_uri('/assets/js/editor.js'), array('wp-blocks', 'wp-dom'), wp_get_theme()->get('Version'), array('in_footer' => true));
}

add_action('enqueue_block_editor_assets', 'twentytwentyone_block_editor_script');

/**
 * Fixes skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @since Eca_Ecamedicine
 * @deprecated Twenty Twenty-One 1.9 Removed from wp_print_footer_scripts action.
 *
 * @link https://git.io/vWdr2
 */
function twenty_twenty_one_skip_link_focus_fix()
{

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	} else {
		// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
?>
		<script>
			/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", (function() {
				var t, e = location.hash.substring(1);
				/^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
			}), !1);
		</script>
	<?php
	}
}

/**
 * Enqueues non-latin language styles.
 *
 * @since Eca_Ecamedicine
 *
 * @return void
 */
function twenty_twenty_one_non_latin_languages()
{
	$custom_css = twenty_twenty_one_get_non_latin_css('front-end');

	if ($custom_css) {
		wp_add_inline_style('twenty-twenty-one-style', $custom_css);
	}
}
add_action('wp_enqueue_scripts', 'twenty_twenty_one_non_latin_languages');

// SVG Icons class.
require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-twenty-twenty-one-custom-colors.php';
new Twenty_Twenty_One_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-twenty-twenty-one-customize.php';
new Twenty_Twenty_One_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Dark Mode.
require_once get_template_directory() . '/classes/class-twenty-twenty-one-dark-mode.php';
new Twenty_Twenty_One_Dark_Mode();

/**
 * Enqueues scripts for the customizer preview.
 *
 * @since Eca_Ecamedicine
 *
 * @return void
 */
function twentytwentyone_customize_preview_init()
{
	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri('/assets/js/customize-helpers.js'),
		array(),
		wp_get_theme()->get('Version'),
		array('in_footer' => true)
	);

	wp_enqueue_script(
		'twentytwentyone-customize-preview',
		get_theme_file_uri('/assets/js/customize-preview.js'),
		array('customize-preview', 'customize-selective-refresh', 'jquery', 'twentytwentyone-customize-helpers'),
		wp_get_theme()->get('Version'),
		array('in_footer' => true)
	);
}
add_action('customize_preview_init', 'twentytwentyone_customize_preview_init');

/**
 * Enqueues scripts for the customizer.
 *
 * @since Eca_Ecamedicine
 *
 * @return void
 */
function twentytwentyone_customize_controls_enqueue_scripts()
{

	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri('/assets/js/customize-helpers.js'),
		array(),
		wp_get_theme()->get('Version'),
		array('in_footer' => true)
	);
}
add_action('customize_controls_enqueue_scripts', 'twentytwentyone_customize_controls_enqueue_scripts');

/**
 * Calculates classes for the main <html> element.
 *
 * @since Eca_Ecamedicine
 *
 * @return void
 */
function twentytwentyone_the_html_classes()
{
	/**
	 * Filters the classes for the main <html> element.
	 *
	 * @since Eca_Ecamedicine
	 *
	 * @param string The list of classes. Default empty string.
	 */
	$classes = apply_filters('twentytwentyone_html_classes', '');
	if (!$classes) {
		return;
	}
	echo 'class="' . esc_attr($classes) . '"';
}

/**
 * Adds "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Eca_Ecamedicine
 *
 * @return void
 */
function twentytwentyone_add_ie_class()
{
	?>
	<script>
		if (-1 !== navigator.userAgent.indexOf('MSIE') || -1 !== navigator.appVersion.indexOf('Trident/')) {
			document.body.classList.add('is-IE');
		}
	</script>
	<?php
}
add_action('wp_footer', 'twentytwentyone_add_ie_class');

if (!function_exists('wp_get_list_item_separator')) :
	/**
	 * Retrieves the list item separator based on the locale.
	 *
	 * Added for backward compatibility to support pre-6.0.0 WordPress versions.
	 *
	 * @since 6.0.0
	 */
	function wp_get_list_item_separator()
	{
		/* translators: Used between list items, there is a space after the comma. */
		return __(', ', 'twentytwentyone');
	}
endif;

//Custom login
function my_custom_login_logo()
{
	echo '<style type="text/css">
h1 a { background-image:url(' . get_bloginfo('stylesheet_directory') . '/assets/images/logo-rbg-scaled.jpg)!important; background-size: 100% !important; }
#login { width: 350px !important; }
.login label, .login form .forgetmenot label { font-size: 15px !important; }
.login h1 a {background-size: cover;  width: 200px !important; height:76px; background-position:center; display:block}
.login form{ border-radius: 10px; -webkit-border-radius: 10px; border:0px;  background: #6EC1E4 !important; border: 2px solid #fff !important; }
.login label, .login #backtoblog a, .login #nav a { color:#000 !important}
.login #nav a { color:#000 !important}
.login #backtoblog a { color:#000 !important}
.wp-core-ui .button-primary {text-shadow:none!important; border:none!important; color:#fff!important; background: #c7a258 !important; border: 2px solid #c7a258 !important; line-height: inherit !important; box-shadow: none !important; -webkit-box-shadow: none !important; }
.wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover{background:#fff !important; border-color: #1c70b6 !important; color: #1c70b6 !important;}

</style>';
}
add_action('login_head', 'my_custom_login_logo');
add_filter('login_headerurl', 'my_custom_login_url');
function my_custom_login_url($url)
{
	return get_site_url($url);
}
//Theme options
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'ECAMS Settings',
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));
}

//SVG Images
function allow_svg_upload($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

//Home Hero post type

function hero_post_type()
{
	$labels = array(
		'name' => 'Home Hero',
		'singular_name' => 'slider',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-admin-home',
		'rewrite' => array(
			'slug' => 'slider'
		),
		'supports' => array(
			'title',
			'editor'
		)
	);

	register_post_type('allslider', $args);
}
add_action('init', 'hero_post_type');

function post_published_limit()
{
	$max_posts = 1; // change this or set it as an option that you can retrieve.
	$author = $post->post_author; // Post author ID.

	$count = count_user_posts($author, 'allslider'); // get author post count

	if ($count > $max_posts) {
		// count too high, let's set it to draft.

		$post = array('post_status' => 'draft');
		wp_update_post($post);
	}
}
add_action('publish_allslider', 'post_published_limit');

//Home Hero post type
function department_post_type()
{
	$labels = array(
		'name' => 'Departments',
		'singular_name' => 'Department',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-building',
		'rewrite' => array(
			'slug' => 'departments'
		),
		'supports' => array(
			'title',
			'editor',
			'thumbnail', // Enable featured image support if needed
			'excerpt',   // Enable excerpt support if needed
			'custom-fields' // Enable custom fields support if needed
		)
	);

	register_post_type('department', $args);
}
add_action('init', 'department_post_type');

function add_woocommerce_support()
{
	add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'add_woocommerce_support');

// Replacing the button add to cart by a link to the product page in Shop and archives pages
// add_filter( 'woocommerce_loop_add_to_cart_link', 'replace_loop_add_to_cart_button', 10, 2 );
// function replace_loop_add_to_cart_button( $button, $product  ) {
//     // Only for unlogged user
//     if( ! is_user_logged_in() ){
//         $button_text = __( "Sign up for pricing", "woocommerce" );
//         // $button_link = get_permalink( wc_get_page_id( 'myaccount' ) ); // Login Url
//         $button_link = $product->get_permalink(); // Single product Url
//         $button = '<a class="button" href="' . $product->get_permalink() . '">' . $button_text . '</a>';
//     }

//     return $button;
// }

// Replacing the single product button add to cart by a custom button
// add_action( 'woocommerce_single_product_summary', 'disabled_single_add_to_cart_button', 1 );
// function disabled_single_add_to_cart_button() {
//     global $product;

//     // Only for unlogged user
//     if( ! is_user_logged_in() ){

//         // For variable product types (keeping attribute select fields)
//         if( $product->is_type( 'variable' ) ) {
//             remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
//             add_action( 'woocommerce_single_variation', 'custom_product_button', 20 );
//         }
//         // For all other product types
//         else {
//             remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
//             add_action( 'woocommerce_single_product_summary', 'custom_product_button', 30 );
//         }
//     }
// }

// The custom replacement button function inked to loggin page
// function custom_product_button(){
//     $login_url = get_permalink( wc_get_page_id( 'myaccount' ) );
//     echo '<a class="button" href="'.$login_url.'">' . __( "Sign up for pricing", "woocommerce" ) . '</a>';
// }


function rc_woocommerce_recently_viewed_products($atts, $content = null)
{
	// Get shortcode parameters
	$atts = shortcode_atts(array(
		"per_page" => '5'
	), $atts);

	// Get recently viewed product cookies data
	$viewed_products = !empty($_COOKIE['woocommerce_recently_viewed']) ? (array) explode('|', $_COOKIE['woocommerce_recently_viewed']) : array();
	$viewed_products = array_filter(array_map('absint', $viewed_products));

	// If no data, quit
	// if ( empty( $viewed_products ) ) {
	//     return __( 'You have not viewed any product yet!', 'rc_wc_rvp' );
	// }

	// Set products per page
	$per_page = isset($atts['per_page']) ? intval($atts['per_page']) : 4;

	// Create query arguments array
	$query_args = array(
		'posts_per_page' => 5,
		'no_found_rows'  => 1,
		'post_status'    => 'publish',
		'post_type'      => 'product',
		//'post__in'       => $viewed_products,
		//'orderby'        => 'rand'
	);

	// Add meta_query to query args
	$query_args['meta_query'] = array();

	// Check products stock status
	global $woocommerce;
	$query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();

	// Create a new query
	$r = new WP_Query($query_args);

	// Start output buffer
	ob_start();

	// If query returns results
	if ($r->have_posts()) {
		echo '<div class="stageSlider"><div class="owl-carousel owl-theme stagePaddingSlide">';

		// Start the loop
		while ($r->have_posts()) {
			$r->the_post();
			global $product;
	?>
			<div class="item">
				<div class="AdvancedBg">
					<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($r->post->ID), 'single-post-thumbnail'); ?>
					<div class="imgBlock">
						<?php if ($image) { ?>
							<img src="<?php echo $image[0]; ?>" data-id="<?php echo $r->post->ID; ?>"><?php } else { ?>
							<img src="<?php bloginfo('url'); ?>/wp-content/plugins/woocommerce/assets/images/placeholder.png" data-id="<?php echo $r->post->ID; ?>">
						<?php } ?>
					</div>
					<div class="textWrap">
						<h4><?php the_title(); ?></h4>
						<?php
						$description = $product->get_short_description();
						$cut_length = 100; // Set your desired length here
						// Remove HTML tags from the description
						$description = strip_tags($description);

						// Check if the description length exceeds the cut length
						if (strlen($description) > $cut_length) {
							// Find the position of the last space within the cut length
							$last_space = strrpos(substr($description, 0, $cut_length), ' ');

							// Cut the description at the last space
							$cut_description = substr($description, 0, $last_space);

							// Append ellipsis (...) to indicate the description was truncated
							$cut_description .= '...';
						} else {
							// If the description is shorter than the cut length, use the original description
							$cut_description = $description;
						}

						echo '<p>'.$cut_description.'</p>';
						?>

						<a href="<?php the_permalink(); ?>" class="gostBtn">Read more</a>

					</div>
				</div>
			</div>

<?php

		}

		echo '</div></div>';
	}
	wp_reset_query();
	// Get clean output
	$content .= ob_get_clean();

	// Return the content
	return $content;
}

// Register the shortcode
add_shortcode("woocommerce_recently_viewed_products", "rc_woocommerce_recently_viewed_products");


/**
 * @snippet Register Assignment post type and Question Answer CPT
 */
function assignment_post_type()
{
    $labels = array(
        'name' => 'Assignments',
        'singular_name' => 'Assignment',
        'menu_name' => 'Assignments',
        'name_admin_bar' => 'Assignment',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Assignment',
        'new_item' => 'New Assignment',
        'edit_item' => 'Edit Assignment',
        'view_item' => 'View Assignment',
        'all_items' => 'All Assignments',
        'search_items' => 'Search Assignments',
        'not_found' => 'No assignments found.',
        'not_found_in_trash' => 'No assignments found in Trash.',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-home',
        'rewrite' => array('slug' => 'assignments'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true, // Enable Gutenberg editor support
    );

    register_post_type('assignment', $args);
}
add_action('init', 'assignment_post_type');

/**
 * @snippet Register custom taxonomies for the Assignment post type
 */

function assignment_custom_taxonomies()
{
    // Register Topics taxonomy
    $labels = array(
        'name' => 'Topics',
        'singular_name' => 'Topic',
        'search_items' => 'Search Topics',
        'all_items' => 'All Topics',
        'parent_item' => 'Parent Topic',
        'parent_item_colon' => 'Parent Topic:',
        'edit_item' => 'Edit Topic',
        'update_item' => 'Update Topic',
        'add_new_item' => 'Add New Topic',
        'new_item_name' => 'New Topic Name',
        'menu_name' => 'Topics',
    );

    $args = array(
        'hierarchical' => true, // Like categories
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'topic'),
    );

    register_taxonomy('topic', array('assignment'), $args);
}
add_action('init', 'assignment_custom_taxonomies');


/**
 * @snippet WooCommerce User Registration Shortcode
 */

 add_shortcode( 'wc_reg_form_bbloomer', 'bbloomer_separate_registration_form' );

 function bbloomer_separate_registration_form() {
    if ( is_user_logged_in() ) {
        return '<p>You are already registered</p>';
    }

    ob_start();

    // Trigger any actions hooked to 'woocommerce_before_customer_login_form'
    do_action( 'woocommerce_before_customer_login_form' );

    // Get the login form HTML
    $html = wc_get_template_html( 'myaccount/form-login.php' );

    // Extract the registration form using DOMDocument and XPath
    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML( utf8_decode( $html ) );
    libxml_clear_errors();

    $xpath = new DOMXPath( $dom );
    $form = $xpath->query( '//form[contains(@class,"register")]' );

    if ($form->length > 0) {
        // Save the registration form HTML
        $registrationFormHTML = $dom->saveHTML( $form->item( 0 ) );
        echo $registrationFormHTML;
    } else {
        echo '<p>Registration form not found.</p>';
    }

    return ob_get_clean();
}



 /**
 * @snippet WooCommerce User Login Shortcode
 */

add_shortcode( 'wc_login_form_bbloomer', 'bbloomer_separate_login_form' );

function bbloomer_separate_login_form() {
   if ( is_user_logged_in() ) return '<p>You are already logged in</p>';
   ob_start();
   do_action( 'woocommerce_before_customer_login_form' );
   woocommerce_login_form( array( 'redirect' => wc_get_page_permalink( 'myaccount' ) ) );
   return ob_get_clean();
}

/**
 * @snippet Redirect Login/Registration to My Account
 */

 add_action( 'template_redirect', 'bbloomer_redirect_login_registration_if_logged_in' );

 function bbloomer_redirect_login_registration_if_logged_in() {
	 if ( is_page() && is_user_logged_in() && ( has_shortcode( get_the_content(), 'wc_login_form_bbloomer' ) || has_shortcode( get_the_content(), 'wc_reg_form_bbloomer' ) ) ) {
		 wp_safe_redirect( wc_get_page_permalink( 'myaccount' ) );
		 exit;
	 }
 }

 /**
 * @snippet Add First & Last Name to My Account Register Form - WooCommerce
 */

///////////////////////////////
// 1. ADD FIELDS

add_action( 'woocommerce_register_form_start', 'bbloomer_add_name_woo_account_registration' );

function bbloomer_add_name_woo_account_registration() {
	session_start(); // Ensure session is started
	$topicID = isset($_SESSION['topicID']) ? $_SESSION['topicID'] : '';
	$product_id = isset($_SESSION['product_id']) ? $_SESSION['product_id'] : '';
    ?>

    <p class="form-row form-row-first">
    <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>

    <p class="form-row form-row-last">
    <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>
	<input type="hidden" name="topicID" value="<?php echo esc_attr($topicID); ?>" />
	<input type="hidden" name="product_id" value="<?php echo esc_attr($product_id); ?>" />
    <div class="clear"></div>

    <?php
}

///////////////////////////////
// 2. VALIDATE FIELDS

add_filter( 'woocommerce_registration_errors', 'bbloomer_validate_name_fields', 10, 3 );

function bbloomer_validate_name_fields( $errors, $username, $email ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
    }
	if ( isset( $_POST['topicID'] ) && empty( $_POST['topicID'] ) ) {
        $errors->add( 'topicID_error', __( '<strong>Error</strong>: Topic ID is missing!', 'woocommerce' ) );
    }
	if ( isset( $_POST['product_id'] ) && empty( $_POST['product_id'] ) ) {
        $errors->add( 'product_id_error', __( '<strong>Error</strong>: Product ID is missing!', 'woocommerce' ) );
    }
    return $errors;
}

///////////////////////////////
// 3. SAVE FIELDS

add_action( 'woocommerce_created_customer', 'bbloomer_save_name_fields' );

function bbloomer_save_name_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']) );
    }
	if ( isset( $_POST['topicID'] ) && isset( $_POST['product_id'] ) ) {
        $topic_product_data = array(
            'topicID' => sanitize_text_field( $_POST['topicID'] ),
            'product_id' => sanitize_text_field( $_POST['product_id'] ),
        );
        update_user_meta( $customer_id, 'topic_product_data', serialize( $topic_product_data ) );
    }

}

/**
 * @snippet  Deny Login Upon Registration @ WooCommerce My Account Password Repeat
 */

 add_filter( 'woocommerce_registration_auth_new_customer', '__return_false' );

 add_action( 'woocommerce_register_form', 'wc_register_form_password_repeat' );
function wc_register_form_password_repeat() {
    ?>
    <p class="form-row form-row-wide">
        <label for="reg_password2"><?php _e( 'Password Repeat', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
    </p>
    <?php
}

/**
 * @snippet  My Account Password Repeat validation
 */

add_filter('woocommerce_registration_errors', 'registration_errors_validation', 10,3);
function registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
    global $woocommerce;
    extract( $_POST );
    if ( strcmp( $password, $password2 ) !== 0 ) {
        return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );
    }
    return $reg_errors;
}

/**
 * @snippet  Ajax count value in header section
 */

