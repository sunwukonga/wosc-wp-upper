<?php

if ( ! function_exists('mrseo_elated_sidearea_options_map') ) {

	function mrseo_elated_sidearea_options_map() {

		mrseo_elated_add_admin_page(
			array(
				'slug' => '_side_area_page',
				'title' => esc_html__('Side Area', 'mrseo'),
				'icon' => 'fa fa-bars'
			)
		);

		$side_area_panel = mrseo_elated_add_admin_panel(
			array(
				'title' => esc_html__('Side Area', 'mrseo'),
				'name' => 'side_area',
				'page' => '_side_area_page'
			)
		);

		$side_area_icon_style_group = mrseo_elated_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_style_group',
				'title' => esc_html__('Side Area Icon Style', 'mrseo'),
				'description' => esc_html__('Define styles for Side Area icon', 'mrseo')
			)
		);

		$side_area_icon_style_row1 = mrseo_elated_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row1'
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_color',
				'label' => esc_html__('Color', 'mrseo')
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_hover_color',
				'label' => esc_html__('Hover Color', 'mrseo')
			)
		);

		$side_area_icon_style_row2 = mrseo_elated_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row2',
				'next'		=> true
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_color',
				'label' => esc_html__('Close Icon Color', 'mrseo')
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_hover_color',
				'label' => esc_html__('Close Icon Hover Color', 'mrseo')
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_width',
				'default_value' => '',
				'label' => esc_html__('Side Area Width', 'mrseo'),
				'description' => esc_html__('Enter a width for Side Area', 'mrseo'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'color',
				'name' => 'side_area_background_color',
				'label' => esc_html__('Background Color', 'mrseo'),
				'description' => esc_html__('Choose a background color for Side Area', 'mrseo')
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_padding',
				'label' => esc_html__('Padding', 'mrseo'),
				'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'mrseo'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'selectblank',
				'name' => 'side_area_aligment',
				'default_value' => '',
				'label' => esc_html__('Text Alignment', 'mrseo'),
				'description' => esc_html__('Choose text alignment for side area', 'mrseo'),
				'options' => array(
					'' => esc_html__('Default', 'mrseo'),
					'left' => esc_html__('Left', 'mrseo'),
					'center' => esc_html__('Center', 'mrseo'),
					'right' => esc_html__('Right', 'mrseo')
				)
			)
		);
	}

	add_action('mrseo_elated_options_map', 'mrseo_elated_sidearea_options_map', 13);
}