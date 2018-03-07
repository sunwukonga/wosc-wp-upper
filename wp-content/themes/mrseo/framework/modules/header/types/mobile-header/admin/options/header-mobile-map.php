<?php

if ( ! function_exists( 'mrseo_elated_mobile_header_options_map' ) ) {
	function mrseo_elated_mobile_header_options_map() {
		
		$panel_mobile_header = mrseo_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Mobile Header', 'mrseo' ),
				'name'  => 'panel_mobile_header',
				'page'  => '_header_page'
			)
		);
		
		$mobile_header_group = mrseo_elated_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_group',
				'title'  => esc_html__( 'Mobile Header Styles', 'mrseo' )
			)
		);
		
		$mobile_header_row1 = mrseo_elated_add_admin_row(
			array(
				'parent' => $mobile_header_group,
				'name'   => 'mobile_header_row1'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_header_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Height', 'mrseo' ),
				'parent' => $mobile_header_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_header_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'mrseo' ),
				'parent' => $mobile_header_row1
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_header_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'mrseo' ),
				'parent' => $mobile_header_row1
			)
		);
		
		$mobile_menu_group = mrseo_elated_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_menu_group',
				'title'  => esc_html__( 'Mobile Menu Styles', 'mrseo' )
			)
		);
		
		$mobile_menu_row1 = mrseo_elated_add_admin_row(
			array(
				'parent' => $mobile_menu_group,
				'name'   => 'mobile_menu_row1'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_menu_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'mrseo' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_menu_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'mrseo' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_menu_separator_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Menu Item Separator Color', 'mrseo' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'        => 'mobile_logo_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Header', 'mrseo' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 1024px', 'mrseo' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'        => 'mobile_logo_height_phones',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Devices', 'mrseo' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 480px', 'mrseo' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		mrseo_elated_add_admin_section_title(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_fonts_title',
				'title'  => esc_html__( 'Typography', 'mrseo' )
			)
		);
		
		$first_level_group = mrseo_elated_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'first_level_group',
				'title'       => esc_html__( '1st Level Menu', 'mrseo' ),
				'description' => esc_html__( 'Define styles for 1st level in Mobile Menu Navigation', 'mrseo' )
			)
		);
		
		$first_level_row1 = mrseo_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'mrseo' ),
				'parent' => $first_level_row1
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'mrseo' ),
				'parent' => $first_level_row1
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'mrseo' ),
				'parent' => $first_level_row1
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'mrseo' ),
				'parent' => $first_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$first_level_row2 = mrseo_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'mrseo' ),
				'parent' => $first_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'    => 'mobile_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'mrseo' ),
				'parent'  => $first_level_row2,
				'options' => mrseo_elated_get_text_transform_array()
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'    => 'mobile_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'mrseo' ),
				'parent'  => $first_level_row2,
				'options' => mrseo_elated_get_font_style_array()
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'    => 'mobile_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'mrseo' ),
				'parent'  => $first_level_row2,
				'options' => mrseo_elated_get_font_weight_array()
			)
		);
		
		$first_level_row3 = mrseo_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row3'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'mrseo' ),
				'default_value' => '',
				'parent'        => $first_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_group = mrseo_elated_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Dropdown Menu', 'mrseo' ),
				'description' => esc_html__( 'Define styles for drop down menu items in Mobile Menu Navigation', 'mrseo' )
			)
		);
		
		$second_level_row1 = mrseo_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'mrseo' ),
				'parent' => $second_level_row1
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'mrseo' ),
				'parent' => $second_level_row1
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'mrseo' ),
				'parent' => $second_level_row1
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'mrseo' ),
				'parent' => $second_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$second_level_row2 = mrseo_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'mrseo' ),
				'parent' => $second_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'mrseo' ),
				'parent'  => $second_level_row2,
				'options' => mrseo_elated_get_text_transform_array()
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'mrseo' ),
				'parent'  => $second_level_row2,
				'options' => mrseo_elated_get_font_style_array()
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'mrseo' ),
				'parent'  => $second_level_row2,
				'options' => mrseo_elated_get_font_weight_array()
			)
		);
		
		$second_level_row3 = mrseo_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row3'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_dropdown_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'mrseo' ),
				'default_value' => '',
				'parent'        => $second_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		mrseo_elated_add_admin_section_title(
			array(
				'name'   => 'mobile_opener_panel',
				'parent' => $panel_mobile_header,
				'title'  => esc_html__( 'Mobile Menu Opener', 'mrseo' )
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'        => 'mobile_menu_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Mobile Navigation Title', 'mrseo' ),
				'description' => esc_html__( 'Enter title for mobile menu navigation', 'mrseo' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_icon_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Color', 'mrseo' ),
				'parent' => $panel_mobile_header
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'mobile_icon_hover_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Hover Color', 'mrseo' ),
				'parent' => $panel_mobile_header
			)
		);
	}
	
	add_action( 'mrseo_elated_options_map', 'mrseo_elated_mobile_header_options_map', 5 );
}