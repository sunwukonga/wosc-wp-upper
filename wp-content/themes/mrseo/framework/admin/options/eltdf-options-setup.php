<?php

if ( ! function_exists( 'mrseo_elated_admin_map_init' ) ) {
	function mrseo_elated_admin_map_init() {
		do_action( 'mrseo_elated_before_options_map' );
		
		require_once ELATED_FRAMEWORK_ROOT_DIR . '/admin/options/fonts/map.php';
		require_once ELATED_FRAMEWORK_ROOT_DIR . '/admin/options/general/map.php';
		require_once ELATED_FRAMEWORK_ROOT_DIR . '/admin/options/page/map.php';
		require_once ELATED_FRAMEWORK_ROOT_DIR . '/admin/options/social/map.php';
		require_once ELATED_FRAMEWORK_ROOT_DIR . '/admin/options/reset/map.php';
		
		do_action( 'mrseo_elated_options_map' );
		
		do_action( 'mrseo_elated_after_options_map' );
	}
	
	add_action( 'after_setup_theme', 'mrseo_elated_admin_map_init', 0 );
}