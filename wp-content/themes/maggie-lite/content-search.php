<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Maggie Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
            <?php echo maggie_lite_get_the_category_list();  ?>
			<?php maggie_lite_posted_on(); ?>
            <?php do_action('maggie_lite_post_meta');?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if(the_excerpt()!=""){ ?>
    <div class="entry-summary">
        <?php 
            if(has_post_thumbnail()){
                $archive_template = get_theme_mod('archive_page_option','default-template');
                if($archive_template=='default-template'){
                    echo '<div class="post_image"><a href="<?php the_permalink();?>">'.the_post_thumbnail('maggie-lite-singlepost-default').'</div>';   
                } else {
                    echo '<div class="post_image">'.the_post_thumbnail('maggie-lite-singlepost-style1').'</div>';
                }
            }
        ?>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
    <?php } ?>
	<div class="clearfix"> </div>
	<footer class="entry-footer">
		<?php maggie_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
