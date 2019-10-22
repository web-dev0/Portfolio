<?php
/**
 * Template part for displaying Off-canvas Menu
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Photoway 1.0.0
 */
?>

<div id="offcanvas-menu">
	<div class="offcanvas-menu-wrap">
		<div id="primary-nav-offcanvas" class="offcanvas-navigation d-xl-none d-lg-block">
			<?php echo photoway_get_menu( 'primary' ); ?>
		</div>
		<div id="secondary-nav-offcanvas" class="offcanvas-navigation d-none d-lg-block">
			<?php photoway_get_menu( 'secondary' ); ?>
		</div>
		<?php
			if ( is_active_sidebar( 'header-sidebar' ) ):
		?>
		<div class="col-12">
			<sidebar class="sidebar clearfix" id="primary-sidebar">
				<?php dynamic_sidebar( 'header-sidebar' ); ?>
			</sidebar>
		</div>
		<?php
			endif;
		?>
		<div class="close-offcanvas-menu">
			<button class="kfi kfi-close-alt2"></button>
		</div>
	</div>
</div>