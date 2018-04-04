<?php
/**
 * 
 * Post Settings
 * 
 */

function maggie_lite_customize_post( $wp_customize ) {

    $wp_customize->add_panel(
        'post_option_panel',
        array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Post Settings', 'maggie-lite' ),            
            )
        );

    $wp_customize->add_section(
        'post_option_settings',
        array(
            'title' => __( 'Additional Settings', 'maggie-lite' ),
            'panel' => 'post_option_panel',            
            )
        );

    $wp_customize->add_setting(
        'post_option_date',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );

    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'post_option_date',
        array(
            'label' => __( 'Show Date', 'maggie-lite' ),
            'description' => __( 'Enable or disable the post date.', 'maggie-lite' ),
            'section' => 'post_option_settings',
            )
        ) ); 

    $wp_customize->add_setting(
        'post_option_comment',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );

    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'post_option_comment',
        array(
            'label' => __( 'Show Comment Count', 'maggie-lite' ),
            'description' => __( 'Enable or disable comment number.', 'maggie-lite' ),
            'section' => 'post_option_settings',
            )
        ) );  

    $wp_customize->add_setting(
        'post_option_author',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );

    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'post_option_author',
        array(
            'label' => __( 'Show Author Under Title', 'maggie-lite' ),
            'description' => __( 'Show or hide the author under the post title.', 'maggie-lite' ),
            'section' => 'post_option_settings',
            )
        ) );  

    $wp_customize->add_setting(
        'post_option_tag',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );

    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'post_option_tag',
        array(
            'label' => __( 'Show Tags on Site', 'maggie-lite' ),
            'description' => __( 'Enable or disable the post tags.', 'maggie-lite' ),
            'section' => 'post_option_settings',
            )
        ) );  

    $wp_customize->add_setting(
        'post_option_author_box',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );

    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'post_option_author_box',
        array(
            'label' => __( 'Show Author Box', 'maggie-lite' ),
            'description' => __( 'Enable or disable the author box.', 'maggie-lite' ),
            'section' => 'post_option_settings',
            )
        ) );  

    $wp_customize->add_setting(
        'post_option_nav_post',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );

    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'post_option_nav_post',
        array(
            'label' => __( 'Show Navigation in Posts', 'maggie-lite' ),
            'description' => __( 'Show or hide `next` and `previous` posts.', 'maggie-lite' ),
            'section' => 'post_option_settings',
            )
        ) ); 

    //Post Layout Settings................
    $wp_customize->add_section(
        'post_layout_section',
        array(
            'title' => __( 'Post Layout', 'maggie-lite' ),
            'panel' => 'post_option_panel',            
            )
        );

    $wp_customize->add_setting(
        'post_option_default',
        array(
            'default' => 'default-template',
            'sanitize_callback' => 'maggie_lite_sanitize_template_type',
            )
        );

    $imagepath = get_template_directory_uri() . '/inc/images/post_template/' ;
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Image_Radio( $wp_customize,
        'post_option_default',
        array(
            'label' => __( 'Default Post Template', 'maggie-lite' ),
            'description' => __( "Setting this option will make all post pages, that don't have a post template associated to them, to be displayed using this template. This option is OVERWRITTEN by the `Post template` option from the backend - post add / edit page.", 'maggie-lite' ),
            'section' => 'post_layout_section',
            'choices' => array(
                'default-template' => $imagepath . 'post-templates-icons-0.png',
                'style1-template' => $imagepath . 'post-templates-icons-1.png',
                ),

            )
        ) );


    $wp_customize->add_setting(
        'post_option_sidebar',
        array(
            'default' => 'right-sidebar',
            'sanitize_callback' => 'maggie_lite_sanitize_sidebar_type',
            )
        );

    $imagepath = get_template_directory_uri() . '/inc/images/' ;
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Image_Radio( $wp_customize,
        'post_option_sidebar',
        array(
            'label' => __( 'Default Post Sidebar', 'maggie-lite' ),
            'description' => __( "Setting this option will make all post pages, that don't have a post sidebar associated to them, to be displayed using this sidebar. This option is OVERWRITTEN by the `Post sidebar` option from the backend - post add / edit page.", 'maggie-lite' ),
            'section' => 'post_layout_section',
            'choices' => array(
                'right-sidebar' => $imagepath . 'right-sidebar.png',
                'left-sidebar' => $imagepath . 'left-sidebar.png',
                'no-sidebar' => $imagepath . 'no-sidebar.png',
                ),

            )
        ) );


    //Breadcrumbs options............
    $wp_customize->add_section(
        'breadcrumbs_section',
        array(
            'title' => 'Breadcrumbs',
            'panel' => 'post_option_panel',            
            )
        );

    $wp_customize->add_setting(
        'breadcrumbs_option',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );

    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'breadcrumbs_option',
        array(
            'label' => __( 'Show/Hide Breadcrumb', 'maggie-lite' ),
            'description' => __(  'Show or hide breadcrumbs on site.', 'maggie-lite' ),
            'section' => 'breadcrumbs_section',
            )
        ) );

    $wp_customize->add_setting(
        'home_link_option',
        array(
            'default' => '',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );

    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'home_link_option',
        array(
            'label' => __( 'Enable link on Home', 'maggie-lite' ),
            'description' => __( 'Enable or disable homepage link at home in breadcrumbs.', 'maggie-lite' ),
            'section' => 'breadcrumbs_section',
            )
        ) ); 


    $wp_customize->add_setting(
        'singlepost_title_option',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );

    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'singlepost_title_option',
        array(
            'label' => __( 'Enable Title on Single post', 'maggie-lite' ),
            'description' => __( 'Show or hide article title on single post.', 'maggie-lite' ),
            'section' => 'breadcrumbs_section',
            )
        ) ); 


    //Feature Image............
    $wp_customize->add_section(
        'feature_image_section',
        array(
            'title' => __( 'Feature Images', 'maggie-lite' ),
            'panel' => 'post_option_panel',            
            )
        );

    $wp_customize->add_setting(
        'feature_image_option',
        array(
            'default' => '1',
            'sanitize_callback' => 'maggie_lite_sanitize_integer',
            )
        );

    $wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option( $wp_customize,
        'feature_image_option',
        array(
            'label' => __( 'Show Featured Image', 'maggie-lite' ),
            'description' => __( 'Show or hide featured image in post`s single page.', 'maggie-lite' ),
            'section' => 'feature_image_section',
            )
        ) );


    //Archive layout settings....

    $wp_customize->add_panel(
        'archive_option_panel',
        array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Archive Settings', 'maggie-lite' ),            
            )
        );

    $wp_customize->add_section(
        'archive_option_section',
        array(
            'title' => __( 'Archive Style', 'maggie-lite' ),
            'panel' => 'archive_option_panel',            
            )
        );

    $wp_customize->add_setting(
        'archive_page_option',
        array(
            'default' => 'default-template',
            'sanitize_callback' => 'maggie_lite_sanitize_template_type',
            )
        );

    $imagepath = get_template_directory_uri() . '/inc/images/post_template/' ;
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Image_Radio( $wp_customize,
        'archive_page_option',
        array(
            'label' => __( 'Archive page template', 'maggie-lite' ),
            'description' => __( "Define - Choose template for all archive pages", 'maggie-lite' ),
            'section' => 'archive_option_section',
            'choices' => array(
                'default-template' => $imagepath . 'post-templates-icons-0.png',
                'style1-template' => $imagepath . 'post-templates-icons-1.png',
                ),

            )
        ) );


    $wp_customize->add_setting(
        'archive_page_sidebar_option',
        array(
            'default' => 'right-sidebar',
            'sanitize_callback' => 'maggie_lite_sanitize_sidebar_type',
            )
        );


    $imagepath = get_template_directory_uri() . '/inc/images/' ;
    $wp_customize->add_control( new Maggie_lite_WP_Customize_Image_Radio( $wp_customize,
        'archive_page_sidebar_option',
        array(
            'label' => __( 'Default Post Sidebar', 'maggie-lite' ),
            'description' => __( "Define - Choose sidebar for all archive pages.", 'maggie-lite' ),
            'section' => 'archive_option_section',
            'choices' => array(
                'right-sidebar' => $imagepath . 'right-sidebar.png',
                'left-sidebar' => $imagepath . 'left-sidebar.png',
                'no-sidebar' => $imagepath . 'no-sidebar.png',
                ),

            )
        ) );

}
add_action( 'customize_register', 'maggie_lite_customize_post' );