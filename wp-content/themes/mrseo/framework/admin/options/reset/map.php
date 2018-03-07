<?php

if ( ! function_exists( 'mrseo_elated_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function mrseo_elated_reset_options_map() {
		
		mrseo_elated_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'mrseo' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = mrseo_elated_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'mrseo' )
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'mrseo' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'mrseo' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'mrseo_elated_options_map', 'mrseo_elated_reset_options_map', 100 );
}