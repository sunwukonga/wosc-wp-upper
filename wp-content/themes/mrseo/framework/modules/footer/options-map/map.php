<?php

if ( ! function_exists('mrseo_elated_footer_options_map') ) {
	/**
	 * Add footer options
	 */
	function mrseo_elated_footer_options_map() {

		mrseo_elated_add_admin_page(
			array(
				'slug' => '_footer_page',
				'title' => esc_html__('Footer', 'mrseo'),
				'icon' => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = mrseo_elated_add_admin_panel(
			array(
				'title' => esc_html__('Footer', 'mrseo'),
				'name' => 'footer',
				'page' => '_footer_page'
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'footer_in_grid',
				'default_value' => 'no',
				'label' => esc_html__('Footer in Grid', 'mrseo'),
				'description' => esc_html__('Enabling this option will place Footer content in grid', 'mrseo'),
				'parent' => $footer_panel,
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_top',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Top', 'mrseo'),
				'description' => esc_html__('Enabling this option will show Footer Top area', 'mrseo'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_show_footer_top_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_top_container = mrseo_elated_add_admin_container(
			array(
				'name' => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns',
				'parent' => $show_footer_top_container,
				'default_value' => '4',
				'label' => esc_html__('Footer Top Columns', 'mrseo'),
				'description' => esc_html__('Choose number of columns for Footer Top area', 'mrseo'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4'
				)
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label' => esc_html__('Footer Top Columns Alignment', 'mrseo'),
				'description' => esc_html__('Text Alignment in Footer Columns', 'mrseo'),
				'options' => array(
					''       => esc_html__('Default', 'mrseo'),
					'left'   => esc_html__('Left', 'mrseo'),
					'center' => esc_html__('Center', 'mrseo'),
					'right'  => esc_html__('Right', 'mrseo')
				),
				'parent' => $show_footer_top_container,
			)
		);

		mrseo_elated_add_admin_field(array(
			'name' => 'footer_top_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'mrseo'),
			'description' => esc_html__('Set background color for top footer area', 'mrseo'),
			'parent' => $show_footer_top_container
		));

		mrseo_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_top_angled_shape',
				'default_value' => 'no',
				'label' => esc_html__('Show Footer Top Angled Shape', 'mrseo'),
				'description' => esc_html__('Enabling this option will show Angled Shape before Footer Top area', 'mrseo'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_show_footer_top_angled_container'
				),
				'parent' => $show_footer_top_container,
			)
		);

		$show_footer_top_angled_container = mrseo_elated_add_admin_container(
			array(
				'name' => 'show_footer_top_angled_container',
				'hidden_property' => 'show_footer_top_angled_shape',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_angled_direction',
				'default_value' => 'from_right_to_left_top',
				'label' => esc_html__('Angled Shape Direction', 'mrseo'),
				'description' => esc_html__('Choose angled shape direction', 'mrseo'),
				'options' => array(
					'from_right_to_left_top' => esc_html__('From Right To Left','mrseo'),
					'from_left_to_right_top' => esc_html__('From Left To Right','mrseo')
				),
				'parent' => $show_footer_top_angled_container,
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_bottom',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Bottom', 'mrseo'),
				'description' => esc_html__('Enabling this option will show Footer Bottom area', 'mrseo'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_show_footer_bottom_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_bottom_container = mrseo_elated_add_admin_container(
			array(
				'name' => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_bottom_columns',
				'default_value' => '4',
				'label' => esc_html__('Footer Bottom Columns', 'mrseo'),
				'description' => esc_html__('Choose number of columns for Footer Bottom area', 'mrseo'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent' => $show_footer_bottom_container,
			)
		);

		mrseo_elated_add_admin_field(array(
			'name' => 'footer_bottom_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'mrseo'),
			'description' => esc_html__('Set background color for bottom footer area', 'mrseo'),
			'parent' => $show_footer_bottom_container
		));
	}

	add_action( 'mrseo_elated_options_map', 'mrseo_elated_footer_options_map', 15);
}