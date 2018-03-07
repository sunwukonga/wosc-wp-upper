<?php

if ( ! function_exists( 'mrseo_elated_map_post_link_meta' ) ) {
	function mrseo_elated_map_post_link_meta() {
		$link_post_format_meta_box = mrseo_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'mrseo' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'mrseo' ),
				'description' => esc_html__( 'Enter link', 'mrseo' ),
				'parent'      => $link_post_format_meta_box,
			
			)
		);
	}
	
	add_action( 'mrseo_elated_meta_boxes_map', 'mrseo_elated_map_post_link_meta', 24 );
}