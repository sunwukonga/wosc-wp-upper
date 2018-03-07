<?php

if ( ! function_exists( 'mrseo_elated_get_hide_dep_for_full_screen_menu_options' ) ) {
	function mrseo_elated_get_hide_dep_for_full_screen_menu_options() {
		$hide_dep_options = apply_filters( 'mrseo_elated_full_screen_menu_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'mrseo_elated_fullscreen_menu_options_map' ) ) {
	function mrseo_elated_fullscreen_menu_options_map() {
		$hide_dep_options = mrseo_elated_get_hide_dep_for_full_screen_menu_options();
		
		$fullscreen_panel = mrseo_elated_add_admin_panel(
			array(
				'title'           => esc_html__( 'Full Screen Menu', 'mrseo' ),
				'name'            => 'panel_fullscreen_menu',
				'page'            => '_header_page',
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $fullscreen_panel,
				'type'          => 'select',
				'name'          => 'fullscreen_menu_animation_style',
				'default_value' => 'fade-push-text-right',
				'label'         => esc_html__( 'Full Screen Menu Overlay Animation', 'mrseo' ),
				'description'   => esc_html__( 'Choose animation type for full screen menu overlay', 'mrseo' ),
				'options'       => array(
					'fade-push-text-right' => esc_html__( 'Fade Push Text Right', 'mrseo' ),
					'fade-push-text-top'   => esc_html__( 'Fade Push Text Top', 'mrseo' ),
					'fade-text-scaledown'  => esc_html__( 'Fade Text Scaledown', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $fullscreen_panel,
				'type'          => 'yesno',
				'name'          => 'fullscreen_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Full Screen Menu in Grid', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will put full screen menu content in grid', 'mrseo' ),
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $fullscreen_panel,
				'type'          => 'selectblank',
				'name'          => 'fullscreen_alignment',
				'default_value' => '',
				'label'         => esc_html__( 'Full Screen Menu Alignment', 'mrseo' ),
				'description'   => esc_html__( 'Choose alignment for full screen menu content', 'mrseo' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'mrseo' ),
					'left'   => esc_html__( 'Left', 'mrseo' ),
					'center' => esc_html__( 'Center', 'mrseo' ),
					'right'  => esc_html__( 'Right', 'mrseo' )
				)
			)
		);
		
		$background_group = mrseo_elated_add_admin_group(
			array(
				'parent'      => $fullscreen_panel,
				'name'        => 'background_group',
				'title'       => esc_html__( 'Background', 'mrseo' ),
				'description' => esc_html__( 'Select a background color and transparency for full screen menu (0 = fully transparent, 1 = opaque)', 'mrseo' )
			)
		);
		
		$background_group_row = mrseo_elated_add_admin_row(
			array(
				'parent' => $background_group,
				'name'   => 'background_group_row'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_menu_background_color',
				'label'  => esc_html__( 'Background Color', 'mrseo' )
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type'   => 'textsimple',
				'name'   => 'fullscreen_menu_background_transparency',
				'label'  => esc_html__( 'Background Transparency', 'mrseo' )
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'      => $fullscreen_panel,
				'type'        => 'image',
				'name'        => 'fullscreen_menu_background_image',
				'label'       => esc_html__( 'Background Image', 'mrseo' ),
				'description' => esc_html__( 'Choose a background image for full screen menu background', 'mrseo' )
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'      => $fullscreen_panel,
				'type'        => 'image',
				'name'        => 'fullscreen_menu_pattern_image',
				'label'       => esc_html__( 'Pattern Background Image', 'mrseo' ),
				'description' => esc_html__( 'Choose a pattern image for full screen menu background', 'mrseo' )
			)
		);
		
		//1st level style group
		$first_level_style_group = mrseo_elated_add_admin_group(
			array(
				'parent'      => $fullscreen_panel,
				'name'        => 'first_level_style_group',
				'title'       => esc_html__( '1st Level Style', 'mrseo' ),
				'description' => esc_html__( 'Define styles for 1st level in full screen menu', 'mrseo' )
			)
		);
		
		$first_level_style_row1 = mrseo_elated_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name'   => 'first_level_style_row1'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $first_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'mrseo' ),
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $first_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_hover_color',
				'default_value' => '',
				'label'         => esc_html__( 'Hover Text Color', 'mrseo' ),
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $first_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_active_color',
				'default_value' => '',
				'label'         => esc_html__( 'Active Text Color', 'mrseo' ),
			)
		);
		
		$first_level_style_row3 = mrseo_elated_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name'   => 'first_level_style_row3'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $first_level_style_row3,
				'type'          => 'fontsimple',
				'name'          => 'fullscreen_menu_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mrseo' ),
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $first_level_style_row3,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'mrseo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $first_level_style_row3,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'mrseo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$first_level_style_row4 = mrseo_elated_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name'   => 'first_level_style_row4'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $first_level_style_row4,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'mrseo' ),
				'options'       => mrseo_elated_get_font_style_array()
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $first_level_style_row4,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'mrseo' ),
				'options'       => mrseo_elated_get_font_weight_array()
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $first_level_style_row4,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Lettert Spacing', 'mrseo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $first_level_style_row4,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'mrseo' ),
				'options'       => mrseo_elated_get_text_transform_array()
			)
		);
		
		//2nd level style group
		$second_level_style_group = mrseo_elated_add_admin_group(
			array(
				'parent'      => $fullscreen_panel,
				'name'        => 'second_level_style_group',
				'title'       => esc_html__( '2nd Level Style', 'mrseo' ),
				'description' => esc_html__( 'Define styles for 2nd level in full screen menu', 'mrseo' )
			)
		);
		
		$second_level_style_row1 = mrseo_elated_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name'   => 'second_level_style_row1'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $second_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_color_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'mrseo' ),
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $second_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_hover_color_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Text Color', 'mrseo' ),
			)
		);
		
		$second_level_style_row2 = mrseo_elated_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name'   => 'second_level_style_row2'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $second_level_style_row2,
				'type'          => 'fontsimple',
				'name'          => 'fullscreen_menu_google_fonts_2nd',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mrseo' ),
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $second_level_style_row2,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_font_size_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'mrseo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $second_level_style_row2,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_line_height_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'mrseo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_style_row3 = mrseo_elated_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name'   => 'second_level_style_row3'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $second_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_style_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'mrseo' ),
				'options'       => mrseo_elated_get_font_style_array()
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $second_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_weight_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'mrseo' ),
				'options'       => mrseo_elated_get_font_weight_array()
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $second_level_style_row3,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_letter_spacing_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Lettert Spacing', 'mrseo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $second_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_text_transform_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'mrseo' ),
				'options'       => mrseo_elated_get_text_transform_array()
			)
		);
		
		$third_level_style_group = mrseo_elated_add_admin_group(
			array(
				'parent'      => $fullscreen_panel,
				'name'        => 'third_level_style_group',
				'title'       => esc_html__( '3rd Level Style', 'mrseo' ),
				'description' => esc_html__( 'Define styles for 3rd level in full screen menu', 'mrseo' )
			)
		);
		
		$third_level_style_row1 = mrseo_elated_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name'   => 'third_level_style_row1'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $third_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_color_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'mrseo' ),
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $third_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_hover_color_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Text Color', 'mrseo' ),
			)
		);
		
		$third_level_style_row2 = mrseo_elated_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name'   => 'second_level_style_row2'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $third_level_style_row2,
				'type'          => 'fontsimple',
				'name'          => 'fullscreen_menu_google_fonts_3rd',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mrseo' ),
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $third_level_style_row2,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_font_size_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'mrseo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $third_level_style_row2,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_line_height_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'mrseo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$third_level_style_row3 = mrseo_elated_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name'   => 'second_level_style_row3'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $third_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_style_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'mrseo' ),
				'options'       => mrseo_elated_get_font_style_array()
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $third_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_weight_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'mrseo' ),
				'options'       => mrseo_elated_get_font_weight_array()
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $third_level_style_row3,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_letter_spacing_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Lettert Spacing', 'mrseo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $third_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_text_transform_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'mrseo' ),
				'options'       => mrseo_elated_get_text_transform_array()
			)
		);
		
		$icon_colors_group = mrseo_elated_add_admin_group(
			array(
				'parent'      => $fullscreen_panel,
				'name'        => 'fullscreen_menu_icon_colors_group',
				'title'       => esc_html__( 'Full Screen Menu Icon Style', 'mrseo' ),
				'description' => esc_html__( 'Define styles for full screen menu icon', 'mrseo' )
			)
		);
		
		$icon_colors_row1 = mrseo_elated_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name'   => 'icon_colors_row1'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_menu_icon_color',
				'label'  => esc_html__( 'Color', 'mrseo' ),
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_menu_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'mrseo' ),
			)
		);
	}
	
	add_action( 'mrseo_elated_additional_header_menu_area_options_map', 'mrseo_elated_fullscreen_menu_options_map' );
}