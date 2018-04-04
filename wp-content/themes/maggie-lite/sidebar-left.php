<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Maggie Lite
 */
if ( ! is_active_sidebar( 'maggie-sidebar-left' ) ) {
	return;
}
?>

<div id="secondary-left-sidebar" class="widget-area" role="complementary">
	<div id="secondary">
		<?php dynamic_sidebar( 'maggie-sidebar-left' ); ?>
	</div>
</div><!-- #secondary -->