<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Maggie Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header">
		<?php the_title( '<h1 class="page-title"><span>', '</span></h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
		$show_featured_image = get_theme_mod('feature_image_option','1');
		if(has_post_thumbnail()){
			if( $show_featured_image == 1 ){
				?>
				<div class="post_image">  
					<a href="<?php the_permalink();?>"><?php the_post_thumbnail('full');?></a>
				</div>
				<?php
			}
		}
		?>
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'maggie-lite' ),
			'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php edit_post_link( __( 'Edit', 'maggie-lite' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
