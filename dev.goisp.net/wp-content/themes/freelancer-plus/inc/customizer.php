<?php
/**
 * Freelancer Plus Theme Customizer
 *
 * @package Freelancer Plus
 */

get_template_part('/inc/select/category-dropdown-custom-control');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function freelancer_plus_customize_register( $wp_customize ) {

	function freelancer_plus_sanitize_phone_number( $phone ) {
		return preg_replace( '/[^\d+]/', '', $phone );
	}

	wp_enqueue_style('freelancer-plus-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	//Logo
    $wp_customize->add_setting('freelancer_plus_logo_width',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'freelancer_plus_sanitize_integer'
	));
	$wp_customize->add_control(new freelancer_plus_Slider_Custom_Control( $wp_customize, 'freelancer_plus_logo_width',array(
		'label'	=> esc_html__('Logo Width','freelancer-plus'),
		'section'=> 'title_tagline',
		'settings'=>'freelancer_plus_logo_width',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	$wp_customize->add_setting('freelancer_plus_title_enable',array(
		'default' => true,
		'sanitize_callback' => 'freelancer_plus_sanitize_checkbox',
	));
	$wp_customize->add_control( 'freelancer_plus_title_enable', array(
	   'settings' => 'freelancer_plus_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','freelancer-plus'),
	   'type'      => 'checkbox'
	));

	// sitetitle color
	$wp_customize->add_setting('freelancer_plus_sitetitle_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_sitetitle_col', array(
	   'settings' => 'freelancer_plus_sitetitle_col',
	   'section'   => 'title_tagline',
	   'label' => __('Site Title Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('freelancer_plus_tagline_enable',array(
		'default' => false,
		'sanitize_callback' => 'freelancer_plus_sanitize_checkbox',
	));
	$wp_customize->add_control( 'freelancer_plus_tagline_enable', array(
	   'settings' => 'freelancer_plus_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','freelancer-plus'),
	   'type'      => 'checkbox'
	));

	// sitetagline color
	$wp_customize->add_setting('freelancer_plus_sitetagline_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_sitetagline_col', array(
	   'settings' => 'freelancer_plus_sitetagline_col',
	   'section'   => 'title_tagline',
	   'label' => __('Site Tagline Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	//Theme Options
	$wp_customize->add_panel( 'freelancer_plus_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'freelancer-plus' ),
	) );

	//Site Layout Section
	$wp_customize->add_section('freelancer_plus_site_layoutsec',array(
		'title'	=> __('Manage Site Layout Section ','freelancer-plus'),
		'description' => __('<p class="sec-title">Manage Site Layout Section</p>','freelancer-plus'),
		'priority'	=> 1,
		'panel' => 'freelancer_plus_panel_area',
	));

	$wp_customize->add_setting('freelancer_plus_box_layout',array(
		'sanitize_callback' => 'freelancer_plus_sanitize_checkbox',
	));

	$wp_customize->add_control( 'freelancer_plus_box_layout', array(
	   'section'   => 'freelancer_plus_site_layoutsec',
	   'label'	=> __('Check to Box Layout','freelancer-plus'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('freelancer_plus_preloader',array(
		'default' => true,
		'sanitize_callback' => 'freelancer_plus_sanitize_checkbox',
	));

	$wp_customize->add_control( 'freelancer_plus_preloader', array(
	   'section'   => 'freelancer_plus_site_layoutsec',
	   'label'	=> __('Check to show preloader','freelancer-plus'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('freelancer_plus_topbar',array(
		'default' => true,
		'sanitize_callback' => 'freelancer_plus_sanitize_checkbox',
	));

	$wp_customize->add_control( 'freelancer_plus_topbar', array(
	   'section'   => 'freelancer_plus_site_layoutsec',
	   'label'	=> __('Check to show topbar','freelancer-plus'),
	   'type'      => 'checkbox'
 	));

	// Header Section
	$wp_customize->add_section('freelancer_plus_header_section', array(
        'title' => __('Manage Header Section', 'freelancer-plus'),
        'description' => __('<p class="sec-title">Manage Header Section</p>','freelancer-plus'),
        'priority' => null,
		'panel' => 'freelancer_plus_panel_area',
 	));

 	$wp_customize->add_setting('freelancer_plus_stickyheader',array(
		'default' => false,
		'sanitize_callback' => 'freelancer_plus_sanitize_checkbox',
	));

	$wp_customize->add_control( 'freelancer_plus_stickyheader', array(
	   'section'   => 'freelancer_plus_header_section',
	   'label'	=> __('Check To Show Sticky Header','freelancer-plus'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('freelancer_plus_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'freelancer_plus_email_address', array(
	   'settings' => 'freelancer_plus_email_address',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('Add Email Address', 'freelancer-plus'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('freelancer_plus_timming',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'freelancer_plus_timming', array(
	   'settings' => 'freelancer_plus_timming',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('Add Office Timming', 'freelancer-plus'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('freelancer_plus_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'freelancer_plus_sanitize_phone_number',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'freelancer_plus_phone_number', array(
	   'settings' => 'freelancer_plus_phone_number',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('Add Phone Number', 'freelancer-plus'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('freelancer_plus_phone_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'freelancer_plus_phone_text', array(
	   'settings' => 'freelancer_plus_phone_text',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('Add Call Text', 'freelancer-plus'),
	   'type'      => 'text'
	));

	// topheaderbg color
	$wp_customize->add_setting('freelancer_plus_topheaderbg_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_topheaderbg_col', array(
	   'settings' => 'freelancer_plus_topheaderbg_col',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('Top BG Color', 'freelancer-plus'),
	   'type'      => 'color'
	));


	// topheaderemail color
	$wp_customize->add_setting('freelancer_plus_topheaderemail_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_topheaderemail_col', array(
	   'settings' => 'freelancer_plus_topheaderemail_col',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('Email Icon Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// topheaderemailtxt color
	$wp_customize->add_setting('freelancer_plus_topheaderemailtxt_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_topheaderemailtxt_col', array(
	   'settings' => 'freelancer_plus_topheaderemailtxt_col',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('Email Text Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// topheadertime color
	$wp_customize->add_setting('freelancer_plus_topheadertime_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_topheadertime_col', array(
	   'settings' => 'freelancer_plus_topheadertime_col',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('Time Icon Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// topheadertimetxt color
	$wp_customize->add_setting('freelancer_plus_topheadertimetxt_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_topheadertimetxt_col', array(
	   'settings' => 'freelancer_plus_topheadertimetxt_col',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('Time Text Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// bottomheaderbg color
	$wp_customize->add_setting('freelancer_plus_bottomheaderbg_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_bottomheaderbg_col', array(
	   'settings' => 'freelancer_plus_bottomheaderbg_col',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('Bottom BG Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// bottomheadermenus color
	$wp_customize->add_setting('freelancer_plus_bottomheadermenus_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_bottomheadermenus_col', array(
	   'settings' => 'freelancer_plus_bottomheadermenus_col',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('Menus Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// bottomheadermenushover color
	$wp_customize->add_setting('freelancer_plus_bottomheadermenushover_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_bottomheadermenushover_col', array(
	   'settings' => 'freelancer_plus_bottomheadermenushover_col',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('Menus Hover Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// bottomheadersubmenusbg color
	$wp_customize->add_setting('freelancer_plus_bottomheadersubmenusbg_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_bottomheadersubmenusbg_col', array(
	   'settings' => 'freelancer_plus_bottomheadersubmenusbg_col',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('SubMenus BG Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// bottomheadersubmenus color
	$wp_customize->add_setting('freelancer_plus_bottomheadersubmenus_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_bottomheadersubmenus_col', array(
	   'settings' => 'freelancer_plus_bottomheadersubmenus_col',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('SubMenus Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// bottomheadersubmenushover color
	$wp_customize->add_setting('freelancer_plus_bottomheadersubmenushover_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_bottomheadersubmenushover_col', array(
	   'settings' => 'freelancer_plus_bottomheadersubmenushover_col',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('SubMenus Hover Color', 'freelancer-plus'),
	   'type'      => 'color'
	));


	// bottomheaderphnicon color
	$wp_customize->add_setting('freelancer_plus_bottomheaderphnicon_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_bottomheaderphnicon_col', array(
	   'settings' => 'freelancer_plus_bottomheaderphnicon_col',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('Phone Icon Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// bottomheaderphnno color
	$wp_customize->add_setting('freelancer_plus_bottomheaderphnno_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_bottomheaderphnno_col', array(
	   'settings' => 'freelancer_plus_bottomheaderphnno_col',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('Phone No. Color', 'freelancer-plus'),
	   'type'      => 'color'
	));


	// bottomheaderphntxt color
	$wp_customize->add_setting('freelancer_plus_bottomheaderphntxt_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_bottomheaderphntxt_col', array(
	   'settings' => 'freelancer_plus_bottomheaderphntxt_col',
	   'section'   => 'freelancer_plus_header_section',
	   'label' => __('Phone Text Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// Social media Section
	$wp_customize->add_section('freelancer_plus_social_media_section', array(
        'title' => __('Manage Social media Section', 'freelancer-plus'),
        'description' => __('<p class="sec-title">Manage Social media Section</p>','freelancer-plus'),
        'priority' => null,
		'panel' => 'freelancer_plus_panel_area',
 	));

	$wp_customize->add_setting('freelancer_plus_fb_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'freelancer_plus_fb_link', array(
	   'settings' => 'freelancer_plus_fb_link',
	   'section'   => 'freelancer_plus_social_media_section',
	   'label' => __('Facebook Link', 'freelancer-plus'),
	   'type'      => 'url'
	));

	// Facebook color
	$wp_customize->add_setting('freelancer_plus_facebook_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_facebook_col', array(
	   'settings' => 'freelancer_plus_facebook_col',
	   'section'   => 'freelancer_plus_social_media_section',
	   'label' => __('Facebook Color', 'freelancer-plus'),
	   'type'      => 'color'
	));


	$wp_customize->add_setting('freelancer_plus_twitt_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'freelancer_plus_twitt_link', array(
	   'settings' => 'freelancer_plus_twitt_link',
	   'section'   => 'freelancer_plus_social_media_section',
	   'label' => __('Twitter Link', 'freelancer-plus'),
	   'type'      => 'url'
	));

	// twitter color
	$wp_customize->add_setting('freelancer_plus_twitter_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_twitter_col', array(
	   'settings' => 'freelancer_plus_twitter_col',
	   'section'   => 'freelancer_plus_social_media_section',
	   'label' => __('Twitter Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('freelancer_plus_linked_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'freelancer_plus_linked_link', array(
	   'settings' => 'freelancer_plus_linked_link',
	   'section'   => 'freelancer_plus_social_media_section',
	   'label' => __('Linkdin Link', 'freelancer-plus'),
	   'type'      => 'url'
	));

	// linkdin color
	$wp_customize->add_setting('freelancer_plus_linkdin_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_linkdin_col', array(
	   'settings' => 'freelancer_plus_linkdin_col',
	   'section'   => 'freelancer_plus_social_media_section',
	   'label' => __('Linkdin Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('freelancer_plus_insta_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'freelancer_plus_insta_link', array(
	   'settings' => 'freelancer_plus_insta_link',
	   'section'   => 'freelancer_plus_social_media_section',
	   'label' => __('Instagram Link', 'freelancer-plus'),
	   'type'      => 'url'
	));

	// instagram color
	$wp_customize->add_setting('freelancer_plus_instagram_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_instagram_col', array(
	   'settings' => 'freelancer_plus_instagram_col',
	   'section'   => 'freelancer_plus_social_media_section',
	   'label' => __('Instagram Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('freelancer_plus_youtube_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'freelancer_plus_youtube_link', array(
	   'settings' => 'freelancer_plus_youtube_link',
	   'section'   => 'freelancer_plus_social_media_section',
	   'label' => __('Youtube Link', 'freelancer-plus'),
	   'type'      => 'url'
	));

	// youtube color
	$wp_customize->add_setting('freelancer_plus_youtube_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_youtube_col', array(
	   'settings' => 'freelancer_plus_youtube_col',
	   'section'   => 'freelancer_plus_social_media_section',
	   'label' => __('Youtube Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// icon hover color
	$wp_customize->add_setting('freelancer_plus_iconhover_col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_iconhover_col', array(
	   'settings' => 'freelancer_plus_iconhover_col',
	   'section'   => 'freelancer_plus_social_media_section',
	   'label' => __('Icon Hover Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// Home Category Dropdown Section
	$wp_customize->add_section('freelancer_plus_one_cols_section',array(
		'title'	=> __('Manage Slider Section','freelancer-plus'),
		'description'	=> __('<p class="sec-title">Manage Slider Section</p> Select Category from the Dropdowns for slider, Also use the given image dimension (1200 x 450).','freelancer-plus'),
		'priority'	=> null,
		'panel' => 'freelancer_plus_panel_area'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'freelancer_plus_slidersection', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Freelancer_Plus_Category_Dropdown_Custom_Control( $wp_customize, 'freelancer_plus_slidersection', array(
		'section' => 'freelancer_plus_one_cols_section',
		'settings'   => 'freelancer_plus_slidersection',
	) ) );

	$wp_customize->add_setting('freelancer_plus_button_text',array(
		'default' => 'Contact',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'freelancer_plus_button_text', array(
	   'settings' => 'freelancer_plus_button_text',
	   'section'   => 'freelancer_plus_one_cols_section',
	   'label' => __('Add Button Text', 'freelancer-plus'),
	   'type'      => 'text'
	));

	//Hide Section
	$wp_customize->add_setting('freelancer_plus_hide_categorysec',array(
		'default' => false,
		'sanitize_callback' => 'freelancer_plus_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_hide_categorysec', array(
	   'settings' => 'freelancer_plus_hide_categorysec',
	   'section'   => 'freelancer_plus_one_cols_section',
	   'label'     => __('Check To Enable This Section','freelancer-plus'),
	   'type'      => 'checkbox'
	));


	// slider title color
	$wp_customize->add_setting('freelancer_plus_slider_titlecol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_slider_titlecol', array(
	   'settings' => 'freelancer_plus_slider_titlecol',
	   'section'   => 'freelancer_plus_one_cols_section',
	   'label' => __('Title Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// slider description color
	$wp_customize->add_setting('freelancer_plus_slider_descriptioncol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_slider_descriptioncol', array(
	   'settings' => 'freelancer_plus_slider_descriptioncol',
	   'section'   => 'freelancer_plus_one_cols_section',
	   'label' => __('Description Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// slider btntext color
	$wp_customize->add_setting('freelancer_plus_slider_btntextcol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_slider_btntextcol', array(
	   'settings' => 'freelancer_plus_slider_btntextcol',
	   'section'   => 'freelancer_plus_one_cols_section',
	   'label' => __('Button Text Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// slider btnbg color
	$wp_customize->add_setting('freelancer_plus_slider_btnbgcol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_slider_btnbgcol', array(
	   'settings' => 'freelancer_plus_slider_btnbgcol',
	   'section'   => 'freelancer_plus_one_cols_section',
	   'label' => __('Button BG Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// slider btnbghrv color
	$wp_customize->add_setting('freelancer_plus_slider_btnbghrvcol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_slider_btnbghrvcol', array(
	   'settings' => 'freelancer_plus_slider_btnbghrvcol',
	   'section'   => 'freelancer_plus_one_cols_section',
	   'label' => __('Button BG Hover Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// slider btntexthrv color
	$wp_customize->add_setting('freelancer_plus_slider_btntexthrvcol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_slider_btntexthrvcol', array(
	   'settings' => 'freelancer_plus_slider_btntexthrvcol',
	   'section'   => 'freelancer_plus_one_cols_section',
	   'label' => __('Button Text Hover Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// slider opacity1 color
	$wp_customize->add_setting('freelancer_plus_slider_opacity1col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_slider_opacity1col', array(
	   'settings' => 'freelancer_plus_slider_opacity1col',
	   'section'   => 'freelancer_plus_one_cols_section',
	   'label' => __('Opacity Color 1', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// slider opacity2 color
	$wp_customize->add_setting('freelancer_plus_slider_opacity2col',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'freelancer_plus_slider_opacity2col', array(
	   'settings' => 'freelancer_plus_slider_opacity2col',
	   'section'   => 'freelancer_plus_one_cols_section',
	   'label' => __('Opacity 2 Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// slider arrow color
	$wp_customize->add_setting('freelancer_plus_slider_arrowcol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_slider_arrowcol', array(
	   'settings' => 'freelancer_plus_slider_arrowcol',
	   'section'   => 'freelancer_plus_one_cols_section',
	   'label' => __('Arrow Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// slider arrowhover color
	$wp_customize->add_setting('freelancer_plus_slider_arrowhovercol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_slider_arrowhovercol', array(
	   'settings' => 'freelancer_plus_slider_arrowhovercol',
	   'section'   => 'freelancer_plus_one_cols_section',
	   'label' => __('Arrow Hover Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// Services Section
	$wp_customize->add_section('freelancer_plus_below_slider_section', array(
		'title'	=> __('Manage Services Section','freelancer-plus'),
		'description'	=> __('<p class="sec-title">Manage Services Section</p> Select Pages from the dropdown for Services.','freelancer-plus'),
		'priority'	=> null,
		'panel' => 'freelancer_plus_panel_area',
	));

	$wp_customize->add_setting('freelancer_plus_main_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'freelancer_plus_main_title', array(
	   'settings' => 'freelancer_plus_main_title',
	   'section'   => 'freelancer_plus_below_slider_section',
	   'label' => __('Add Main Title', 'freelancer-plus'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('freelancer_plus_main_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'freelancer_plus_main_text', array(
	   'settings' => 'freelancer_plus_main_text',
	   'section'   => 'freelancer_plus_below_slider_section',
	   'label' => __('Add Main Text', 'freelancer-plus'),
	   'type'      => 'text'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'freelancer_plus_services_cat', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Freelancer_Plus_Category_Dropdown_Custom_Control( $wp_customize, 'freelancer_plus_services_cat', array(
		'section' => 'freelancer_plus_below_slider_section',
		'settings'   => 'freelancer_plus_services_cat',
	) ) );

	$wp_customize->add_setting('freelancer_plus_disabled_pgboxes',array(
		'default' => false,
		'sanitize_callback' => 'freelancer_plus_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_disabled_pgboxes', array(
	   'settings' => 'freelancer_plus_disabled_pgboxes',
	   'section'   => 'freelancer_plus_below_slider_section',
	   'label'     => __('Check To Enable This Section','freelancer-plus'),
	   'type'      => 'checkbox'
	));


	// service heading color
	$wp_customize->add_setting('freelancer_plus_service_headingcol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_service_headingcol', array(
	   'settings' => 'freelancer_plus_service_headingcol',
	   'section'   => 'freelancer_plus_below_slider_section',
	   'label' => __('Heading Color', 'freelancer-plus'),
	   'type'      => 'color'
	));


	// service subheading color
	$wp_customize->add_setting('freelancer_plus_service_subheadingcol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_service_subheadingcol', array(
	   'settings' => 'freelancer_plus_service_subheadingcol',
	   'section'   => 'freelancer_plus_below_slider_section',
	   'label' => __('SubHeading Color', 'freelancer-plus'),
	   'type'      => 'color'
	));


	// service boxbg color
	$wp_customize->add_setting('freelancer_plus_service_boxbgcol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_service_boxbgcol', array(
	   'settings' => 'freelancer_plus_service_boxbgcol',
	   'section'   => 'freelancer_plus_below_slider_section',
	   'label' => __('Box BG Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// service title color
	$wp_customize->add_setting('freelancer_plus_service_titlecol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_service_titlecol', array(
	   'settings' => 'freelancer_plus_service_titlecol',
	   'section'   => 'freelancer_plus_below_slider_section',
	   'label' => __('Title Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// service description color
	$wp_customize->add_setting('freelancer_plus_service_descriptioncol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_service_descriptioncol', array(
	   'settings' => 'freelancer_plus_service_descriptioncol',
	   'section'   => 'freelancer_plus_below_slider_section',
	   'label' => __('Description Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	//Blog post
	$wp_customize->add_section('freelancer_plus_blog_post_settings',array(
        'title' => __('Manage Post Section', 'freelancer-plus'),
        'priority' => null,
        'panel' => 'freelancer_plus_panel_area'
    ) );

   //Add Settings and Controls for Post Layout
	$wp_customize->add_setting('freelancer_plus_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'freelancer_plus_sanitize_choices'
	));
	$wp_customize->add_control('freelancer_plus_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Theme Post Sidebar Position', 'freelancer-plus'),
     'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'freelancer-plus'),
     'section' => 'freelancer_plus_blog_post_settings',
     'choices' => array(
         'full' => __('Full','freelancer-plus'),
         'left' => __('Left','freelancer-plus'),
         'right' => __('Right','freelancer-plus'),
         'three-column' => __('Three Columns','freelancer-plus'),
         'four-column' => __('Four Columns','freelancer-plus'),
         'grid' => __('Grid Layout','freelancer-plus')
     ),
	) );

	$wp_customize->add_setting('freelancer_plus_blog_post_description_option',array(
    	'default'   => 'Full Content', 
        'sanitize_callback' => 'freelancer_plus_sanitize_choices'
	));
	$wp_customize->add_control('freelancer_plus_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','freelancer-plus'),
        'section' => 'freelancer_plus_blog_post_settings',
        'choices' => array(
            'No Content' => __('No Content','freelancer-plus'),
            'Excerpt Content' => __('Excerpt Content','freelancer-plus'),
            'Full Content' => __('Full Content','freelancer-plus'),
        ),
	) );

	// Footer Section
	$wp_customize->add_section('freelancer_plus_footer', array(
		'title'	=> __('Manage Footer Section','freelancer-plus'),
		'description' => __('<p class="sec-title">Manage Footer Section</p>','freelancer-plus'),
		'priority'	=> null,
		'panel' => 'freelancer_plus_panel_area',
	));

	$wp_customize->add_setting('freelancer_plus_copyright_line',array(
		'default' => 'Freelancer WordPress Theme',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'freelancer_plus_copyright_line', array(
	   'section' 	=> 'freelancer_plus_footer',
	   'label'	 	=> __('Copyright Line','freelancer-plus'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));


    $wp_customize->add_setting('freelancer_plus_copyright_link',array(
    	'default' => 'https://www.theclassictemplates.com/themes/free-freelancer-wordpress-theme/',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'freelancer_plus_copyright_link', array(
	   'section' 	=> 'freelancer_plus_footer',
	   'label'	 	=> __('Link','freelancer-plus'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

    // footer bg color
	$wp_customize->add_setting('freelancer_plus_footer_bgcol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_footer_bgcol', array(
	   'settings' => 'freelancer_plus_footer_bgcol',
	   'section'   => 'freelancer_plus_footer',
	   'label' => __('BG Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// footer heading color
	$wp_customize->add_setting('freelancer_plus_footer_headingcol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_footer_headingcol', array(
	   'settings' => 'freelancer_plus_footer_headingcol',
	   'section'   => 'freelancer_plus_footer',
	   'label' => __('Heading Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// footer text color
	$wp_customize->add_setting('freelancer_plus_footer_textcol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_footer_textcol', array(
	   'settings' => 'freelancer_plus_footer_textcol',
	   'section'   => 'freelancer_plus_footer',
	   'label' => __('Text Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// footer list color
	$wp_customize->add_setting('freelancer_plus_footer_listcol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_footer_listcol', array(
	   'settings' => 'freelancer_plus_footer_listcol',
	   'section'   => 'freelancer_plus_footer',
	   'label' => __('List Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// footer list color
	$wp_customize->add_setting('freelancer_plus_footer_listcol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_footer_listcol', array(
	   'settings' => 'freelancer_plus_footer_listcol',
	   'section'   => 'freelancer_plus_footer',
	   'label' => __('List Color', 'freelancer-plus'),
	   'type'      => 'color'
	));


	// footer listhover color
	$wp_customize->add_setting('freelancer_plus_footer_listhovercol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_footer_listhovercol', array(
	   'settings' => 'freelancer_plus_footer_listhovercol',
	   'section'   => 'freelancer_plus_footer',
	   'label' => __('List Hover Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// footer listborder color
	$wp_customize->add_setting('freelancer_plus_footer_listbordercol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_footer_listbordercol', array(
	   'settings' => 'freelancer_plus_footer_listbordercol',
	   'section'   => 'freelancer_plus_footer',
	   'label' => __('List Border Color', 'freelancer-plus'),
	   'type'      => 'color'
	));


	// footer coypright color
	$wp_customize->add_setting('freelancer_plus_footer_coyprightcol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_footer_coyprightcol', array(
	   'settings' => 'freelancer_plus_footer_coyprightcol',
	   'section'   => 'freelancer_plus_footer',
	   'label' => __('CopyRight Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// footer coyprighthover color
	$wp_customize->add_setting('freelancer_plus_footer_coyprighthovercol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_footer_coyprighthovercol', array(
	   'settings' => 'freelancer_plus_footer_coyprighthovercol',
	   'section'   => 'freelancer_plus_footer',
	   'label' => __('CopyRight Hover Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	// footer coyprightbg color
	$wp_customize->add_setting('freelancer_plus_footer_coyprightbgcol',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'freelancer_plus_footer_coyprightbgcol', array(
	   'settings' => 'freelancer_plus_footer_coyprightbgcol',
	   'section'   => 'freelancer_plus_footer',
	   'label' => __('CopyRight BG Color', 'freelancer-plus'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('freelancer_plus_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'freelancer_plus_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'freelancer_plus_scroll_hide',array(
        'label'          => __( 'Check To Show Scroll To Top', 'freelancer-plus' ),
        'section'        => 'freelancer_plus_footer',
        'settings'       => 'freelancer_plus_scroll_hide',
        'type'           => 'checkbox',
    )));

	// Google Fonts
    $wp_customize->add_section( 'freelancer_plus_google_fonts_section', array(
		'title'       => __( 'Google Fonts', 'freelancer-plus' ),
		'priority'    => 24,
	) );

	$font_choices = array(
		'' => 'select',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Abril Fatface' => 'Abril Fatface',
		'Acme' => 'Acme',
		'Anton' => 'Anton',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Architects Daughter' => 'Architects Daughter',
		'Arsenal' => 'Arsenal',
		'Alegreya' => 'Alegreya',
		'Alfa Slab One' => 'Alfa Slab One',
		'Averia Serif Libre' => 'Averia Serif Libre',
		'Bitter:400,700,400italic' => 'Bitter',
		'Bangers' => 'Bangers',
		'Boogaloo' => 'Boogaloo',
		'Bad Script' => 'Bad Script',
		'Bree Serif' => 'Bree Serif',
		'BenchNine' => 'BenchNine',
		'Cabin:400,700,400italic' => 'Cabin',
		'Cardo' => 'Cardo',
		'Courgette' => 'Courgette',
		'Cherry Swash' => 'Cherry Swash',
		'Cormorant Garamond' => 'Cormorant Garamond',
		'Crimson Text' => 'Crimson Text',
		'Cuprum' => 'Cuprum',
		'Cookie' => 'Cookie',
		'Chewy' => 'Chewy',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Droid Sans:400,700' => 'Droid Sans',
		'Days One' => 'Days One',
		'Dosis' => 'Dosis',
		'Emilys Candy:' => 'Emilys Candy',
		'Economica' => 'Economica',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Fredoka One' => 'Fredoka One',
		'Frank Ruhl Libre' => 'Frank Ruhl Libre',
		'Gloria Hallelujah' => 'Gloria Hallelujah',
		'Great Vibes' => 'Great Vibes',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Kaushan Script:' => 'Kaushan Script',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Montserrat:400,700' => 'Montserrat',
		'Oxygen:400,300,700' => 'Oxygen',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900' => 'Poppins',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Raleway:400,700' => 'Raleway',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'freelancer_plus_headings_fonts', array(
		'sanitize_callback' => 'freelancer_plus_sanitize_fonts',
	));
	$wp_customize->add_control( 'freelancer_plus_headings_fonts', array(
		'type' => 'select',
		'description' => __('Select your desired font for the headings.', 'freelancer-plus'),
		'section' => 'freelancer_plus_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'freelancer_plus_body_fonts', array(
		'sanitize_callback' => 'freelancer_plus_sanitize_fonts'
	));
	$wp_customize->add_control( 'freelancer_plus_body_fonts', array(
		'type' => 'select',
		'description' => __( 'Select your desired font for the body.', 'freelancer-plus' ),
		'section' => 'freelancer_plus_google_fonts_section',
		'choices' => $font_choices
	));
}
add_action( 'customize_register', 'freelancer_plus_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function freelancer_plus_customize_preview_js() {
	wp_enqueue_script( 'freelancer_plus_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'freelancer_plus_customize_preview_js' );


