<?php
/**
* Sets settings for general fields
*
* @since  Photoway 1.0.0
* @param  array $settings
* @return array Merged array
*/

function Photoway_Customizer_Frontpage_Settings( $settings ){
	$frontpage = array(
		# General
		'section_title_layout' => array(
			'label' => esc_html__( 'Section Title Layout', 'photoway' ),
			'section' => 'frontpage_general_options',
			'type'    => 'select',
			'choices' => array(
				'layout_one'  => esc_html__( 'Layout One', 'photoway' ),
			),
		),

		# Slider
		'slider_page' => array(
			'label'    => esc_html__( 'Slider Pages', 'photoway' ),
			'section'  => 'frontpage_slider_options',
			'type'     => 'text',
			'description' => esc_html__( 'Input page id. Separate with comma. for eg. 2, 9, 23...  Recommended size 1920x650 pixels.', 'photoway' )
		),
		'slider_posts_number' => array(
			'label'       => esc_html__( 'Slider Page View Number', 'photoway' ),
			'description' => esc_html__( 'Total number of slider to show.', 'photoway' ),
			'section'     => 'frontpage_slider_options',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 3,
				'style' => 'width: 70px;'
			),
		),
		'slider_section_layout' => array(
			'label'   => esc_html__( 'Slider Section Layout', 'photoway' ),
			'description' => esc_html__( 'Select a layout. More layouts are coming soon.', 'photoway' ),
			'section' => 'frontpage_slider_options',
			'type'    => 'select',
			'choices' => array(
				'slider_section_layout_one' => esc_html__( 'Layout Style One', 'photoway' ),
			),
		),
		'slider_overlay_opacity' => array(
			'label'       => esc_html__( 'Slider Overlay Opacity', 'photoway' ),
			'description' => esc_html__( '1 equals to 10%', 'photoway' ),
			'section'     => 'frontpage_slider_options',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 0,
				'max' => 9,
				'style' => 'width: 70px;'
			),
		),
		'slider_content_alignment' => array(
			'label'   => esc_html__( 'Slider Content Alignment', 'photoway' ),
			'section' => 'frontpage_slider_options',
			'type'    => 'select',
			'choices' => array(
				'center' => esc_html__( 'Center', 'photoway' ),
			),
		),
		'disable_slider_title' => array(
			'label'   => esc_html__( 'Disable Slider Title', 'photoway' ),
			'section' => 'frontpage_slider_options',
			'type'    => 'checkbox',
		),
		'slider_excerpt_lenth' => array(
			'label'   => esc_html__( 'Slider Excerpt Lenth', 'photoway' ),
			'description' => esc_html__( 'Default 30 words', 'photoway' ),
			'section'     => 'frontpage_slider_options',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 10,
				'max' => 200,
				'style' => 'width: 70px;'
			),
		),
		'disable_slider_content' => array(
			'label'   => esc_html__( 'Disable Slider Content', 'photoway' ),
			'section' => 'frontpage_slider_options',
			'type'    => 'checkbox',
		),
		'slider_button_text' => array(
			'label'   => esc_html__( 'Slider Button Text', 'photoway' ),
			'section' => 'frontpage_slider_options',
			'type'    => 'text',
		),
		'disable_slider_button' => array(
			'label'   => esc_html__( 'Disable Slider Button', 'photoway' ),
			'section' => 'frontpage_slider_options',
			'type'    => 'checkbox',
		),
		'disable_slider_control' => array(
			'label'     => esc_html__( 'Disable Slider Control', 'photoway' ),
			'section'   => 'frontpage_slider_options',
			'type'      => 'checkbox'
		),
		'disable_slider_autoplay' => array(
			'label'   => esc_html__( 'Disable Slider Auto Play', 'photoway' ),
			'section' => 'frontpage_slider_options',
			'type'    => 'checkbox',
		),
		'slider_timeout' => array(
			'label'    => esc_html__( 'Slider Auto Play Timeout ( in sec )', 'photoway' ),
			'section'  => 'frontpage_slider_options',
			'type'     => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 60,
				'style' => 'width: 70px;'
			)
		),
		'disable_slider_down_arrow' => array(
			'label'   => esc_html__( 'Disable Slider Go Down Arrow', 'photoway' ),
			'section' => 'frontpage_slider_options',
			'type'    => 'checkbox',
		),
		'disable_slider' => array(
			'label'   => esc_html__( 'Disable Slider Section', 'photoway' ),
			'section' => 'frontpage_slider_options',
			'type'    => 'checkbox',
		),

		# About
		'about_page' => array(
			'label'   => esc_html__( 'Select About Page', 'photoway' ),
			'description' => esc_html__( 'Feature image recommended size 1200x1600 pixels.', 'photoway' ),
			'section' => 'frontpage_about_options',
			'type'    => 'dropdown-pages',
		),
		'about_section_layout' => array(
			'label'   => esc_html__( 'About Section Layout', 'photoway' ),
			'description' => esc_html__( 'Select a layout. More layouts are coming soon.', 'photoway' ),
			'section' => 'frontpage_about_options',
			'type'    => 'select',
			'choices' => array(
				'about_section_layout_one' => esc_html__( 'Layout Style One', 'photoway' ),
			),
		),
		'disable_about_feature_image' => array(
			'label'   => esc_html__( 'Disable About Feature Image', 'photoway' ),
			'section' => 'frontpage_about_options',
			'type'    => 'checkbox',
		),
		'disable_about_title' => array(
			'label'   => esc_html__( 'Disable About Title', 'photoway' ),
			'section' => 'frontpage_about_options',
			'type'    => 'checkbox',
		),
		'about_excerpt_lenth' => array(
			'label'   => esc_html__( 'About Excerpt Lenth', 'photoway' ),
			'description' => esc_html__( 'Default 50 words', 'photoway' ),
			'section'     => 'frontpage_about_options',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 10,
				'max' => 200,
				'style' => 'width: 70px;'
			),
		),
		'disable_about_content' => array(
			'label'   => esc_html__( 'Disable About Content', 'photoway' ),
			'section' => 'frontpage_about_options',
			'type'    => 'checkbox',
		),
		'about_button_text' => array(
			'label'   => esc_html__( 'About Button Text', 'photoway' ),
			'section' => 'frontpage_about_options',
			'type'    => 'text',
		),
		'disable_about_button' => array(
			'label'   => esc_html__( 'Disable About Button', 'photoway' ),
			'section' => 'frontpage_about_options',
			'type'    => 'checkbox',
		),
		'disable_about' => array(
			'label'   => esc_html__( 'Disable About Section', 'photoway' ),
			'section' => 'frontpage_about_options',
			'type'    => 'checkbox',
		),

		# Blog
		'blog_section_title' => array(
			'label'   => esc_html__( 'Blog Section Title', 'photoway' ),
			'description' => esc_html__( 'Feature image recommended size 1200x1600 pixels.', 'photoway' ),
			'section' => 'frontpage_blog_options',
			'type'    => 'text',
		),
		'blog_section_layout' => array(
			'label'   => esc_html__( 'Blog Section Layout', 'photoway' ),
			'description' => esc_html__( 'Select a layout. More layouts are coming soon.', 'photoway' ),
			'section' => 'frontpage_blog_options',
			'type'    => 'select',
			'choices' => array(
				'blog_section_layout_one' => esc_html__( 'Layout Style One', 'photoway' ),
			),
		),
		'blog_category' => array(
			'label'   => esc_html__( 'Choose Blog Category', 'photoway' ),
			'section' => 'frontpage_blog_options',
			'type'    => 'dropdown-categories',
		),
		'blog_posts_number' => array(
			'label'       => esc_html__( 'Blog Post View Number', 'photoway' ),
			'description' => esc_html__( 'Total number of blog post to show.', 'photoway' ),
			'section'     => 'frontpage_blog_options',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 12,
				'style' => 'width: 70px;'
			),
		),
		'blog_post_overlay_opacity' => array(
			'label'       => esc_html__( 'Blog Post Overlay Opacity', 'photoway' ),
			'description' => esc_html__( '1 equals to 10%.', 'photoway' ),
			'section'     => 'frontpage_blog_options',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 9,
				'style' => 'width: 70px;'
			),
		),
		'disable_blog_overlay' => array(
			'label' => esc_html__( 'Disable Blog Overlay', 'photoway' ),
			'section' => 'frontpage_blog_options',
			'type' => 'checkbox',
		),
		'disable_blog_category_title' => array(
			'label' => esc_html__( 'Disable Blog Category Title', 'photoway' ),
			'section' => 'frontpage_blog_options',
			'type' => 'checkbox',
		),
		'disable_blog_post_title' => array(
			'label' => esc_html__( 'Disable Blog Post Title', 'photoway' ),
			'section' => 'frontpage_blog_options',
			'type' => 'checkbox',
		),
		'disable_blog' => array(
			'label'   => esc_html__( 'Disable Blog Section', 'photoway' ),
			'section' => 'frontpage_blog_options',
			'type'    => 'checkbox',
		),

		# Callback
		'callback_page' => array(
			'label'   => esc_html__( 'Select Callback Page', 'photoway' ),
			'description' => esc_html__( 'Feature image recommended size 1920x850 pixels.', 'photoway' ),
			'section' => 'frontpage_callback_options',
			'type'    => 'dropdown-pages',
		),
		'callback_section_layout' => array(
			'label'   => esc_html__( 'Callback Section Layout', 'photoway' ),
			'description' => esc_html__( 'Select a layout. More layouts are coming soon.', 'photoway' ),
			'section' => 'frontpage_callback_options',
			'type'    => 'select',
			'choices' => array(
				'callback_section_layout_one' => esc_html__( 'Layout Style One', 'photoway' ),
			),
		),
		'disable_callback_title' => array(
			'label'   => esc_html__( 'Disable Callback Title', 'photoway' ),
			'section' => 'frontpage_callback_options',
			'type'    => 'checkbox',
		),
		'callback_image_overlay_opacity' => array(
			'label'       => esc_html__( 'Callback Image Overlay Opacity', 'photoway' ),
			'description' => esc_html__( '1 equals to 10% ', 'photoway' ),
			'section'     => 'frontpage_callback_options',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 9,
				'style' => 'width: 70px;'
			),
		),
		'callback_excerpt_lenth' => array(
			'label'   => esc_html__( 'Callback Excerpt Lenth', 'photoway' ),
			'description' => esc_html__( 'Default 25 words', 'photoway' ),
			'section'     => 'frontpage_callback_options',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 10,
				'max' => 200,
				'style' => 'width: 70px;'
			),
		),
		'disable_callback_content' => array(
			'label'   => esc_html__( 'Disable Callback Content', 'photoway' ),
			'section' => 'frontpage_callback_options',
			'type'    => 'checkbox',
		),
		'callback_button_text' => array(
			'label'   => esc_html__( 'Callback Button Text', 'photoway' ),
			'section' => 'frontpage_callback_options',
			'type'    => 'text',
		),
		'disable_callback_button' => array(
			'label'   => esc_html__( 'Disable Callback Button', 'photoway' ),
			'section' => 'frontpage_callback_options',
			'type'    => 'checkbox',
		),
		'disable_callback' => array(
			'label'   => esc_html__( 'Disable Callback Section', 'photoway' ),
			'section' => 'frontpage_callback_options',
			'type'    => 'checkbox',
		),

		# Testimonials
		'testimonial_section_layout' => array(
			'label'   => esc_html__( 'Testimonial Section Layout', 'photoway' ),
			'description' => esc_html__( 'Select a layout. More layouts are coming soon.', 'photoway' ),
			'section' => 'frontpage_testimonial_options',
			'type'    => 'select',
			'choices' => array(
				'testimonial_section_layout_one' => esc_html__( 'Layout Style One', 'photoway' ),
			),
		),
		'testimonial_section_title' => array(
			'label'   => esc_html__( 'Testimonial Section Title', 'photoway' ),
			'section' => 'frontpage_testimonial_options',
			'type'    => 'text',
		),
		'testimonial_page' => array(
			'label'   => esc_html__( 'Testimonial Pages', 'photoway' ),
			'section' => 'frontpage_testimonial_options',
			'type'    => 'text',
			'description' => esc_html__( 'Input page id. Separate with comma. for eg. 2,9,23... Recommended size 150x150 pixels.', 'photoway' )
		),
		'testimonial_posts_number' => array(
			'label'       => esc_html__( 'Testimonial Page View Number', 'photoway' ),
			'description' => esc_html__( 'Total number of testimonial to show.', 'photoway' ),
			'section'     => 'frontpage_testimonial_options',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 3,
				'style' => 'width: 70px;'
			),
		),
		'disable_testimonial' => array(
			'label'   => esc_html__( 'Disable Testimonial Section', 'photoway' ),
			'section' => 'frontpage_testimonial_options',
			'type'    => 'checkbox',
		),

		# Instagram
		'instagram_section_layout' => array(
			'label'   => esc_html__( 'Instagram Section Layout', 'photoway' ),
			'description' => esc_html__( 'Select a layout. More layouts are coming soon.', 'photoway' ),
			'section' => 'frontpage_instagram_options',
			'type'    => 'select',
			'choices' => array(
				'instagram_section_layout_one' => esc_html__( 'Layout Style One', 'photoway' ),
			),
		),
		'insta_shortcode' => array(
			'label'       => esc_html__( 'Enter Instagram Shortcode', 'photoway' ),
			'section'     => 'frontpage_instagram_options',
			'type'        => 'text',
		),
		'enable_instagram' => array(
			'label'   => esc_html__( 'Enable Instagram', 'photoway' ),
			'section' => 'frontpage_instagram_options',
			'type'    => 'checkbox',
		),

		# Contact
		'contact_section_layout' => array(
			'label'   => esc_html__( 'Contact Section Layout', 'photoway' ),
			'description' => esc_html__( 'Select a layout. More layouts are coming soon.', 'photoway' ),
			'section' => 'frontpage_contact_options',
			'type'    => 'select',
			'choices' => array(
				'contact_section_layout_one' => esc_html__( 'Layout Style One', 'photoway' ),
			),
		),
		# Contact Image

		'contact_image'   => array(
			'label'   	  => esc_html__( 'Contact Section Background Image', 'photoway' ),
			'description' => esc_html__( 'Recommended Size 1920x850 pixels', 'photoway' ),
			'section' 	  => 'frontpage_contact_options',
			'type'    	  => 'cropped_image',
			'width'       => 1920,
        	'height'      => 850,
		),
		'disable_contact_image' => array(
			'label' => esc_html__( 'Disable Contact Background Image', 'photoway' ),
			'description' => esc_html__( 'It will remove default image also.', 'photoway' ),
			'section' => 'frontpage_contact_options',
			'type' => 'checkbox',
		),
		'contact_image_overlay_opacity' => array(
			'label'       => esc_html__( 'Image Overlay Opacity', 'photoway' ),
			'description' => esc_html__( '1 equals to 10% ', 'photoway' ),
			'section'     => 'frontpage_contact_options',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 9,
				'style' => 'width: 70px;'
			),
		),
		// Contact Info
		'contact_section_title' => array(
			'label'  => esc_html__( 'Contact Section Title', 'photoway' ),
			'section' => 'frontpage_contact_options',
			'type' => 'text',
		),

		// Contact Form
		'contact_shortcode' => array(
			'label'   => esc_html__( 'Contact Form Shortcode', 'photoway' ),
			'section' => 'frontpage_contact_options',
			'description' => esc_html__( 'Add a Contact Form Shortcode.', 'photoway' ),
			'type'    => 'text'
		),
		'disable_contact' => array(
			'label'   => esc_html__( 'Disable Contact Section', 'photoway' ),
			'section' => 'frontpage_contact_options',
			'type'    => 'checkbox',
		),
	);

	return array_merge( $settings, $frontpage );
}
add_filter( 'Photoway_Customizer_Fields', 'Photoway_Customizer_Frontpage_Settings' );