<?php
/**
* Template Name: Front Page
*
* This is the static homepage of this theme. Will be rendered when user select such a page whose 
* page template is home in static front page setting. 
* @since Photoway 1.0.0
*/ 

get_header();

$sections = photoway_get_homepage_sections();

do_action( 'photoway_before_homepage_sections' );

foreach( $sections as $section ){
	get_template_part( 'template-parts/front-page/front-page-' . $section, '' );
}

do_action( 'photoway_after_homepage_sections' );

get_footer();