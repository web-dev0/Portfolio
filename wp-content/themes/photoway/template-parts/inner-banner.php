<?php
/**
 * Template part for displaying Inner Banner Section for all the inner pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Photoway 1.0.0
 */
?>

<?php if( photoway_get_option( 'page_header_layout' ) == 'header_layout_one' ): ?>
	<section class="section-banner-wrap section-banner-one">
		<div class="wrap-outer-banner">
			<div class="overlay"></div>
			<div class="wrap-inner-banner" style="background-image: url('<?php if( is_front_page() || is_home() ){ echo wp_kses_post( $args[ 'image' ] ); } else if( is_404() ){ echo wp_kses_post( $args[ 'image' ] ); } else { header_image(); }  ?>')">
				<div class="container">
					<header class="page-header">
						<div class="inner-header-content">
							<?php 
								if( is_single() && !photoway_get_option( 'disable_single_date' ) ){
									photoway_time_link();
								}
							?>
							<?php if ( !photoway_get_option( 'disable_header_title' ) ){ ?>
								<h1 class="page-title"><?php echo wp_kses_post( $args[ 'title' ] ); ?></h1>
							<?php } ?>
							<?php if( $args[ 'description' ] ): 
								 if ( !photoway_get_option( 'disable_header_description' ) ){ ?>
									<div class="page-description">
										<?php echo wp_kses_post( $args[ 'description' ] ); ?>
									</div>
							<?php  } endif; ?>
						</div>
					</header>
				</div>
			</div>
			<?php if(!is_front_page() && !photoway_get_option( 'disable_bradcrumb' ) ): ?>
				<div class="breadcrumb-wrap">
					<div class="container">
						<?php 
							photoway_breadcrumb();
						?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>

<div id="content"></div>