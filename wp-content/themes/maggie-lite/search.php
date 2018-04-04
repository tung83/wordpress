<?php
/**
 * The template for displaying search results pages.
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
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><span><?php printf( __( 'Search Results for: %s', 'maggie-lite' ), '</span><span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php 
			$show_post_navigation = get_theme_mod('post_option_nav_post',true);
			if($show_post_navigation!='0'){the_posts_pagination();}
			?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->
</section><!-- #primary -->

</div>
<?php get_footer(); ?>
