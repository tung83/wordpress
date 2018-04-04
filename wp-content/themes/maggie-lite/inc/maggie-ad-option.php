<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;


class Maggie_lite_WP_Customize_Ad_Option extends WP_Customize_Control{
    
    public function render_content()
    {
        ?>
        <label>
            <span class="customize-menu-dropdown"><h3><?php echo esc_html( $this->label ); ?></h3></span>
            <span class="description"><?php echo $this->description; ?></span>
        </label>
        <?php
    }    
}