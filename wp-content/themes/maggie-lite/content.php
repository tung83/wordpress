<?php
/**
 * @package Maggie Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php 
				if( is_author() || is_tag() || is_archive() || is_home() ){
					$post_categories = maggie_lite_get_the_category_list();
					echo $post_categories;
				}
				?>
				<?php maggie_lite_posted_on(); ?>
				<?php do_action( 'maggie_lite_post_meta' );?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
		if(has_post_thumbnail()){
			?>
			<div class="post-image non-zoomin">
				<a href="<?php the_permalink();?>"><?php echo the_post_thumbnail('maggie-lite-singlepost-default');?></a>
				<?php do_action( 'maggie_lite_post_format_icon' ); ?>
			</div>
			<?php } ?>
			<?php maggie_lite_excerpt();?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'maggie-lite' ),
				'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php maggie_lite_entry_footer(); ?>
			</footer><!-- .entry-footer -->
</article><!-- #post-## -->