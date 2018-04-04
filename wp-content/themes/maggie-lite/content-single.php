<?php
/**
 * @package Maggie Lite
 */

global $post;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <?php 
        $show_featured_image = get_theme_mod('feature_image_option','1');
        ?>
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <div class="entry-meta clearfix">

            <?php maggie_lite_posted_on(); ?>
            <?php do_action( 'maggie_lite_post_meta' );?>
        </div><!-- .entry-meta -->
        
    </header><!-- .entry-header -->

    <div class="entry-content">
        <div class="post_image">
            <?php 
            if(has_post_thumbnail()){
                if( $show_featured_image == 1 ){
                    ?>  
                    <?php the_post_thumbnail('maggie-lite-singlepost-default');?>
                    <?php
                }
            }
            ?>
            <div class="block-poston">
                <?php echo maggie_lite_get_the_category_list();?>
            </div>
            <?php do_action( 'maggie_lite_post_format_icon' ); ?>
        </div>
        <div class="post_content"><?php the_content(); ?></div>	        	
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'maggie-lite' ),
            'after'  => '</div>',
            ) );
            ?>        
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <?php //do_action('maggie_lite_single_post_review');?>
            <?php maggie_lite_entry_footer(); ?>        
        </footer><!-- .entry-footer -->
    </article><!-- #post-## -->
