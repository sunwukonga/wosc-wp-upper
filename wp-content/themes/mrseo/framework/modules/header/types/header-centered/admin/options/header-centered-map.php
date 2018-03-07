<?php

if ( ! function_exists( 'mrseo_elated_get_hide_dep_for_header_centered_options' ) ) {
	function mrseo_elated_get_hide_dep_for_header_centered_options() {
		$hide_dep_options = apply_filters( 'mrseo_elated_header_centered_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'mrseo_elated_header_centered_map' ) ) {
	function mrseo_elated_header_centered_map( $parent ) {
		$hide_dep_options = mrseo_elated_get_hide_dep_for_header_centered_options();
		
		mrseo_elated_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'text',
				'name'            => 'logo_wrapper_padding_header_centered',
				'default_value'   => '',
				'label'           => esc_html__( 'Logo Padding', 'mrseo' ),
				'description'     => esc_html__( 'Insert padding in format: 0px 0px 1px 0px', 'mrseo' ),
				'args'            => array(
					'col_width' => 3
				),
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'mrseo_elated_header_logo_area_additional_options', 'mrseo_elated_header_centered_map' );
}