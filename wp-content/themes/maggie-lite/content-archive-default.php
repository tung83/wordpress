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
				<div class="block-poston">
					<?php 
					if( is_author() || is_tag() || is_archive() ){
						echo maggie_lite_get_the_category_list();
					}
					?>
				</div>
				<?php do_action( 'maggie_lite_post_format_icon' ); ?>
			</div>
			<?php } ?>
			<?php
			/* translators: %s: Name of current post */
			the_excerpt( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'maggie-lite' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			
				?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'maggie-lite' ),
					'after'  => '</div>',
					) );
					?>
				</div><!-- .entry-content -->

				<?php maggie_lite_entry_footer(); ?>
</article><!-- #post-## -->