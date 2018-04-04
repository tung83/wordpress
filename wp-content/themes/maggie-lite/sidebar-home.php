<?php
/**
* The sidebar containing the main widget area.
*
* @package Maggie Lite
*/
$sidebar_class = 'right-sidebar';
$page_sidebar = get_post_meta( $post -> ID, 'maggie_lite_page_sidebar_layout', true);
if( $page_sidebar!='no-sidebar' && $page_sidebar != '' ){
	$sidebar_class = $page_sidebar ;
}
?>
<div id="secondary-<?php echo esc_attr($sidebar_class);?>">
	<div id="secondary" class="secondary-wrapper">
		<?php if ( is_active_sidebar( 'maggie-home-sidebar' )) { ?>
			<div id="home-top-sidebar" class="widget-area wow fadeInUp no-padding-top" data-wow-delay="0.5s" role="complementary">
				<?php dynamic_sidebar( 'maggie-home-sidebar' ); ?>
			</div>
		</div><!-- #secondary -->
		<?php 
	}
	?>
</div><!--Secondary-right-sidebar-->