<?php
/**
* Sets the panels and returns to Photoway_Customizer
*
* @since  Photoway 1.0.0
* @param  array An array of the panels
* @return array
*/
function Photoway_Customizer_Panels( $panels ){

	$panels = array(
		'fonts' => array(
			'title' => esc_html__( 'Fonts', 'photoway' ),
			'priority' => 60
		),
		'frontpage_options' => array(
			'title' => esc_html__( 'Frontpage Options', 'photoway' ),
			'priority' => 90
		),
		'theme_options' => array(
			'title' => esc_html__( 'Theme Options', 'photoway' ),
			'priority' => 100
		)
	);

	return $panels;	
}
add_filter( 'Photoway_Customizer_Panels', 'Photoway_Customizer_Panels' );