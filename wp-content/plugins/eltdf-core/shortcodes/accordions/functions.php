<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortcode_Eltdf_Accordion extends WPBakeryShortCodesContainer {}
	class WPBakeryShortcode_Eltdf_Accordion_Tab extends WPBakeryShortCodesContainer {}
}

if(!function_exists('eltdf_core_add_accordion_shortcodes')) {
	function eltdf_core_add_accordion_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'ElatedCore\CPT\Shortcodes\Accordion\Accordion',
			'ElatedCore\CPT\Shortcodes\AccordionTab\AccordionTab'
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	add_filter('eltdf_core_filter_add_vc_shortcode', 'eltdf_core_add_accordion_shortcodes');
}

if( !function_exists('eltdf_core_set_accordion_custom_style_for_vc_shortcodes') ) {
	/**
	 * Function that set custom css style for accordion shortcode
	 */
	function eltdf_core_set_accordion_custom_style_for_vc_shortcodes($style) {
		$current_style = '.vc_shortcodes_container.wpb_eltdf_accordion_tab {
			background-color: #f4f4f4; 
		}';
		
		$style = $style . $current_style;
		
		return $style;
	}
	
	add_filter('eltdf_core_filter_add_vc_shortcodes_custom_style', 'eltdf_core_set_accordion_custom_style_for_vc_shortcodes');
}

if( !function_exists('eltdf_core_set_accordion_icon_class_name_for_vc_shortcodes') ) {
	/**
	 * Function that set custom icon class name for accordion shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function eltdf_core_set_accordion_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
		$shortcodes_icon_class_array[] = '.icon-wpb-accordion';
		$shortcodes_icon_class_array[] = '.icon-wpb-accordion-tab';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter('eltdf_core_filter_add_vc_shortcodes_custom_icon_class', 'eltdf_core_set_accordion_icon_class_name_for_vc_shortcodes');
}