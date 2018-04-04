<?php
/**
 * Maggie Lite Theme Options
 *
 * @package Maggie Lite
 */

add_action('add_meta_boxes', 'maggie_lite_add_sidebar_layout_box'); 

function maggie_lite_add_sidebar_layout_box()
{
    
    add_meta_box(
                 'maggie_lite_post_settings', // $id
                 __( 'Post settings', 'maggie-lite' ), // $title
                 'maggie_lite_post_settings_callback', // $callback
                 'post', // $page
                 'normal', // $context
                 'high'); // $priority

    add_meta_box(
                 'maggie_lite_page_settings', // $id
                 __( 'Sidebar Layout', 'maggie-lite' ), // $title
                 'maggie_lite_page_settings_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority
    
}

$maggie_lite_sidebar_layout = array(
    'global-sidebar' => array(
        'value'     => 'global-sidebar',
        'label'     => __( 'Theme option sidebar', 'maggie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/inc/images/theme-option-sidebar.png'
        ), 
    'left-sidebar' => array(
        'value'     => 'left-sidebar',
        'label'     => __( 'Left sidebar', 'maggie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/inc/images/left-sidebar.png'
        ), 
    'right-sidebar' => array(
        'value' => 'right-sidebar',
        'label' => __( 'Right sidebar<br/>(default)', 'maggie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/inc/images/right-sidebar.png'
        ),
    
    'no-sidebar' => array(
        'value'     => 'no-sidebar',
        'label'     => __( 'No sidebar', 'maggie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/inc/images/no-sidebar.png'
        )   

    );

$maggie_lite_page_sidebar_layout = array(
    'left-sidebar' => array(
        'value'     => 'left-sidebar',
        'label'     => __( 'Left sidebar', 'maggie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/inc/images/left-sidebar.png'
        ), 
    'right-sidebar' => array(
        'value' => 'right-sidebar',
        'label' => __( 'Right sidebar<br/>(default)', 'maggie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/inc/images/right-sidebar.png'
        ),
    
    'no-sidebar' => array(
        'value'     => 'no-sidebar',
        'label'     => __( 'No sidebar', 'maggie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/inc/images/no-sidebar.png'
        )   

    );

$maggie_lite_post_template_layout = array(
    'global-template' => array(
        'value'     => 'global-template',
        'label'     => __( 'Theme option Template', 'maggie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/inc/images/post_template/post-templates-icons-theme.png',
        'available'=> 'free'
        ),
    'default-template' => array(
        'value'     => 'default-template',
        'label'     => __( 'Default Template', 'maggie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/inc/images/post_template/post-templates-icons-0.png',
        'available'=> 'free'
        ), 
    'style1-template' => array(
        'value' => 'style1-template',
        'label' => __( 'Style 1', 'maggie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/inc/images/post_template/post-templates-icons-1.png',
        'available'=> 'free'
        ),
    'style2-template' => array(
        'value' => 'style2-template',
        'label' => __( 'Style 2', 'maggie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/inc/images/post_template/post-templates-icons-2.png',
        'available'=> 'pro'
        ),
    'style3-template' => array(
        'value' => 'style3-template',
        'label' => __( 'Style 3', 'maggie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/inc/images/post_template/post-templates-icons-3.png',
        'available'=> 'pro'
        ),
    'style4-template' => array(
        'value' => 'style4-template',
        'label' => __( 'Style 4', 'maggie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/inc/images/post_template/post-templates-icons-4.png',
        'available'=> 'pro'
        ),
    'style5-template' => array(
        'value' => 'style5-template',
        'label' => __( 'Style 5', 'maggie-lite' ),
        'thumbnail' => get_template_directory_uri() . '/inc/images/post_template/post-templates-icons-5.png',
        'available'=> 'pro'
        )  

    );

/*-------------------Function for Post settings meta box----------------------------*/

function maggie_lite_post_settings_callback()
{
    global $post, $maggie_lite_post_template_layout, $maggie_lite_sidebar_layout ;
    wp_nonce_field( basename( __FILE__ ), 'maggie_lite_post_settings_nonce' );
    ?>

    <div class="my_post_settings">
        <table class="form-table">
            <tr>
                <td colspan="4"><em class="f13"><?php _e( 'Post template:', 'maggie-lite' )?></em></td>
            </tr>
            
            <tr>
                <td>
                    <?php  
                    foreach ($maggie_lite_post_template_layout as $field) {  
                        $maggie_lite_post_template_metalayout = get_post_meta( $post->ID, 'maggie_lite_post_template_layout', true );?>
                        
                        <div class="radio-post-template-wrapper" available="<?php echo $field['available'];?>" style="float:left; margin-right:30px;">
                            <label class="description">
                                <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                                <input type="radio" name="maggie_lite_post_template_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $maggie_lite_post_template_metalayout ); if(empty($maggie_lite_post_template_metalayout) && $field['value']=='global-template'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $field['label']; ?>
                            </label>
                        </div>
                            <?php } // end foreach 
                            ?>
                            <span class="pro-tmp-msg" style="display: none;"><?php _e( 'Template available in pro version', 'maggie-lite' );?></span>
                            <div class="clear"></div>
                        </td>
                    </tr>
                    
                </table>
                
                <table class="form-table">
                    <tr>
                        <td colspan="4"><em class="f13"><?php _e( 'Post Sidebar', 'maggie-lite' ); ?></em></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <?php  
                            foreach ($maggie_lite_sidebar_layout as $field) {  
                                $maggie_lite_sidebar_metalayout = get_post_meta( $post->ID, 'maggie_lite_sidebar_layout', true ); ?>

                                <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                                    <label class="description">
                                        <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                                        <input type="radio" name="maggie_lite_sidebar_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $maggie_lite_sidebar_metalayout ); if(empty($maggie_lite_sidebar_metalayout) && $field['value']=='global-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $field['label']; ?>
                                    </label>
                                </div>
                <?php } // end foreach 
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>
</div>

<?php
}

/*---------Function for Page sidebar meta box----------------------------*/

function maggie_lite_page_settings_callback()
{
    global $post, $maggie_lite_page_sidebar_layout ;
    wp_nonce_field( basename( __FILE__ ), 'maggie_lite_page_settings_nonce' );
    ?>
    <table class="form-table">
        <tr>
            <td colspan="4"><em class="f13"><?php _e('Page Sidebar','maggie-lite'); ?></em></td>
        </tr>
        
        <tr>
            <td>
                <?php  
                foreach ($maggie_lite_page_sidebar_layout as $field) {  
                    $maggie_lite_page_sidebar_metalayout = get_post_meta( $post->ID, 'maggie_lite_page_sidebar_layout', true ); ?>
                    
                    <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                        <label class="description">
                            <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                            <input type="radio" name="maggie_lite_page_sidebar_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $maggie_lite_page_sidebar_metalayout ); if(empty($maggie_lite_page_sidebar_metalayout) && $field['value']=='right-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $field['label']; ?>
                        </label>
                    </div>
                            <?php } // end foreach 
                            ?>
                            <div class="clear"></div>
                        </td>
                    </tr>
                </table>

                <?php
            }

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */

/*-------------------Save function for Post Setting-------------------------*/

function maggie_lite_save_post_settings( $post_id ) { 
    global $maggie_lite_post_template_layout, $maggie_lite_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'maggie_lite_post_settings_nonce' ] ) || !wp_verify_nonce( $_POST[ 'maggie_lite_post_settings_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
    
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
        return $post_id;  
    }
    
    foreach ($maggie_lite_post_template_layout as $field) {  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'maggie_lite_post_template_layout', true); 
        $new = sanitize_text_field($_POST['maggie_lite_post_template_layout']);
        if ($new && $new != $old) {  
            update_post_meta($post_id, 'maggie_lite_post_template_layout', $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id,'maggie_lite_post_template_layout', $old);  
        }
     } // end foreach  
     
     foreach ($maggie_lite_sidebar_layout as $field) {  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'maggie_lite_sidebar_layout', true); 
        $new = sanitize_text_field($_POST['maggie_lite_sidebar_layout']);
        if ($new && $new != $old) {  
            update_post_meta($post_id, 'maggie_lite_sidebar_layout', $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id,'maggie_lite_sidebar_layout', $old);  
        }
     } // end foreach   
     
     
 }
 add_action('save_post', 'maggie_lite_save_post_settings');

 /*-------------------Save function for Page Setting-------------------------*/

 function maggie_lite_save_page_settings( $post_id ) { 
    global $maggie_lite_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'maggie_lite_page_settings_nonce' ] ) || !wp_verify_nonce( $_POST[ 'maggie_lite_page_settings_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
    
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
        return $post_id;  
    }
    
    foreach ($maggie_lite_sidebar_layout as $field) {  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'maggie_lite_page_sidebar_layout', true); 
        $new = sanitize_text_field($_POST['maggie_lite_page_sidebar_layout']);
        if ($new && $new != $old) {  
            update_post_meta($post_id, 'maggie_lite_page_sidebar_layout', $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id,'maggie_lite_page_sidebar_layout', $old);  
        } 
     } // end foreach 
     
 }
 add_action('save_post', 'maggie_lite_save_page_settings');
 ?>