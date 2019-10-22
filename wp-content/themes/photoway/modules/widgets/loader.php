<?php
/**
* Load widget components
*
* @since Photoway 1.0.0
*/
require_once get_parent_theme_file_path( '/modules/widgets/class-base-widget.php' );
require_once get_parent_theme_file_path( '/modules/widgets/author.php' );
/**
 * Register widgets
 *
 * @since Photoway 1.0.0
 */
/**
* Load all the widgets
* @since Photoway 1.0.0
*/
function photoway_register_widget() {

	$widgets = array(
		'Photoway_Author_Widget',
	);

	foreach ( $widgets as $key => $value) {
    	register_widget( $value );
	}
}
add_action( 'widgets_init', 'photoway_register_widget' );

