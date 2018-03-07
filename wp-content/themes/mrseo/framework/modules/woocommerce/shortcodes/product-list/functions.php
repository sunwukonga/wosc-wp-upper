<?php
if(!function_exists('mrseo_elated_add_product_list_shortcode')) {
	function mrseo_elated_add_product_list_shortcode($shortcodes_class_name) {
		$shortcodes = array(
			'ElatedCore\CPT\Shortcodes\ProductList\ProductList',
		);

		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);

		return $shortcodes_class_name;
	}

	if(mrseo_elated_core_plugin_installed()) {
		add_filter('eltdf_core_filter_add_vc_shortcode', 'mrseo_elated_add_product_list_shortcode');
	}
}