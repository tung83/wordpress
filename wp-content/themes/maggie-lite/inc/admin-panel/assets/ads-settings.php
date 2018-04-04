<?php
/**
 * 
 * Ad Settings
 * 
 */

function maggie_lite_customize_ads( $wp_customize ) {
    
    $wp_customize->add_panel(
        'ad_option_panel',
        array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Ads Settings', 'maggie-lite' ),            
            )
        );
    
    
    //homepage ads
    $wp_customize->add_section(
        'homepage_ad_section',
        array(
            'title' => __( 'Homepage Ads', 'maggie-lite' ),
            'panel' => 'ad_option_panel',            
            )
        );   
    
    $wp_customize->add_setting(
        'homepage_inline_ad_option',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );
    
    
    
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Ad_Option( $wp_customize,
        'homepage_inline_ad_option',
        array(
            'label' => __( 'Your Homepage Inline Ad', 'maggie-lite' ),
            'description' => '<div class="explain">'.
            __( 'Go to' , 'maggie-lite') .'<a href="'. esc_url(admin_url("/widgets.php")) . '" target="_blank">' . __( ' Widget Page' , 'maggie-lite' ).'</a>' 
            . __('to add Homepage Inline Ad' , 'maggie-lite' ) .'<br>'. __( 'Ads Size : 728x90px', 'maggie-lite').'<br>'. __( 'Sidebar Name: Homepage Inline Ad', 'maggie-lite' ). 
            '</div>',
            'section' => 'homepage_ad_section',
            )
        ) );    
    
    $wp_customize->add_setting(
        'homepage_sidebar_top_ad_option',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );
    
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Ad_Option( $wp_customize,
        'homepage_sidebar_top_ad_option',
        array(
            'label' => __( 'Your Homepage Sidebar Top Ad', 'maggie-lite' ),
            'description' => '<div class="explain">'.
            __( 'Go to' , 'maggie-lite') .'<a href="'. esc_url(admin_url("/widgets.php")) . '" target="_blank">' . __( ' Widget Page' , 'maggie-lite' ).'</a>' 
            . __('to add Homepage Sidebar Top Ad' , 'maggie-lite' ) .'<br>'. __( 'Ads Size : 300x250px', 'maggie-lite' ).'<br>'. __( 'Sidebar Name: Homepage Sidebar Top Ad', 'maggie-lite' ). 
            '</div>',
            'section' => 'homepage_ad_section',
            )
        ) );   
    
    $wp_customize->add_setting(
        'homepage_sidebar_middle_ad_option',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );
    
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Ad_Option( $wp_customize,
        'homepage_sidebar_middle_ad_option',
        array(
            'label' => __( 'Your Homepage Sidebar Middle Ad' , 'maggie-lite' ),
            'description' => '<div class="explain">'.
            __( 'Go to' , 'maggie-lite') .'<a href="'. esc_url(admin_url("/widgets.php")) . '" target="_blank">' . __( ' Widget Page' , 'maggie-lite' ).'</a>' 
            . __('to add Homepage Sidebar Middle Ad' , 'maggie-lite' ) .'<br>'. __( 'Ads Size : 300x250px', 'maggie-lite' ).'<br>'. __( 'Sidebar Name: Homepage Sidebar Middle Ad', 'maggie-lite' ). 
            '</div>',
            'section' => 'homepage_ad_section',
            )
        ) );   
}
add_action( 'customize_register', 'maggie_lite_customize_ads' );