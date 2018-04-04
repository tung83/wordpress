<?php
/**
 * 
 * Homepage Settings
 * 
 */

function maggie_lite_customize_homepage( $wp_customize ) {

    $wp_customize->add_panel(
        'homepage_option_panel',
        array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Homepage Settings', 'maggie-lite' ),            
            )
        );
    
    $wp_customize->add_section(
        'homepage_slider_option_section',
        array(
            'title' => __( 'Slider Settings', 'maggie-lite' ),
            'panel' => 'homepage_option_panel',            
            )
        );
    
    $wp_customize->add_setting(
        'homepage_option_slider',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );
    
    $wp_customize->add_control( new WP_Customize_maggie_lite_Category_dropdown( $wp_customize,
        'homepage_option_slider',
        array(
            'label' => __( 'Select Category', 'maggie-lite' ),
            'description' => __( 'Select a category for homepage slider.', 'maggie-lite' ),
            'section' => 'homepage_slider_option_section',
            )
        ) ); 
    
    
    $wp_customize->add_setting(
        'pager_option',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );
    
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'pager_option',
        array(
            'label' => __( 'Show Pager', 'maggie-lite' ),
            'description' => __( 'Hide or show the slider pager.', 'maggie-lite' ),
            'section' => 'homepage_slider_option_section',
            )
        ) );   
    
    $wp_customize->add_setting(
        'controls_option',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );
    
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'controls_option',
        array(
            'label' => __( 'Show Controls' , 'maggie-lite' ),
            'description' => __( 'Hide or show the slider controls.', 'maggie-lite' ),
            'section' => 'homepage_slider_option_section',
            )
        ) ); 
    
    $wp_customize->add_setting(
        'transition_option',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );
    
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'transition_option',
        array(
            'label' => __( 'Auto Transition', 'maggie-lite' ),
            'description' => __( 'On or off the slider auto transition.', 'maggie-lite' ),
            'section' => 'homepage_slider_option_section',
            )
        ) );    
    
    $wp_customize->add_setting(
        'title_option',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );
    
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'title_option',
        array(
            'label' => __( 'Show Title', 'maggie-lite' ),
            'description' => __( 'Show or hide slider`s Title/info.', 'maggie-lite' ),
            'section' => 'homepage_slider_option_section',
            )
        )
    );
    
    $wp_customize->add_setting(
        'slider_speed',
        array(
            'default' => '500',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );
    $wp_customize->add_control(
        'slider_speed',
        array(
            'label' => __( 'Speed of Slider', 'maggie-lite' ),
            'description' => __( 'Slide transition duration (in ms)', 'maggie-lite' ),
            'section' => 'homepage_slider_option_section',
            'type' => 'number',
            )
        );

    $wp_customize->add_setting(
        'slider_pause',
        array(
            'default' => '4000',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );
    $wp_customize->add_control(
        'slider_pause',
        array(
            'label' => __( 'Pause Time of Slider', 'maggie-lite' ),
            'description' => __( 'The amount of time (in ms) between each auto transition', 'maggie-lite' ),
            'section' => 'homepage_slider_option_section',
            'type' => 'number',
            )
        );

    $wp_customize->add_setting(
        'slider_type_option',
        array(
            'default' => 'single',
            'sanitize_callback' => 'maggie_lite_sanitize_slider_multiple',
            )
        );
    $wp_customize->add_control(
        'slider_type_option',
        array(
            'label' => __( 'Type of Slider', 'maggie-lite' ),
            'section' => 'homepage_slider_option_section',
            'type' => 'select',
            'choices' => array(
                'single' => __( 'Single Post Slider', 'maggie-lite' ),
                'multiple' => __( 'Multiple Post (3) Slider', 'maggie-lite' ),
                )
            )
        ); 

    /** Slider Ends */


    /** Main Featured Block */
    $wp_customize->add_section(
        'homepage_block_option_section_zero',
        array(
            'title' => __( 'Featured Block', 'maggie-lite' ),
            'panel' => 'homepage_option_panel',            
            )
        );

    $wp_customize->add_setting(
        'feature_post_zero',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control( new WP_Customize_maggie_lite_Category_dropdown( $wp_customize,
        'feature_post_zero',
        array(
            'label' => __( 'Featured Block', 'maggie-lite' ),
            'description' => __( 'Select a category for featured block in homepage', 'maggie-lite' ),
            'section' => 'homepage_block_option_section_zero',
            )
        ) );

    $wp_customize->add_setting(
        'feature_post_zero_placement',
        array(
            'default' => 'below',
            'sanitize_callback' => 'maggie_lite_sanitize_featured_placement',
            )
        );
    $wp_customize->add_control(
        'feature_post_zero_placement',
        array(
            'label' => __( 'Position of Featured Block', 'maggie-lite' ),
            'section' => 'homepage_block_option_section_zero',
            'type' => 'select',
            'choices' => array(
                'above' => __( 'Above Main Slider', 'maggie-lite' ),
                'replace' => __( 'Replace Main Slider', 'maggie-lite' ),
                'below' => __( 'Below Main Slider', 'maggie-lite' ),
                )
            )
        );  


    /**
     * 
     * Feature block homepage............
     * 
     */

    $wp_customize->add_section(
        'homepage_block_option_section_one',
        array(
            'title' => __( 'Blocks Section 1', 'maggie-lite' ),
            'panel' => 'homepage_option_panel',            
            )
        );

    $wp_customize->add_setting(
        'feature_post_one_title',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control( 'feature_post_one_title',
        array(
            'label' => __( 'Featured Block (First) Title', 'maggie-lite' ),
            'description' => __( 'Enter Title for first block in homepage', 'maggie-lite' ),
            'section' => 'homepage_block_option_section_one',
            )
        );

    $wp_customize->add_setting(
        'feature_post_one',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control( new WP_Customize_maggie_lite_Category_dropdown( $wp_customize,
        'feature_post_one',
        array(
            'label' => __( 'Featured Block (First)', 'maggie-lite' ),
            'description' => __( 'Select a category for first block in homepage', 'maggie-lite' ),
            'section' => 'homepage_block_option_section_one',
            )
        ) );


    $wp_customize->add_setting(
        'feature_post_one_count',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_number_posts',
            )
        );
    $select_option = array(
        '-1' => __( 'All Post', 'maggie-lite' ),
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        );
    $wp_customize->add_control(
        'feature_post_one_count',
        array(
            'label' => __( 'Number of posts', 'maggie-lite' ),
            'description' => __( 'Choose number of posts for block (first)', 'maggie-lite' ),
            'section' => 'homepage_block_option_section_one',
            'type' => 'select',
            'choices' => $select_option,
            )
        );  

    $wp_customize->add_section(
        'homepage_block_option_section_two',
        array(
            'title' => __( 'Blocks Section 2', 'maggie-lite' ),
            'panel' => 'homepage_option_panel',            
            )
        );

    $wp_customize->add_setting(
        'feature_post_two_title',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control( 'feature_post_two_title',
        array(
            'label' => __( 'Featured Block (Second) Title', 'maggie-lite' ),
            'description' => __( 'Enter Title for second block in homepage', 'maggie-lite' ),
            'section' => 'homepage_block_option_section_two',
            )
        );

    $wp_customize->add_setting(
        'feature_post_two',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control( new WP_Customize_maggie_lite_Category_dropdown( $wp_customize,
        'feature_post_two',
        array(
            'label' => __( 'Featured Block (Second)', 'maggie-lite' ),
            'description' => __( 'Select a category for second block in homepage', 'maggie-lite' ),
            'section' => 'homepage_block_option_section_two',
            )
        ) );


    $wp_customize->add_setting(
        'feature_post_two_count',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_number_posts',
            )
        );

    $wp_customize->add_control(
        'feature_post_two_count',
        array(
            'label' => __( 'Number of posts', 'maggie-lite' ),
            'description' => __( 'Choose number of posts for block (second)', 'maggie-lite' ),
            'section' => 'homepage_block_option_section_two',
            'type' => 'select',
            'choices' => $select_option,
            )
        );  

    $wp_customize->add_section(
        'homepage_block_three_option_section',
        array(
            'title' => __( 'Blocks Section 3', 'maggie-lite' ),
            'description' => __( 'Block below video Settings', 'maggie-lite' ),
            'panel' => 'homepage_option_panel',            
            )
        );

    $wp_customize->add_setting(
        'feature_post_three_title',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control( 'feature_post_three_title',
        array(
            'label' => __( 'Featured Block (Three) Title', 'maggie-lite' ),
            'description' => __( 'Enter Title for third block in homepage', 'maggie-lite' ),
            'section' => 'homepage_block_three_option_section',
            )
        );

    $wp_customize->add_setting(
        'feature_post_third_one',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control( new WP_Customize_maggie_lite_Category_dropdown( $wp_customize,
        'feature_post_third_one',
        array(
            'label' => __( 'Featured Block (Third) Category 1', 'maggie-lite' ),
            'description' => __( 'Select a category for third block in homepage', 'maggie-lite' ),
            'section' => 'homepage_block_three_option_section',
            )
        ) );

    $wp_customize->add_setting(
        'feature_post_three_title_two',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control( 'feature_post_three_title_two',
        array(
            'label' => __( 'Featured Block (Three) Title II', 'maggie-lite' ),
            'description' => __( 'Enter Title for third block second category in homepage', 'maggie-lite' ),
            'section' => 'homepage_block_three_option_section',
            )
        );

    $wp_customize->add_setting(
        'feature_post_third_two',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control( new WP_Customize_maggie_lite_Category_dropdown( $wp_customize,
        'feature_post_third_two',
        array(
            'label' => __( 'Featured Block (Third) Category 2', 'maggie-lite' ),
            'description' => __( 'Select a category for third block in homepage', 'maggie-lite' ),
            'section' => 'homepage_block_three_option_section',
            )
        ) );

    $wp_customize->add_setting(
        'feature_post_three_title_three',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control( 'feature_post_three_title_three',
        array(
            'label' => __( 'Featured Block (Three) Title III', 'maggie-lite' ),
            'description' => __( 'Enter Title for third block third category in homepage', 'maggie-lite' ),
            'section' => 'homepage_block_three_option_section',
            )
        );

    $wp_customize->add_setting(
        'feature_post_third_three',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control( new WP_Customize_maggie_lite_Category_dropdown( $wp_customize,
        'feature_post_third_three',
        array(
            'label' => __( 'Featured Block (Third) Category 3', 'maggie-lite' ),
            'description' => __( 'Select a category for third block in homepage', 'maggie-lite' ),
            'section' => 'homepage_block_three_option_section',
            )
        ) );

    $wp_customize->add_setting(
        'feature_post_three_title_four',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control( 'feature_post_three_title_four',
        array(
            'label' => __( 'Featured Block (Three) Title IV', 'maggie-lite' ),
            'description' => __( 'Enter Title for third block second category in homepage', 'maggie-lite' ),
            'section' => 'homepage_block_three_option_section',
            )
        );

    $wp_customize->add_setting(
        'feature_post_third_four',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control( new WP_Customize_maggie_lite_Category_dropdown( $wp_customize,
        'feature_post_third_four',
        array(
            'label' => __( 'Featured Block (Third) Category 4', 'maggie-lite' ),
            'description' => __( 'Select a category for third block in homepage', 'maggie-lite' ),
            'section' => 'homepage_block_three_option_section',
            )
        ) );


    $wp_customize->add_setting(
        'feature_post_third_count',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_number_posts',
            )
        );

    $wp_customize->add_control(
        'feature_post_third_count',
        array(
            'label' => __( 'Number of posts', 'maggie-lite' ),
            'description' => __( 'Choose number of posts for block (third)', 'maggie-lite' ),
            'section' => 'homepage_block_three_option_section',
            'type' => 'select',
            'choices' => $select_option,
            )
        );  

    $wp_customize->add_section(
        'homepage_block_option_section_four',
        array(
            'title' => __( 'Blocks Section 4', 'maggie-lite' ),
            'panel' => 'homepage_option_panel',            
            )
        );

    $wp_customize->add_setting(
        'feature_post_four_title',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control( 'feature_post_four_title',
        array(
            'label' => __( 'Featured Block (Four) Title', 'maggie-lite' ),
            'description' => __( 'Enter Title for fourth block in homepage', 'maggie-lite' ),
            'section' => 'homepage_block_option_section_four',
            )
        );

    $wp_customize->add_setting(
        'feature_post_fourth',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_text',
            )
        );

    $wp_customize->add_control( new WP_Customize_maggie_lite_Category_dropdown( $wp_customize,
        'feature_post_fourth',
        array(
            'label' => __( 'Featured Block (Fourth)', 'maggie-lite' ),
            'description' => __( 'Select a category for fourth block in homepage', 'maggie-lite' ),
            'section' => 'homepage_block_option_section_four',
            )
        ) );


    $wp_customize->add_setting(
        'feature_post_fourth_count',
        array(
            'sanitize_callback' => 'maggie_lite_sanitize_number_posts',
            )
        );

    $wp_customize->add_control(
        'feature_post_fourth_count',
        array(
            'label' => __( 'Number of posts', 'maggie-lite' ),
            'description' => __( 'Choose number of posts for block (fourth)', 'maggie-lite' ),
            'section' => 'homepage_block_option_section_four',
            'type' => 'select',
            'choices' => $select_option,
            )
        );
}
add_action( 'customize_register', 'maggie_lite_customize_homepage' );