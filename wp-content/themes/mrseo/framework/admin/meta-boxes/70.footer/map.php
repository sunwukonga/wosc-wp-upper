<?php

if ( ! function_exists( 'mrseo_elated_map_footer_meta' ) ) {
	function mrseo_elated_map_footer_meta() {
		$footer_meta_box = mrseo_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'mrseo_elated_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Footer', 'mrseo' ),
				'name'  => 'footer_meta'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_disable_footer_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Footer for this Page', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'mrseo' ),
				'parent'        => $footer_meta_box
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_show_footer_top_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Top', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'mrseo' ),
				'parent'        => $footer_meta_box,
				'options'       => mrseo_elated_get_yes_no_select_array(),
				'args'			=> array(
					'dependence' => true,
					'show' => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_footer_top_meta_container'
					),
					'hide' => array(
						''    => '#eltdf_footer_top_meta_container',
						'no'  => '#eltdf_footer_top_meta_container',
						'yes' => ''
					)
				)
			)
		);


		$footer_top_meta_container = mrseo_elated_add_admin_container(
			array(
				'name' => 'footer_top_meta_container',
				'hidden_property' => 'eltdf_show_footer_top_meta',
				'hidden_value' => '',
				'hidden_values' => array('','no'),
				'parent' => $footer_meta_box
			)
		);

		mrseo_elated_add_meta_box_field(
			array(
				'type' => 'select',
				'name' => 'eltdf_show_footer_top_angled_shape_meta',
				'default_value' => '',
				'label' => esc_html__('Show Footer Top Angled Shape', 'mrseo'),
				'description' => esc_html__('Enabling this option will show Angled Shape before Footer Top area', 'mrseo'),
				'options' => array(
					'' => '',
					'yes' => esc_html__('Yes','mrseo'),
					'no' => esc_html__('No','mrseo'),
				),
				'args'			=> array(
					'dependence' => true,
					'show' => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltdf_footer_top_angled_meta_container'
					),
					'hide' => array(
						''    => '#eltdf_footer_top_angled_meta_container',
						'no'  => '#eltdf_footer_top_angled_meta_container',
						'yes' => ''
					)
				),
				'parent' => $footer_top_meta_container,
			)
		);

		$footer_top_angled_meta_container = mrseo_elated_add_admin_container(
			array(
				'name' => 'footer_top_angled_meta_container',
				'hidden_property' => 'eltdf_show_footer_top_angled_shape_meta',
				'hidden_value' => '',
				'hidden_values' => array('','no'),
				'parent' => $footer_top_meta_container
			)
		);

		mrseo_elated_add_meta_box_field(
			array(
				'type' => 'select',
				'name' => 'eltdf_footer_top_angled_direction_meta',
				'default_value' => '',
				'label' => esc_html__('Angled Shape Direction', 'mrseo'),
				'description' => esc_html__('Choose angled shape direction', 'mrseo'),
				'options' => array(
					'' => '',
					'from_right_to_left_top' => esc_html__('From Right To Left','mrseo'),
					'from_left_to_right_top' => esc_html__('From Left To Right','mrseo')
				),
				'parent' => $footer_top_angled_meta_container,
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_show_footer_bottom_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Bottom', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'mrseo' ),
				'parent'        => $footer_meta_box,
				'options'       => mrseo_elated_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'mrseo_elated_meta_boxes_map', 'mrseo_elated_map_footer_meta', 70 );
}