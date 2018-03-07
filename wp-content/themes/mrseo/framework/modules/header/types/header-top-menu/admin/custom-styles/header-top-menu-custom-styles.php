<?php

if ( ! function_exists( 'mrseo_elated_header_top_menu_logo_area_styles' ) ) {
	/**
	 * Generates styles for menu area
	 */
	function mrseo_elated_header_top_menu_logo_area_styles() {
		$menu_area_height = mrseo_elated_options()->getOptionValue( 'menu_area_height' );
		
		if ( ! empty( $menu_area_height ) ) {
			echo mrseo_elated_dynamic_css( '.eltdf-header-top-menu .eltdf-page-header .eltdf-logo-area', array( 'margin-top' => $menu_area_height . 'px' ) );
		}
	}
	
	add_action( 'mrseo_elated_style_dynamic', 'mrseo_elated_header_top_menu_logo_area_styles' );
}