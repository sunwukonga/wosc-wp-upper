<?php

if ( ! function_exists( 'mrseo_elated_register_header_minimal_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function mrseo_elated_register_header_minimal_type( $header_types ) {
		$header_type = array(
			'header-minimal' => 'MrSeoElated\Modules\Header\Types\HeaderMinimal'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'mrseo_elated_init_register_header_minimal_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function mrseo_elated_init_register_header_minimal_type() {
		add_filter( 'mrseo_elated_register_header_type_class', 'mrseo_elated_register_header_minimal_type' );
	}
	
	add_action( 'mrseo_elated_before_header_function_init', 'mrseo_elated_init_register_header_minimal_type' );
}

if ( ! function_exists( 'mrseo_elated_register_header_minimal_full_screen_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function mrseo_elated_register_header_minimal_full_screen_menu() {
		register_nav_menus( array( 'popup-navigation' => esc_html__( 'Full Screen Navigation', 'mrseo' ) ) );
	}
	
	add_action( 'after_setup_theme', 'mrseo_elated_register_header_minimal_full_screen_menu' );
}

if ( ! function_exists( 'mrseo_elated_register_header_minimal_full_screen_menu_widgets' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function mrseo_elated_register_header_minimal_full_screen_menu_widgets() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Fullscreen Menu Top', 'mrseo' ),
				'id'            => 'fullscreen_menu_above',
				'description'   => esc_html__( 'This widget area is rendered above full screen menu', 'mrseo' ),
				'before_widget' => '<div class="%2$s eltdf-fullscreen-menu-above-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="eltdf-fullscreen-widget-title">',
				'after_title'   => '</h4>'
			)
		);
		
		register_sidebar(
			array(
				'name'          => esc_html__( 'Fullscreen Menu Bottom', 'mrseo' ),
				'id'            => 'fullscreen_menu_below',
				'description'   => esc_html__( 'This widget area is rendered below full screen menu', 'mrseo' ),
				'before_widget' => '<div class="%2$s eltdf-fullscreen-menu-below-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="eltdf-fullscreen-widget-title">',
				'after_title'   => '</h4>'
			)
		);
	}
	
	add_action( 'widgets_init', 'mrseo_elated_register_header_minimal_full_screen_menu_widgets' );
}

if ( ! function_exists( 'mrseo_elated_check_is_header_minimal_type_enabled' ) ) {
	/**
	 * This function check is header minimal type enabled in global option or meta boxes option
	 */
	function mrseo_elated_check_is_header_minimal_type_enabled() {
		return mrseo_elated_get_meta_field_intersect( 'header_type', mrseo_elated_get_page_id() ) === 'header-minimal';
	}
}

if ( ! function_exists( 'mrseo_elated_header_minimal_full_screen_menu_body_class' ) ) {
	/**
	 * Function that adds body classes for different full screen menu types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function mrseo_elated_header_minimal_full_screen_menu_body_class( $classes ) {
		if ( mrseo_elated_check_is_header_minimal_type_enabled() ) {
			$classes[] = 'eltdf-' . mrseo_elated_options()->getOptionValue( 'fullscreen_menu_animation_style' );
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'mrseo_elated_header_minimal_full_screen_menu_body_class' );
}

if ( ! function_exists( 'mrseo_elated_get_header_minimal_full_screen_menu' ) ) {
	/**
	 * Loads fullscreen menu HTML template
	 */
	function mrseo_elated_get_header_minimal_full_screen_menu() {
		if ( mrseo_elated_check_is_header_minimal_type_enabled() ) {
			$parameters = array(
				'fullscreen_menu_in_grid' => mrseo_elated_options()->getOptionValue( 'fullscreen_in_grid' ) === 'yes' ? true : false
			);
			
			mrseo_elated_get_module_template_part( 'templates/full-screen-menu', 'header/types/header-minimal', '', $parameters );
		}
	}
	
	add_action( 'mrseo_elated_after_header_area', 'mrseo_elated_get_header_minimal_full_screen_menu', 10 );
}