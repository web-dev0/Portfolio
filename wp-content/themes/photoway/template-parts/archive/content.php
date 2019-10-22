<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Photoway 1.0.0
 */
?>

<?php
	$class = '';
	if( photoway_get_option( 'archive_post_layout' ) == 'grid' ){
		$class = 'col-lg-6 col-md-6 col-12 grid-post';
	}else {
		$class = 'col-12';
	}
	if( photoway_get_option( 'archive_post_layout' ) == 'grid' && photoway_get_option( 'archive_layout' ) == 'none' || photoway_is_search() ){
		$class = 'col-lg-4 col-md-6 col-12 grid-post';
	}
	if( photoway_is_search() ){
		$class = 'col-lg-3 col-md-4 col-12 grid-post';
	}
	if( is_sticky() ){
		$class = 'col-lg-12 col-md-12 col-12 grid-post';
	}
?>
<div class="<?php echo esc_attr( $class ); ?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
		<?php
			$size = 'photoway-1200-1600';
			$args = array(
				'size' => $size,
				);

			# Disabling dummy thumbnails when its in search page, also support for jetpack's infinite scroll
			if( 'post' != get_post_type() && photoway_is_search() ){
				$args[ 'dummy' ] = false;
			}
		?>
		<?php 
			if( photoway_get_option( 'archive_post_layout' ) == 'list' && has_post_thumbnail() ){
		?>
			<div class="row">
			<?php
				if( is_sticky() ){
					?>
						<div class="col-lg-12">
					<?php
				}else {
					?>
						<div class="col-lg-6">
					<?php
				}
			}
		?>
		<?php
			if( has_post_thumbnail() ):
		?>
			<?php photoway_post_thumbnail( $args ); ?>
		<?php
			endif;
		?>
		<?php 
			if( photoway_get_option( 'archive_post_layout' ) == 'list' && has_post_thumbnail() ){
		?>
			</div> <!-- end col-lg-6 -->
			<?php
				if( is_sticky() ){
					?>
						<div class="col-lg-12">
					<?php
				}else {
					?>
						<div class="col-lg-6">
					<?php
				}
			}
		?>
		<div class="post-content">
			<header class="entry-header">
				<?php if('post' == get_post_type() && !photoway_get_option( 'disable_archive_cat_link' ) ){ ?>
				<?php
					$photoway_cat = photoway_get_the_category();
					if( $photoway_cat ):
						?>
						<div class="entry-meta-cat">
							<?php
							$term_link = get_category_link( $photoway_cat[ 0 ]->term_id );
							?>
							<a href="<?php echo esc_url( $term_link ); ?>">
								<?php echo esc_html( $photoway_cat[0]->name ); ?>
							</a>
						</div>
					<?php
					endif;
				?>
				<?php } ?>
				<h3 class="entry-title">
					<a href="<?php the_permalink(); ?>">
						<?php echo get_the_title(); ?>
					</a>
				</h3>
			</header>
			<div class="post-text">
				<?php
					$excerpt_length = photoway_get_option( 'post_excerpt_length' );
					$sticky_simple_excerpt_length = photoway_get_option( 'sticky_simple_post_excerpt_length' );
					if( is_sticky() || photoway_get_option( 'archive_post_layout' ) == 'simple' ){
						photoway_excerpt( $sticky_simple_excerpt_length , true );
					}else {
						photoway_excerpt( $excerpt_length , true );
					}
				?>
			</div>
			<?php 
				if('post' == get_post_type() && !photoway_get_option( 'disable_archive_date') || !photoway_get_option( 'disable_archive_author' ) || !photoway_get_option( 'disable_archive_comment_link' ) ){ 
				?>
					<div class="meta-tag">
						<?php if( !photoway_get_option( 'disable_archive_date' ) ): ?>
							<div class="meta-time">
								<a href="<?php echo esc_url( photoway_get_day_link() ); ?>" >
									<?php echo esc_html(get_the_date('M j, Y')); ?>
								</a>
							</div>
						<?php endif; ?>
						<?php if( !photoway_get_option( 'disable_archive_author' ) ): ?>
							<div class="meta-author">
								<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
									<?php echo get_the_author(); ?>
								</a>
							</div>
						<?php endif; ?>
						<?php if( !photoway_get_option( 'disable_archive_comment_link' ) ): ?>
							<div class="meta-comment">
								<a href="<?php comments_link(); ?>">
									<?php echo absint( wp_count_comments( get_the_ID() )->approved ); ?>
								</a>
							</div>
						<?php endif; ?>
					</div>
				<?php } 
			?>
		</div>
		<?php 
			if( photoway_get_option( 'archive_post_layout' ) == 'list' && has_post_thumbnail() ){
				?>
					</div> <!-- end col-lg-6 -->
				</div> <!-- end row -->
				<?php
			}
		?>
	</article>
</div>