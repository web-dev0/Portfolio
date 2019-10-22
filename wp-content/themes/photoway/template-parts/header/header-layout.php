<?php
/**
 * Template part for displaying header layout
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Photoway 1.0.0
 */
?>

<header id="masthead" class="wrapper header-primary site-header" role="banner">
	<div class="header-group-wrap">
		<div class="main-navigation-wrap">
			<div class="container">
				<div class="main-navigation-inner">
					<div class="row align-items-center">
						<?php if( display_header_text() || has_custom_logo() ): ?>
							<div class="col-6 col-lg-3">
								<?php
									get_template_part( 'template-parts/header/site', 'branding' );
								?>
							</div>
						<?php endif; ?>
						<div class="d-none d-lg-block col-lg-7" id="primary-nav-container">
							<div class="wrap-nav main-navigation">
								<div id="navigation" class="d-xl-block">
									<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'photoway' ); ?>">
										<?php echo photoway_get_menu( 'primary' ); ?>
									</nav>
								</div>
							</div>
						</div>
						<div class="col-6 col-lg-2" id="header-bottom-right-outer">
							<div class="header-icons-wrap text-right">
								<?php
									get_template_part('template-parts/header/header', 'search');
								
									$hamburger_menu_class = '';
									if( photoway_get_option( 'disable_hamburger_menu_icon' ) ){
										$hamburger_menu_class = 'd-inline-block d-lg-none';
									}
								?>
								<button class="offcanvas-menu-toggler alt-menu-icon <?php echo esc_attr( $hamburger_menu_class ); ?>">
										<span class="icon-bar"></span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Search form structure -->
	<div class="header-search-wrap">
		<div id="header-search-form">
			<?php get_search_form(); ?>
		</div>
		<button class="header-search-close">
			<span class="kfi kfi-close-alt2"></span>
		</button>
	</div>
	<?php get_template_part( 'template-parts/header/offcanvas', 'menu' ); ?>
</header>