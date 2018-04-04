<?php

/**
 * Preview post/page widget
 *
 * @package 8Store Pro
 */
add_action('widgets_init', 'maggie_lite_register_widget_slider');

function maggie_lite_register_widget_slider() {
	register_widget('maggie_lite_widget_slider');
}

class maggie_lite_widget_slider extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
    	parent::__construct(
    		'maggie_lite_widget_slider', 'Maggie : Posts Slider Widget', array(
    			'description' => __('A widget that shows posts of a category in a slider', 'maggie-lite')
    			)
    		);
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
    	$fields = array(
            // Other fields
    		'cat_title' => array(
    			'maggie_lite_widgets_name' => 'cat_title',
    			'maggie_lite_widgets_title' => __('Title', 'maggie-lite'),
    			'maggie_lite_widgets_field_type' => 'text',
    			),
    		'cat_id' => array(
    			'maggie_lite_widgets_name' => 'cat_id',
    			'maggie_lite_widgets_title' => __('Post Category', 'maggie-lite'),
    			'maggie_lite_widgets_field_type' => 'selectcategory',
    			),
    		'cat_num_post' => array(
    			'maggie_lite_widgets_name' => 'cat_num_post',
    			'maggie_lite_widgets_title' => __('Number of posts', 'maggie-lite'),
    			'maggie_lite_widgets_field_type' => 'number'
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
    public function widget($args, $instance) {
    	extract($args);
    	if(!empty($instance)):
    		$editor_cat = $instance['cat_id'];
    	$editor_posts_per_page = $instance['cat_num_post'];
    	$trans_editor = $instance['cat_title'];
    	
    	echo $before_widget;
    	?>
    	<div class="sidebar-widget-slider widget-area">
    		<div class="content-wrapper">
    			<?php 
    			if(!empty($editor_cat)):
    				?>
    			<h1 class="sidebar-title"><span><?php echo esc_attr( $trans_editor ) ;?></span></h1>
    			<?php
    			echo '<div class="sidebar-posts-wrapper wdgt-slide">';
    			$loop = new WP_Query(array(
    				'cat' => $editor_cat,
    				'posts_per_page' => $editor_posts_per_page,
    				'post_type' => 'post',
    				'post_status' => 'publish',
    				'order' => 'DESC', 
    				));
    			$e_counter = 0;
    			$total_posts_editor = $loop->found_posts;
    			if($loop->have_posts()){
    				while($loop->have_posts()){
    					$e_counter++;
    					$loop->the_post();
    					?>
    					<div class="single_post clearfix <?php if( $e_counter == 1 ){ echo 'first-post non-zoomin'; }?>">
    						<div class="post-image">
    							<?php if(has_post_thumbnail()): ?>
                                    <a href="<?php the_permalink();?>">
                                       <?php the_post_thumbnail('maggie-lite-singlepost-default');?>
                                   </a>
                                   <?php do_action( 'maggie_lite_post_format_icon' ); ?>
                               <?php endif ;?>
                               <div class="post-desc-wrapper">
                                <h3 class="post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
    <?php
    echo $after_widget;
    endif;
}

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    maggie_lite_widgets_updated_field_value()       defined in widget-fields.php
     *
     * @return  array Updated safe values to be saved.
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
     * @param   array $instance Previously saved values from database.
     *
     * @uses    maggie_lite_widgets_show_widget_field()     defined in widget-fields.php
     */
    public function form($instance) {
    	$widget_fields = $this->widget_fields();

        // Loop through fields
    	foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
    		extract($widget_field);
    		$maggie_lite_widgets_field_value = isset($instance[$maggie_lite_widgets_name]) ? esc_attr($instance[$maggie_lite_widgets_name]) : '';
    		maggie_lite_widgets_show_widget_field($this, $widget_field, $maggie_lite_widgets_field_value);
    	}
    }

}
