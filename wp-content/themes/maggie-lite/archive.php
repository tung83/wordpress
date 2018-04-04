<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Maggie Lite
 */

get_header(); ?>
<?php   
$maggie_lite_show_breadcrumbs = get_theme_mod('breadcrumbs_option','1');
if ((function_exists('maggie_lite_breadcrumbs') && $maggie_lite_show_breadcrumbs == 1)) {
	maggie_lite_breadcrumbs();
}
?>
<div class="maggie-container">
	<?php
	$sidebar_option = get_theme_mod('archive_page_sidebar_option','right-sidebar');
	?>
	<div id="primary" class="content-area <?php echo esc_attr($sidebar_option);?>">
		<main id="main" class="site-main" role="main">

			<?php
			$archive_template = get_theme_mod( 'archive_page_option','default-template');
			if($archive_template=='default-template'){
				$archive_template = 'archive-default';
			} else {
				$archive_template = 'archive-style1';
			} 
			if ( have_posts() ) : 
				?>

			<header class="page-header">
				<?php the_archive_title( '<h1 class="page-title"><span>','</span></h1>' );?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', $archive_template );
					?>

				<?php endwhile; wp_reset_query(); ?>

				<?php the_posts_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php 
	$sidebar_option = get_theme_mod('archive_page_sidebar_option','right-sidebar');
	if($sidebar_option!='no-sidebar'){
		$option_value = explode('-',$sidebar_option); 
		get_sidebar($option_value[0]);
	}
	?>
</div>
<?php get_footer(); ?>
