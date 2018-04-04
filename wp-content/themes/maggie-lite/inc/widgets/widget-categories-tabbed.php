<?php
/**
 * Maggie Lite: Categories Tabbed
 *
 * Widget to display selected category posts as on tabbed.
 *
 * @package Maggie Lite
 */
add_action( 'widgets_init', 'maggie_lite_register_categories_tabbed_widget' );

function maggie_lite_register_categories_tabbed_widget() {
    register_widget( 'maggie_lite_categories_tabbed' );
}

class maggie_lite_categories_tabbed extends WP_Widget {

  /**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'maggie_lite_categories_tabbed',
            'description' => __( 'Display category post in tabbed.', 'maggie-lite' )
            );
        parent::__construct( 'maggie_lite_categories_tabbed', __( 'Maggie: Categories Tabbed', 'maggie-lite' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

        global $maggie_lite_cat_dropdown;
        
        $fields = array(

            'first_tab_title' => array(
                'maggie_lite_widgets_name'         => 'first_tab_title',
                'maggie_lite_widgets_title'        => __( 'First Tab Title', 'maggie-lite' ),
                'maggie_lite_widgets_field_type'   => 'text'
                ),

            'first_tab_category' => array(
                'maggie_lite_widgets_name' => 'first_tab_category',
                'maggie_lite_widgets_title' => __( 'Select Category for First Tab', 'maggie-lite' ),
                'maggie_lite_widgets_default'      => 0,
                'maggie_lite_widgets_field_type' => 'select',
                'maggie_lite_widgets_field_options' => $maggie_lite_cat_dropdown
                ),

            'second_tab_title' => array(
                'maggie_lite_widgets_name'         => 'second_tab_title',
                'maggie_lite_widgets_title'        => __( 'Second Tab Title', 'maggie-lite' ),
                'maggie_lite_widgets_field_type'   => 'text'
                ),

            'second_tab_category' => array(
                'maggie_lite_widgets_name' => 'second_tab_category',
                'maggie_lite_widgets_title' => __( 'Select Category for Second Tab', 'maggie-lite' ),
                'maggie_lite_widgets_default'      => 0,
                'maggie_lite_widgets_field_type' => 'select',
                'maggie_lite_widgets_field_options' => $maggie_lite_cat_dropdown
                ),

            'third_tab_title' => array(
                'maggie_lite_widgets_name'         => 'third_tab_title',
                'maggie_lite_widgets_title'        => __( 'Third Tab Title', 'maggie-lite' ),
                'maggie_lite_widgets_field_type'   => 'text'
                ),

            'third_tab_category' => array(
                'maggie_lite_widgets_name' => 'third_tab_category',
                'maggie_lite_widgets_title' => __( 'Select Category for Third Tab', 'maggie-lite' ),
                'maggie_lite_widgets_default'      => 0,
                'maggie_lite_widgets_field_type' => 'select',
                'maggie_lite_widgets_field_options' => $maggie_lite_cat_dropdown
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
        if( empty( $instance ) ) {
            return ;
        }

        $maggie_lite_first_tab_title = empty( $instance['first_tab_title'] ) ? '' : $instance['first_tab_title'];
        $maggie_lite_second_tab_title = empty( $instance['second_tab_title'] ) ? '' : $instance['second_tab_title'];
        $maggie_lite_third_tab_title = empty( $instance['third_tab_title'] ) ? '' : $instance['third_tab_title'];

        $maggie_lite_first_tab_cat_id = empty( $instance['first_tab_category'] ) ? 0: $instance['first_tab_category'];
        $maggie_lite_second_tab_cat_id = empty( $instance['second_tab_category'] ) ? 0: $instance['second_tab_category'];
        $maggie_lite_third_tab_cat_id = empty( $instance['third_tab_category'] ) ? 0: $instance['third_tab_category'];


        echo $before_widget;
        ?>
        <div class="maggie-lite-tabbed-wrapper wow fadeInUp">
          <ul class="maggie-lite-cat-tabs clearfix" id="maggie-lite-widget-tabbed">
            <?php if( $maggie_lite_first_tab_cat_id ) { ?>
                <li class="cat-tab first-tabs">
                   <a href="javascript:void(0)" id="tabfirst"><?php maggie_lite_tabbed_title( $maggie_lite_first_tab_title, $maggie_lite_first_tab_cat_id ); ?></a>
               </li>
               <?php } ?>
               <?php if( $maggie_lite_second_tab_cat_id ) { ?>
                   <li class="cat-tab second-tabs">
                       <a href="javascript:void(0)" id="tabsecond"><?php maggie_lite_tabbed_title( $maggie_lite_second_tab_title, $maggie_lite_second_tab_cat_id ); ?></a>
                   </li>
                   <?php } ?>
                   <?php if( $maggie_lite_third_tab_cat_id ) { ?>
                       <li class="cat-tab third-tabs">
                           <a href="javascript:void(0)" id="tabthird"><?php maggie_lite_tabbed_title( $maggie_lite_third_tab_title, $maggie_lite_third_tab_cat_id ); ?></a>
                       </li>
                       <?php } ?>
                   </ul>

                   <?php if( $maggie_lite_first_tab_cat_id ) { ?>
                       <div id="section-tabfirst" class="maggie-lite-tabbed-section">
                          <?php
                          $first_tab_args = array(  
                           'post_type' => 'post',
                           'category__in' => $maggie_lite_first_tab_cat_id,
                           'posts_per_page' => 3,
                           );
                          $first_tab_query = new WP_Query( $first_tab_args );
                          if( $first_tab_query->have_posts() ) {
                           while( $first_tab_query->have_posts() ) {
                               $first_tab_query->the_post();
                               ?>
                               <div class="single-post clearfix">
                                   <div class="post-thumb">
                                       <?php if( has_post_thumbnail() ) { ?>
                                           <a class="thumb-zoom" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php the_post_thumbnail('maggie-lite-block-small-thumb');?>
                                            <div class="image-overlay"></div>
                                            <?php do_action( 'maggie_lite_post_format_icon' ); ?>
                                        </a>
                                        <?php } ?>
                                    </div>
                                    <div class="post-caption clearfix">
                                       <h3 class="small-font"><a href="<?php the_permalink(); ?>"><?php echo maggie_lite_letter_count(get_the_title(),'75'); ?></a></h3>
                                       <div class="post-meta">
                                           <?php do_action( 'maggie_lite_post_meta' ); ?>
                                       </div>
                                   </div><!-- .post-caption -->
                               </div><!-- .single-post -->
                               <?php
                           }
                       }
                       wp_reset_query();
                       ?>
                   </div><!-- #tabfirst -->
                   <?php } ?>
                   <?php if( $maggie_lite_second_tab_cat_id ) { ?>
                       <div id="section-tabsecond" class="maggie-lite-tabbed-section" style="display: none;">
                          <?php
                          $second_tab_args = array(  
                           'post_type' => 'post',
                           'category__in' => $maggie_lite_second_tab_cat_id,
                           'posts_per_page' => 3,
                           );
                          $second_tab_query = new WP_Query( $second_tab_args );
                          if( $second_tab_query->have_posts() ) {
                           while( $second_tab_query->have_posts() ) {
                               $second_tab_query->the_post();
                               ?>
                               <div class="single-post clearfix">
                                   <div class="post-thumb">
                                       <?php if( has_post_thumbnail() ) { ?>
                                           <a class="thumb-zoom" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                               <?php the_post_thumbnail('maggie-lite-block-small-thumb');?>
                                               <div class="image-overlay"></div>
                                           </a>
                                           <?php } ?>
                                       </div>
                                       <div class="post-caption clearfix">
                                           <h3 class="small-font"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                           <div class="post-meta">
                                               <?php do_action( 'maggie_lite_post_meta' ); ?>
                                           </div>
                                       </div><!-- .post-caption -->
                                   </div><!-- .single-post -->
                                   <?php
                               }
                           }
                           wp_reset_query();
                           ?>
                       </div><!-- #tabsecond -->
                       <?php } ?>
                       <?php if( $maggie_lite_third_tab_cat_id ) { ?>
                        <div id="section-tabthird" class="maggie-lite-tabbed-section" style="display: none;">
                          <?php 

                          $third_tab_args = array(  
                           'post_type' => 'post',
                           'category__in' => $maggie_lite_third_tab_cat_id,
                           'posts_per_page' => 3,
                           );
                          $third_tab_query = new WP_Query( $third_tab_args );
                          if( $third_tab_query->have_posts() ) {
                           while( $third_tab_query->have_posts() ) {
                               $third_tab_query->the_post();
                               ?>
                               <div class="single-post clearfix">
                                   <div class="post-thumb">
                                       <?php if( has_post_thumbnail() ) { ?>
                                           <a class="thumb-zoom" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php the_post_thumbnail('maggie-lite-block-small-thumb');?>
                                            <div class="image-overlay"></div>
                                        </a>
                                        <?php } ?>
                                    </div>
                                    <div class="post-caption clearfix">
                                       <h3 class="small-font"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                       <div class="post-meta">
                                           <?php do_action( 'maggie_lite_post_meta' ); ?>
                                       </div>
                                   </div><!-- .post-caption -->                                 
                               </div><!-- .single-post -->
                               <?php
                           }
                       }
                       wp_reset_query();
                       ?>
                   </div><!-- #tabthird -->
                   <?php } ?>
               </div><!-- .maggie-lite-tabbed-wrapper -->
               <?php
               echo $after_widget;
           }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    maggie_lite_widgets_updated_field_value()      defined in maggie-lite-widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$maggie_lite_widgets_name] = maggie_lite_widgets_updated_field_value( $widget_field, $new_instance[$maggie_lite_widgets_name] );
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
     * @uses    maggie_lite_widgets_show_widget_field()        defined in maggie-lite-widget-fields.php
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $maggie_lite_widgets_field_value = !empty( $instance[$maggie_lite_widgets_name]) ? esc_attr($instance[$maggie_lite_widgets_name] ) : '';
            maggie_lite_widgets_show_widget_field( $this, $widget_field, $maggie_lite_widgets_field_value );
        }
    }
}