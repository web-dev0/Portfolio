<?php
/**
 * Template part for displaying slider content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Photoway 1.0.0
 */

$layout_class = '';
if( photoway_get_option( 'slider_section_layout' ) == 'slider_section_layout_one' ){
	$layout_class = 'slider-layout-one';
}

$posts_per_page_count = photoway_get_option( 'slider_posts_number' );
$slider_page_id = photoway_get_ids( 'slider_page' );

if( !empty( $slider_page_id ) && is_array( $slider_page_id ) && count( $slider_page_id ) > 0 && !photoway_get_option( 'disable_slider' ) ){
?>
	<section id="block-slider" class="block-slider <?php echo esc_attr( $layout_class ); ?>">
		<?php
		if( !photoway_get_option( 'disable_slider_control' ) ):
			if( photoway_get_option( 'slider_layout' ) == 'slider_layout_one' ){ ?>
				<div class="owl-pager" id="slide-pager"></div>
			<?php
			}
		endif;
		?>
		<div class="home-slider owl-carousel">
			<?php
				$query = new WP_Query( apply_filters( 'photoway_slider_args', array(
					'posts_per_page' => $posts_per_page_count,
					'post_type'      => 'page',
					'orderby'        => 'post__in',
					'post__in'       => $slider_page_id,
				)));
				
				while ( $query->have_posts() ) : $query->the_post();
					$image = photoway_get_thumbnail_url( array( 'size' => 'photoway-1920-750' ) );
			?>
					<div class="slide-item" style="background-image: url( <?php echo esc_url( $image ); ?> );">
						<?php
							$class = '';
							if( photoway_get_option( 'slider_content_alignment' ) == 'center' ){
								$class = 'text-center';
							}
						?>
						<div class="banner-overlay">
							<div class="container">
						    	<div class="slide-inner <?php echo esc_attr( $class ); ?>">
									<div class="slider-content">
											<?php if( !photoway_get_option( 'disable_slider_title' ) ): ?>
												<h2 class="section-title">
													<a href="<?php the_permalink(); ?>">
														<?php the_title(); ?>
													</a>
												</h2>
											<?php endif;

												$excerpt_length = photoway_get_option( 'slider_excerpt_lenth' );
												if( !photoway_get_option( 'disable_slider_content' ) ){
													photoway_excerpt( $excerpt_length , true );
												}

												if( !photoway_get_option( 'disable_slider_button' ) ):
											?>

											<div class="button-container">
												<a href="<?php the_permalink(); ?>" class="button-outline">
													<?php
														echo photoway_get_option( 'slider_button_text' );
													?>
												</a>
											</div>
										<?php endif; ?>
									</div>
						    	</div>
							</div>
						</div>
					</div>
			<?php
				endwhile; 
				wp_reset_postdata(); 	
			?>
		</div>
		<?php if( !photoway_get_option( 'disable_slider_down_arrow' ) ): ?>
			<div class="scroll-down">
				<a href="#after-slider">
					<span class="down-one"></span>
					<span class="down-two"></span>
				</a>
			</div>
		<?php endif; ?>

		<div class="slider-shape">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 265.182">
				<g>
					<path opacity="0.2" fill="#FFFFFF" d="M1920.5,196.182v-167c-517,144-1450,233-1450,233L1920.5,196.182z"/>
					<path opacity="0.4" fill="#FFFFFF" d="M1920.5,238.182v-167c-517,144-1625,193-1625,193L1920.5,238.182z"/>
					<path fill="#FFFFFF" d="M1920.5,266.182v-167c-517,144-1920,167-1920,167H1920.5z"/>
				</g>
			</svg>
		</div>
			
		<div id="after-slider"></div>
	</section>
	<div id="content"></div>
<?php
}else {
		/**
		* Prints Title and breadcrumbs for archive pages
		* @since Blogberg Pro 1.0.0
		*/
	photoway_inner_banner();
} ?>