<?php

if ( ! function_exists( 'mrseo_elated_page_options_map' ) ) {
	function mrseo_elated_page_options_map() {
		
		mrseo_elated_add_admin_page(
			array(
				'slug'  => '_page_page',
				'title' => esc_html__( 'Page', 'mrseo' ),
				'icon'  => 'fa fa-file-text-o'
			)
		);
		
		/***************** Page Layout - begin **********************/
		
		$panel_sidebar = mrseo_elated_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_sidebar',
				'title' => esc_html__( 'Page Style', 'mrseo' )
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'page_show_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'mrseo' ),
				'default_value' => 'yes',
				'parent'        => $panel_sidebar
			)
		);
		
		/***************** Page Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		$panel_content = mrseo_elated_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_content',
				'title' => esc_html__( 'Content Style', 'mrseo' )
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_top_padding',
				'default_value' => '0',
				'label'         => esc_html__( 'Content Top Padding for Template in Full Width', 'mrseo' ),
				'description'   => esc_html__( 'Enter top padding for content area for templates in full width. If you set this value then it\'s important to set also Content top padding for mobile header value', 'mrseo' ),
				'args'          => array(
					'suffix'    => 'px',
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_top_padding_in_grid',
				'default_value' => '40',
				'label'         => esc_html__( 'Content Top Padding for Templates in Grid', 'mrseo' ),
				'description'   => esc_html__( 'Enter top padding for content area for Templates in grid. If you set this value then it\'s important to set also Content top padding for mobile header value', 'mrseo' ),
				'args'          => array(
					'suffix'    => 'px',
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_top_padding_mobile',
				'default_value' => '40',
				'label'         => esc_html__( 'Content Top Padding for Mobile Header', 'mrseo' ),
				'description'   => esc_html__( 'Enter top padding for content area for Mobile Header', 'mrseo' ),
				'args'          => array(
					'suffix'    => 'px',
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Content Bottom Layout - begin **********************/
		
		$panel_content_bottom = mrseo_elated_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_content_bottom',
				'title' => esc_html__( 'Content Bottom Area Style', 'mrseo' )
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'enable_content_bottom_area',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'mrseo' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'mrseo' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_enable_content_bottom_area_container'
				),
				'parent'        => $panel_content_bottom
			)
		);
		
		$enable_content_bottom_area_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $panel_content_bottom,
				'name'            => 'enable_content_bottom_area_container',
				'hidden_property' => 'enable_content_bottom_area',
				'hidden_value'    => 'no'
			)
		);
		
		$mrseo_custom_sidebars = mrseo_elated_get_custom_sidebars();
		
		mrseo_elated_add_admin_field(
			array(
				'type'          => 'selectblank',
				'name'          => 'content_bottom_sidebar_custom_display',
				'default_value' => '',
				'label'         => esc_html__( 'Widget Area to Display', 'mrseo' ),
				'description'   => esc_html__( 'Choose a Content Bottom widget area to display', 'mrseo' ),
				'options'       => $mrseo_custom_sidebars,
				'parent'        => $enable_content_bottom_area_container
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'content_bottom_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Display in Grid', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will place Content Bottom in grid', 'mrseo' ),
				'parent'        => $enable_content_bottom_area_container
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'type'        => 'color',
				'name'        => 'content_bottom_background_color',
				'label'       => esc_html__( 'Background Color', 'mrseo' ),
				'description' => esc_html__( 'Choose a background color for Content Bottom area', 'mrseo' ),
				'parent'      => $enable_content_bottom_area_container
			)
		);
		
		/***************** Content Bottom Layout - end **********************/
	}
	
	add_action( 'mrseo_elated_options_map', 'mrseo_elated_page_options_map', 8 );
}