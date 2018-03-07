<?php

if ( ! function_exists( 'mrseo_elated_get_hide_dep_for_header_logo_area_meta_boxes' ) ) {
	function mrseo_elated_get_hide_dep_for_header_logo_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'mrseo_elated_header_logo_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'mrseo_elated_header_logo_area_meta_options_map' ) ) {
	function mrseo_elated_header_logo_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = mrseo_elated_get_hide_dep_for_header_logo_area_meta_boxes();
		
		$logo_area_container = mrseo_elated_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_container',
				'parent'          => $header_meta_box,
				'hidden_property' => 'eltdf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		mrseo_elated_add_admin_section_title(
			array(
				'parent' => $logo_area_container,
				'name'   => 'logo_area_style',
				'title'  => esc_html__( 'Logo Area Style', 'mrseo' )
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_disable_header_widget_logo_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Logo Area Widget', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the logo area', 'mrseo' ),
				'parent'        => $logo_area_container
			)
		);
		
		$mrseo_custom_sidebars = mrseo_elated_get_custom_sidebars();
		if ( count( $mrseo_custom_sidebars ) > 0 ) {
			mrseo_elated_add_meta_box_field(
				array(
					'name'        => 'eltdf_custom_logo_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area for Logo Area', 'mrseo' ),
					'description' => esc_html__( 'Choose custom widget area to display in header logo area"', 'mrseo' ),
					'parent'      => $logo_area_container,
					'options'     => $mrseo_custom_sidebars
				)
			);
		}
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_logo_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Logo Area In Grid', 'mrseo' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'mrseo' ),
				'parent'        => $logo_area_container,
				'default_value' => '',
				'options'       => mrseo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_logo_area_in_grid_container',
						'no'  => '#eltdf_logo_area_in_grid_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_logo_area_in_grid_container'
					)
				)
			)
		);
		
		$logo_area_in_grid_container = mrseo_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_in_grid_container',
				'parent'          => $logo_area_container,
				'hidden_property' => 'eltdf_logo_area_in_grid_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'mrseo' ),
				'description' => esc_html__( 'Set grid background color for logo area', 'mrseo' ),
				'parent'      => $logo_area_in_grid_container
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'mrseo' ),
				'description' => esc_html__( 'Set grid background transparency for logo area (0 = fully transparent, 1 = opaque)', 'mrseo' ),
				'parent'      => $logo_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_logo_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'mrseo' ),
				'description'   => esc_html__( 'Set border on grid logo area', 'mrseo' ),
				'parent'        => $logo_area_in_grid_container,
				'default_value' => '',
				'options'       => mrseo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_logo_area_in_grid_border_container',
						'no'  => '#eltdf_logo_area_in_grid_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_logo_area_in_grid_border_container'
					)
				)
			)
		);
		
		$logo_area_in_grid_border_container = mrseo_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_in_grid_border_container',
				'parent'          => $logo_area_in_grid_container,
				'hidden_property' => 'eltdf_logo_area_in_grid_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'mrseo' ),
				'description' => esc_html__( 'Set border color for grid area', 'mrseo' ),
				'parent'      => $logo_area_in_grid_border_container
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'mrseo' ),
				'description' => esc_html__( 'Choose a background color for logo area', 'mrseo' ),
				'parent'      => $logo_area_container
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'mrseo' ),
				'description' => esc_html__( 'Choose a transparency for the logo area background color (0 = fully transparent, 1 = opaque)', 'mrseo' ),
				'parent'      => $logo_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_logo_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Logo Area Border', 'mrseo' ),
				'description'   => esc_html__( 'Set border on logo area', 'mrseo' ),
				'parent'        => $logo_area_container,
				'default_value' => '',
				'options'       => mrseo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_logo_area_border_bottom_color_container',
						'no'  => '#eltdf_logo_area_border_bottom_color_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_logo_area_border_bottom_color_container'
					)
				)
			)
		);
		
		$logo_area_border_bottom_color_container = mrseo_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_border_bottom_color_container',
				'parent'          => $logo_area_container,
				'hidden_property' => 'eltdf_logo_area_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_logo_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'mrseo' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'mrseo' ),
				'parent'      => $logo_area_border_bottom_color_container
			)
		);
		
		do_action( 'mrseo_elated_header_logo_area_additional_meta_boxes_map', $logo_area_container );
	}
	
	add_action( 'mrseo_elated_header_logo_area_meta_boxes_map', 'mrseo_elated_header_logo_area_meta_options_map', 10, 1 );
}