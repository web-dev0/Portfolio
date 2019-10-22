<?php
/**
* Sets settings for general fields
*
* @since  Photoway 1.0.0
* @param  array $settings
* @return array Merged array
*/

function Photoway_Customizer_General_Settings( $settings ){

	$general = array(
		# Site Identity
		'site_identity_options' => array(
			'label'    => esc_html__( 'Site Identity Extra Options', 'photoway' ),
			'section'  => 'title_tagline',
			'priority' => 50,
			'type'     => 'radio',
			'choices'  => array(
				'site_identity_hide_all'     => esc_html__( 'Hide All', 'photoway' ),
				'site_identity_show_all'     => esc_html__( 'Show All', 'photoway' ),
				'site_identity_title_only'   => esc_html__( 'Title Only', 'photoway' ),
				'site_identity_tagline_only' => esc_html__( 'Tagline Only', 'photoway' ),
				'site_identity_logo_title'   => esc_html__( 'Logo + Title', 'photoway' ),
				'site_identity_logo_tagline' => esc_html__( 'Logo + Tagline', 'photoway' ),
			),
		),
		'fixed_header_logo'  => array(
			'label'  		 => esc_html__( 'Alternate Logo for Fixed Header', 'photoway' ),
			'section'		 => 'title_tagline',
			'type'    		 => 'image',
			'flex_width'     => true,
			'flex_height'    => true,
		),
		
		# Color
		'site_title_color' => array(
			'label'     => esc_html__( 'Site Title', 'photoway' ),
			'section'   => 'colors',
			'type'      => 'colors',
		),
		'site_tagline_color' => array(
			'label'     => esc_html__( 'Site Tagline', 'photoway' ),
			'section'   => 'colors',
			'type'      => 'colors',
		),
		'site_body_text_color' => array(
			'label'     => esc_html__( 'Body Text', 'photoway' ),
			'section'   => 'colors',
			'type'      => 'colors',
		),
		'site_primary_color' => array(
			'label'     => esc_html__( 'Primary', 'photoway' ),
			'section'   => 'colors',
			'type'      => 'colors',
		),
		'site_hover_color' => array(
			'label'     => esc_html__( 'Hover', 'photoway' ),
			'section'   => 'colors',
			'type'      => 'colors',
		), 

		# Header Image

		'page_header_overlay_opacity' => array(
			'label'       => esc_html__( 'Header Image Overlay Opacity', 'photoway' ),
			'description' => esc_html__( '1 equals to 10% & it will effect on Banner Image Layouts', 'photoway' ),
			'section'     => 'header_image',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 9,
				'style' => 'width: 70px;'
			),
		),
		'home_page_image' => array(
			'label'   	  => esc_html__( 'Home Page Image', 'photoway' ),
			'description' => esc_html__( 'Recommended Size 1920x650 pixels', 'photoway' ),
			'section'     => 'header_image',
			'type'        => 'cropped_image',
			'width'       => 1920,
        	'height'      => 650,
		),
		'home_overlay_opacity' => array(
			'label'       => esc_html__( 'Home Page Image Overlay Opacity', 'photoway' ),
			'description' => esc_html__( '1 equals to 10%', 'photoway' ),
			'section'     => 'header_image',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 0,
				'max' => 9,
				'style' => 'width: 70px;'
			),
		),
		'error_page_image' => array(
			'label'        => esc_html__( '404 Error Page Image', 'photoway' ),
			'description'  => esc_html__( 'Recommended Size 1920x380 pixels', 'photoway' ),
			'section'      => 'header_image',
			'type'         => 'cropped_image',
			'width'        => 1920,
        	'height'       => 380,
		),
		'error_overlay_opacity' => array(
			'label'       => esc_html__( '404 Page Image Overlay Opacity', 'photoway' ),
			'description' => esc_html__( '1 equals to 10%', 'photoway' ),
			'section'     => 'header_image',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 0,
				'max' => 9,
				'style' => 'width: 70px;'
			),
		),


		# Theme Options
		
		# Header
		'header_layout' => array(
			'label'     => esc_html__( 'Select Header Layout', 'photoway' ),
			'section'   => 'header_options',
			'type'      => 'select',
			'choices'   => array(
				'header_one'   => esc_html__( 'Header Layout One', 'photoway' ),
			),
		),
		'disable_search_icon' => array(
			'label'     => esc_html__( 'Disable Header Search Icon', 'photoway' ),
			'section'   => 'header_options',
			'type'      => 'checkbox',
		),
		'disable_hamburger_menu_icon' => array(
			'label'       => esc_html__( 'Disable Hamburger Menu Icon', 'photoway' ),
			'description' => esc_html__( 'It will disable the icon from desktop view', 'photoway' ),
			'section'     => 'header_options',
			'type'        => 'checkbox',
		),
		'disable_fixed_header' => array(
			'label'     => esc_html__( 'Disable Fixed Header', 'photoway' ),
			'section'   => 'header_options',
			'type'      => 'checkbox',
		),

		# Footer
		// Instagram
		'insta_shortcode' => array(
			'label'       => esc_html__( 'Instagram Shortcode', 'photoway' ),
			'section'     => 'footer_options',
			'type'        => 'text',
		),
		'enable_instagram' => array(
			'label'   => esc_html__( 'Enable Instagram', 'photoway' ),
			'section' => 'footer_options',
			'type'    => 'checkbox',
		),
		'footer_layout' => array(
			'label'     => esc_html__( 'Select Footer Layout', 'photoway' ),
			'section'   => 'footer_options',
			'type'      => 'select',
			'choices'   => array(
				'footer_one'   => esc_html__( 'Footer Layout One', 'photoway' ),
			),
		),
		// Widgets
		'disable_footer_widget' => array(
			'label'   => esc_html__( 'Disable Footer Widget Area', 'photoway' ),
			'section' => 'footer_options',
			'type'    => 'checkbox',
		),
		// Copyright
		'footer_text' =>  array(
			'label'   => esc_html__( 'Footer Text', 'photoway' ),
			'section' => 'footer_options',
			'type'    => 'textarea',
		),

		# Layout
		'site_layout' => array(
			'label'   => esc_html__( 'Site Layout', 'photoway' ),
			'section' => 'layout_options',
			'type'    => 'radio-image',
			'choices' => array(
				'site_layout_full' => array(
					'label' => esc_html__( 'Full Width', 'photoway' ),
					'url'   => '/assets/images/placeholder/full-width.png'
				),
			),
		),
		'archive_layout' => array(
			'label'     => esc_html__( 'Archive Page Layout', 'photoway' ),
			'section'   => 'layout_options',
			'type'      => 'radio-image',
			'choices'   => array(
				'right' => array(
					'label' => esc_html__( 'Right Sidebar', 'photoway' ),
					'url'   => '/assets/images/placeholder/right-sidebar.png'
				),
				'left' => array(
					'label' => esc_html__( 'Left Sidebar', 'photoway' ),
					'url'   => '/assets/images/placeholder/left-sidebar.png'
				),
				'none' => array(
					'label' => esc_html__( 'No Sidebar', 'photoway' ),
					'url'   => '/assets/images/placeholder/no-sidebar.png'
				)
			),
		),
		'archive_post_layout' => array(
			'label'     => esc_html__( 'Archive Post Layout', 'photoway' ),
			'section'   => 'layout_options',
			'type'      => 'radio-image',
			'choices'   => array(
				'grid' => array(
					'label' => esc_html__( 'Grid', 'photoway' ),
					'url'   => '/assets/images/placeholder/grid-layout.png'
				),
				'list' => array(
					'label' => esc_html__( 'List', 'photoway' ),
					'url'   => '/assets/images/placeholder/list-layout.png'
				),
				'simple' => array(
					'label' => esc_html__( 'Simple', 'photoway' ),
					'url'   => '/assets/images/placeholder/single-layout.png'
				)
			),
		),
		'single_layout' => array(
			'label'     => esc_html__( 'Single Post Page Layout', 'photoway' ),
			'section'   => 'layout_options',
			'type'      => 'radio-image',
			'choices'   => array(
				'right' => array(
					'label' => esc_html__( 'Right Sidebar', 'photoway' ),
					'url'   => '/assets/images/placeholder/right-sidebar.png'
				),
				'left' => array(
					'label' => esc_html__( 'Left Sidebar', 'photoway' ),
					'url'   => '/assets/images/placeholder/left-sidebar.png'
				),
				'none' => array(
					'label' => esc_html__( 'No Sidebar', 'photoway' ),
					'url'   => '/assets/images/placeholder/no-sidebar.png'
				)
			),
		),
		'page_layout' => array(
			'label'     => esc_html__( 'Pages Layout', 'photoway' ),
			'section'   => 'layout_options',
			'type'      => 'radio-image',
			'choices'   => array(
				'none' => array(
					'label' => esc_html__( 'No Sidebar', 'photoway' ),
					'url'   => '/assets/images/placeholder/no-sidebar.png'
				),
				'left' => array(
					'label' => esc_html__( 'Left Sidebar', 'photoway' ),
					'url'   => '/assets/images/placeholder/left-sidebar.png'
				),
				'right' => array(
					'label' => esc_html__( 'Right Sidebar', 'photoway' ),
					'url'   => '/assets/images/placeholder/right-sidebar.png'
				)
			),
		),

		# Archive
		'archive_page_title' => array(
			'label'   => esc_html__( 'Blog Page Title', 'photoway' ),
			'description' => esc_html__( 'This title will appear when the slider is disabled.', 'photoway' ),
			'section' => 'archive_options',
			'type'    => 'text',
		),
		'disable_archive_cat_link' => array(
			'label'    => esc_html__( 'Disable Category link', 'photoway' ),
			'section'  => 'archive_options',
			'type'     => 'checkbox',
		),
		'disable_archive_date' => array(
			'label'    => esc_html__( 'Disable Post Date', 'photoway' ),
			'section'  => 'archive_options',
			'type'     => 'checkbox',
		),
		'disable_archive_author' => array(
			'label'    => esc_html__( 'Disable Author', 'photoway' ),
			'section'  => 'archive_options',
			'type'     => 'checkbox',
		),
		'disable_archive_comment_link' => array(
			'label'    => esc_html__( 'Disable Comment link', 'photoway' ),
			'section'  => 'archive_options',
			'type'     => 'checkbox',
		),
		'post_excerpt_length' => array(
			'label'       => esc_html__( 'Global Excerpt Length', 'photoway' ),
			'description' => esc_html__( 'in words', 'photoway' ),
			'section'     => 'archive_options',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 10,
				'max' => 200,
				'style' => 'width: 70px;'
			),
		),
		'sticky_simple_post_excerpt_length' => array(
			'label'       => esc_html__( 'Sticky & Simple Post Excerpt Length', 'photoway' ),
			'description' => esc_html__( 'in words', 'photoway' ),
			'section'     => 'archive_options',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 10,
				'max' => 200,
				'style' => 'width: 70px;'
			),
		),
  		'disable_pagination' => array(
  			'label'   => esc_html__( 'Disable Pagination', 'photoway' ),
  			'section' => 'archive_options',
  			'type'    => 'checkbox'
  		),

		# Single
		'disable_single_date' => array(
			'label'    => esc_html__( 'Disable Post Date', 'photoway' ),
			'section'  => 'single_options',
			'type'     => 'checkbox',
		),
		'disable_single_feature_image' => array(
			'label'   => esc_html__( 'Disable Feauture Image', 'photoway' ),
			'section' => 'single_options',
			'type'    => 'checkbox'
		),
		'disable_single_post_format' => array(
			'label'    => esc_html__( 'Disable Post Format', 'photoway' ),
			'section'  => 'single_options',
			'type'     => 'checkbox',
		),
		'disable_single_tag_links' => array(
			'label'    => esc_html__( 'Disable Tag links', 'photoway' ),
			'section'  => 'single_options',
			'type'     => 'checkbox',
		),
		'disable_single_cat_links' => array(
			'label'    => esc_html__( 'Disable Category links', 'photoway' ),
			'section'  => 'single_options',
			'type'     => 'checkbox',
		),
		'disable_single_author' => array(
			'label'    => esc_html__( 'Disable Author detail', 'photoway' ),
			'section'  => 'single_options',
			'type'     => 'checkbox',
		),
		'single_post_nav_prev' => array(
			'label'   => esc_html__( 'Previous Reading Text', 'photoway' ),
			'description' => esc_html__( 'Post Navigation Previous Reading Text', 'photoway' ),
			'section' => 'single_options',
			'type'    => 'text',
		),
		'single_post_nav_next' => array(
			'label'   => esc_html__( 'Next Reading Text', 'photoway' ),
			'description' => esc_html__( 'Post Navigation Next Reading Text', 'photoway' ),
			'section' => 'single_options',
			'type'    => 'text',
		),

		# Page
		'disable_page_feature_image' => array(
			'label'   => esc_html( 'Disable Page Feature Image' ),
			'section' => 'page_options',
			'type'    => 'checkbox',
		),

		# General
		// Site Loader
		'site_loader_options' => array(
			'label'   => esc_html__( 'Site Loader Options', 'photoway' ),
			'section' => 'general_options',
			'type'    => 'select',
			'choices' => array(
				'site_loader_one'   => esc_html__( 'Site Loader One', 'photoway' ),
			),
		),
		'disable_site_loader' => array(
			'label'   => esc_html__( 'Disable Site Loader', 'photoway' ),
			'section' => 'general_options',
			'type'    => 'checkbox',
		),
		
		// Scroll Top
		'enable_scroll_top' => array(
			'label'     => esc_html__( 'Enable Scroll Top', 'photoway' ),
			'section'   => 'general_options',
			'type'      => 'checkbox',
		),

		// Page Header Layout
		'page_header_layout' => array(
			'label'    => esc_html__( 'Page Header Title Layouts', 'photoway' ),
			'section'  => 'general_options',
			'type'     => 'radio-image',
			'choices'  => array(
				'header_layout_one' => array(
					'label' => esc_html__( 'Layout One', 'photoway' ),
					'url'   => '/assets/images/placeholder/noimage-breadcrumb.png'
				),
			), 
		),
		'disable_header_title' => array(
			'label'     => esc_html__( 'Disable Header Title', 'photoway' ),
			'section'   => 'general_options',
			'type'      => 'checkbox',
		),
		'disable_header_description' => array(
			'label'		=> esc_html__( 'Disable Description', 'photoway' ),
			'section'   => 'general_options',
			'type'		=> 'checkbox'
		),

		// Breadcrumb
		'breadcrumb_separator_layout' => array(
			'label'   => esc_html__( 'Breadcrumb Separator Layouts', 'photoway' ),
			'section' => 'general_options',
			'type'    => 'select',
			'choices' => array(
				'separator_layout_one'   => esc_html__( 'Separator Layout One', 'photoway' ),
				'separator_layout_two'   => esc_html__( 'Separator Layout Two', 'photoway' ),
				'separator_layout_three' => esc_html__( 'Separator Layout Three', 'photoway' ),
			),
		),
		'enable_breadcrumb_home_icon' => array(
			'label'   => esc_html__( 'Enable Breadcrumb Home Icon', 'photoway' ),
			'section' => 'general_options',
			'type'    => 'checkbox'
		),
		'disable_bradcrumb' => array(
			'label'   => esc_html__( 'Disable Breadcrumb', 'photoway' ),
			'section' => 'general_options',
			'type'    => 'checkbox'
		),
	);

	return array_merge( $settings, $general );
}
add_filter( 'Photoway_Customizer_Fields', 'Photoway_Customizer_General_Settings' );