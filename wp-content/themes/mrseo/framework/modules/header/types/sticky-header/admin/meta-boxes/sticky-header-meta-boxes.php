<?php

if ( ! function_exists( 'mrseo_elated_sticky_header_meta_boxes_options_map' ) ) {
	function mrseo_elated_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'hidden_property' => 'eltdf_header_behaviour_meta',
				'hidden_values'   => array(
					'',
					'no-behavior',
					'fixed-on-scroll',
					'sticky-header-on-scroll-up'
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll amount for sticky header appearance', 'mrseo' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'mrseo' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
	}
	
	add_action( 'mrseo_elated_additional_header_area_meta_boxes_map', 'mrseo_elated_sticky_header_meta_boxes_options_map', 10, 1 );
}