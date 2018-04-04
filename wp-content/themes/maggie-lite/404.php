<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Maggie Lite
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<section class="error-404 not-found">
			<div class="maggie-container">
				<div class="page-content">
					<header class="page-header">
						<h1 class="page-title">
							<span><?php echo _e('Oops!! Sorry, we can not find this page','maggie-lite')?></span>
						</h1>	
					</header>
					<div class="page-404-wrap clearfix">
						<span class="oops"><?php _e( 'It seems like the given url is incorrect.', 'maggie-lite' );?></span>
						<div class="error-num"> 
							<span class="num"><?php _e( 'Error', 'maggie-lite' );?></span>
							<span class="not_found"><?php _e( '404', 'maggie-lite' );?></span>
						</div>
					</div>
				</div><!-- .page-content -->
			</div>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>