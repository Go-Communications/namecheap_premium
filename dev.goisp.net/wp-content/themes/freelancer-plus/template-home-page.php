<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Freelancer Plus
 */

get_header(); ?>

<div id="content">
  <?php
    $freelancer_plus_hidcatslide = get_theme_mod('freelancer_plus_hide_categorysec', true);
    if( $freelancer_plus_hidcatslide != ''){
  ?>
    <section id="catsliderarea">
      <div class="catwrapslider">
        <div class="owl-carousel">
          <?php if( get_theme_mod('freelancer_plus_slidersection',false) ) { ?>
          <?php $freelancer_plus_queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('freelancer_plus_slidersection',true)));
            while( $freelancer_plus_queryvar->have_posts() ) : $freelancer_plus_queryvar->the_post(); ?>
              <div class="slidesection">
                <?php
                  if (has_post_thumbnail()) {
                      the_post_thumbnail('full');
                  } else {
                      echo '<div class="slider-img-color"></div>';
                  }
                ?>
                <div class="slider-box">
                  <h1><?php the_title(); ?></h1>
                  <?php
                    $freelancer_plus_trimexcerpt = get_the_excerpt();
                    $freelancer_plus_shortexcerpt = wp_trim_words( $freelancer_plus_trimexcerpt, $freelancer_plus_num_words = 15 );
                    echo '<p class="mt-4">' . esc_html( $freelancer_plus_shortexcerpt ) . '</p>';
                  ?>
                  <?php if ( get_theme_mod('freelancer_plus_button_text', 'Contact') != "") { ?>
                    <div class="slide-btn mt-5">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('freelancer_plus_button_text',__('Contact','freelancer-plus'))); ?><i class="fas fa-long-arrow-alt-right ml-2"></i></a>
                    </div>
                  <?php }?>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
      <div class="clear"></div>
    </section>
  <?php } ?>

  <?php
    $freelancer_plus_hidepageboxes = get_theme_mod('freelancer_plus_disabled_pgboxes', true);
    if( $freelancer_plus_hidepageboxes != ''){
  ?>
  <section id="serives_box" class="py-4">
    <div class="container">
      <h2 class="text-center mb-2"><?php echo esc_html(get_theme_mod('freelancer_plus_main_title','')); ?></h2>
      <p class="main_text text-center w-50 mx-auto"><?php echo esc_html(get_theme_mod('freelancer_plus_main_text','')); ?></p>
      <div class="mt-5">
        <div class="row">
          <?php if( get_theme_mod('freelancer_plus_services_cat',false) ) { ?>
            <?php $freelancer_plus_queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('freelancer_plus_services_cat',true)));
              while( $freelancer_plus_queryvar->have_posts() ) : $freelancer_plus_queryvar->the_post(); ?>
                <div class="col-lg-4 col-md-6">
                  <div class="services_inner_box text-center p-4">
                    <?php the_post_thumbnail( 'full' ); ?>
                    <h3 class="pt-4 pb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php
                      $freelancer_plus_trimexcerpt = get_the_excerpt();
                      $freelancer_plus_shortexcerpt = wp_trim_words( $freelancer_plus_trimexcerpt, $freelancer_plus_num_words = 15 );
                      echo '<p class="mb-3">' . esc_html( $freelancer_plus_shortexcerpt ) . '</p>';
                    ?>
                  </div>
                </div>
              <?php endwhile; wp_reset_postdata(); ?>
            <?php } ?>
          <?php }?>
        </div>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>
