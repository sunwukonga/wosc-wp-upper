<?php

if(!function_exists('eltdf_core_include_testimonials_shortcodes')) {
	function eltdf_core_include_testimonials_shortcodes() {
		include_once ELATED_CORE_CPT_PATH.'/testimonials/shortcodes/testimonials.php';
	}
	
	add_action('eltdf_core_action_include_shortcodes_file', 'eltdf_core_include_testimonials_shortcodes');
}

if(!function_exists('eltdf_core_add_testimonials_shortcodes')) {
	function eltdf_core_add_testimonials_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'ElatedCore\CPT\Shortcodes\Testimonials\Testimonials'
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	add_filter('eltdf_core_filter_add_vc_shortcode', 'eltdf_core_add_testimonials_shortcodes');
}

if( !function_exists('eltdf_core_set_testimonials_icon_class_name_for_vc_shortcodes') ) {
	/**
	 * Function that set custom icon class name for testimonials shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function eltdf_core_set_testimonials_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
		$shortcodes_icon_class_array[] = '.icon-wpb-testimonials';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter('eltdf_core_filter_add_vc_shortcodes_custom_icon_class', 'eltdf_core_set_testimonials_icon_class_name_for_vc_shortcodes');
}