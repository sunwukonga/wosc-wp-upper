<?php

if ( ! function_exists( 'mrseo_elated_logo_meta_box_map' ) ) {
	function mrseo_elated_logo_meta_box_map() {
		
		$logo_meta_box = mrseo_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'mrseo_elated_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Logo', 'mrseo' ),
				'name'  => 'logo_meta'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'mrseo' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'mrseo' ),
				'parent'      => $logo_meta_box
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'mrseo' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'mrseo' ),
				'parent'      => $logo_meta_box
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'mrseo' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'mrseo' ),
				'parent'      => $logo_meta_box
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'mrseo' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'mrseo' ),
				'parent'      => $logo_meta_box
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'mrseo' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'mrseo' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'mrseo_elated_meta_boxes_map', 'mrseo_elated_logo_meta_box_map', 47 );
}