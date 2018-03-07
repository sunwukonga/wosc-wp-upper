<?php

if ( ! function_exists( 'mrseo_elated_register_header_vertical_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function mrseo_elated_register_header_vertical_type( $header_types ) {
		$header_type = array(
			'header-vertical' => 'MrSeoElated\Modules\Header\Types\HeaderVertical'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'mrseo_elated_init_register_header_vertical_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function mrseo_elated_init_register_header_vertical_type() {
		add_filter( 'mrseo_elated_register_header_type_class', 'mrseo_elated_register_header_vertical_type' );
	}
	
	add_action( 'mrseo_elated_before_header_function_init', 'mrseo_elated_init_register_header_vertical_type' );
}

if ( ! function_exists( 'mrseo_elated_include_header_vertical_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function mrseo_elated_include_header_vertical_menu( $menus ) {
		$menus['vertical-navigation'] = esc_html__( 'Vertical Navigation', 'mrseo' );
		
		return $menus;
	}
	
	// add_filter( 'mrseo_elated_register_headers_menu', 'mrseo_elated_include_header_vertical_menu' );
}

if ( ! function_exists( 'mrseo_elated_check_is_header_vertical_type_enabled' ) ) {
	/**
	 * This function check is header vertical type enabled in global option or meta boxes option
	 */
	function mrseo_elated_check_is_header_vertical_type_enabled() {
		return mrseo_elated_get_meta_field_intersect( 'header_type', mrseo_elated_get_page_id() ) === 'header-vertical';
	}
}

if ( ! function_exists( 'mrseo_elated_disable_behaviors_for_header_vertical' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function mrseo_elated_disable_behaviors_for_header_vertical( $allow_behavior ) {
		if(mrseo_elated_check_is_header_vertical_type_enabled()) {
			$allow_behavior = false;
		}
		
		return $allow_behavior;
	}
	
	add_filter( 'mrseo_elated_allow_sticky_header_behavior', 'mrseo_elated_disable_behaviors_for_header_vertical' );
	add_filter( 'mrseo_elated_allow_content_boxed_layout', 'mrseo_elated_disable_behaviors_for_header_vertical' );
}

if ( ! function_exists( 'mrseo_elated_register_header_vertical_widget_areas' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function mrseo_elated_register_header_vertical_widget_areas() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Header Vertical Widget Area', 'mrseo' ),
				'id'            => 'eltdf-vertical-area',
				'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-vertical-area-widget">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the bottom of header vertical menu', 'mrseo' )
			)
		);
	}
	
	// add_action( 'widgets_init', 'mrseo_elated_register_header_vertical_widget_areas' );
}

if ( ! function_exists( 'mrseo_elated_get_header_vertical_widget_areas' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function mrseo_elated_get_header_vertical_widget_areas() {
		$page_id                            = mrseo_elated_get_page_id();
		$custom_vertical_header_widget_area = get_post_meta( $page_id, 'eltdf_custom_vertical_area_sidebar_meta', true );
		
		if ( is_active_sidebar( 'eltdf-vertical-area' ) && empty( $custom_vertical_header_widget_area ) ) {
			dynamic_sidebar( 'eltdf-vertical-area' );
		} else if ( ! empty( $custom_vertical_header_widget_area ) && is_active_sidebar( $custom_vertical_header_widget_area ) ) {
			dynamic_sidebar( $custom_vertical_header_widget_area );
		}
	}
}

if ( ! function_exists( 'mrseo_elated_get_header_vertical_main_menu' ) ) {
	/**
	 * Loads vertical menu HTML
	 */
	function mrseo_elated_get_header_vertical_main_menu() {
		mrseo_elated_get_module_template_part( 'templates/vertical-navigation', 'header/types/header-vertical' );
	}
}

if ( ! function_exists( 'mrseo_elated_vertical_header_holder_class' ) ) {
	/**
	 * return holder class
	 */
	function mrseo_elated_vertical_header_holder_class() {
		$center_content = mrseo_elated_get_meta_field_intersect( 'vertical_header_center_content', mrseo_elated_get_page_id() );
		$holder_class   = $center_content === 'yes' ? 'eltdf-vertical-alignment-center' : 'eltdf-vertical-alignment-top';
		
		return $holder_class;
	}
}