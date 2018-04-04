<?php
/**
 * 
 * Theme Settings
 * 
 */

function maggie_lite_customize_theme( $wp_customize ) {

	$wp_customize->add_section(
		'theme_option_panel',
		array(
			'priority' => 01,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Theme Settings', 'maggie-lite' ),            
			)
		);

	$wp_customize->add_setting(
		'theme_option_setting',
		array(
			'default' => 'dark',
			'sanitize_callback' => 'maggie_lite_sanitize_theme_setting',
			)
		);

	$wp_customize->add_control( 
		'theme_option_setting',
		array(
			'label' => __( 'Choose Theme Base', 'maggie-lite' ),
			'description' => __( 'Choose dark or light theme base','maggie-lite' ),
			'section' => 'theme_option_panel',
			'type' => 'radio',
			'choices' => array(
				'dark' => __( 'Dark Theme', 'maggie-lite' ),
				'light' => __( 'Light Theme', 'maggie-lite' ),
				)
			)
		);


}
add_action( 'customize_register', 'maggie_lite_customize_theme' );