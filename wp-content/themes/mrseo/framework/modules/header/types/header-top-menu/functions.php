<?php

if ( ! function_exists( 'mrseo_elated_register_header_top_menu_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function mrseo_elated_register_header_top_menu_type( $header_types ) {
		$header_type = array(
			'header-top-menu' => 'MrSeoElated\Modules\Header\Types\HeaderTopMenu'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'mrseo_elated_init_register_header_top_menu_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function mrseo_elated_init_register_header_top_menu_type() {
		add_filter( 'mrseo_elated_register_header_type_class', 'mrseo_elated_register_header_top_menu_type' );
	}
	
	add_action( 'mrseo_elated_before_header_function_init', 'mrseo_elated_init_register_header_top_menu_type' );
}

if ( ! function_exists( 'mrseo_elated_check_is_header_top_menu_type_enabled' ) ) {
	/**
	 * This function check is header top_menu type enabled in global option or meta boxes option
	 */
	function mrseo_elated_check_is_header_top_menu_type_enabled() {
		return mrseo_elated_get_meta_field_intersect( 'header_type', mrseo_elated_get_page_id() ) === 'header-top-menu';
	}
}

if ( ! function_exists( 'mrseo_elated_disable_behaviors_for_header_top_menu' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function mrseo_elated_disable_behaviors_for_header_top_menu( $allow_behavior ) {
		if(mrseo_elated_check_is_header_top_menu_type_enabled()) {
			$allow_behavior = false;
		}
		
		return $allow_behavior;
	}
	
	add_filter( 'mrseo_elated_allow_sticky_header_behavior', 'mrseo_elated_disable_behaviors_for_header_top_menu' );
	add_filter( 'mrseo_elated_allow_content_boxed_layout', 'mrseo_elated_disable_behaviors_for_header_top_menu' );
}