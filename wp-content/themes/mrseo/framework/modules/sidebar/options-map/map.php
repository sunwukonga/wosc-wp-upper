<?php

if ( ! function_exists('mrseo_elated_sidebar_options_map') ) {

	function mrseo_elated_sidebar_options_map() {

		mrseo_elated_add_admin_page(
			array(
				'slug' => '_sidebar_page',
				'title' => esc_html__('Sidebar Area', 'mrseo'),
				'icon' => 'fa fa-bars'
			)
		);

		$sidebar_panel = mrseo_elated_add_admin_panel(
			array(
				'title' => esc_html__('Sidebar Area', 'mrseo'),
				'name' => 'sidebar',
				'page' => '_sidebar_page'
			)
		);
		
		mrseo_elated_add_admin_field(array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__('Sidebar Layout', 'mrseo'),
			'description'   => esc_html__('Choose a sidebar layout for pages', 'mrseo'),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
			'options'       => array(
				'no-sidebar'        => esc_html__('No Sidebar', 'mrseo'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'mrseo'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'mrseo'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'mrseo'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'mrseo')
			)
		));
		
		$mrseo_custom_sidebars = mrseo_elated_get_custom_sidebars();
		if(count($mrseo_custom_sidebars) > 0) {
			mrseo_elated_add_admin_field(array(
				'name' => 'custom_sidebar_area',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'mrseo'),
				'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'mrseo'),
				'parent' => $sidebar_panel,
				'options' => $mrseo_custom_sidebars,
				'args' => array(
					'select2' => true
				)
			));
		}
	}

	add_action('mrseo_elated_options_map', 'mrseo_elated_sidebar_options_map', 9);
}