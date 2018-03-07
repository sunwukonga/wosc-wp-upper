<?php

if ( ! function_exists( 'mrseo_elated_map_post_quote_meta' ) ) {
	function mrseo_elated_map_post_quote_meta() {
		$quote_post_format_meta_box = mrseo_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'mrseo' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'mrseo' ),
				'description' => esc_html__( 'Enter Quote text', 'mrseo' ),
				'parent'      => $quote_post_format_meta_box,
			
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'mrseo' ),
				'description' => esc_html__( 'Enter Quote author', 'mrseo' ),
				'parent'      => $quote_post_format_meta_box,
			)
		);
	}
	
	add_action( 'mrseo_elated_meta_boxes_map', 'mrseo_elated_map_post_quote_meta', 25 );
}