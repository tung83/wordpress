<?php
/**
* Custom Sanitizer Function 
*/

function maggie_lite_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function maggie_lite_sanitize_integer($input) {
	return intval( $input );
}

function maggie_lite_sanitize_radio_webpagelayout($input) {
	$valid_keys = array(
		'boxed' => __('Boxed', 'maggie-lite'),
		'fullwidth' => __('Full Width', 'maggie-lite')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function maggie_lite_sanitize_footer_layouts($input) {
	$imagepath = get_template_directory_uri() . '/inc/images/footers/' ;
	$valid_keys = array(
		'column4' => $imagepath . 'footer-4.png',
		'column3' => $imagepath . 'footer-3.png',
		'column2' => $imagepath . 'footer-2.png',
		'column1' => $imagepath . 'footer-1.png',
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}
function maggie_lite_sanitize_number_posts($input) {
	$valid_keys = array(
		'-1' => __( 'All Post', 'maggie-lite' ),
		'4' => '4',
		'5' => '5',
		'6' => '6',
		'7' => '7',
		'8' => '8',
		'9' => '9',
		'10' => '10',
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function maggie_lite_sanitize_excerpt_type($input) {
	$valid_keys = array(
		'' => __( 'On Words', 'maggie-lite' ),
		'letters' => __( 'On Letters', 'maggie-lite' ),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function maggie_lite_sanitize_template_type($input) {
	$valid_keys = array(
		'default-template' => $imagepath . 'post-templates-icons-0.png',
		'style1-template' => $imagepath . 'post-templates-icons-1.png',
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function maggie_lite_sanitize_sidebar_type($input) {
	$valid_keys = array(
		'right-sidebar' => $imagepath . 'right-sidebar.png',
		'left-sidebar' => $imagepath . 'left-sidebar.png',
		'no-sidebar' => $imagepath . 'no-sidebar.png',
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}


// checkbox sanitization
function maggie_lite_checkbox_sanitize($input) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

function maggie_lite_sanitize_theme_setting($input){
	$valid_keys = array(
		'dark' => __( 'Dark Theme', 'maggie-lite' ),
		'light' => __( 'Light Theme', 'maggie-lite' ),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function maggie_lite_sanitize_featured_placement($input){
	$valid_keys = array(
		'above' => __( 'Above Main Slider', 'maggie-lite' ),
		'replace' => __( 'Replace Main Slider', 'maggie-lite' ),
		'below' => __( 'Below Main Slider', 'maggie-lite' ),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function maggie_lite_sanitize_slider_multiple($input){
	$valid_keys = array(
		'single' => __( 'Single Post Slider', 'maggie-lite' ),
		'multiple' => __( 'Multiple Post (3) Slider', 'maggie-lite' ),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function maggie_lite_sanitize_related_type($input) {
	$valid_keys = array(
		'related_cat'   => __( 'Related Posts by Category', 'maggie-lite' ),
		'related_tag'   => __( 'Related Posts by Tags', 'maggie-lite' )
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}