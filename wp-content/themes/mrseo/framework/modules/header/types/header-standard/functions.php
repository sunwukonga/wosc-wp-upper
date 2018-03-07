<?php

if ( ! function_exists( 'mrseo_elated_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function mrseo_elated_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'MrSeoElated\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'mrseo_elated_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function mrseo_elated_init_register_header_standard_type() {
		add_filter( 'mrseo_elated_register_header_type_class', 'mrseo_elated_register_header_standard_type' );
	}
	
	add_action( 'mrseo_elated_before_header_function_init', 'mrseo_elated_init_register_header_standard_type' );
}