<?php
/**
 * Raccoon Customize Performance
 *
 * @package Raccoon
 */

if ( ! function_exists( 'raccoon_customize_performance' ) ) {

	/**
	 * Add Customize Performance
	 *
	 * @param object $wp_customize Customize Object.
	 * @return void
	 */
	function raccoon_customize_performance( $wp_customize ) {

		// Performance.
		$wp_customize->add_panel(
			'raccoon_performance',
			array(
				'priority' => 55,
				'title'    => __( 'Performance', 'raccoon' ),
			)
		);

		// CSS Inline.
		$wp_customize->add_section(
			'raccoon_performance_inline',
			array(
				'title'    => __( 'CSS Inline', 'raccoon' ),
				'panel'    => 'raccoon_performance',
				'priority' => 10,
			)
		);
		// Checkbox.
		$wp_customize->add_setting(
			'raccoon_performance_inline_check',
			array(
				'default' => false,
				array( 'sanitize_callback' => 'raccoon_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'raccoon_performance_inline_check',
				array(
					'label'    => __( 'Enable to CSS Inline', 'raccoon' ),
					'section'  => 'raccoon_performance_inline',
					'settings' => 'raccoon_performance_inline_check',
					'type'     => 'checkbox',
				)
			)
		);
	}
}
add_action( 'customize_register', 'raccoon_customize_performance' );
