<?php
/**
 * 
 * Related Post Settings
 * 
 */

function maggie_lite_customize_related_post( $wp_customize ) {
	
	$wp_customize->add_section(
		'related_post_option_settings',
		array(
			'title' => __( 'Related Post Settings', 'maggie-lite' ),
			)
		);

	//Show/hide related posts
	$wp_customize->add_setting(
		'maggie_lite_related_posts_option',
		array(
			'default' => '1',
			'sanitize_callback' => 'maggie_lite_sanitize_integer',
			)
		);
	$wp_customize->add_control( new Maggie_lite_WP_Customize_Choose_Option(
		$wp_customize, 
		'maggie_lite_related_posts_option', 
		array(
			'type' 		=> 'switch',	                
			'label' 	=> __( 'Related Posts', 'maggie-lite' ),
			'description' 	=> __( 'Enable/Disable related posts section in single post page.', 'maggie-lite' ),
			'section' 	=> 'related_post_option_settings',
			'choices'   => array(
				'show' 	=> __( 'Show', 'maggie-lite' ),
				'hide' 	=> __( 'Hide', 'maggie-lite' )
				),
			'priority'  => 5,
			)	            	
		)
	);

	    //Related posts caption
	$wp_customize->add_setting(
		'maggie_lite_related_posts_title', 
		array(
			'default' 	=> __( 'Related Articles', 'maggie-lite' ),
			'sanitize_callback' => 'maggie_lite_sanitize_text'	                
			)
		);    
	$wp_customize->add_control(
		'maggie_lite_related_posts_title',
		array(
			'type'		=> 'text',
			'label' 	=> __( 'Section Title', 'maggie-lite' ),
			'section' 	=> 'related_post_option_settings',
			'priority' 	=> 6
			)
		);

	// Types of related posts
	$wp_customize->add_setting(
		'maggie_lite_related_post_type',
		array(
			'default'           => 'related_cat',
			'sanitize_callback' => 'maggie_lite_sanitize_related_type',
			)
		);
	$wp_customize->add_control(
		'maggie_lite_related_post_type',
		array(
			'type'        => 'radio',
			'label'       => __( 'Website Layout', 'maggie-lite' ),
			'description' => __( 'Option to change the website layout.', 'maggie-lite' ),
			'section'     => 'related_post_option_settings',            
			'choices' => array(
				'related_cat'   => __( 'Related Posts by Category', 'maggie-lite' ),
				'related_tag'   => __( 'Related Posts by Tags', 'maggie-lite' )
				),
			'priority' 	=> 7
			)
		);

}
add_action( 'customize_register', 'maggie_lite_customize_related_post' );