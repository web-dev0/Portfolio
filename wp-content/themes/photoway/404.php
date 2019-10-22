<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @since Photoway 1.0.0
 */

get_header();

photoway_inner_banner();
get_template_part( 'template-parts/page/content', 'none' );

get_footer();