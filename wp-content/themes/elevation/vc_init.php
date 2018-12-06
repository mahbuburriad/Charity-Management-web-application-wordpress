<?php 

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if( function_exists('vc_set_as_theme') ){
	function elevation_vc_Set_As_Theme() {
		vc_set_as_theme(true);
	}
	//add_action( 'vc_before_init', 'elevation_vc_Set_As_Theme' );
}

if(!( function_exists('candor_framework_custom_css_classes_for_vc_row_and_vc_column') )){
	function candor_framework_custom_css_classes_for_vc_row_and_vc_column( $class_string, $tag ) {
		if ( $tag == 'vc_column' || $tag == 'vc_column_inner' ) {
			$class_string = preg_replace( '/vc_col-sm-(\d{1,2})/', 'col-md-$1', $class_string );
		}
		return $class_string;
	}
	add_filter( 'vc_shortcodes_css_class', 'candor_framework_custom_css_classes_for_vc_row_and_vc_column', 10, 2 );
}


