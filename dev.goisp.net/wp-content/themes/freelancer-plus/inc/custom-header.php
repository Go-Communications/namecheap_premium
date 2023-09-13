<?php
/**
 * @package Freelancer Plus
 * Setup the WordPress core custom header feature.
 *
 * @uses freelancer_plus_header_style()
 */
function freelancer_plus_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'freelancer_plus_custom_header_args', array(		
		'default-text-color'     => 'fff',
		'width'                  => 2500,
		'height'                 => 280,
		'wp-head-callback'       => 'freelancer_plus_header_style',		
	) ) );
}
add_action( 'after_setup_theme', 'freelancer_plus_custom_header_setup' );

if ( ! function_exists( 'freelancer_plus_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see freelancer_plus_custom_header_setup().
 */
function freelancer_plus_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		.border-bottom {
			background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat;
			background-position: center top;
			background-size:cover;
		}
	<?php endif; ?>



	h1.site-title a {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_sitetitle_col')); ?>;
	}

	span.site-description {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_sitetagline_col')); ?>;
	}







	.top_header {
		background: <?php echo esc_attr(get_theme_mod('freelancer_plus_topheaderbg_col')); ?>;
	}

	.top_header .info-box .fa-envelope {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_topheaderemail_col')); ?>;
	}

	.top_header .info-box .mr-3 {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_topheaderemailtxt_col')); ?>;
	}

	.top_header .info-box .fa-clock {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_topheadertime_col')); ?>;
	}

	.top_header .info-box span {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_topheadertimetxt_col')); ?>;
	}

	.border-bottom {
		background: <?php echo esc_attr(get_theme_mod('freelancer_plus_bottomheaderbg_col')); ?>;
	}

	.main-nav a {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_bottomheadermenus_col')); ?>;
	}

	.main-nav a:hover {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_bottomheadermenushover_col')); ?>;
	}

	.main-nav ul ul {
		background: <?php echo esc_attr(get_theme_mod('freelancer_plus_bottomheadersubmenusbg_col')); ?>;
	}

	.main-nav ul ul a {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_bottomheadersubmenus_col')); ?>;
	}

	.main-nav ul ul a:hover {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_bottomheadersubmenushover_col')); ?>;
	}

	.phone_number i {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_bottomheaderphnicon_col')); ?>;
	}

	.phone_number a {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_bottomheaderphnno_col')); ?>;
	}

	.phone_number p {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_bottomheaderphntxt_col')); ?>;
	}









	.social-icons .fa-facebook-f {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_facebook_col')); ?>;
	}

	.social-icons .fa-twitter {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_twitter_col')); ?>;
	}

	.social-icons .fa-linkedin-in {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_linkdin_col')); ?>;
	}

	.social-icons .fa-instagram {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_instagram_col')); ?>;
	}

	.social-icons .fa-youtube {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_youtube_col')); ?>;
	}

	.social-icons a i:hover {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_iconhover_col')); ?>;
	}




	.slider-box h1 {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_slider_titlecol')); ?> !important;
	}

	.slider-box p {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_slider_descriptioncol')); ?>;
	}

	.slide-btn a {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_slider_btntextcol')); ?>;
	}

	.slide-btn a {
		background: <?php echo esc_attr(get_theme_mod('freelancer_plus_slider_btnbgcol')); ?>;
	}

	.slide-btn a:hover {
		background: <?php echo esc_attr(get_theme_mod('freelancer_plus_slider_btnbghrvcol')); ?>;
	}

	.slide-btn a:hover {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_slider_btntexthrvcol')); ?>;
	}

	.slidesection {
		background-image: linear-gradient(to right, <?php echo esc_attr(get_theme_mod('freelancer_plus_slider_opacity1col')); ?> , <?php echo esc_attr(get_theme_mod('freelancer_plus_slider_opacity2col')); ?>);
	}

	.catwrapslider .owl-prev, .catwrapslider .owl-next {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_slider_arrowcol')); ?>;
	}
	.owl-prev, .owl-next {
		border-color: <?php echo esc_attr(get_theme_mod('freelancer_plus_slider_arrowcol')); ?>;
	}

	.catwrapslider .owl-prev:hover, .catwrapslider .owl-next:hover {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_slider_arrowhovercol')); ?>;
	}

	.owl-prev:hover, .owl-next:hover {
		border-color: <?php echo esc_attr(get_theme_mod('freelancer_plus_slider_arrowhovercol')); ?> !important;
	}



	#serives_box h2 {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_service_headingcol')); ?>;
	}

	#serives_box p.main_text {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_service_subheadingcol')); ?>;
	}

	#serives_box .services_inner_box {
		background: <?php echo esc_attr(get_theme_mod('freelancer_plus_service_boxbgcol')); ?>;
	}

	.services_inner_box h3 a {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_service_titlecol')); ?>;
	}

	.services_inner_box p {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_service_descriptioncol')); ?>;
	}





	#footer {
		background: <?php echo esc_attr(get_theme_mod('freelancer_plus_footer_bgcol')); ?>;
	}

	#footer h1, #footer h2,#footer h3,#footer h4,#footer h5,#footer h6{
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_footer_headingcol')); ?>;
	}

	.ftr-4-box p {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_footer_textcol')); ?>;
	}


	.ftr-4-box ul li a {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_footer_listcol')); ?>;
	}

	.ftr-4-box ul li a:hover {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_footer_listhovercol')); ?>;
	}

	.ftr-4-box ul li {
		border-color: <?php echo esc_attr(get_theme_mod('freelancer_plus_footer_listbordercol')); ?>;
	}

	.copywrap {
		background: <?php echo esc_attr(get_theme_mod('freelancer_plus_footer_coyprightbgcol')); ?>;
	}
	
	.copywrap a{
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_footer_coyprightcol')); ?>;
	}

	.copywrap a:hover {
		color: <?php echo esc_attr(get_theme_mod('freelancer_plus_footer_coyprighthovercol')); ?>;
	}

	





	</style>
	<?php 
}
endif;