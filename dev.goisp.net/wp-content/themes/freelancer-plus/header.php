<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Freelancer Plus
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<?php if ( get_theme_mod('freelancer_plus_preloader', true) != "") { ?>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<?php }?>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'freelancer-plus' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'freelancer_plus_box_layout' ) ) { echo 'class="boxlayout"'; } ?>>

<?php if ( get_theme_mod('freelancer_plus_topbar', true) != "") { ?>
  <div class="top_header py-3">
    <div class="container">
      <div class="row m-0">
        <div class="col-lg-6 col-md-8 p-0 align-self-center">
          <div class="info-box">
            <?php if ( get_theme_mod('freelancer_plus_email_address') != "") { ?>
              <a class="mr-3" href="mailto:<?php echo esc_attr( get_theme_mod('freelancer_plus_email_address','') ); ?>"><i class="far fa-envelope mr-2"></i><?php echo esc_html(get_theme_mod ('freelancer_plus_email_address','')); ?></a>
            <?php }?>
            <?php if ( get_theme_mod('freelancer_plus_timming') != "") { ?>
              <span><i class="far fa-clock mr-2"></i><?php echo esc_html(get_theme_mod ('freelancer_plus_timming','')); ?></span>
            <?php }?>
          </div>
        </div>
        <div class="col-lg-6 col-md-4 align-self-center">
          <div class="social-icons text-center text-md-right text-lg-right">
            <?php if ( get_theme_mod('freelancer_plus_fb_link') != "") { ?>
              <a title="<?php echo esc_attr('facebook', 'freelancer-plus'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('freelancer_plus_fb_link')); ?>"><i class="fab fa-facebook-f"></i></a>
            <?php } ?>
            <?php if ( get_theme_mod('freelancer_plus_twitt_link') != "") { ?>
              <a title="<?php echo esc_attr('twitter', 'freelancer-plus'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('freelancer_plus_twitt_link')); ?>"><i class="fab fa-twitter ml-3"></i></a>
            <?php } ?>
            <?php if ( get_theme_mod('freelancer_plus_linked_link') != "") { ?>
              <a title="<?php echo esc_attr('linkedin', 'freelancer-plus'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('freelancer_plus_linked_link')); ?>"><i class="fab fa-linkedin-in ml-3"></i></a>
            <?php } ?>
            <?php if ( get_theme_mod('freelancer_plus_insta_link') != "") { ?>
              <a title="<?php echo esc_attr('instagram', 'freelancer-plus'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('freelancer_plus_insta_link')); ?>"><i class="fab fa-instagram ml-3"></i></a>
            <?php } ?>
            <?php if ( get_theme_mod('freelancer_plus_youtube_link') != "") { ?>
              <a title="<?php echo esc_attr('youtube', 'freelancer-plus'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('freelancer_plus_youtube_link')); ?>"><i class="fab fa-youtube ml-3"></i></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php }?>

<div class="py-3 border-bottom <?php echo esc_attr(freelancer_plus_sticky_menu()); ?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-5 col-12">
        <div class="logo">
          <?php freelancer_plus_the_custom_logo(); ?>
          <?php $freelancer_plus_blog_info = get_bloginfo( 'name' ); ?>
          <?php if ( ! empty( $freelancer_plus_blog_info ) ) : ?>
              <?php if ( get_theme_mod('freelancer_plus_title_enable',true) != "") { ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <?php else : ?>
                  <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
                <?php endif; ?>
              <?php } ?>
            <?php endif; ?>
            <?php $freelancer_plus_description = get_bloginfo( 'description', 'display' );
            if ( $freelancer_plus_description || is_customize_preview() ) : ?>
              <?php if ( get_theme_mod('freelancer_plus_tagline_enable',false) != "") { ?>
              <span class="site-description"><?php echo esc_html( $freelancer_plus_description ); ?></span>
              <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-6 col-md-3 col-4 align-self-center">
        <div class="toggle-nav">
          <?php if(has_nav_menu('primary')){ ?>
            <button role="tab"><?php esc_html_e('MENU','freelancer-plus'); ?></button>
          <?php }?>
        </div>
        <div id="mySidenav" class="nav sidenav">
          <nav id="site-navigation" class="main-nav my-2" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','freelancer-plus' ); ?>">
            <ul class="mobile_nav">
              <?php 
                wp_nav_menu( array( 
                  'theme_location' => 'primary',
                  'container_class' => 'main-menu' ,
                  'items_wrap' => '%3$s',
                  'fallback_cb' => 'wp_page_menu',
                ) ); 
               ?>
            </ul>
            <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE','freelancer-plus'); ?></a>
          </nav>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-8 align-self-center">
        <div class="phone_number text-center text-md-left text-lg-left py-2">
          <?php if ( get_theme_mod('freelancer_plus_phone_number') != "" || get_theme_mod('freelancer_plus_phone_text') != "") { ?>
            <div class="row">
              <div class="col-lg-2 col-md-2 text-center">
                <i class="fas fa-mobile-alt mb-3"></i>
              </div>
              <div class="col-lg-10 col-md-10">
                <a href="tel:<?php echo esc_url( get_theme_mod('freelancer_plus_phone_number','' )); ?>"><?php echo esc_html(get_theme_mod ('freelancer_plus_phone_number','')); ?></a>
                <p class="py-1"><?php echo esc_html(get_theme_mod ('freelancer_plus_phone_text','')); ?></p>
              </div>
            </div>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</div>
