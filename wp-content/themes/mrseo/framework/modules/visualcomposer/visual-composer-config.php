<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = ELATED_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'mrseo_elated_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function mrseo_elated_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'mrseo_elated_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'mrseo_elated_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function mrseo_elated_vc_row_map() {
		
		vc_add_param( 'vc_row', array(
			'type'       => 'dropdown',
			'param_name' => 'row_content_width',
			'heading'    => esc_html__( 'Elated Row Content Width', 'mrseo' ),
			'value'      => array(
				esc_html__( 'Full Width', 'mrseo' ) => 'full-width',
				esc_html__( 'In Grid', 'mrseo' )    => 'grid'
			)
		) );
		
		vc_add_param( 'vc_row', array(
			'type'        => 'textfield',
			'param_name'  => 'anchor',
			'heading'     => esc_html__( 'Elated Anchor ID', 'mrseo' ),
			'description' => esc_html__( 'For example "home"', 'mrseo' )
		) );
		
		vc_add_param( 'vc_row', array(
			'type'       => 'dropdown',
			'param_name' => 'content_text_aligment',
			'heading'    => esc_html__( 'Elated Content Aligment', 'mrseo' ),
			'value'      => array(
				esc_html__( 'Default', 'mrseo' ) => '',
				esc_html__( 'Left', 'mrseo' )    => 'left',
				esc_html__( 'Center', 'mrseo' )  => 'center',
				esc_html__( 'Right', 'mrseo' )   => 'right'
			)
		) );
		
		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Elated Angled Shape in Background','mrseo'),
			'param_name' => 'angled_shape',
			'value' => array(
				esc_html__('None','mrseo') => 'no',
				esc_html__('Custom Angled Shape','mrseo') => 'yes',
				esc_html__('Predefined Shape with Background Image','mrseo') => 'angled-bckg'
			),
			'dependency' => Array('element' => 'parallax', 'value' => array(''))
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Angled Shape Top','mrseo'),
			'param_name' => 'angled_shape_top',
			'value' => array(
				esc_html__('Yes','mrseo') => 'yes',
				esc_html__('No','mrseo') => 'no'

			),
			'dependency' => array('element' => 'angled_shape', 'value' => array('yes'))
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Elated Angled Shape Top Direction','mrseo'),
			'param_name' => 'angled_shape_top_direction',
			'value' => array(
				esc_html__('From Left To Right','mrseo') => 'from_left_to_right_top',
				esc_html__('From Right To Left','mrseo') => 'from_right_to_left_top'
			),
			'dependency' => array('element' => 'angled_shape_top', 'value' => array('yes'))
		));


		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Elated Angled Shape Bottom','mrseo'),
			'param_name' => 'angled_shape_bottom',
			'value' => array(
				esc_html__('Yes','mrseo') => 'yes',
				esc_html__('No','mrseo') => 'no'
			),
			'dependency' => array('element' => 'angled_shape', 'value' => array('yes'))
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Elated Angled Shape Bottom Direction','mrseo'),
			'param_name' => 'angled_shape_bottom_direction',
			'value' => array(
				esc_html__('From Left To Right','mrseo') => 'from_left_to_right_bottom',
				esc_html__('From Right To Left','mrseo') => 'from_right_to_left_bottom'
			),
			'dependency' => Array('element' => 'angled_shape_bottom', 'value' => array('yes'))
		));

		vc_add_param('vc_row', array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Elated Angled Shape Background','mrseo'),
			'param_name' => 'angled_shape_background',
			'dependency' => Array('element' => 'angled_shape', 'value' => array('yes'))
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Elated Angled Background Direction','mrseo'),
			'param_name' => 'angled_bckg_direction',
			'value' => array(
				esc_html__('From Left To Right','mrseo') => 'from_left_to_right_top',
				esc_html__('From Right To Left','mrseo') => 'from_right_to_left_top'
			),
			'dependency' => array('element' => 'angled_shape', 'value' => array('angled-bckg'))
		));

		vc_add_param('vc_row', array(
			'type' => 'attach_image',
			'heading' => esc_html__('Elated Angled Background Image','mrseo'),
			'param_name' => 'angled_bckg_image',
			'dependency' => Array('element' => 'angled_shape', 'value' => array('angled-bckg'))
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Elated Angled Background Parallax','mrseo'),
			'param_name' => 'angled_bckg_parallax',
			'value' => array(
				esc_html__('Yes','mrseo') => 'yes',
				esc_html__('No','mrseo') => 'no'
			),
			'dependency' => array('element' => 'angled_bckg_image','not_empty' => true)
		));
		/*** Row Inner ***/
		
		vc_add_param( 'vc_row_inner', array(
			'type'       => 'dropdown',
			'param_name' => 'row_content_width',
			'heading'    => esc_html__( 'Elated Row Content Width', 'mrseo' ),
			'value'      => array(
				esc_html__( 'Full Width', 'mrseo' ) => 'full-width',
				esc_html__( 'In Grid', 'mrseo' )    => 'grid'
			)
		) );
		
		vc_add_param( 'vc_row_inner', array(
			'type'       => 'dropdown',
			'param_name' => 'content_text_aligment',
			'heading'    => esc_html__( 'Elated Content Aligment', 'mrseo' ),
			'value'      => array(
				esc_html__( 'Default', 'mrseo' ) => '',
				esc_html__( 'Left', 'mrseo' )    => 'left',
				esc_html__( 'Center', 'mrseo' )  => 'center',
				esc_html__( 'Right', 'mrseo' )   => 'right'
			)
		) );
	}
	
	add_action( 'vc_after_init', 'mrseo_elated_vc_row_map' );
}