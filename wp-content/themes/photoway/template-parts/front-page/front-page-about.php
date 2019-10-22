<?php
/**
 * Template part for displaying about content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Photoway 1.0.0
 */
?>

<?php

$layout_class = '';
if( photoway_get_option( 'about_section_layout' ) == 'about_section_layout_one' ){
	$layout_class = 'about-layout-one';
}

if( !photoway_get_option( 'disable_about' ) && photoway_get_option( 'about_page' ) ): ?>
	<section id="block-about" class="block-about <?php echo esc_attr( $layout_class ); ?>">
		<div class="container">
			<div class="thumb-block-outer">
				<div class="row align-items-center">
					<?php
						$about_id = photoway_get_option( 'about_page' );
						if( $about_id ):
							$query = new WP_Query( apply_filters( 'photoway_about_page_args',  array(
								'post_type'  => 'page',
								'p'          => $about_id,
						)));
						while( $query->have_posts() ):
							$query->the_post();
							$image = photoway_get_thumbnail_url( array(
								'size' => 'photoway-1200-1600'
							));
						if( photoway_get_option( 'about_section_layout' ) == 'about_section_layout_one' ):
					?>

						<?php
							$content_column_class = '';
							if( !photoway_get_option( 'disable_about_feature_image' ) ){
								$content_column_class = 'col-12 col-md-7';
							}else {
								$content_column_class = 'col-12 col-md-12';
							}

							if( !photoway_get_option( 'disable_about_feature_image' ) ):
						?>
							<div class="col-12 col-md-5">
								<div class="thumb-outer">
									<div class="thumb-inner">
										<img src="<?php echo esc_url( $image );?>">
									</div>
								</div>
							</div>
						<?php endif; ?>
						<div class="<?php echo esc_attr( $content_column_class ); ?>">
							<div class="about-content">
								<?php if( !photoway_get_option( 'disable_about_title' ) ): ?>
									<div class="section-title-group">
										<h2 class="section-title">
											<?php the_title(); ?>
										</h2>
									</div>
								<?php endif;

								$excerpt_length = photoway_get_option( 'about_excerpt_lenth' );
								if( !photoway_get_option( 'disable_about_content' ) ){
									photoway_excerpt( $excerpt_length , true );
								}
								
									if( !photoway_get_option( 'disable_about_button' ) ):
								?>

								<div class="button-container">
									<a href="<?php the_permalink(); ?>" class="button-outline">
										<?php
											echo photoway_get_option( 'about_button_text' );
										?>
									</a>
								</div>
							<?php endif; ?>
							</div>
						</div>
					<?php 
						endif;
						endwhile;
						wp_reset_postdata();
						endif;
					?>
				</div>
			</div>
		</div>	
	</section>
<?php
endif;