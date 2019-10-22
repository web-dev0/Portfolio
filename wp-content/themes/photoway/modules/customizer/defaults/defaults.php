<?php
/**
* Generates default options for customizer.
*
* @since  Photoway 1.0.0
* @access public
* @param  array $options 
* @return array
*/
	
function Photoway_Default_Options( $options ){

	$defaults = array(
		# Site Identity
		'site_title'         	              => esc_html__( 'Photoway', 'photoway' ),
		'site_tagline'       	              => esc_html__( 'Capture your sweet memories', 'photoway' ),
		'site_identity_options'               => 'site_identity_show_all',

		# Header Image
		'page_header_overlay_opacity'         => 3,
		'home_overlay_opacity'    	          => 3,
		'error_overlay_opacity'    	          => 3,

		# Color
		'site_title_color'   	              => '#111111',
		'site_tagline_color' 	              => '#4d4d4d',
		'site_body_text_color'   	          => '#313131',

		'site_primary_color' 	              => '#D96D5C',
		'site_hover_color' 	                  => '#083a6f',

		# Front page options
		# General
		'section_title_layout'                => 'layout_one',

		# Slider
		'slider_layout'    	 			      => 'slider_layout_one',
		'slider_posts_number'    	          => 2,
		'slider_section_layout'               => 'slider_section_layout_one',
		'slider_overlay_opacity'    	      => 3,
		'slider_content_alignment'    	      => 'center',
		'disable_slider_title'                => false,
		'slider_excerpt_lenth'                => 30,
		'disable_slider_content'              => true,
		'slider_button_text'    	          => esc_html__( 'Continue Reading', 'photoway' ),
		'disable_slider_button'               => true,
		'disable_slider_control'     	      => false,
		'disable_slider_autoplay'    	      => true,
		'slider_timeout'     	              => 5,
		'disable_slider_down_arrow'    	      => false,
		'disable_slider'    	              => false,

		# About
		'about_section_layout'                => 'about_section_layout_one',
		'disable_about_title'                 => false,
		'about_excerpt_lenth'                 => 50,
		'disable_about_content'               => false,
		'about_button_text'                   => esc_html__( 'Learn more', 'photoway' ),
		'disable_about_button'                => false,
		'disable_about'                       => false,

		# Blog
		'blog_section_title'                  => esc_html__( 'Creative Gallery', 'photoway' ),
		'blog_section_layout'                 => 'blog_section_layout_one',
		'blog_posts_number'                   => 6,
		'blog_post_overlay_opacity'           => 3,
		'disable_blog_overlay'                => false,
		'disable_blog_category_title'         => false,
		'disable_blog_post_title'             => false,
		'disable_blog'    	                  => false,

		# Callback
		'callback_section_layout'             => 'callback_section_layout_one',
		'disable_callback_title'              => false,
		'callback_image_overlay_opacity'      => 3,
		'callback_excerpt_lenth'              => 25,
		'disable_callback_content'            => false,
		'callback_button_text'                => esc_html__( 'Learn more', 'photoway' ),
		'disable_callback_button'             => false,
		'disable_callback'                    => false,

		# Testimonial
		'testimonial_section_layout'          => 'testimonial_section_layout_one',
		'testimonial_section_title'           => esc_html__( 'Client Testimonials', 'photoway' ),
		'testimonial_posts_number'    	      => 2,
		'disable_testimonial'                 => false,

		# Instagram
		'instagram_section_layout'            => 'instagram_section_layout_one',
		'enable_instagram'                    => true,

		# Contact
		'contact_section_layout'              => 'contact_section_layout_one',
		'disable_contact_image'               => false,
		'contact_image_overlay_opacity'       => 3,

		// Contact info
		'contact_section_title'               => esc_html__( 'Contact Us', 'photoway' ),

		// Contact Detail
		'disable_contact'                     => false,

		# Theme options
		# Header
		'header_layout'                       => 'header_one',
		'disable_search_icon'                 => false,
		'disable_hamburger_menu_icon'         => false,
		'disable_fixed_header'                => false,

		# Footer
		'footer_layout'                       => 'footer_one',
		'disable_footer_widget'               => false,
		'footer_text'                         => photoway_get_footer_text(),

		# Layout
		'site_layout'			              => 'site_layout_full',
		'archive_layout'			          => 'right',
		'archive_post_layout'                 => 'grid',
		'single_layout'			              => 'right',
		'page_layout'			              => 'none',

		# Archive
		'archive_page_title'			      => esc_html__( 'Lorem Ipsum is simply dummy text', 'photoway' ),
		'disable_archive_cat_link'            => false,
		'disable_archive_date'                => false,
		'disable_archive_author'              => false,
		'disable_archive_comment_link'        => false,
		'post_excerpt_length'                 => 10,
		'sticky_simple_post_excerpt_length'   => 25,
		'disable_pagination'                  => false,

		# Single
		'disable_single_date'                 => false,
		'disable_single_post_format'          => false,
		'disable_single_tag_links'            => false,
		'disable_single_cat_links'            => false,
		'disable_single_author'               => false,
		'disable_single_title_tag'            => false,
		'single_post_nav_prev'                => esc_html__( 'Previous Reading', 'photoway' ),
		'single_post_nav_next'                => esc_html__( 'Next Reading', 'photoway' ),

		# Page
		'disable_front_page_title'            => true,
		'disable_page_feature_image'          => false,

		# General
		'site_loader_options'                 => 'site_loader_one',
		'disable_site_loader'                 => false,
		'enable_scroll_top'                   => true,
		'page_header_layout'                  => 'header_layout_one',
		'breadcrumb_separator_layout'         => 'separator_layout_one',
		'enable_breadcrumb_home_icon'         => true,
		'disable_bradcrumb'                   => false,
		'enable_instagram'                    => true,
		'disable_header_title'		          => false,
		'disable_header_description'		  => false,
		
	);

	return array_merge( $options, $defaults );
}
add_filter( 'Photoway_Customizer_Defaults', 'Photoway_Default_Options' );

if( !function_exists( 'photoway_get_footer_text' ) ):
/**
* Generate Default footer text
*
* @return string
* @since Photoway 1.0.0
*/

function photoway_get_footer_text(){
	$text = esc_html__( 'Copyright &copy; 2019.', 'photoway' );
							
	return $text;
}
endif;