<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Maggie Lite
 */


if ( ! function_exists( 'maggie_lite_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 */
function maggie_lite_post_navigation() {
	$trans_next = __( 'Next article', 'maggie-lite' );
	$trans_prev = __( 'Previous article', 'maggie-lite' );
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation clearfix" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'maggie-lite' ); ?></h2>
		<div class="nav-links">
			<?php
			previous_post_link( '<div class="nav-previous"><div class="link-caption"><i class="fa fa-angle-left"></i>'.esc_attr( $trans_prev ).'</div>%link</div>', '%title' );
			next_post_link( '<div class="nav-next"><div class="link-caption">'.esc_attr( $trans_next ).'<i class="fa fa-angle-right"></i></div>%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'maggie_lite_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function maggie_lite_posted_on() {
	$show_post_date = get_theme_mod('post_option_date','1');
	$show_author = get_theme_mod('post_option_author','1');
	
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string_human = human_time_diff(get_the_modified_time( 'U' ),current_time('timestamp')).' '.__('ago','maggie-lite');
		$time_string = '<time class="entry-date published" datetime="%1$s">'.$time_string_human.'</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date('M d, Y') ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date('M d, Y') )
		);
	
	if($show_post_date==1){
		$posted_on = $time_string;
	} else {
		$posted_on = '';
	}	
	
	if($show_author==1){
		$byline = sprintf(
			_x( 'By %s', 'post author', 'maggie-lite' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);
	} else {
		$byline='';
	}	
	$echostring = '';
	if($byline!=''){
		$echostring = '<span class="byline"> ' . $byline . ' </span>';
	}
	if($posted_on!=''){
		$echostring .= '<span class="posted-on">' . $posted_on . '</span>';
	}
	echo $echostring;
}
endif;

if ( ! function_exists( 'maggie_lite_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function maggie_lite_entry_footer() {
	if( 'post' == get_post_type() && is_single() )
	{
		global $post;
		$post_source_name   = get_post_meta($post->ID, 'post_source_name', true);
		$post_source_url    = get_post_meta($post->ID, 'post_source_url', true);
		$post_via_name      = get_post_meta($post->ID, 'post_via_name', true);
		$post_via_url       = get_post_meta($post->ID, 'post_via_url', true);
		if(!empty($post_via_name)){
			?>
			<div class="post-via-wrapper">
				<label class="via"><?php echo __( 'Via', 'maggie-lite' );?></label>
				<a href="<?php echo esc_attr( $post_via_url );?>" target="_blank">
					<span class="via-name"><?php echo esc_attr( $post_via_name ); ?></span>
				</a> 
			</div>
			<?php
		}
		if(!empty($post_source_name)){
			?>
			<div class="post-source-wrapper">
				<label class="source"><?php echo __( 'Source', 'maggie-lite' );?></label>
				<a href="<?php echo esc_attr( $post_source_url ); ?>" target="_blank">
					<span class="source-name"><?php echo esc_attr( $post_source_name ); ?></span>
				</a>
			</div>
			<?php
		}
	}
	if('post'==get_post_type() && !is_tag() ){
		$maggie_lite_show_tags = get_theme_mod('post_option_tag','1');
		if($maggie_lite_show_tags!='0'){
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list();
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'maggie-lite' ) . '</span>', $tags_list );
			}
		}
	}

	edit_post_link( __( 'Edit', 'maggie-lite' ), '<span class="edit-link">', '</span>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function maggie_lite_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'maggie_lite_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
			) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'maggie_lite_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so maggie_lite_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so maggie_lite_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in maggie_lite_categorized_blog.
 */
function maggie_lite_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'maggie_lite_categories' );
}
add_action( 'edit_category', 'maggie_lite_category_transient_flusher' );
add_action( 'save_post',     'maggie_lite_category_transient_flusher' );