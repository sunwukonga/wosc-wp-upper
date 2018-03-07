<?php

if(!function_exists('eltdf_core_masonry_gallery_meta_box_functions')) {
	function eltdf_core_masonry_gallery_meta_box_functions($post_types) {
		$post_types[] = 'masonry-gallery';
		
		return $post_types;
	}
	
	add_filter('mrseo_elated_meta_box_post_types_save', 'eltdf_core_masonry_gallery_meta_box_functions');
	add_filter('mrseo_elated_meta_box_post_types_remove', 'eltdf_core_masonry_gallery_meta_box_functions');
}

if(!function_exists('eltdf_core_register_masonry_gallery_cpt')) {
	function eltdf_core_register_masonry_gallery_cpt($cpt_class_name) {
		$cpt_class = array(
			'ElatedCore\CPT\MasonryGallery\MasonryGalleryRegister'
		);
		
		$cpt_class_name = array_merge($cpt_class_name, $cpt_class);
		
		return $cpt_class_name;
	}
	
	add_filter('eltdf_core_filter_register_custom_post_types', 'eltdf_core_register_masonry_gallery_cpt');
}