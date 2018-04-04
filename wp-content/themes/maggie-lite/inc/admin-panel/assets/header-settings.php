<?php
/**
 * 
 * Header Settings
 * 
 */

function maggie_lite_customize_header( $wp_customize ) {
    $wp_customize->add_panel(
        'header_option_panel',
        array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Header Settings', 'maggie-lite' ),            
            )
        );
    
    $wp_customize->add_section(
        'header_option_section',
        array(
            'title' => __( 'Top Header Options' , 'maggie-lite' ),
            'panel' => 'header_option_panel',            
            )
        );
    
    $wp_customize->add_setting(
        'header_option',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer'
            )
        );
    
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'header_option',
        array(
            'label' => __( 'Top Header Setting' , 'maggie-lite' ),
            'description' => __( 'Hide or show the top header' , 'maggie-lite' ),
            'setting' => 'header_option',
            'section' => 'header_option_section',
            )
        ) );
    
    $wp_customize->add_setting(
        'header_top_option',
        array(
            'default' => '',
            'sanitize_callback' => 'maggie_lite_sanitize_integer'
            )
        );
    
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Menu_Dropdown( $wp_customize,
        'header_top_option',
        array(
            'label' => __( 'Choose Top Menu(left)' , 'maggie-lite' ),
            'description' => __( 'Select a menu for the header top left section, its optional menu.This will replace ticker.' , 'maggie-lite' ),
            'setting' => 'header_top_option',
            'section' => 'header_option_section',
            )
        ) );

    $wp_customize->add_setting(
        'maggie_ticker_setting',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer'
            )
        );
    
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,'maggie_ticker_setting',array(
        'label' => __( 'Maggie Ticker' , 'maggie-lite' ),
        'description' => __( 'Hide or show the ticker' , 'maggie-lite' ),
        'setting' => 'maggie_ticker_setting',
        'section' => 'header_option_section',
        ) ) );

    //ticker title
    $wp_customize->add_setting('maggie_ticker_title',array(
        'default'       =>      __('Latest News','maggie-lite'),
        'sanitize_callback'     =>  'maggie_lite_sanitize_text'
        ));
    $wp_customize->add_control('maggie_ticker_title',array(
        'section'       =>      'header_option_section',
        'label'         =>      __('Ticker Title', 'maggie-lite'),
        'type'          =>      'text'
        ));

    //select category for ticker
    $wp_customize->add_setting('ticker_setting_category',array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'maggie_lite_sanitize_text'
        ));

    $wp_customize->add_control( new WP_Customize_maggie_lite_Category_dropdown( $wp_customize,'ticker_setting_category', array(
        'label' => __('Select a category to show in ticker','maggie-lite'),
        'section' => 'header_option_section',
        )));

    $wp_customize->add_setting(
        'header_option_search',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer'
            )
        );
    
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'header_option_search',
        array(
            'label' => __( 'Top Header Search' , 'maggie-lite' ),
            'description' => __( 'Hide or show the top search' , 'maggie-lite' ),
            'setting' => 'header_option_search',
            'section' => 'header_option_section',
            )
        ) );
    
    //header ads section....
    $wp_customize->add_section(
        'ad_option_section',
        array(
            'title' => __( 'Header/Article Ads' , 'maggie-lite' ),
            'panel' => 'header_option_panel',            
            )
        );
    
    $wp_customize->add_setting(
        'header_ad_option',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );
    
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Ad_Option( $wp_customize,
        'header_ad_option',
        array(
            'label' => __( 'Your Header Ad' , 'maggie-lite' ),
            'description' => '<div class="explain"> '.__('Go to','maggie-lite').' <a href=" '. esc_url(admin_url("/widgets.php")) . '" target="_blank">'.__("Widget Page","maggie-lite").'</a> '.__('to add Header Ads','maggie-lite').' <br> '.__('Ads Size','maggie-lite').' : '.__('728x90px','maggie-lite').' <br> '.__('Sidebar Name','maggie-lite').': '.__('Header Ad','maggie-lite').'</div>',
        'section' => 'ad_option_section',
        )
        ) );     
    
    $wp_customize->add_setting(
        'article_ad_option',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );
    
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Ad_Option( $wp_customize,
        'article_ad_option',
        array(
            'label' => __( 'Your Article Ad' , 'maggie-lite' ),
            'description' => '<div class="explain"> '.__('Go to','maggie-lite').' <a href=" '. esc_url(admin_url("/widgets.php")) . '" target="_blank">'.__("Widget Page","maggie-lite").'</a> '.__('to add Article Ads','maggie-lite').' <br> '.__('Ads Size','maggie-lite').' : '.__('728x90px','maggie-lite').' <br> '.__('Sidebar Name','maggie-lite').': '.__('Article Ad','maggie-lite').'</div>',
        'section' => 'ad_option_section',
        )
        ) );  
    
}
add_action( 'customize_register', 'maggie_lite_customize_header' );