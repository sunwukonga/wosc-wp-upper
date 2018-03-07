<?php

if ( ! function_exists( 'mrseo_elated_map_title_meta' ) ) {
	function mrseo_elated_map_title_meta() {
		$title_meta_box = mrseo_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'mrseo_elated_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Title', 'mrseo' ),
				'name'  => 'title_meta'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'mrseo' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'mrseo' ),
				'parent'        => $title_meta_box,
				'options'       => mrseo_elated_get_yes_no_select_array(),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""    => "",
						"no"  => "#eltdf_eltdf_show_title_area_meta_container",
						"yes" => ""
					),
					"show"       => array(
						""    => "#eltdf_eltdf_show_title_area_meta_container",
						"no"  => "",
						"yes" => "#eltdf_eltdf_show_title_area_meta_container"
					)
				)
			)
		);
		
		$show_title_area_meta_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $title_meta_box,
				'name'            => 'eltdf_show_title_area_meta_container',
				'hidden_property' => 'eltdf_show_title_area_meta',
				'hidden_value'    => 'no'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Title Area Type', 'mrseo' ),
				'description'   => esc_html__( 'Choose title type', 'mrseo' ),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''           => esc_html__( 'Default', 'mrseo' ),
					'standard'   => esc_html__( 'Standard', 'mrseo' ),
					'breadcrumb' => esc_html__( 'Breadcrumb', 'mrseo' )
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						"standard"   => "",
						"breadcrumb" => "#eltdf_eltdf_title_area_type_meta_container"
					),
					"show"       => array(
						""           => "#eltdf_eltdf_title_area_type_meta_container",
						"standard"   => "#eltdf_eltdf_title_area_type_meta_container",
						"breadcrumb" => ""
					)
				)
			)
		);
		
		$title_area_type_meta_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $show_title_area_meta_container,
				'name'            => 'eltdf_title_area_type_meta_container',
				'hidden_property' => 'eltdf_title_area_type_meta',
				'hidden_value'    => 'breadcrumb'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_enable_breadcrumbs_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Breadcrumbs', 'mrseo' ),
				'description'   => esc_html__( 'This option will display Breadcrumbs in Title Area', 'mrseo' ),
				'parent'        => $title_area_type_meta_container,
				'options'       => mrseo_elated_get_yes_no_select_array()
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_vertical_alignment_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Vertical Alignment', 'mrseo' ),
				'description'   => esc_html__( 'Specify title vertical alignment', 'mrseo' ),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''              => esc_html__( 'Default', 'mrseo' ),
					'header_bottom' => esc_html__( 'From Bottom of Header', 'mrseo' ),
					'window_top'    => esc_html__( 'From Window Top', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_content_alignment_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Horizontal Alignment', 'mrseo' ),
				'description'   => esc_html__( 'Specify title horizontal alignment', 'mrseo' ),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''       => esc_html__( 'Default', 'mrseo' ),
					'left'   => esc_html__( 'Left', 'mrseo' ),
					'center' => esc_html__( 'Center', 'mrseo' ),
					'right'  => esc_html__( 'Right', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_title_tag_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Title Tag', 'mrseo' ),
				'parent'        => $title_area_type_meta_container,
				'options'       => mrseo_elated_get_title_tag( true )
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_title_text_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Title Color', 'mrseo' ),
				'description' => esc_html__( 'Choose a color for title text', 'mrseo' ),
				'parent'      => $show_title_area_meta_container
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_title_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'mrseo' ),
				'description' => esc_html__( 'Choose a background color for title area', 'mrseo' ),
				'parent'      => $show_title_area_meta_container
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_hide_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Background Image', 'mrseo' ),
				'description'   => esc_html__( 'Enable this option to hide background image in title area', 'mrseo' ),
				'parent'        => $show_title_area_meta_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#eltdf_eltdf_hide_background_image_meta_container",
					"dependence_show_on_yes" => ""
				)
			)
		);
		
		$hide_background_image_meta_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $show_title_area_meta_container,
				'name'            => 'eltdf_hide_background_image_meta_container',
				'hidden_property' => 'eltdf_hide_background_image_meta',
				'hidden_value'    => 'yes'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_title_area_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'mrseo' ),
				'description' => esc_html__( 'Choose an Image for title area', 'mrseo' ),
				'parent'      => $hide_background_image_meta_container
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_background_image_responsive_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Background Responsive Image', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will make Title background image responsive', 'mrseo' ),
				'parent'        => $hide_background_image_meta_container,
				'options'       => mrseo_elated_get_yes_no_select_array(),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""    => "",
						"no"  => "",
						"yes" => "#eltdf_eltdf_title_area_background_image_responsive_meta_container, #eltdf_eltdf_title_area_height_meta"
					),
					"show"       => array(
						""    => "#eltdf_eltdf_title_area_background_image_responsive_meta_container, #eltdf_eltdf_title_area_height_meta",
						"no"  => "#eltdf_eltdf_title_area_background_image_responsive_meta_container, #eltdf_eltdf_title_area_height_meta",
						"yes" => ""
					)
				)
			)
		);
		
		$title_area_background_image_responsive_meta_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $hide_background_image_meta_container,
				'name'            => 'eltdf_title_area_background_image_responsive_meta_container',
				'hidden_property' => 'eltdf_title_area_background_image_responsive_meta',
				'hidden_value'    => 'yes'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_background_image_parallax_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image in Parallax', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will make Title background image parallax', 'mrseo' ),
				'parent'        => $title_area_background_image_responsive_meta_container,
				'options'       => array(
					''         => esc_html__( 'Default', 'mrseo' ),
					'no'       => esc_html__( 'No', 'mrseo' ),
					'yes'      => esc_html__( 'Yes', 'mrseo' ),
					'yes_zoom' => esc_html__( 'Yes, with zoom out', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_title_area_height_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Height', 'mrseo' ),
				'description' => esc_html__( 'Set a height for Title Area', 'mrseo' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);		

		mrseo_elated_add_meta_box_field(
			array(
				'name' => 'eltdf_title_area_enable_like_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Enable Like in Title Area', 'mrseo'),
				'description' => esc_html__('Enabling this option will show like icon in Title Area', 'mrseo'),
				'parent' => $show_title_area_meta_container,
				'options'       => array(
					''         => esc_html__( 'Default', 'mrseo' ),
					'no'       => esc_html__( 'No', 'mrseo' ),
					'yes'      => esc_html__( 'Yes', 'mrseo' ),
				)
			)
		);		

		mrseo_elated_add_meta_box_field(
			array(
				'name' => 'eltdf_title_area_enable_share_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Enable Share in Title Area', 'mrseo'),
				'description' => esc_html__('Enabling this option will show share in Title Area', 'mrseo'),
				'parent' => $show_title_area_meta_container,
				'options'       => array(
					''         => esc_html__( 'Default', 'mrseo' ),
					'no'       => esc_html__( 'No', 'mrseo' ),
					'yes'      => esc_html__( 'Yes', 'mrseo' ),
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_title_area_subtitle_meta',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Subtitle Text', 'mrseo' ),
				'description'   => esc_html__( 'Enter your subtitle text', 'mrseo' ),
				'parent'        => $show_title_area_meta_container,
				'args'          => array(
					'col_width' => 6
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_subtitle_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Subtitle Color', 'mrseo' ),
				'description' => esc_html__( 'Choose a color for subtitle text', 'mrseo' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'mrseo_elated_meta_boxes_map', 'mrseo_elated_map_title_meta', 60 );
}