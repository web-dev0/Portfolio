<?php
/**
 * Template part for displaying contact content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Photoway 1.0.0
 */
?>

<?php
$class = '';

if( photoway_get_option( 'disable_contact_image' ) ){
	$class = 'no-image';
}else {
	$class = '';
}

if( !photoway_get_option( 'disable_contact' ) ): ?>
<section id="block-contact" class="block-contact <?php echo esc_attr( $class ); ?>" style="background-image: url(<?php echo photoway_contact_image_url(); ?>">
	<div class="contact-detail-container">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-6 offset-lg-3">
					<div class="contact-details-wrap">
						<?php if( photoway_get_option( 'contact_section_title' ) ): ?>
							<div class="section-title-group">
								<h2 class="section-title"><?php echo photoway_get_option( 'contact_section_title' ); ?></h2>
							</div>
						<?php endif; ?>
					</div>
					<div class="contact-form-section">
						<?php echo do_shortcode( photoway_get_option( 'contact_shortcode' ) ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="overlay"></div>
</section>
<?php
endif;