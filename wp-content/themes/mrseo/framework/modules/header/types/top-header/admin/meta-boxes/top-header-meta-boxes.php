<?php

if ( ! function_exists( 'mrseo_elated_get_hide_dep_for_top_header_area_meta_boxes' ) ) {
	function mrseo_elated_get_hide_dep_for_top_header_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'mrseo_elated_top_header_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'mrseo_elated_header_top_area_meta_options_map' ) ) {
	function mrseo_elated_header_top_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = mrseo_elated_get_hide_dep_for_top_header_area_meta_boxes();
		
		$top_header_container = mrseo_elated_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $header_meta_box,
				'hidden_property' => 'eltdf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		mrseo_elated_add_admin_section_title(
			array(
				'parent' => $top_header_container,
				'name'   => 'top_area_style',
				'title'  => esc_html__( 'Top Area', 'mrseo' )
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_top_bar_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Top Bar', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will show header top bar area', 'mrseo' ),
				'parent'        => $top_header_container,
				'options'       => mrseo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_top_bar_container_no_style',
						'no'  => '#eltdf_top_bar_container_no_style',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_top_bar_container_no_style'
					)
				)
			)
		);
		
		$top_bar_container = mrseo_elated_add_admin_container_no_style(
			array(
				'name'            => 'top_bar_container_no_style',
				'parent'          => $top_header_container,
				'hidden_property' => 'eltdf_top_bar_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_top_bar_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar In Grid', 'mrseo' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'mrseo' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => mrseo_elated_get_yes_no_select_array()
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'   => 'eltdf_top_bar_background_color_meta',
				'type'   => 'color',
				'label'  => esc_html__( 'Top Bar Background Color', 'mrseo' ),
				'parent' => $top_bar_container
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_top_bar_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Background Color Transparency', 'mrseo' ),
				'description' => esc_html__( 'Set top bar background color transparenct. Value should be between 0 and 1', 'mrseo' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_top_bar_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar Border', 'mrseo' ),
				'description'   => esc_html__( 'Set border on top bar', 'mrseo' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => mrseo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_top_bar_border_container',
						'no'  => '#eltdf_top_bar_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_top_bar_border_container'
					)
				)
			)
		);
		
		$top_bar_border_container = mrseo_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'hidden_property' => 'eltdf_top_bar_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_top_bar_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'mrseo' ),
				'description' => esc_html__( 'Choose color for top bar border', 'mrseo' ),
				'parent'      => $top_bar_border_container
			)
		);

		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_top_bar_border_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Border Transparency', 'mrseo' ),
				'description' => esc_html__( 'Set border color transparency for top bar', 'mrseo' ),
				'parent'      => $top_bar_border_container,
				'args'        => array( 'col_width' => 3 )
			)
		);
	}
	
	add_action( 'mrseo_elated_additional_header_area_meta_boxes_map', 'mrseo_elated_header_top_area_meta_options_map', 10, 1 );
}