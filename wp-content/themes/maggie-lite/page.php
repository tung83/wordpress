<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
	$global_sidebar= get_theme_mod('post_option_sidebar','right-sidebar');
	$page_sidebar = get_post_meta( $post -> ID, 'maggie_lite_page_sidebar_layout', true);
	if( $page_sidebar == 'global-sidebar' ){
		$sidebar_option = $global_sidebar;
	} else {
		$sidebar_option = $page_sidebar;
	}
	?>
	<div id="primary" class="content-area <?php echo esc_attr($sidebar_option);?>">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

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
	if($sidebar_option=='right-sidebar'){
		get_sidebar('right');
	}elseif($sidebar_option=='left-sidebar'){
		get_sidebar('left');
	}
	?>
</div>
<?php get_footer(); ?>
