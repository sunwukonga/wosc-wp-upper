<?php

if ( ! function_exists('mrseo_elated_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function mrseo_elated_contact_form_map() {
		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'mrseo'),
			'param_name' => 'html_class',
			'value' => array(
				esc_html__('Default', 'mrseo') => 'default',
				esc_html__('Custom Style 1', 'mrseo') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'mrseo') => 'cf7_custom_style_2',
				esc_html__('Custom Style 3', 'mrseo') => 'cf7_custom_style_3'
			),
			'description' => esc_html__('You can style each form element individually in Elated Options > Contact Form 7', 'mrseo')
		));
	}
	
	add_action('vc_after_init', 'mrseo_elated_contact_form_map');
}