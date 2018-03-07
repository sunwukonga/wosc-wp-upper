<?php

if(!function_exists('eltdf_core_include_masonry_gallery_shortcodes')) {
	function eltdf_core_include_masonry_gallery_shortcodes() {
		include_once ELATED_CORE_CPT_PATH.'/masonry-gallery/shortcodes/masonry-gallery.php';
	}
	
	add_action('eltdf_core_action_include_shortcodes_file', 'eltdf_core_include_masonry_gallery_shortcodes');
}

if(!function_exists('eltdf_core_add_masonry_gallery_shortcodes')) {
	function eltdf_core_add_masonry_gallery_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'ElatedCore\CPT\Shortcodes\MasonryGallery\MasonryGallery'
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	add_filter('eltdf_core_filter_add_vc_shortcode', 'eltdf_core_add_masonry_gallery_shortcodes');
}

if( !function_exists('eltdf_core_set_masonry_gallery_icon_class_name_for_vc_shortcodes') ) {
	/**
	 * Function that set custom icon class name for masonry gallery shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function eltdf_core_set_masonry_gallery_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
		$shortcodes_icon_class_array[] = '.icon-wpb-masonry-gallery';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter('eltdf_core_filter_add_vc_shortcodes_custom_icon_class', 'eltdf_core_set_masonry_gallery_icon_class_name_for_vc_shortcodes');
}