<?php

if ( ! function_exists( 'mrseo_elated_map_general_meta' ) ) {
	function mrseo_elated_map_general_meta() {
		
		$general_meta_box = mrseo_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'mrseo_elated_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'General', 'mrseo' ),
				'name'  => 'general_meta'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'mrseo' ),
				'parent'        => $general_meta_box,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$eltdf_content_padding_group = mrseo_elated_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'mrseo' ),
				'description' => esc_html__( 'Define styles for Content area', 'mrseo' ),
				'parent'      => $general_meta_box
			)
		);
		
		$eltdf_content_padding_row = mrseo_elated_add_admin_row(
			array(
				'name'   => 'eltdf_content_padding_row',
				'next'   => true,
				'parent' => $eltdf_content_padding_group
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'   => 'eltdf_page_content_top_padding',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Content Top Padding', 'mrseo' ),
				'parent' => $eltdf_content_padding_row,
				'args'   => array(
					'suffix' => 'px'
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'    => 'eltdf_page_content_top_padding_mobile',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Set this top padding for mobile header', 'mrseo' ),
				'parent'  => $eltdf_content_padding_row,
				'options' => mrseo_elated_get_yes_no_select_array( false )
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'mrseo' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'mrseo' ),
				'parent'      => $general_meta_box
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'mrseo' ),
				'description' => esc_html__( 'Choose background color for page content', 'mrseo' ),
				'parent'      => $general_meta_box
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'    => 'eltdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'mrseo' ),
				'parent'  => $general_meta_box,
				'options' => mrseo_elated_get_yes_no_select_array(),
				'args'    => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_boxed_container_meta',
						'no'  => '#eltdf_boxed_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_boxed_container_meta'
					)
				)
			)
		);
		
		$boxed_container_meta = mrseo_elated_add_admin_container(
			array(
				'parent'          => $general_meta_box,
				'name'            => 'boxed_container_meta',
				'hidden_property' => 'eltdf_boxed_meta',
				'hidden_values'   => array(
					'',
					'no'
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_background_color_in_box_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'mrseo' ),
				'description' => esc_html__( 'Choose the page background color outside box', 'mrseo' ),
				'parent'      => $boxed_container_meta
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_boxed_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'mrseo' ),
				'description' => esc_html__( 'Choose an image to be displayed in background', 'mrseo' ),
				'parent'      => $boxed_container_meta
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_boxed_pattern_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Pattern', 'mrseo' ),
				'description' => esc_html__( 'Choose an image to be used as background pattern', 'mrseo' ),
				'parent'      => $boxed_container_meta
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_boxed_background_image_attachment_meta',
				'type'          => 'select',
				'default_value' => 'fixed',
				'label'         => esc_html__( 'Background Image Attachment', 'mrseo' ),
				'description'   => esc_html__( 'Choose background image attachment', 'mrseo' ),
				'parent'        => $boxed_container_meta,
				'options'       => array(
					''       => esc_html__( 'Default', 'mrseo' ),
					'fixed'  => esc_html__( 'Fixed', 'mrseo' ),
					'scroll' => esc_html__( 'Scroll', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'mrseo' ),
				'parent'        => $general_meta_box,
				'options'       => mrseo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_page_transitions_container_meta',
						'no'  => '#eltdf_page_transitions_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_page_transitions_container_meta'
					)
				)
			)
		);
		
		$page_transitions_container_meta = mrseo_elated_add_admin_container(
			array(
				'parent'          => $general_meta_box,
				'name'            => 'page_transitions_container_meta',
				'hidden_property' => 'eltdf_smooth_page_transitions_meta',
				'hidden_values'   => array(
					'',
					'no'
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_transition_preloader_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Enable Preloading Animation', 'mrseo' ),
				'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'mrseo' ),
				'parent'      => $page_transitions_container_meta,
				'options'     => mrseo_elated_get_yes_no_select_array(),
				'args'        => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltdf_page_transition_preloader_container_meta',
						'no'  => '#eltdf_page_transition_preloader_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_page_transition_preloader_container_meta'
					)
				)
			)
		);
		
		$page_transition_preloader_container_meta = mrseo_elated_add_admin_container(
			array(
				'parent'          => $page_transitions_container_meta,
				'name'            => 'page_transition_preloader_container_meta',
				'hidden_property' => 'eltdf_page_transition_preloader_meta',
				'hidden_values'   => array(
					'',
					'no'
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'   => 'eltdf_smooth_pt_bgnd_color_meta',
				'type'   => 'color',
				'label'  => esc_html__( 'Page Loader Background Color', 'mrseo' ),
				'parent' => $page_transition_preloader_container_meta
			)
		);
		
		$group_pt_spinner_animation_meta = mrseo_elated_add_admin_group(
			array(
				'name'        => 'group_pt_spinner_animation_meta',
				'title'       => esc_html__( 'Loader Style', 'mrseo' ),
				'description' => esc_html__( 'Define styles for loader spinner animation', 'mrseo' ),
				'parent'      => $page_transition_preloader_container_meta
			)
		);
		
		$row_pt_spinner_animation_meta = mrseo_elated_add_admin_row(
			array(
				'name'   => 'row_pt_spinner_animation_meta',
				'parent' => $group_pt_spinner_animation_meta
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'type'    => 'selectsimple',
				'name'    => 'eltdf_smooth_pt_spinner_type_meta',
				'label'   => esc_html__( 'Spinner Type', 'mrseo' ),
				'parent'  => $row_pt_spinner_animation_meta,
				'options' => array(
					''                      => esc_html__( 'Default', 'mrseo' ),
					'rotate_circles'        => esc_html__( 'Rotate Circles', 'mrseo' ),
					'pulse'                 => esc_html__( 'Pulse', 'mrseo' ),
					'double_pulse'          => esc_html__( 'Double Pulse', 'mrseo' ),
					'cube'                  => esc_html__( 'Cube', 'mrseo' ),
					'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'mrseo' ),
					'stripes'               => esc_html__( 'Stripes', 'mrseo' ),
					'wave'                  => esc_html__( 'Wave', 'mrseo' ),
					'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'mrseo' ),
					'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'mrseo' ),
					'atom'                  => esc_html__( 'Atom', 'mrseo' ),
					'clock'                 => esc_html__( 'Clock', 'mrseo' ),
					'mitosis'               => esc_html__( 'Mitosis', 'mrseo' ),
					'lines'                 => esc_html__( 'Lines', 'mrseo' ),
					'fussion'               => esc_html__( 'Fussion', 'mrseo' ),
					'wave_circles'          => esc_html__( 'Wave Circles', 'mrseo' ),
					'pulse_circles'         => esc_html__( 'Pulse Circles', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'type'   => 'colorsimple',
				'name'   => 'eltdf_smooth_pt_spinner_color_meta',
				'label'  => esc_html__( 'Spinner Color', 'mrseo' ),
				'parent' => $row_pt_spinner_animation_meta
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_transition_fadeout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Enable Fade Out Animation', 'mrseo' ),
				'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'mrseo' ),
				'options'     => mrseo_elated_get_yes_no_select_array(),
				'parent'      => $page_transitions_container_meta
			
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'mrseo' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'mrseo' ),
				'parent'      => $general_meta_box,
				'options'     => mrseo_elated_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'mrseo_elated_meta_boxes_map', 'mrseo_elated_map_general_meta', 10 );
}