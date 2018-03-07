<?php

if ( ! function_exists( 'mrseo_elated_map_post_gallery_meta' ) ) {
	
	function mrseo_elated_map_post_gallery_meta() {
		$gallery_post_format_meta_box = mrseo_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'mrseo' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		mrseo_elated_add_multiple_images_field(
			array(
				'name'        => 'eltdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'mrseo' ),
				'description' => esc_html__( 'Choose your gallery images', 'mrseo' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'mrseo_elated_meta_boxes_map', 'mrseo_elated_map_post_gallery_meta', 21 );
}
