<?php

if ( ! function_exists( 'mrseo_elated_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function mrseo_elated_search_body_class( $classes ) {
		$classes[] = 'eltdf-search-covers-header';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mrseo_elated_search_body_class' );
}

if ( ! function_exists( 'mrseo_elated_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function mrseo_elated_get_search() {
		mrseo_elated_load_search_template();
	}
	
	add_action( 'mrseo_elated_before_page_header_html_close', 'mrseo_elated_get_search');
	add_action( 'mrseo_elated_before_mobile_header_html_close', 'mrseo_elated_get_search');
}

if ( ! function_exists( 'mrseo_elated_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function mrseo_elated_load_search_template() {
		$search_icon       = '';
		$search_icon_close = '';
		
		$search_in_grid   = mrseo_elated_options()->getOptionValue( '$search_in_grid' ) == 'yes' ? true : false;
		$search_icon_pack = mrseo_elated_options()->getOptionValue( 'search_icon_pack' );
		
		if ( ! empty( $search_icon_pack ) ) {
			$search_icon       = mrseo_elated_icon_collections()->getSearchIcon( $search_icon_pack, true );
			$search_icon_close = mrseo_elated_icon_collections()->getSearchClose( $search_icon_pack, true );
		}
		
		$parameters = array(
			'search_in_grid'    => $search_in_grid,
			'search_icon'       => $search_icon,
			'search_icon_close' => $search_icon_close
		);
		
		mrseo_elated_get_module_template_part( 'templates/types/covers-header', 'search', '', $parameters );
	}
}