<?php
/**
 * The template for displaying archived woocommerce products
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @since Photoway 1.0.0
 */
get_header(); 
# Print banner with breadcrumb and post title.
photoway_inner_banner();
?>
<section class="wrap-detail-page">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8">
				<main id="main" class="post-detail-content woocommerce-products" role="main">
					<?php if ( have_posts() ) :
						woocommerce_content();
					endif;
					?>
				</main>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php
get_footer();
