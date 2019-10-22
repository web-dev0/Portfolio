<?php
/**
 * Photoway functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since Photoway 1.0.0
 */

/**
 * Photoway works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

function photoway_scripts(){
	
	$style = array(
		'handler'  => 'photoway-style',
		'style'    => get_stylesheet_uri(),
		'absolute' => true,
	);

	$kf_icons =  array(
		'handler' => 'kfi-icons',
		'style'   => 'kf-icons/css/style.css',
		'version' => '1.0.0'
	);

	$bootstrap_rtl = '';
	if ( is_rtl() ) {
		$bootstrap_rtl = array(
			'handler' => 'bootstrap-rtl',
			'style'   => 'bootstrap/css/rtl/bootstrap.min.css',
			'version' => '4.1.3'
		);
	}

	# Enqueue Vendor's Script & Style
	$scripts = array(
		array(
			'handler'  => 'photoway-google-fonts',
			'style'    => esc_url( '//fonts.googleapis.com/css?family=Hind:300,400,400i,500,600,700,800,900|Playfair+Display:400,400italic,700,900'),
			'absolute' => true
		),
		array(
			'handler' => 'bootstrap',
			'style'   => 'bootstrap/css/bootstrap.min.css',
			'script'  => 'bootstrap/js/bootstrap.min.js', 
			'version' => '4.1.3'
		),
		$bootstrap_rtl,
		$kf_icons,
		array(
			'handler' => 'kfi-icons',
			'style'   => 'kf-icons/css/style.css',
			'version' => '1.0.0'
		),
		array(
			'handler' => 'owlcarousel',
			'style'   => 'OwlCarousel2-2.2.1/assets/owl.carousel.min.css',
			'script'  => 'OwlCarousel2-2.2.1/owl.carousel.min.js',
			'version' => '2.2.1'
		),
		array(
			'handler' => 'owlcarousel-theme',
			'style'   => 'OwlCarousel2-2.2.1/assets/owl.theme.default.min.css',
			'version' => '2.2.1'
		),
		array(
			'handler'  => 'photoway-blocks',
			'style'    => get_theme_file_uri( '/assets/css/blocks.min.css' ),
			'absolute' => true,
		),
		array(
			'handler'  => 'photoway-skip-link-focus-fix',
			'script'   => get_theme_file_uri( '/assets/js/skip-link-focus-fix.min.js' ),
			'absolute' => true,
		),
		array(
			'handler'    => 'photoway-script',
			'script'     => get_theme_file_uri( '/assets/js/main.min.js' ),
			'absolute'   => true,
			'prefix'     => '',
			'dependency' => array( 'jquery', 'masonry' )
		),
		$style
	);

	photoway_enqueue( apply_filters( 'photoway_scripts_styles', $scripts ) );

	$locale = apply_filters( 'photoway_localize_var', array(
		'is_admin_bar_showing'       => is_admin_bar_showing() ? true : false,
		'enable_scroll_top'          => photoway_get_option( 'enable_scroll_top' ) ? 1 : 0,
		'is_rtl'                     => is_rtl(),
		'search_placeholder'         => esc_html__( 'hit enter for search.', 'photoway' ),
		'search_default_placeholder' => esc_html__( 'search...', 'photoway' ),
		'home_slider' => array(
			'autoplay' => absint( !photoway_get_option( 'disable_slider_autoplay' ) ),
			'timeout'  => absint( photoway_get_option( 'slider_timeout' ) ) * 1000,
		),
		'fixed_nav' => !photoway_get_option( 'disable_fixed_header' ) ? true : false,
	));

	wp_localize_script( 'photoway-script', 'PHOTOWAY', $locale );

	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'photoway_scripts' );

/**
* Enqueue editor styles for Gutenberg
* 
* @since Photoway 1.0.0
*/

function photoway_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'photoway-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.min.css' ) );
	// Google Font
	wp_enqueue_style( 'photoway-google-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700,700i', false );
}
add_action( 'enqueue_block_editor_assets', 'photoway_block_editor_styles' );

/**
* Adds a submit button in search form
* 
* @since Photoway 1.0.0
* @param string $form
* @return string
*/
function photoway_modify_search_form( $form ){
	return str_replace( '</form>', '<button type="submit" class="search-button"><span class="kfi kfi-search"></span></button></form>', $form );
}
add_filter( 'get_search_form', 'photoway_modify_search_form' );

