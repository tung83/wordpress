<?php
/**
 * 
 * Misc Settings
 * 
 */

function maggie_lite_customize_misc( $wp_customize ) {

    $wp_customize->add_panel(
        'misc_option_panel',
        array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'description' => __( 'Notice: Adding a text as excerpt on post edit page (Excerpt box), will overwrite the theme excerpts', 'maggie-lite' ),
            'title' => __( 'MISC Settings', 'maggie-lite' ),            
            )
        );
    
    $wp_customize->add_section(
        'misc_option_section',
        array(
            'title' => __( 'Excerpts', 'maggie-lite' ),
            'panel' => 'misc_option_panel',            
            )
        );
    
    $wp_customize->add_setting(
        'misc_excerpts_type',
        array(
            'default' => '',
            'sanitize_callback' => 'maggie_lite_sanitize_excerpt_type',
            )
        );
    
    $wp_customize->add_control( 
        'misc_excerpts_type',
        array(
            'label' => __( 'Excerpts Type', 'maggie-lite' ),
            'description' => __( 'Define - type of excerpt for archives pages.', 'maggie-lite' ),
            'section' => 'misc_option_section',
            'type' => 'radio',
            'choices' => array(
                '' => __( 'On Words', 'maggie-lite' ),
                'letters' => __( 'On Letters', 'maggie-lite' ),
                )
            )
        );
    
    $wp_customize->add_setting(
        'misc_excerpts_length',
        array(
            'default' => '50',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );
    
    $wp_customize->add_control( 
        'misc_excerpts_length',
        array(
            'label' => __( 'Excerpts Length', 'maggie-lite' ),
            'description' => __( 'Define - Excerpt length of words/letters for archive pages.', 'maggie-lite' ),
            'section' => 'misc_option_section',
            'type' => 'text',
            )
        );

}
add_action( 'customize_register', 'maggie_lite_customize_misc' );