<?php
/*
 * @package Freelaner Plus
 */

function freelancer_plus_admin_enqueue_scripts() {
	wp_enqueue_style( 'freelancer-plus-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'freelancer_plus_admin_enqueue_scripts' );

add_action('after_switch_theme', 'freelancer_plus_options');

function freelancer_plus_options () {
	global $pagenow;
	if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
		wp_redirect( admin_url( 'themes.php?page=freelancer-plus' ) );
		exit;
	}
}

// Footer Link
define('FREELANCER_PLUS_FOOTER_LINK',__('https://theclassictemplates.com/themes/free-freelancer-wordpress-theme/','freelancer-plus'));

function freelancer_plus_theme_info_menu_link() {

	$freelancer_plus_theme = wp_get_theme();
	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'freelancer-plus' ), $freelancer_plus_theme->display( 'Name' ), $freelancer_plus_theme->display( 'Version' ) ),
		esc_html__( 'Theme Info', 'freelancer-plus' ),'edit_theme_options','freelancer-plus','freelancer_plus_theme_info_page'
	);
}
add_action( 'admin_menu', 'freelancer_plus_theme_info_menu_link' );

function freelancer_plus_theme_info_page() {

	$freelancer_plus_theme = wp_get_theme();
	?>
<div class="wrap theme-info-wrap">
	<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'freelancer-plus' ), esc_html($freelancer_plus_theme->display( 'Name', 'freelancer-plus'  )),esc_html($freelancer_plus_theme->display( 'Version', 'freelancer-plus' ))); ?>
	</h1>
	<p class="theme-description">
	<?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'freelancer-plus' ); ?>
	</p>
	<hr>
	<div class="important-links clearfix">
		<p><strong><?php esc_html_e( 'Theme Links', 'freelancer-plus' ); ?>:</strong>
			<a href="<?php echo esc_url( FREELANCER_PLUS_THEME_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'freelancer-plus' ); ?></a>
			<a href="<?php echo esc_url( FREELANCER_PLUS_SUPPORT ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'freelancer-plus' ); ?></a>
			<a href="<?php echo esc_url( FREELANCER_PLUS_REVIEW ); ?>" target="_blank"><?php esc_html_e( 'Rate This Theme', 'freelancer-plus' ); ?></a>
			<a href="<?php echo esc_url( FREELANCER_PLUS_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'Premium Demo', 'freelancer-plus' ); ?></a>
			<a href="<?php echo esc_url( FREELANCER_PLUS_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Go To Premium', 'freelancer-plus' ); ?></a>
			<a href="<?php echo esc_url( FREELANCER_PLUS_THEME_DOCUMENTATION ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'freelancer-plus' ); ?></a>
		</p>
	</div>
	<hr>
	<div id="getting-started">
		<h3><?php printf( esc_html__( 'Getting started with %s', 'freelancer-plus' ),
		esc_html($freelancer_plus_theme->display( 'Name', 'freelancer-plus' ))); ?></h3>
		<div class="columns-wrapper clearfix">
			<div class="column column-half clearfix">
				<div class="section">
					<h4><?php esc_html_e( 'Theme Description', 'freelancer-plus' ); ?></h4>
					<div class="theme-description-1"><?php echo esc_html($freelancer_plus_theme->display( 'Description' )); ?></div>
				</div>
			</div>
			<div class="column column-half clearfix">
				<img src="<?php echo esc_url( $freelancer_plus_theme->get_screenshot() ); ?>" alt="" />
				<div class="section">
					<h4><?php esc_html_e( 'Theme Options', 'freelancer-plus' ); ?></h4>
					<p class="about">
					<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'freelancer-plus' ),esc_html($freelancer_plus_theme->display( 'Name', 'freelancer-plus' ))); ?></p>
					<p>
					<a target="_blank" href="<?php echo esc_url( wp_customize_url() ); ?>" class="button button-primary"><?php esc_html_e( 'Customize Theme', 'freelancer-plus' ); ?></a>
					<a href="<?php echo esc_url( FREELANCER_PLUS_PREMIUM_PAGE ); ?>" target="_blank" class="button button-secondary premium-btn"><?php esc_html_e( 'Checkout Premium', 'freelancer-plus' ); ?></a></p>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div id="theme-author">
	  <p><?php
		printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'freelancer-plus' ),
			esc_html($freelancer_plus_theme->display( 'Name', 'freelancer-plus' )),
			'<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'freelancer-plus' ) . '">classictemplate</a>',
			'<a target="_blank" href="' . esc_url( FREELANCER_PLUS_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'freelancer-plus' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'freelancer-plus' ) . '</a>'
		)
		?></p>
	</div>
</div>
<?php
}
