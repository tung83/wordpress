<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Maggie Lite
 */

if ( ! is_active_sidebar( 'maggie-sidebar-right' ) ) {
	return;
}
?>

<div id="secondary-right-sidebar" class="widget-area" role="complementary">
	<div id="secondary">
		<?php dynamic_sidebar( 'maggie-sidebar-right' ); ?>
	</div>
</div><!-- #secondary -->