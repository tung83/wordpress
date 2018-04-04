<?php
/**
 * 
 * Default Settings
 * 
 */

function maggie_lite_customize_default( $wp_customize ) {
    $wp_customize->add_panel( 
        'default_panel',
        array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Default Settings', 'maggie-lite' ),
            'description' => __( 'Default options provided by WordPress customizer.', 'maggie-lite' ),
            ) 
        );

    
    $wp_customize->get_section( 'title_tagline' )->panel         = 'default_panel';
    $wp_customize->get_section( 'colors' )->panel                = 'default_panel';
    $wp_customize->get_section( 'header_image' )->panel          = 'default_panel';
    $wp_customize->get_section( 'background_image' )->panel      = 'default_panel';
    $wp_customize->get_section( 'static_front_page' )->panel     = 'default_panel';   
    
    
    //Switch - Background image stretching
    $wp_customize->add_setting(
        'stretch_background',
        array(
           'default' => '',
           'sanitize_callback' => 'maggie_lite_sanitize_integer',
           )
        );
    
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize, 
        'stretch_background',
        array(
           'label' => __( 'Stretch Background' , 'maggie-lite' ),
           'section' => 'background_image',
           )
        ) );
    
    //WEBSITE LAYOUT
    $wp_customize->add_section(
        'website_layout_option_section',
        array(
            'title' => __( 'Layout Settings' , 'maggie-lite' ),
            'description' => __( 'Choose the website layout as full width or boxed.' , 'maggie-lite' ),
            'panel' => 'default_panel',
            )
        );
    
    $wp_customize->add_setting(
        'website_layout_option',
        array(
            'default' => 'fullwidth',
            'sanitize_callback' => 'maggie_lite_sanitize_radio_webpagelayout',
            )
        );
    
    $wp_customize->add_control(
        'website_layout_option',
        array(
            'label' => __( 'Choose website layout?', 'maggie-lite' ),
            'type' => 'radio',
            'section' => 'website_layout_option_section',
            'choices' => array(
                'fullwidth' => __( 'Fullwdth' , 'maggie-lite' ),
                'boxed' => __( 'Boxed', 'maggie-lite' ),
                ),
            )
        );
}
add_action( 'customize_register', 'maggie_lite_customize_default' );