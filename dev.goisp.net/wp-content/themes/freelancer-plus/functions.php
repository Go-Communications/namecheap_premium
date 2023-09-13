<?php
/**
 * Freelancer Plus functions and definitions
 *
 * @package Freelancer Plus
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'freelancer_plus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function freelancer_plus_setup() {
	global $freelancer_plus_content_width;
	if ( ! isset( $freelancer_plus_content_width ) )
		$freelancer_plus_content_width = 680;

	load_theme_textdomain( 'freelancer-plus', get_template_directory() . '/languages' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header', array(
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'freelancer-plus' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( 'editor-style.css' );
}
endif; // freelancer_plus_setup
add_action( 'after_setup_theme', 'freelancer_plus_setup' );

function freelancer_plus_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'freelancer-plus' ),
		'description'   => __( 'Appears on blog page sidebar', 'freelancer-plus' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'freelancer-plus' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'freelancer-plus' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'freelancer-plus' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'freelancer-plus' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'freelancer-plus' ),
		'description'   => __( 'Appears on footer', 'freelancer-plus' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'freelancer-plus' ),
		'description'   => __( 'Appears on footer', 'freelancer-plus' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'freelancer-plus' ),
		'description'   => __( 'Appears on footer', 'freelancer-plus' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'freelancer-plus' ),
		'description'   => __( 'Appears on footer', 'freelancer-plus' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-4 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'freelancer_plus_widgets_init' );

function freelancer_plus_scripts() {

	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'freelancer-plus-basic-style', get_stylesheet_uri() );
	wp_style_add_data('freelancer-plus-basic-style', 'rtl', 'replace');

	wp_enqueue_style( 'freelancer-plus-responsive', esc_url(get_template_directory_uri())."/css/responsive.css" );
	wp_enqueue_style( 'freelancer-plus-default', esc_url(get_template_directory_uri())."/css/default.css" );
	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'freelancer-plus-basic-style',$freelancer_plus_color_scheme_css );
	
	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'freelancer-plus-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$freelancer_plus_headings_font = esc_html(get_theme_mod('freelancer_plus_headings_fonts'));
	$freelancer_plus_body_font = esc_html(get_theme_mod('freelancer_plus_body_fonts'));

	if( $freelancer_plus_headings_font ) {
		wp_enqueue_style( 'freelancer-plus-headings-fonts', '//fonts.googleapis.com/css?family='. $freelancer_plus_headings_font );
	} else {
		wp_enqueue_style( 'freelancer-plus-poppins', '//fonts.googleapis.com/css?family=Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	}
	if( $freelancer_plus_body_font ) {
		wp_enqueue_style( 'freelancer-plus-poppins', '//fonts.googleapis.com/css?family='. $freelancer_plus_body_font );
	} else {
		wp_enqueue_style( 'freelancer-plus-source-body', '//fonts.googleapis.com/css?family=Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	}
}
add_action( 'wp_enqueue_scripts', 'freelancer_plus_scripts' );

require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * Theme Info Page.
 */
require get_template_directory() . '/inc/addon.php';

/**
 * Sanitization Callbacks.
 */
require get_template_directory() . '/inc/sanitization-callbacks.php';


if ( ! defined( 'FREELANCER_PLUS_THEME_PAGE' ) ) {
define('FREELANCER_PLUS_THEME_PAGE',__('https://www.theclassictemplates.com/themes/','freelancer-plus'));
}
if ( ! defined( 'FREELANCER_PLUS_SUPPORT' ) ) {
define('FREELANCER_PLUS_SUPPORT',__('https://wordpress.org/support/theme/freelancer-plus','freelancer-plus'));
}
if ( ! defined( 'FREELANCER_PLUS_REVIEW' ) ) {
define('FREELANCER_PLUS_REVIEW',__('https://wordpress.org/support/theme/freelancer-plus/reviews/#new-post','freelancer-plus'));
}
if ( ! defined( 'FREELANCER_PLUS_PRO_DEMO' ) ) {
define('FREELANCER_PLUS_PRO_DEMO',__('https://www.theclassictemplates.com/demo/freelancer-plus/','freelancer-plus'));
}
if ( ! defined( 'FREELANCER_PLUS_PREMIUM_PAGE' ) ) {
define('FREELANCER_PLUS_PREMIUM_PAGE',__('https://www.theclassictemplates.com/wp-themes/freelancer-wordpress-theme/','freelancer-plus'));
}
if ( ! defined( 'FREELANCER_PLUS_THEME_DOCUMENTATION' ) ) {
define('FREELANCER_PLUS_THEME_DOCUMENTATION',__('http://theclassictemplates.com/documentation/freelancer-plus-free/','freelancer-plus'));
}

if ( ! function_exists( 'freelancer_plus_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function freelancer_plus_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
