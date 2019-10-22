<?php
/**
 * Template part for displaying instagram content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Photoway 1.0.0
 */
?>

<?php 
	/**
	* Prints Instagram
	* 
	* @since Photoway 1.0.0
	*/
	if( photoway_get_option( 'enable_instagram' ) ){
		?>
		<section id="block-instagram" class="block-instagram">
			<div class="container">
    			<?php echo do_shortcode( photoway_get_option( 'insta_shortcode' ) ); ?>
			</div>
		</section>
		<?php
	}
?>
