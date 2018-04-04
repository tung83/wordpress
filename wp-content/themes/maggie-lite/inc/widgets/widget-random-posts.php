<?php

/**
 * Random Posts Widgets
 *
 * @package Maggie Lite
 */
/**
 * Adds maggie_lite_random_posts widget.
 */
add_action('widgets_init', 'maggie_lite_register_random_posts_widget');

function maggie_lite_register_random_posts_widget() {
    register_widget('maggie_lite_register_random_posts');
}

class maggie_lite_register_random_posts extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'maggie_lite_register_random_posts', 'Maggie :  Random Posts', array(
                'description' => __( 'A widget that shows Random posts', 'maggie-lite' )
                )
            );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'random_posts_title' => array(
                'maggie_lite_widgets_name' => 'random_posts_title',
                'maggie_lite_widgets_title' => __( 'Title', 'maggie-lite' ),
                'maggie_lite_widgets_field_type' => 'title',
                ),            
            );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $random_posts_title = $instance['random_posts_title'];
        echo $before_widget;
        $colors = array( "red", "orange", "blue", "green", "purple", "pink", "caribbean_green" ); 
        ?>
        <div class="random-posts clearfix">
         <h1 class="widget-title"><span><?php echo esc_attr( $random_posts_title ); ?></span></h1>     
         <div class="random-posts-wrapper">
            <?php
            $rand_posts_args = array( 'post_type'=>'post','post_status'=>'publish','posts_per_page'=>3,'orderby'=>'rand' );
            $rand_posts_query = new WP_Query($rand_posts_args);
            if($rand_posts_query->have_posts()){
                while($rand_posts_query->have_posts()){
                    $rand_posts_query->the_post();
                    ?>
                    <div class="rand-single-post clearfix">
                        <div class="post-img"><a href="<?php the_permalink();?>">
                            <?php if(has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('maggie-lite-block-small-thumb');?>
                            <?php else: ?>
                                <img src="<?php echo esc_url( get_template_directory_uri(). '/images/no-image-small.jpg' );?>" alt="<?php _e( 'No image', 'maggie-lite' );?>" />                            
                            <?php endif ;?>
                        </a>
                        <?php do_action( 'maggie_lite_post_format_icon' ); ?>
                    </div>
                    <div class="post-desc-wrapper">
                        <h3 class="post-title">
                            <a href="<?php the_permalink();?>">
                                <?php 
                                the_title();
                                ?>
                            </a>
                        </h3>
                        <div class="block-poston"><?php do_action( 'maggie_lite_home_posted_on' );?></div>
                    </div>                    
                </div>
                <?php
            }                                               
        }
        ?>
    </div> 
</div>
<?php 
echo $after_widget;
}

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     * @uses	maggie_lite_widgets_updated_field_value()		defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$maggie_lite_widgets_name] = maggie_lite_widgets_updated_field_value($widget_field, $new_instance[$maggie_lite_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     * @uses	maggie_lite_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $maggie_lite_widgets_field_value = !empty($instance[$maggie_lite_widgets_name]) ? esc_attr($instance[$maggie_lite_widgets_name]) : '';
            maggie_lite_widgets_show_widget_field($this, $widget_field, $maggie_lite_widgets_field_value);
        }
    }

}
