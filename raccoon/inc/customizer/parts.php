<?php
/**
 * Raccoon Customizer Parts
 */

if ( ! function_exists( 'raccoon_customize_parts' ) ) {

	/**
	 * Add Customizer Layout
	 *
	 * @param object $wp_customize Customizer Object.
	 * @return void
	 */
	function raccoon_customize_parts( $wp_customize ) {

		// Single.
		$wp_customize->add_panel(
			'raccoon_parts',
			array(
				'priority' => 55,
				'title'    => __( 'Single', 'raccoon' ),
			)
		);

		// Contents.
		$wp_customize->add_section(
			'raccoon_parts_content',
			array(
				'title'    => __( 'Contents', 'raccoon' ),
				'panel'    => 'raccoon_parts',
				'priority' => 10,
			)
		);
		$wp_customize->add_setting(
			'raccoon_parts_heading_select',
			array(
				'default' => 'heading00',
				array( 'sanitize_callback' => 'raccoon_sanitize_select' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'raccoon_parts_heading_select',
				array(
					'label'    => __( 'Heading Pattern', 'raccoon' ),
					'section'  => 'raccoon_parts_content',
					'settings' => 'raccoon_parts_heading_select',
					'priority' => 1,
					'type'     => 'select',
					'choices'  => array(
						'heading00' => __( 'Default', 'raccoon' ),
						'heading01' => __( 'Pattern01', 'raccoon' ),
					),
				)
			)
		);

		// Related Posts.
		$wp_customize->add_section(
			'raccoon_parts_relation',
			array(
				'title'    => __( 'Related Posts', 'raccoon' ),
				'panel'    => 'raccoon_parts',
				'priority' => 30,
			)
		);

		// Checkbox.
		$wp_customize->add_setting(
			'raccoon_parts_relation_check',
			array(
				'default' => false,
				array( 'sanitize_callback' => 'raccoon_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'raccoon_parts_relation_check',
				array(
					'label'    => __( 'Enable to Display', 'raccoon' ),
					'section'  => 'raccoon_parts_relation',
					'settings' => 'raccoon_parts_relation_check',
					'type'     => 'checkbox',
				)
			)
		);
	}
}
add_action( 'customize_register', 'raccoon_customize_parts' );
