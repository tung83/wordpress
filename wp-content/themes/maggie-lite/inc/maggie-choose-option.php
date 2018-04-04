<?php

function maggie_lite_load_custom_wp_admin_style($hook) {
	if( 'widgets.php' == $hook || 'customize.php' == $hook  ) { 
		wp_enqueue_script( 'mag-admin-js', get_template_directory_uri() . '/js/magadmin.js', array( 'jquery' ), '20130508', true );
		wp_enqueue_style( 'mag-admin-css', get_template_directory_uri() . '/css/magadmin.css');
	}
}
add_action( 'admin_enqueue_scripts', 'maggie_lite_load_custom_wp_admin_style' );


if(class_exists( 'WP_Customize_control')):
	class Maggie_lite_WP_Customize_Choose_Option extends WP_Customize_Control {
		public $type = 'switch_yesno';
		
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<div class="switch_options">
					<span class="switch_enable"> <?php _e('Yes', 'maggie-lite'); ?> </span>
					<span class="switch_disable"> <?php _e('No', 'maggie-lite'); ?> </span>  
					<input type="hidden" id="enable_prev_next_yn" <?php $this->link(); ?> value="<?php echo $this->value(); ?>" />
				</div>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			</label>
			<?php
		}
	}
	endif;