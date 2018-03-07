<?php

if ( ! function_exists( 'mrseo_elated_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function mrseo_elated_general_options_map() {
		
		mrseo_elated_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'mrseo' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = mrseo_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'mrseo' )
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'mrseo' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'mrseo' ),
				'parent'        => $panel_design_style
			)
		);		
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'second_google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Second Google Font Family', 'mrseo' ),
				'description'   => esc_html__( 'Choose a second Google font for your site', 'mrseo' ),
				'parent'        => $panel_design_style
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'mrseo' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_additional_google_fonts_container"
				)
			)
		);
		
		$additional_google_fonts_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'hidden_property' => 'additional_google_fonts',
				'hidden_value'    => 'no'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mrseo' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'mrseo' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mrseo' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'mrseo' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mrseo' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'mrseo' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mrseo' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'mrseo' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mrseo' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'mrseo' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'mrseo' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'mrseo' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'       => esc_html__( '100 Thin', 'mrseo' ),
					'100italic' => esc_html__( '100 Thin Italic', 'mrseo' ),
					'200'       => esc_html__( '200 Extra-Light', 'mrseo' ),
					'200italic' => esc_html__( '200 Extra-Light Italic', 'mrseo' ),
					'300'       => esc_html__( '300 Light', 'mrseo' ),
					'300italic' => esc_html__( '300 Light Italic', 'mrseo' ),
					'400'       => esc_html__( '400 Regular', 'mrseo' ),
					'400italic' => esc_html__( '400 Regular Italic', 'mrseo' ),
					'500'       => esc_html__( '500 Medium', 'mrseo' ),
					'500italic' => esc_html__( '500 Medium Italic', 'mrseo' ),
					'600'       => esc_html__( '600 Semi-Bold', 'mrseo' ),
					'600italic' => esc_html__( '600 Semi-Bold Italic', 'mrseo' ),
					'700'       => esc_html__( '700 Bold', 'mrseo' ),
					'700italic' => esc_html__( '700 Bold Italic', 'mrseo' ),
					'800'       => esc_html__( '800 Extra-Bold', 'mrseo' ),
					'800italic' => esc_html__( '800 Extra-Bold Italic', 'mrseo' ),
					'900'       => esc_html__( '900 Ultra-Bold', 'mrseo' ),
					'900italic' => esc_html__( '900 Ultra-Bold Italic', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'mrseo' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'mrseo' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'mrseo' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'mrseo' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'mrseo' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'mrseo' ),
					'greek'        => esc_html__( 'Greek', 'mrseo' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'mrseo' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'mrseo' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #00bbb3', 'mrseo' ),
				'parent'      => $panel_design_style
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'mrseo' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'mrseo' ),
				'parent'      => $panel_design_style
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'mrseo' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'mrseo' ),
				'parent'      => $panel_design_style
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'mrseo' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_boxed_container"
				)
			)
		);
		
		$boxed_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'boxed_container',
				'hidden_property' => 'boxed',
				'hidden_value'    => 'no'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'        => 'page_background_color_in_box',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'mrseo' ),
				'description' => esc_html__( 'Choose the page background color outside box', 'mrseo' ),
				'parent'      => $boxed_container
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'        => 'boxed_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'mrseo' ),
				'description' => esc_html__( 'Choose an image to be displayed in background', 'mrseo' ),
				'parent'      => $boxed_container
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'        => 'boxed_pattern_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Pattern', 'mrseo' ),
				'description' => esc_html__( 'Choose an image to be used as background pattern', 'mrseo' ),
				'parent'      => $boxed_container
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'boxed_background_image_attachment',
				'type'          => 'select',
				'default_value' => 'fixed',
				'label'         => esc_html__( 'Background Image Attachment', 'mrseo' ),
				'description'   => esc_html__( 'Choose background image attachment', 'mrseo' ),
				'parent'        => $boxed_container,
				'options'       => array(
					'fixed'  => esc_html__( 'Fixed', 'mrseo' ),
					'scroll' => esc_html__( 'Scroll', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'mrseo' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_paspartu_container"
				)
			)
		);
		
		$paspartu_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'paspartu_container',
				'hidden_property' => 'paspartu',
				'hidden_value'    => 'no'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'        => 'paspartu_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Passepartout Color', 'mrseo' ),
				'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'mrseo' ),
				'parent'      => $paspartu_container
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'        => 'paspartu_width',
				'type'        => 'text',
				'label'       => esc_html__( 'Passepartout Size', 'mrseo' ),
				'description' => esc_html__( 'Enter size amount for passepartout', 'mrseo' ),
				'parent'      => $paspartu_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'        => $paspartu_container,
				'type'          => 'yesno',
				'default_value' => 'no',
				'name'          => 'disable_top_paspartu',
				'label'         => esc_html__( 'Disable Top Passepartout', 'mrseo' )
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'mrseo' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'mrseo' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'eltdf-grid-1100' => esc_html__( '1100px - default', 'mrseo' ),
					'eltdf-grid-1300' => esc_html__( '1300px', 'mrseo' ),
					'eltdf-grid-1200' => esc_html__( '1200px', 'mrseo' ),
					'eltdf-grid-1000' => esc_html__( '1000px', 'mrseo' ),
					'eltdf-grid-800'  => esc_html__( '800px', 'mrseo' )
				)
			)
		);
		
		$panel_settings = mrseo_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'mrseo' )
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'mrseo' ),
				'parent'        => $panel_settings
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'mrseo' ),
				'parent'        => $panel_settings,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_page_transitions_container"
				)
			)
		);
		
		$page_transitions_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $panel_settings,
				'name'            => 'page_transitions_container',
				'hidden_property' => 'smooth_page_transitions',
				'hidden_value'    => 'no'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'page_transition_preloader',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Preloading Animation', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'mrseo' ),
				'parent'        => $page_transitions_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_page_transition_preloader_container"
				)
			)
		);
		
		$page_transition_preloader_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $page_transitions_container,
				'name'            => 'page_transition_preloader_container',
				'hidden_property' => 'page_transition_preloader',
				'hidden_value'    => 'no'
			)
		);
		
		
		mrseo_elated_add_admin_field(
			array(
				'name'   => 'smooth_pt_bgnd_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Page Loader Background Color', 'mrseo' ),
				'parent' => $page_transition_preloader_container
			)
		);
		
		$group_pt_spinner_animation = mrseo_elated_add_admin_group(
			array(
				'name'        => 'group_pt_spinner_animation',
				'title'       => esc_html__( 'Loader Style', 'mrseo' ),
				'description' => esc_html__( 'Define styles for loader spinner animation', 'mrseo' ),
				'parent'      => $page_transition_preloader_container
			)
		);
		
		$row_pt_spinner_animation = mrseo_elated_add_admin_row(
			array(
				'name'   => 'row_pt_spinner_animation',
				'parent' => $group_pt_spinner_animation
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'type'          => 'selectsimple',
				'name'          => 'smooth_pt_spinner_type',
				'default_value' => '',
				'label'         => esc_html__( 'Spinner Type', 'mrseo' ),
				'parent'        => $row_pt_spinner_animation,
				'options'       => array(
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
		
		mrseo_elated_add_admin_field(
			array(
				'type'          => 'colorsimple',
				'name'          => 'smooth_pt_spinner_color',
				'default_value' => '',
				'label'         => esc_html__( 'Spinner Color', 'mrseo' ),
				'parent'        => $row_pt_spinner_animation
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'page_transition_fadeout',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Fade Out Animation', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'mrseo' ),
				'parent'        => $page_transitions_container
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'mrseo' ),
				'parent'        => $panel_settings
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'mrseo' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = mrseo_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'mrseo' )
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'        => 'custom_css',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom CSS', 'mrseo' ),
				'description' => esc_html__( 'Enter your custom CSS here', 'mrseo' ),
				'parent'      => $panel_custom_code
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'mrseo' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'mrseo' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = mrseo_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'mrseo' )
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'mrseo' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'mrseo' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'mrseo_elated_options_map', 'mrseo_elated_general_options_map', 1 );
}

if ( ! function_exists( 'mrseo_elated_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function mrseo_elated_page_general_style( $style ) {
		$current_style = '';
		$class_prefix  = mrseo_elated_get_unique_page_class( mrseo_elated_get_page_id() );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = mrseo_elated_get_meta_field_intersect( 'page_background_color_in_box' );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = mrseo_elated_get_meta_field_intersect( 'boxed_background_image' );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = mrseo_elated_get_meta_field_intersect( 'boxed_pattern_background_image' );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = mrseo_elated_get_meta_field_intersect( 'boxed_background_image_attachment' );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.eltdf-boxed .eltdf-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= mrseo_elated_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'mrseo_elated_add_page_custom_style', 'mrseo_elated_page_general_style' );
}