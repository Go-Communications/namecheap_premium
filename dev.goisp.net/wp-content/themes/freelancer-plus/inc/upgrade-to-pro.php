<?php
/**
 * Upgrade to pro options
 */
function freelancer_plus_upgrade_pro_options( $wp_customize ) {

	$wp_customize->add_section(
		'upgrade_premium',
		array(
			'title'    => __( 'About Freelancer Plus', 'freelancer-plus' ),
			'priority' => 1,
		)
	);

	class Freelancer_Plus_Pro_Button_Customize_Control extends WP_Customize_Control {
		public $type = 'upgrade_premium';

		function render_content() {
			?>
			<div class="pro_info">
				<ul>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( FREELANCER_PLUS_THEME_PAGE ); ?>" target="_blank"><i class="dashicons dashicons-admin-appearance"></i><?php esc_html_e( 'Theme Page', 'freelancer-plus' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( FREELANCER_PLUS_SUPPORT ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-lightbulb"></i><?php esc_html_e( 'Support Forum', 'freelancer-plus' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( FREELANCER_PLUS_REVIEW ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-star-filled"></i><?php esc_html_e( 'Rate Us', 'freelancer-plus' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( FREELANCER_PLUS_PRO_DEMO ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-awards"></i><?php esc_html_e( 'Premium Demo', 'freelancer-plus' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( FREELANCER_PLUS_PREMIUM_PAGE ); ?>" target="_blank"><i class="dashicons dashicons-cart"></i><?php esc_html_e( 'Upgrade Pro', 'freelancer-plus' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( FREELANCER_PLUS_THEME_DOCUMENTATION ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-visibility"></i><?php esc_html_e( 'Theme Documentation', 'freelancer-plus' ); ?> </a></li>
					
				</ul>
			</div>
			<?php
		}
	}

	$wp_customize->add_setting(
		'pro_info_buttons',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'freelancer_plus_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new Freelancer_Plus_Pro_Button_Customize_Control(
			$wp_customize,
			'pro_info_buttons',
			array(
				'section' => 'upgrade_premium',
			)
		)
	);
}
add_action( 'customize_register', 'freelancer_plus_upgrade_pro_options' );
