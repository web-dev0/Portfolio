<?php

/**
* Helper functions related to image lives here
* @since Photoway 1.0.0
*/
if ( ! function_exists( 'photoway_get_image_sizes' ) ) :
/**
 * Get size information for all currently-registered image sizes.
 *
 * @since  Photoway 1.0.0
 * @global $_wp_additional_image_sizes
 * @uses   get_intermediate_image_sizes()
 * @return array $sizes Data for all currently-registered image sizes.
 */
function photoway_get_image_sizes() {
	global $_wp_additional_image_sizes;

	$sizes = array();

	foreach ( get_intermediate_image_sizes() as $_size ) {
		if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
			$sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
			$sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
			$sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
		} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
			$sizes[ $_size ] = array(
				'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
				'height' => $_wp_additional_image_sizes[ $_size ]['height'],
				'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
			);
		}
	}

	return $sizes;
}
endif;

if ( ! function_exists( 'photoway_get_image_size' ) ) :
/**
* Get size information for a specific image size.
*
* @since  Photoway 1.0.0
* @uses   photoway_get_image_sizes()
* @param  string $size The image size for which to retrieve data.
* @return bool|array $size Size data about an image size or false if the size doesn't exist.
*/
function photoway_get_image_size( $size ) {
	$sizes = photoway_get_image_sizes();

	if ( isset( $sizes[ $size ] ) ) {
		return $sizes[ $size ];
	}

	return false;
}
endif;

if ( ! function_exists( 'photoway_get_image_width' ) ) :
/**
* Get the width of a specific image size.
*
* @since  Photoway 1.0.0
* @uses   photoway_get_image_size()
* @param  string $size The image size for which to retrieve data.
* @return bool|string $size Width of an image size or false if the size doesn't exist.
*/
function photoway_get_image_width( $size ) {
	if ( ! $size = photoway_get_image_size( $size ) ) {
		return false;
	}

	if ( isset( $size['width'] ) ) {
		return $size['width'];
	}

	return false;
}
endif;

if ( ! function_exists( 'photoway_get_image_height' ) ) :
/**
* Get the height of a specific image size.
*
* @since  Photoway 1.0.0
* @uses   photoway_get_image_size()
* @param  string $size The image size for which to retrieve data.
* @return bool|string $size Height of an image size or false if the size doesn't exist.
*/
function photoway_get_image_height( $size ) {
	if ( ! $size = photoway_get_image_size( $size ) ) {
		return false;
	}

	if ( isset( $size['height'] ) ) {
		return $size['height'];
	}

	return false;
}
endif;


if( ! function_exists( 'photoway_post_thumbnail' ) ):
/**
* Prints featured image or dummy image if no featured image for posts
*
* @since  Photoway 1.0.0
* @param  array $args
* @param  bool $show_eye whether to show eye icon while hover. default: true.
* @return void
*/
function photoway_post_thumbnail( $args ){

	$defaults = array(
		'size'      => 'large',
		'dummy'     => false,
		'permalink' => true
	);

	$args = wp_parse_args( $args, $defaults );
	# Don't print even the div when no thumbnail and dummy is disabled
	if( '' == get_the_post_thumbnail() && !$args[ 'dummy' ] ){
		return;	
	} 
	?>
	    <figure class="featured-image">
		    <?php if( $args[ 'permalink' ] ): ?>
			    <a href="<?php the_permalink(); ?>">
		    	<?php 
			    	if (  '' !== get_the_post_thumbnail() ){
			    		the_post_thumbnail( $args[ 'size' ] ); 
			    	}else{

			    		# Returns the placeholder image
			    		$feat_image_url = photoway_get_dummy_image( array(
			    			'size' => $args[ 'size' ]
			    		) );
			    		echo sprintf( '<img src="%s" >', esc_url( $feat_image_url ) ); 
			    	}
		    	?>
		    	</a>
	    	<?php endif; ?> 
	    </figure>
	<?php
}
endif;

