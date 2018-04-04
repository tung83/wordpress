<?php
/**
 * The template for search form.
 *
 * @package Maggie Lite
 */
?>

<div class="search-icon">
	<i class="fa fa-search"></i>
	<div class="ed-search">
		<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get" role="search">
			<label>
				<span class="screen-reader-text"><?php _e( 'Search for:', 'maggie-lite' ) ?></span>
				<input type="search" title="<?php esc_attr_e( 'Search for:', 'maggie-lite' ); ?>" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search content...', 'maggie-lite' );?>" class="search-field" />
			</label>
			<button type="submit" class="search-submit" title="<?php esc_attr_e( 'Search', 'maggie-lite' ); ?>"><i class="fa fa-search"></i></button>
		</form>
		<i class="fa fa-close"></i>
	</div>
</div> 
