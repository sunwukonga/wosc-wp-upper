<?php

if ( ! function_exists( 'mrseo_elated_map_sidebar_meta' ) ) {
	function mrseo_elated_map_sidebar_meta() {
		$eltdf_sidebar_meta_box = mrseo_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'mrseo_elated_set_scope_for_meta_boxes', array( 'page' ) ),
				'title' => esc_html__( 'Sidebar', 'mrseo' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Layout', 'mrseo' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'mrseo' ),
				'parent'      => $eltdf_sidebar_meta_box,
				'options'     => array(
					''                 => esc_html__( 'Default', 'mrseo' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'mrseo' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'mrseo' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'mrseo' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'mrseo' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'mrseo' )
				)
			)
		);
		
		$eltdf_custom_sidebars = mrseo_elated_get_custom_sidebars();
		if ( count( $eltdf_custom_sidebars ) > 0 ) {
			mrseo_elated_add_meta_box_field(
				array(
					'name'        => 'eltdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'mrseo' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'mrseo' ),
					'parent'      => $eltdf_sidebar_meta_box,
					'options'     => $eltdf_custom_sidebars,
					'args' => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'mrseo_elated_meta_boxes_map', 'mrseo_elated_map_sidebar_meta', 31 );
}