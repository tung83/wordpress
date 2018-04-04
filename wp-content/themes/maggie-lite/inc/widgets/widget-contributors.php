<?php

/**
 * Article Contributors Widgets
 *
 * @package Maggie Lite
 */
/**
 * Adds maggie_lite_contributors widget.
 */
add_action('widgets_init', 'maggie_lite_article_contributors_widget');

function maggie_lite_article_contributors_widget() {
    register_widget('maggie_lite_article_contributors');
}

class maggie_lite_article_contributors extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'maggie_lite_article_contributors', 'Maggie :  Article Contributors', array(
                'description' => __('A widget that shows article contributors', 'maggie-lite')
                )
            );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'contributors_title' => array(
                'maggie_lite_widgets_name' => 'contributors_title',
                'maggie_lite_widgets_title' => __('Title', 'maggie-lite'),
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
    public function widget($args, $instance) {
        extract($args);
        $contributors_title = $instance['contributors_title'];
        echo $before_widget; ?>
        <div class="contributors-wrapper clearfix">
         <h1 class="widget-title"><span><?php echo esc_attr($contributors_title); ?></span></h1>     
         <div class="single-user-wrapper">
           <?php
           $roles = array('Administrator', 'Author', 'Editor');
           foreach($roles as $role)
           {
            $user_args = array(
                'fields'=>'all_with_meta',
                'orderby'=>'user_nicename',
                'role'=>$role
                );
            $user_query = new WP_User_Query( $user_args );
                        //echo '<pre>';
//                        	print_r($user_query);
//                        echo '</pre>';
            if ( ! empty( $user_query->results ) ) {
               foreach ( $user_query->results as $user ) {
                  $user_name = $user->display_name;
                  $user_nickname = $user->user_nicename;
                  $user_id = $user->ID;
                  $user_avatar = get_avatar($user_id, '82'); 
                  ?>
                  <div class="single-user">
                    <a href="<?php echo esc_url( get_author_posts_url( $user_id, $user_nickname ) ) ;?>">
                        <div class="user-image"><?php echo  $user_avatar ;?></div>
                        <h3 class="user-name"><?php echo esc_attr( $user_name );?></h3>
                    </a>
                </div>
                <?php
            }
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
