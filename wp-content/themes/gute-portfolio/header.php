<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gute
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open();} ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gute-portfolio' ); ?></a>

	<header id="masthead" class="site-header bg-dark text-light shadow-lg">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="site-branding">
						<?php
						if(has_custom_logo()):
							the_custom_logo();
						else:
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a class="text-white" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></p>
							<?php
						endif;
						 
						 endif; ?>
					</div><!-- .site-branding -->
				</div>
				<div class="col-md-8">
						<nav class="navbar navbar-expand-lg main-menu">
						    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle Navigation', 'gute-portfolio' ); ?>">
						        <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
						    </button>
						    <div class="collapse navbar-collapse" id="navbar-content">
						        <?php
						        wp_nav_menu( array(
						            'theme_location' => 'menu-1', // Defined when registering the menu
						            'menu_id'        => 'primary-menu',
						            'container'      => false,
						            'depth'          => 2,
						            'menu_class'     => 'navbar-nav ml-auto',
						            'fallback_cb'     => 'Bootstrap_NavWalker::fallback',
						            'walker'         => new Bootstrap_NavWalker()
						        ) );
						        ?>
						    </div>
						</nav>	
					</div>
			</div>
		</div>

	</header><!-- #masthead style="background: url(http://localhost/easy/wp-content/uploads/2018/07/bg3.jpg) -->
	<?php if (is_home()): 

		$home_text = get_theme_mod('home_text', __('I Am John Stevenson','gute-portfolio') );
		$gute_banner_text_align = get_theme_mod('gute_banner_text_align','left' );
		$home_subtext = get_theme_mod('home_subtext',  __('WordPress Developer and Web Designer','gute-portfolio') );
		$btn_text_one = get_theme_mod('btn_text_one',  __('Contact Me','gute-portfolio') );
		$btn_url_one = get_theme_mod('btn_url_one','#' );
		$btn_text_two = get_theme_mod('btn_text_two',  __('Hire Me','gute-portfolio') );
		$btn_url_two = get_theme_mod('btn_url_two','' );
		$gute_header_img_show = get_theme_mod('gute_header_img_show', 1 );
	?>
	<section class="home-banner">
		<?php
		if(has_header_image() && $gute_header_img_show == 1 ){
	 		the_header_image_tag();	
		}elseif( $gute_header_img_show == 1 ){
			echo '<img src="'.esc_url(get_stylesheet_directory_uri().'/assets/img/header-img.jpg').'" alt="'.esc_attr('Header image','gute-portfolio').'">';
		}

		if( $gute_header_img_show == 1 ):
	 	?>
	 	<div class="overlay-text"></div>
		<div class="banner-text text-<?php echo esc_attr($gute_banner_text_align); ?>">
			<div class="container">
				<h1 id="hometitle" class="text-light"><?php echo esc_html($home_text); ?></h1>
				<h3 id="homesubtitle" class="text-white"><?php echo esc_html($home_subtext); ?> 
				</h3>
				<?php if($btn_text_one ): ?>
				<a id="btnone" href="<?php echo esc_url($btn_url_one); ?>" class="btn-two btn btn-outline-light shadow-lg"><?php echo esc_html($btn_text_one); ?></a>
			<?php endif;
				if ($btn_text_two):
			 ?>
				<a id="btntwo" href="<?php echo esc_url($btn_url_two); ?>" class="btn-two btn btn-outline-light shadow-lg"><?php echo esc_html($btn_text_two); ?></a>
			<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
	</section>
	<?php endif; ?>
	<div id="content" class="site-content">
