<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Maggie Lite
 */

if ( ! is_active_sidebar( 'maggie-sidebar-1' ) ) {
	return;
}
?>
<div id="secondary-right-sidebar">
<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'maggie-sidebar-1' ); ?>
</div><!-- #secondary -->
</div>