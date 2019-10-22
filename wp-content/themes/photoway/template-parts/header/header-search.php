<?php
/**
 * Template part for displaying header search
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Photoway 1.0.0
 */
?>

<?php if( !photoway_get_option( 'disable_search_icon' ) ): ?>
	<button class="header-search-icon" id="show-header-search">
		<span class="kfi kfi-search" aria-hidden="true"></span>
	</button>
<?php endif; ?>