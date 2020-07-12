<?php
/**
 * Raccoon Customize Color
 *
 * @package Raccoon
 */

if ( ! function_exists( 'raccoon_customize_color' ) ) {
	/**
	 * Add Customize Color
	 *
	 * @param object $wp_customize Customize Object.
	 * @return void
	 */
	function raccoon_customize_color( $wp_customize ) {

		// Site Color.
		$wp_customize->add_setting(
			'raccoon_colors_site',
			array(
				'sanitize_callback' => 'sanitize_hex_color',
				'default'           => '#9e9e9e',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_site',
				array(
					'label'    => __( 'Site Color', 'raccoon' ),
					'section'  => 'colors',
					'settings' => 'raccoon_colors_site',
					'priority' => 1,
				)
			)
		);

		// Accent Color.
		$wp_customize->add_setting(
			'raccoon_colors_accent',
			array(
				'sanitize_callback' => 'sanitize_hex_color',
				'default'           => '#9e9e9e',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_accent',
				array(
					'label'    => __( 'Accent Color', 'raccoon' ),
					'section'  => 'colors',
					'settings' => 'raccoon_colors_accent',
					'priority' => 2,
				)
			)
		);

		// Text Color.
		$wp_customize->add_setting(
			'raccoon_colors_site_text',
			array(
				'sanitize_callback' => 'sanitize_hex_color',
				'default'           => '#424242',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_site_text',
				array(
					'label'    => __( 'Text Color', 'raccoon' ),
					'section'  => 'colors',
					'settings' => 'raccoon_colors_site_text',
					'priority' => 3,
				)
			)
		);

		// Footer Background Color.
		$wp_customize->add_setting(
			'raccoon_colors_footer_background',
			array(
				'sanitize_callback' => 'sanitize_hex_color',
				'default'           => '#757575',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'raccoon_colors_footer_background',
				array(
					'label'    => __( 'Footer Background Color', 'raccoon' ),
					'section'  => 'colors',
					'settings' => 'raccoon_colors_footer_background',
					'priority' => 10,
				)
			)
		);
	}
}
add_action( 'customize_register', 'raccoon_customize_color' );
