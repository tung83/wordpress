<?php
/**
 * 
 * Footer Settings
 * 
 */

function maggie_lite_customize_footer( $wp_customize ) {

    $wp_customize->add_panel(
        'footer_option_panel',
        array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Footer Settings', 'maggie-lite' ),            
            )
        );

    $wp_customize->add_section(
        'footer_option_section',
        array(
            'title' => __( 'Footer Settings', 'maggie-lite' ),
            'panel' => 'footer_option_panel',            
            )
        );

    $wp_customize->add_setting(
        'footer_option_widget',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );

    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'footer_option_widget',
        array(
            'label' => __( 'Footer Widget Option', 'maggie-lite' ),
            'setting' => 'footer_option_widget',
            'description' => __( 'Hide or show the footer widget area.', 'maggie-lite' ),
            'section' => 'footer_option_section',
            )
        ) );

    $wp_customize->add_setting(
        'footer_layout_option',
        array(
            'default' => 'column4',
            'sanitize_callback' => 'maggie_lite_sanitize_footer_layouts',
            )
        );

    $imagepath = get_template_directory_uri() . '/inc/images/footers/' ;
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Image_Radio( $wp_customize,
        'footer_layout_option',
        array(
            'label' => __( 'Footer Layout', 'maggie-lite' ),
            'setting' => 'footer_layout_option',
            'description' => __( 'Hide or show the footer widget area.', 'maggie-lite' ),
            'section' => 'footer_option_section',
            'choices' => array(
                'column4' => $imagepath . 'footer-4.png',
                'column3' => $imagepath . 'footer-3.png',
                'column2' => $imagepath . 'footer-2.png',
                'column1' => $imagepath . 'footer-1.png',
                ),

            )
        ) );

    //Sub-footer section
    $wp_customize->add_section(
        'sub_footer_option_section',
        array(
            'title' => __( 'Sub Footer Settings', 'maggie-lite' ),
            'panel' => 'footer_option_panel',            
            )
        );

    $wp_customize->add_setting(
        'sub_footer_option',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );

    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'sub_footer_option',
        array(
            'label' => __( 'Sub Footer Option', 'maggie-lite' ),
            'setting' => 'sub_footer_option',
            'description' => __( 'Hide or show copy right.', 'maggie-lite' ),
            'section' => 'sub_footer_option_section',
            )
        ) );


    $wp_customize->add_setting(
        'copyright_text',
        array(
            'default' => '',
            'transport' => 'postMessage',
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control(
        'copyright_text',
        array(
            'label' => __( 'Copyright Text', 'maggie-lite' ),
            'setting' => 'copyright_text',
            'description' => __( 'Set footer copyright text.', 'maggie-lite' ),
            'section' => 'sub_footer_option_section',
            'type' => 'text',
            )
        );


    $wp_customize->add_setting(
        'copyright_option',
        array(
            'default' => '0',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );

    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'copyright_option',
        array(
            'label' => __( 'Copyright Option', 'maggie-lite' ),
            'setting' => 'copyright_option',
            'description' => __( 'Hide or show copy right.', 'maggie-lite' ),
            'section' => 'sub_footer_option_section',
            )
        ) );

}
add_action( 'customize_register', 'maggie_lite_customize_footer' );