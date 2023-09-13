<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Freelancer Plus
 */
?>
<div id="footer">
	<div class="container">
    <?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>
    <?php endif; // end footer widget area ?>
              
    <?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>
    <?php endif; // end footer widget area ?>
  
    <?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>
    <?php endif; // end footer widget area ?>
    
    <?php if ( ! dynamic_sidebar( 'footer-4' ) ) : ?>
    <?php endif; // end footer widget area ?>
    <div class="clear"></div>
  </div>
  <div class="copywrap text-center">
    <div class="container">
      <p><a href="<?php echo esc_html(get_theme_mod('freelancer_plus_copyright_link',__('https://www.theclassictemplates.com/themes/free-freelancer-wordpress-theme/','freelancer-plus'))); ?>" target="_blank"><?php echo esc_html(get_theme_mod('freelancer_plus_copyright_line',__('Freelancer WordPress Theme','freelancer-plus'))); ?></a> <?php echo esc_html('By Classic Templates','freelancer-plus'); ?></p>
    </div>
  </div>
</div>

<?php if(get_theme_mod('freelancer_plus_scroll_hide',false)){ ?>
 <a id="button"><?php esc_html_e('TOP', 'freelancer-plus'); ?></a>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>