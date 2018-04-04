<?php
/**
 * Changelog
 */

$maggie_lite = wp_get_theme( 'maggie-lite' );
?>
<div class="featured-section changelog">
<?php
	WP_Filesystem();
	global $wp_filesystem;
	$maggie_lite_changelog       = $wp_filesystem->get_contents( get_template_directory() . '/readme.txt' );
	$changelog_start = strpos($maggie_lite_changelog,'== Changelog ==');
	$maggie_lite_changelog_before = substr($maggie_lite_changelog,0,($changelog_start+17));
	$maggie_lite_changelog = str_replace($maggie_lite_changelog_before,'',$maggie_lite_changelog);
	$maggie_lite_changelog_lines = explode( PHP_EOL, $maggie_lite_changelog );
	foreach ( $maggie_lite_changelog_lines as $maggie_lite_changelog_line ) {
		if ( substr( $maggie_lite_changelog_line, 0, 7 ) === "Version" ) {
			echo '<h4>' . substr( $maggie_lite_changelog_line,0, 14 ) . '</h4>';
		} else {
			echo esc_html( $maggie_lite_changelog_line ), '<br/>';
		}
	}
	echo '<hr />';
	?>
</div>