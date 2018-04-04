<?php
if(class_exists( 'WP_Customize_control')):

	class Maggie_lite_WP_Customize_Image_Radio extends WP_Customize_Control {
		
		public $type = 'radioimage';
		public function enqueue() {
			wp_enqueue_script( 'jquery-ui-button' );
		}
		public function render_content() {
			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div id="input_<?php echo $this->id; ?>" class="image">
				<?php foreach ( $this->choices as $value => $label ) : ?>
				<div class="radio-image">
					<input class="image-select radio-button" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo $this->id . $value; ?>" <?php $this->link(); checked( $this->value(), $value ); ?> >
					<label for="<?php echo $this->id . $value; ?>">
						<img src="<?php echo esc_html( $label ); ?>"/>
					</label>
				</input>
			</div>
		<?php endforeach; ?>
		<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?>
		</div>
		<script>jQuery(document).ready(function() { jQuery( '[id="input_<?php echo $this->id; ?>"]' ).buttonset(); });</script>
		<?php 
	}
}
endif;