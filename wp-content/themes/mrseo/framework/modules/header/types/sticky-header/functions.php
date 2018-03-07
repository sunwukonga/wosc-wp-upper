<?php

if(!function_exists('mrseo_elated_sticky_header_global_js_var')) {
	function mrseo_elated_sticky_header_global_js_var($global_variables) {
		$global_variables['eltdfStickyHeaderHeight'] = mrseo_elated_get_sticky_header_height();
		$global_variables['eltdfStickyHeaderTransparencyHeight'] = mrseo_elated_get_sticky_header_height_of_complete_transparency();
		
		return $global_variables;
	}
	
	add_filter('mrseo_elated_js_global_variables', 'mrseo_elated_sticky_header_global_js_var');
}

if(!function_exists('mrseo_elated_sticky_header_per_page_js_var')) {
	function mrseo_elated_sticky_header_per_page_js_var($perPageVars) {
		$perPageVars['eltdfStickyScrollAmount'] = mrseo_elated_get_sticky_scroll_amount();
		
		return $perPageVars;
	}
	
	add_filter('mrseo_elated_per_page_js_vars', 'mrseo_elated_sticky_header_per_page_js_var');
}

if ( ! function_exists( 'mrseo_elated_register_sticky_header_areas' ) ) {
	/**
	 * Registers widget area for sticky header
	 */
	function mrseo_elated_register_sticky_header_areas() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sticky Header Widget Area', 'mrseo' ),
				'id'            => 'eltdf-sticky-right',
				'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-sticky-right">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the sticky menu', 'mrseo' )
			)
		);
	}
	
	add_action( 'widgets_init', 'mrseo_elated_register_sticky_header_areas' );
}

if ( ! function_exists( 'mrseo_elated_get_sticky_menu' ) ) {
	/**
	 * Loads sticky menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function mrseo_elated_get_sticky_menu( $additional_class = 'eltdf-default-nav' ) {
		mrseo_elated_get_module_template_part( 'templates/sticky-navigation', 'header/types/sticky-header', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'mrseo_elated_get_sticky_header' ) ) {
	/**
	 * Loads sticky header behavior HTML
	 */
	function mrseo_elated_get_sticky_header( $slug = '', $module = '' ) {
		$parameters = array(
			'hide_logo'             => mrseo_elated_options()->getOptionValue( 'hide_logo' ) == 'yes' ? true : false,
			'sticky_header_in_grid' => mrseo_elated_options()->getOptionValue( 'sticky_header_in_grid' ) == 'yes' ? true : false
		);
		
		$module = ! empty( $module ) ? $module : 'header/types/sticky-header';
		
		mrseo_elated_get_module_template_part( 'templates/sticky-header', $module, $slug, $parameters );
	}
}

if ( ! function_exists( 'mrseo_elated_get_sticky_header_height' ) ) {
	/**
	 * Returns top sticky header height
	 *
	 * @return bool|int|void
	 */
	function mrseo_elated_get_sticky_header_height() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'mrseo_elated_allow_sticky_header_behavior', $allow_sticky_behavior );
		$header_behaviour      = mrseo_elated_get_meta_field_intersect( 'header_behaviour' );
		
		//sticky menu height, needed only for sticky header on scroll up
		if ( $allow_sticky_behavior && in_array( $header_behaviour, array( 'sticky-header-on-scroll-up' ) ) ) {
			$sticky_header_height = mrseo_elated_filter_px( mrseo_elated_options()->getOptionValue( 'sticky_header_height' ) );
			
			return $sticky_header_height !== '' ? intval( $sticky_header_height ) : 70;
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'mrseo_elated_get_sticky_header_height_of_complete_transparency' ) ) {
	/**
	 * Returns top sticky header height it is fully transparent. used in anchor logic
	 *
	 * @return bool|int|void
	 */
	function mrseo_elated_get_sticky_header_height_of_complete_transparency() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'mrseo_elated_allow_sticky_header_behavior', $allow_sticky_behavior );
		
		if ( $allow_sticky_behavior ) {
			$stickyHeaderTransparent = mrseo_elated_options()->getOptionValue( 'sticky_header_background_color' ) !== '' && mrseo_elated_options()->getOptionValue( 'sticky_header_transparency' ) === '0';
			
			if ( $stickyHeaderTransparent ) {
				return 0;
			} else {
				$sticky_header_height = mrseo_elated_filter_px( mrseo_elated_options()->getOptionValue( 'sticky_header_height' ) );
				
				return $sticky_header_height !== '' ? intval( $sticky_header_height ) : 70;
			}
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'mrseo_elated_get_sticky_scroll_amount' ) ) {
	/**
	 * Returns top sticky scroll amount
	 *
	 * @return bool|int|void
	 */
	function mrseo_elated_get_sticky_scroll_amount() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'mrseo_elated_allow_sticky_header_behavior', $allow_sticky_behavior );
		$header_behaviour      = mrseo_elated_get_meta_field_intersect( 'header_behaviour' );
		
		//sticky menu scroll amount
		if ( $allow_sticky_behavior && in_array( $header_behaviour, array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' ) ) ) {
			$sticky_scroll_amount = mrseo_elated_filter_px( mrseo_elated_get_meta_field_intersect( 'scroll_amount_for_sticky' ) );
			
			return $sticky_scroll_amount !== '' ? intval( $sticky_scroll_amount ) : 0;
		} else {
			return 0;
		}
	}
}