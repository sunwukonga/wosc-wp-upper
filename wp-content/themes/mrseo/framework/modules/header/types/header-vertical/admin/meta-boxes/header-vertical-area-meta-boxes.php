<?php

if ( ! function_exists( 'mrseo_elated_get_hide_dep_for_header_vertical_area_meta_boxes' ) ) {
	function mrseo_elated_get_hide_dep_for_header_vertical_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'mrseo_elated_header_vertical_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'mrseo_elated_header_vertical_area_meta_options_map' ) ) {
	function mrseo_elated_header_vertical_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = mrseo_elated_get_hide_dep_for_header_vertical_area_meta_boxes();
		
		$header_vertical_area_meta_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'header_vertical_area_container',
				'hidden_property' => 'eltdf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		mrseo_elated_add_admin_section_title(
			array(
				'parent' => $header_vertical_area_meta_container,
				'name'   => 'vertical_area_style',
				'title'  => esc_html__( 'Vertical Area Style', 'mrseo' )
			)
		);
		
		$mrseo_custom_sidebars = mrseo_elated_get_custom_sidebars();
		if ( count( $mrseo_custom_sidebars ) > 0 ) {
			mrseo_elated_add_meta_box_field(
				array(
					'name'        => 'eltdf_custom_vertical_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area in Vertical area', 'mrseo' ),
					'description' => esc_html__( 'Choose custom widget area to display in vertical menu"', 'mrseo' ),
					'parent'      => $header_vertical_area_meta_container,
					'options'     => $mrseo_custom_sidebars
				)
			);
		}
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_vertical_header_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'mrseo' ),
				'description' => esc_html__( 'Set background color for vertical menu', 'mrseo' ),
				'parent'      => $header_vertical_area_meta_container
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image', 'mrseo' ),
				'description'   => esc_html__( 'Set background image for vertical menu', 'mrseo' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_disable_vertical_header_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Background Image', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will hide background image in Vertical Menu', 'mrseo' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_vertical_header_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Shadow', 'mrseo' ),
				'description'   => esc_html__( 'Set shadow on vertical menu', 'mrseo' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => mrseo_elated_get_yes_no_select_array()
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_vertical_header_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Vertical Area Border', 'mrseo' ),
				'description'   => esc_html__( 'Set border on vertical area', 'mrseo' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => mrseo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_vertical_header_border_container',
						'no'  => '#eltdf_vertical_header_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_vertical_header_border_container'
					)
				)
			)
		);
		
		$vertical_header_border_container = mrseo_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'vertical_header_border_container',
				'parent'          => $header_vertical_area_meta_container,
				'hidden_property' => 'eltdf_vertical_header_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_vertical_header_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'mrseo' ),
				'description' => esc_html__( 'Choose color of border', 'mrseo' ),
				'parent'      => $vertical_header_border_container
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_vertical_header_center_content_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Center Content', 'mrseo' ),
				'description'   => esc_html__( 'Set content in vertical center', 'mrseo' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => mrseo_elated_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'mrseo_elated_additional_header_area_meta_boxes_map', 'mrseo_elated_header_vertical_area_meta_options_map', 10, 1 );
}