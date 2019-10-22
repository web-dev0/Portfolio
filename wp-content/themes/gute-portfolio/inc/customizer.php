<?php
/**
 * gute portfolio Theme Customizer
 *
 * @package gute
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gute_portfolio_sanitize_post_grid($value){ 
    if(!in_array($value, array('grid','list'))){
        $value = 'grid';
    }
    return $value;
}
function gute_portfolio_sanitize_header_text_align($value){ 
    if(!in_array($value, array('left','center','right'))){
        $value = 'left';
    }
    return $value;
}

function gute_portfolio_customize_register( $wp_customize ) {

	$wp_customize->remove_control( 'gute_post_control' );
    $wp_customize->remove_control( 'gute_banner_text_align_control' );


     $wp_customize->add_setting('gute_post_view', array(
        'default'       => 'grid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'gute_portfolio_sanitize_post_grid',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('gute_post_control', array(
        'label'      => esc_html__('Post view style', 'gute-portfolio'),
        'section'    => 'gute_post_section',
        'settings'   => 'gute_post_view',
        'type'       => 'select',
        'choices'    => array(
            'grid' => esc_html__('Grid view', 'gute-portfolio'),
            'list' => esc_html__('List view', 'gute-portfolio'),
        ),
    ));
     $wp_customize->add_setting('gute_banner_text_align', array(
        'default'       => 'left',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'gute_portfolio_sanitize_header_text_align',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('gute_portfolio_title_control', array(
        'label'      => esc_html__('Header text position', 'gute-portfolio'),
        'section'    => 'header_image',
        'settings'   => 'gute_banner_text_align',
        'type'       => 'select',
        'choices'    => array(
            'left' => esc_html__('Text Left', 'gute-portfolio'),
            'center' => esc_html__('Text Center', 'gute-portfolio'),
            'right' => esc_html__('Text Right', 'gute-portfolio'),
        ),
        'active_callback' => 'gute_banner_show_hide',

    ));

}
add_action( 'customize_register', 'gute_portfolio_customize_register',99 );
