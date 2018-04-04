<?php
/**
 * The template for displaying all single posts.
 *
 * @package Maggie Lite
 */
get_header(); 
global $post;
$maggie_lite_show_breadcrumbs = get_theme_mod('breadcrumbs_option','1');
$post_template_value =(get_theme_mod( 'post_option_default','default-template' ) == 'default-template' ) ? 'single' : 'style1';

$maggie_lite_post_template = get_post_meta( $post -> ID, 'maggie_lite_post_template_layout', true );
if($maggie_lite_post_template=='global-template'){
    $content_value = $post_template_value;
} 
else
{
    if( $maggie_lite_post_template == 'default-template' ){
        $content_value = 'single';
    } else {
        $content_value = 'style1';
    }
}
$maggie_lite_show_breadcrumbs = get_theme_mod('breadcrumbs_option','1');
if ((function_exists('maggie_lite_breadcrumbs') && $maggie_lite_show_breadcrumbs == 1)) {
    maggie_lite_breadcrumbs();
}
?>
<div class="maggie-container">
    <?php
    $global_sidebar= get_theme_mod('post_option_sidebar','right-sidebar');
    $post_sidebar = get_post_meta( $post -> ID, 'maggie_lite_sidebar_layout', true );
    if( $post_sidebar == 'global-sidebar' ){
        $sidebar_option = $global_sidebar;
    } else {
        $sidebar_option = $post_sidebar;
    }
    if(empty($sidebar_option)){$sidebar_option = 'right-sidebar';}
    ?>
    <div id="primary" class="content-area <?php echo esc_attr($sidebar_option);?>">
        <main id="main" class="site-main <?php echo "template-".esc_attr($content_value); ?>" role="main">

          <?php while ( have_posts() ) : the_post(); ?>

             <?php get_template_part( 'content', $content_value ); ?>
             <?php 
             $maggie_lite_show_author_box = get_theme_mod('post_option_author_box','1');
             if( $maggie_lite_show_author_box == 1 ):
                ?>
            <div class="author-metabox">
                <?php
                $author_id = $post->post_author;
                $author_avatar = get_avatar( $author_id, '106' );
                $author_nickname = get_the_author_meta( 'display_name' );                
                ?>
                <div class="author-avatar">
                    <a class="author-image" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php echo $author_avatar; ?></a>
                </div>
                <div class="author-desc-wrapper">                
                    <a class="author-title" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php echo esc_attr( $author_nickname ); ?></a>
                    <div class="author-description"><?php echo get_the_author_meta('description');?></div>
                    <a href="<?php echo esc_url( get_the_author_meta( 'user_url' ) );?>" target="_blank"><?php echo esc_url( get_the_author_meta( 'user_url' ) );?></a>
                </div>
            </div><!--author-metabox-->
        <?php endif ;?>

        <?php 
        $show_post_navigation = get_theme_mod('post_option_nav_post',true);
        if($show_post_navigation!='0'){ maggie_lite_post_navigation(); }
        ?>
        <?php if ( is_active_sidebar( 'maggie-article-ad' ) ) : ?>
            <div class="article-ad-section">
                <?php dynamic_sidebar( 'maggie-article-ad' ); ?> 
            </div> 
        <?php endif ;?>
        <?php
        /*Related posts*/
        $maggie_lite_related_posts_option = get_theme_mod( 'maggie_lite_related_posts_option', '1' );
        if( $maggie_lite_related_posts_option != '0' ) {
            do_action( 'maggie_lite_related_posts' );
        }
        ?>
        <?php
                // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || get_comments_number() ) :
           comments_template();
       endif;
       ?>

   <?php endwhile; // end of the loop. ?>

</main><!-- #main -->
</div><!-- #primary -->

<?php 
if( $sidebar_option != 'no-sidebar' ){
    $option_value = explode( '-', $sidebar_option ); 
    get_sidebar( $option_value[0] );
}
?>
</div>
<?php get_footer(); ?>
