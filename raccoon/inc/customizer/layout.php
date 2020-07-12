<?php
/**
 * Raccoon Customize Layout
 *
 * @package Raccoon
 */

if ( ! function_exists( 'raccoon_customize_layout' ) ) {
	/**
	 * Add Customize Layout
	 *
	 * @param object $wp_customize Customize Object.
	 * @return void
	 */
	function raccoon_customize_layout( $wp_customize ) {

		$wp_customize->add_panel(
			'raccoon_layout',
			array(
				'title'    => __( 'Layout', 'raccoon' ),
				'priority' => 35,
			)
		);

		/* Site */
		$wp_customize->add_section(
			'raccoon_layout_all',
			array(
				'title'    => __( 'Site', 'raccoon' ),
				'panel'    => 'raccoon_layout',
				'priority' => 1,
			)
		);

		$wp_customize->add_setting(
			'raccoon_layout_all_radio',
			array(
				'default'           => 'two-right',
				'sanitize_callback' => 'raccoon_sanitize_select',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'raccoon_layout_all_radio',
				array(
					'label'    => __( 'Select Column', 'raccoon' ),
					'section'  => 'raccoon_layout_all',
					'settings' => 'raccoon_layout_all_radio',
					'priority' => 1,
					'type'     => 'radio',
					'choices'  => array(
						'one'       => __( 'One Column', 'raccoon' ),
						'two-right' => __( 'Two Column(Side Right)', 'raccoon' ),
						'two-left'  => __( 'Two Column(Side Left)', 'raccoon' ),
					),
				)
			)
		);

		/* Archive */
		$wp_customize->add_section(
			'raccoon_layout_archive',
			array(
				'title'    => __( 'Archive', 'raccoon' ),
				'panel'    => 'raccoon_layout',
				'priority' => 3,
			)
		);

		$wp_customize->add_setting(
			'raccoon_layout_archive_check',
			array(
				'default' => 'horizon',
				array( 'sanitize_callback' => 'raccoon_sanitize_checkbox' ),
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'raccoon_layout_archive_check',
				array(
					'label'    => __( 'Archive Layout', 'raccoon' ),
					'section'  => 'raccoon_layout_archive',
					'settings' => 'raccoon_layout_archive_check',
					'priority' => 1,
					'type'     => 'radio',
					'choices'  => array(
						'horizon'  => __( 'Horizon', 'raccoon' ),
						'vertical' => __( 'Vertical', 'raccoon' ),
					),
				)
			)
		);

		/* Article */
		$wp_customize->add_section(
			'raccoon_layout_page',
			array(
				'title'    => __( 'Article', 'raccoon' ),
				'panel'    => 'raccoon_layout',
				'priority' => 3,
			)
		);
	}
}
add_action( 'customize_register', 'raccoon_customize_layout' );