if ( ! function_exists( 'photoway_get_dummy_image' ) ) :
/**
* Generates placeholder image url
*
* @since  Photoway 1.0.0
* @param  string $size The image size for which to retrieve data.
* @return string Url of the dummy image. 
*/
function photoway_get_dummy_image( $args ) {
    
    $defaults = array(
        'size' => 'thumbnail',
    );

    $args = wp_parse_args( $args, $defaults );

    if( 'thumbnail' == $args[ 'size' ] ){
    	
    	$width = $height = '150';
    }else if( 'medium' == $args[ 'size' ] ){

    	$width = $height = '300';
    }else if( 'large' == $args[ 'size' ] ){

    	$width = $height = '1024';
	}else{

	    $width  = photoway_get_image_width( $args[ 'size' ] );
	    $height = photoway_get_image_height( $args[ 'size' ] );
    }

    $url = get_theme_file_uri( 'assets/images/placeholder/photoway-' . $width . '-' . $height . '.png' );

    return apply_filters( 'photoway_dummy_image_url', $url, $args );
}
endif;

if( ! function_exists( 'photoway_get_thumbnail_url' ) ):
/**
* Gets the url of Featured Image if not a dummy url.
*
* @since Photoway 1.0.0
* @return string | NULL
*/
function photoway_get_thumbnail_url( $args ){

	$defaults = array(
		'size'  => 'large',
		'dummy' => true
	);

	$args = wp_parse_args( $args, $defaults );
	$dummy = false;

	if( $args[ 'dummy' ] ){
		$dummy =  photoway_get_dummy_image( array(
	    	'size' => $args[ 'size' ],
	    ));
	}

	$url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), $args[ 'size' ] ) : $dummy;
	
	return $url;
}
endif;


if( !function_exists( 'photoway_contact_image_url' ) ):
/**
* Return banner image url for Contact section
*
* @since  Photoway 1.0.0
* @uses   photoway_get_option()
* @return string
*/
function photoway_contact_image_url(){

	$url = photoway_get_option( 'contact_image' );

	if( !$url ){
		$url = get_theme_file_uri( 'assets/images/placeholder/photoway-banner-1920-850.jpg' );
	}

	if ( is_int( $url ) ) {
		$url = wp_get_attachment_url( $url );
	}

	return apply_filters ( 'photoway_contact_image', $url );
}
endif;


if( !function_exists( 'photoway_home_image_url' ) ):
/**
* Return banner image url for Home page
*
* @since  Photoway 1.0.0
* @uses   photoway_get_option()
* @return string
*/
function photoway_home_image_url(){

	$url = photoway_get_option( 'home_page_image' );

	if( !$url ){
		$url = get_theme_file_uri( 'assets/images/placeholder/photoway-banner-1920-650.jpg' );
	}

	if ( is_int( $url ) ) {
		$url = wp_get_attachment_url( $url );
	}

	return apply_filters ( 'photoway_home_image_url', $url );
}
endif;


if( !function_exists( 'photoway_error_image_url' ) ):
/**
* Return banner image url for Error page
*
* @since  Photoway 1.0.0
* @uses   photoway_get_option()
* @return string
*/
function photoway_error_image_url(){

	$url = photoway_get_option( 'error_page_image' );

	if( !$url ){
		$url = get_theme_file_uri( 'assets/images/placeholder/photoway-banner-1920-380.jpg' );
	}

	if ( is_int( $url ) ) {
		$url = wp_get_attachment_url( $url );
	}

	return apply_filters ( 'photoway_error_image_url', $url );
}
endif;

if( !function_exists( 'photoway_logo_image_url' ) ):
/**
* Return image url for alternate logo
*
* @since  Photoway 1.0.0
* @uses   photoway_get_option()
* @return string
*/
function photoway_logo_image_url(){

	$url = photoway_get_option( 'fixed_header_logo' );

	if ( is_int( $url ) ) {
		$url = wp_get_attachment_url( $url );
	}

	return apply_filters ( 'photoway_logo_image_url', $url );
}
endif;