<?php
/**
* Sets sections for Photoway_Customizer
*
* @since  Photoway 1.0.0
* @param  array $sections
* @return array Merged array
*/
function Photoway_Customizer_Sections( $sections ){

	$photoway_sections = array(
		# Section for Font panel
		'font_family' => array(
			'title' => esc_html__( 'Font Family', 'photoway' ),
			'panel' => 'fonts'
		),
		'font_size' => array(
			'title' => esc_html__( 'Font Size', 'photoway' ),
			'panel' => 'fonts'
		),

		# Section for Front Page Options panel
		'frontpage_general_options' => array(
			'title' => esc_html__( 'General Options', 'photoway' ),
			'panel' => 'frontpage_options'
		),
		'frontpage_slider_options' => array(
			'title' => esc_html__( 'Slider Options', 'photoway' ),
			'panel' => 'frontpage_options'
		),
		'frontpage_about_options' => array(
			'title' => esc_html__( 'About Options', 'photoway' ),
			'panel' => 'frontpage_options'
		),
		'frontpage_blog_options' => array(
			'title' => esc_html__( 'Blog Options', 'photoway' ),
			'panel' => 'frontpage_options'
		),
		'frontpage_callback_options' => array(
			'title' => esc_html__( 'Callback Options', 'photoway' ),
			'panel' => 'frontpage_options'
		),
		'frontpage_testimonial_options' => array(
			'title' => esc_html__( 'Testimonial Options', 'photoway' ),
			'panel' => 'frontpage_options'
		),
		'frontpage_contact_options' => array(
			'title' => esc_html__( 'Contact Options', 'photoway' ),
			'panel' => 'frontpage_options'
		),
		'frontpage_instagram_options' => array(
			'title' => esc_html__( 'Instagram Options', 'photoway' ),
			'panel' => 'frontpage_options'
		),

		# Section for Theme Options panel
		'header_options' => array(
			'title' => esc_html__( 'Header Options', 'photoway' ),
			'panel' => 'theme_options'
		),
		'footer_options' => array(
			'title' => esc_html__( 'Footer Options', 'photoway' ),
			'panel' => 'theme_options'
		),
		'layout_options' => array(
			'title' => esc_html__( 'Layout Options', 'photoway' ),
			'panel' => 'theme_options'
		),
		'archive_options' => array(
			'title' => esc_html__( 'Archive Page Options', 'photoway' ),
			'panel' => 'theme_options'
		),
		'single_options' => array(
			'title' => esc_html__( 'Single Post Page Options', 'photoway' ),
			'panel' => 'theme_options'
		),
		'page_options' => array(
			'title' => esc_html__( 'Page Options', 'photoway' ),
			'panel' => 'theme_options'
		),
		'general_options' => array(
			'title' => esc_html__( 'General Options', 'photoway' ),
			'panel' => 'theme_options'
		)
	);

	return array_merge( $photoway_sections, $sections );
}
add_filter( 'Photoway_Customizer_Sections', 'Photoway_Customizer_Sections' );