/**
* Modify some markup for comment section
*
* @since Photoway 1.0.0
* @param array $defaults
* @return array $defaults
*/
function photoway_modify_comment_form_defaults( $defaults ){

	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$defaults[ 'logged_in_as' ] = '<p class="logged-in-as">' . sprintf(
          /* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
          __( '<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a> <a href="%4$s">Log out?</a>', 'photoway' ),
          get_edit_user_link(),
          /* translators: %s: user name */
          esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.', 'photoway' ), $user_identity ) ),
          $user_identity,
          wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) )
      ) . '</p>';
	return $defaults;
}
add_filter( 'comment_form_defaults', 'photoway_modify_comment_form_defaults',99 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 *
 * @since Photoway 1.0.0
 * @return void
 */
function photoway_pingback_header(){
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'photoway_pingback_header' );

/**
* Add a class in body when previewing customizer
*
* @since Photoway 1.0.0
* @param array $class
* @return array $class
*/
function photoway_body_class_modification( $class ){
	if( is_customize_preview() ){
		$class[] = 'keon-customizer-preview';
	}
	
	if( is_404() || ! have_posts() ){
 		$class[] = 'content-none-page';
	}

	if( photoway_get_option( 'site_layout' ) == 'site_layout_full' ){

		$class[] = 'site-layout-full';
	}

	return $class;
}
add_filter( 'body_class', 'photoway_body_class_modification' );

if( ! function_exists( 'photoway_get_ids' ) ):
/**
* Fetches setting from customizer and converts it to an array
*
* @uses photoway_explode_string_to_int()
* @return array | false
* @since Photoway 1.0.0
*/
function photoway_get_ids( $setting ){

    $str = photoway_get_option( $setting );
    if( empty( $str ) )
    	return;

    return photoway_explode_string_to_int( $str );

}
endif;

if( ! function_exists( 'photoway_inner_banner' ) ):
/**
* Includes the template for inner banner
*
* @return void
* @since Photoway 1.0.0
*/
function photoway_inner_banner(){

	$description = false;
	$image = false;
	$title = false;
	if( class_exists( 'WooCommerce' ) && is_shop() ){

		# For woocommerce shop Page.
		$title       = woocommerce_page_title( false );
		$description = '';
		$image       = photoway_home_image_url();	

	}else if( is_archive() ){

		# For all the archive Pages.
		$title       = get_the_archive_title();
		$description = get_the_archive_description();
	}else if( !is_front_page() && is_home() ){

		# For Blog Pages.
		$title = single_post_title( '', false );
		$image = photoway_home_image_url();	
	}else if( is_search() ){

		# For search Page.
		$title = esc_html__( 'Search Results for: ', 'photoway' ) . get_search_query();
	}else if( is_front_page() && is_home() ){

		# If Latest posts page
		$title = photoway_get_option( 'archive_page_title' );
		$image = photoway_home_image_url();	
	}else if( is_front_page() ){

		# If static Page
		$title = get_the_title();
		$image = photoway_home_image_url();	

	}else if( is_404() ){
		# If 404 error Page
		$image = photoway_error_image_url();	
	}else{
		
		# For all the single Pages.
		$title = get_the_title();
	}

	$args = array(
		'title'       => $title,
		'description' => $description,
		'image'		  => $image	
	);

	set_query_var( 'args', $args );
	get_template_part( 'template-parts/inner', 'banner' );
}
endif;

if( !function_exists( 'photoway_get_icon_by_post_format' ) ):
/**
* Gives a css class for post format icon
*
* @return string
* @since Photoway 1.0.0
*/
function photoway_get_icon_by_post_format(){
	$icons = array(
		'standard' => 'kfi-pushpin-alt',
		'sticky'   => 'kfi-pushpin-alt',
		'aside'    => 'kfi-documents-alt',
		'image'    => 'kfi-image',
		'video'    => 'kfi-arrow-triangle-right-alt2',
		'quote'    => 'kfi-quotations-alt2',
		'link'     => 'kfi-link-alt',
		'gallery'  => 'kfi-images',
		'status'   => 'kfi-comment-alt',
		'audio'    => 'kfi-volume-high-alt',
		'chat'     => 'kfi-chat-alt',
	);

	$format = get_post_format();
	if( empty( $format ) ){
		$format = 'standard';
	}

	return apply_filters( 'photoway_post_format_icon', $icons[ $format ] );
}
endif;

if( !function_exists( 'photoway_has_sidebar' ) ):

/**
* Check whether the page has sidebar or not.
*
* @see https://codex.wordpress.org/Conditional_Tags
* @since Photoway 1.0.0
* @return bool Whether the page has sidebar or not.
*/
function photoway_has_sidebar(){

	if( is_page() || is_search() || is_single() ){
		return false;
	}

	return true;
}
endif;

/**
* Check whether the sidebar is active or not.
*
* @see https://codex.wordpress.org/Conditional_Tags
* @since Photoway 1.0.0
* @return bool whether the sidebar is active or not.
*/
function photoway_is_active_footer_sidebar(){

	for( $i = 1; $i <= 4; $i++ ){
		if ( is_active_sidebar( 'photoway-footer-sidebar-'.$i ) ) : 
			return true;
		endif;
	}
	return false;
}

if( !function_exists( 'photoway_is_search' ) ):
/**
* Conditional function for search page / jet pack supported
* @since Photoway 1.0.0
* @return Bool 
*/

function photoway_is_search(){

	if( ( is_search() || ( isset( $_POST[ 'action' ] ) && $_POST[ 'action' ] == 'infinite_scroll'  && isset( $_POST[ 'query_args' ][ 's' ] ))) ){
		return true;
	}

	return false;
}
endif;

function photoway_post_class_modification( $classes ){

	# Add no thumbnail class when its search page
	if( photoway_is_search() && ( 'post' !== get_post_type() && !has_post_thumbnail() ) ){
		$classes[] = 'no-thumbnail';
	}
	return $classes;
}
add_filter( 'post_class', 'photoway_post_class_modification' );

require_once get_parent_theme_file_path( '/inc/setup.php' );
require_once get_parent_theme_file_path( '/inc/template-tags.php' );
require_once get_parent_theme_file_path( '/modules/loader.php' );
require_once get_parent_theme_file_path( '/trt-customize-pro/doc-link/class-customize.php' );
require_once get_parent_theme_file_path( '/modules/tgm-plugin-activation/loader.php' );
require_once get_parent_theme_file_path( '/theme-info/theme-info.php' );


if( !function_exists( 'photoway_get_homepage_sections' ) ):
/**
* Returns the section name of homepage
* @since Photoway 1.0.0
* @return array 
*/
function photoway_get_homepage_sections(){

	$arr = array(
		'slider',
		'about',
		'blog',
		'callback',
		'testimonials',
		'contact',
		'instagram',
	);

	return apply_filters( 'photoway_homepage_sections', $arr );
}
endif;

/**
* Change number or products per row to 3
* @since Photoway 1.0.0
*/

add_filter('loop_shop_columns', 'loop_columns');
	if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

/**
* Allow skype protocols for social menu
* @since Photoway 1.0.0
*/

function ss_allow_skype_protocol( $protocols ){
    $protocols[] = 'skype';
    return $protocols;
}
add_filter( 'kses_allowed_protocols' , 'ss_allow_skype_protocol' );

/**
* Add a wrapper div to Woocommerce product
* @since Photoway 1.0.0
*/

function photoway_before_shop_loop_item(){
	echo '<div class="product-inner">';
}

add_action( 'woocommerce_before_shop_loop_item', 'photoway_before_shop_loop_item', 9 );

function photoway_after_shop_loop_item(){
	echo '</div>';
}

add_action( 'woocommerce_after_shop_loop_item', 'photoway_after_shop_loop_item', 11 );

/**
 * To remove kfi-icon from breadcrumb.
 *
 * @param array $items Breadcrumb items.
 * @param array $args Breadcrumb args.
 *
 * @since Photoway 1.0.0
 * @return array
 */

function photoway_breadcrumb_items( $items, $args ) {
	end($items);   
	$key = key($items);
	$last_item = $items[$key];
	$last_item = explode( '|', $last_item );
	$last_item = isset( $last_item[0] ) ? $last_item[0] : '';
	$items[ $key ] = $last_item;
	return $items;
}
add_filter( 'breadcrumb_trail_items', 'photoway_breadcrumb_items', 10, 2 );

/**
 * To disable archive prefix title.
 * @since Photoway 1.0.0
 */

function photoway_modify_archive_title( $title ) {
	if( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
    } elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
    } elseif ( is_year() ) {
        $title = get_the_date( _x( 'Y', 'yearly archives date format', 'photoway' ) );
    } elseif ( is_month() ) {
        $title = get_the_date( _x( 'F Y', 'monthly archives date format', 'photoway' ) );
    } elseif ( is_day() ) {
        $title = get_the_date( _x( 'F j, Y', 'daily archives date format', 'photoway' ) );
     } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

	return $title;
}

add_filter( 'get_the_archive_title', 'photoway_modify_archive_title' );

function photoway_remove_woocommerce_shop_description( $args ) {
	$args['description'] = '';
	return $args;
}
add_filter( 'woocommerce_register_post_type_product', 'photoway_remove_woocommerce_shop_description' );

function photoway_woo_show_page_title(){
	return false;
}
add_filter( 'woocommerce_show_page_title', 'photoway_woo_show_page_title' );
