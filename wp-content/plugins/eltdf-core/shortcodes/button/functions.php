<?php

if(!function_exists('mrseo_elated_get_button_html')) {
    /**
     * Calls button shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function mrseo_elated_get_button_html($params) {
        $button_html = mrseo_elated_execute_shortcode('eltdf_button', $params);
        $button_html = str_replace("\n", '', $button_html);
        return $button_html;
    }
}

if(!function_exists('eltdf_core_add_button_shortcodes')) {
	function eltdf_core_add_button_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'ElatedCore\CPT\Shortcodes\Button\Button'
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	add_filter('eltdf_core_filter_add_vc_shortcode', 'eltdf_core_add_button_shortcodes');
}

if( !function_exists('eltdf_core_set_button_icon_class_name_for_vc_shortcodes') ) {
	/**
	 * Function that set custom icon class name for button shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function eltdf_core_set_button_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
		$shortcodes_icon_class_array[] = '.icon-wpb-button';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter('eltdf_core_filter_add_vc_shortcodes_custom_icon_class', 'eltdf_core_set_button_icon_class_name_for_vc_shortcodes');
}