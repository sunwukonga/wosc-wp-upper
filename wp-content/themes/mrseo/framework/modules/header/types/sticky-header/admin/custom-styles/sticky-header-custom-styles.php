<?php

if ( ! function_exists( 'mrseo_elated_sticky_header_styles' ) ) {
	/**
	 * Generates styles for sticky haeder
	 */
	function mrseo_elated_sticky_header_styles() {
		$background_color        = mrseo_elated_options()->getOptionValue( 'sticky_header_background_color' );
		$background_transparency = mrseo_elated_options()->getOptionValue( 'sticky_header_transparency' );
		$border_color            = mrseo_elated_options()->getOptionValue( 'sticky_header_border_color' );
		$header_height           = mrseo_elated_options()->getOptionValue( 'sticky_header_height' );
		
		if ( ! empty( $background_color ) ) {
			$header_background_color              = $background_color;
			$header_background_color_transparency = 1;
			
			if ( $background_transparency !== '' ) {
				$header_background_color_transparency = $background_transparency;
			}
			
			echo mrseo_elated_dynamic_css( '.eltdf-page-header .eltdf-sticky-header .eltdf-sticky-holder', array( 'background-color' => mrseo_elated_rgba_color( $header_background_color, $header_background_color_transparency ) ) );
		}
		
		if ( ! empty( $border_color ) ) {
			echo mrseo_elated_dynamic_css( '.eltdf-page-header .eltdf-sticky-header .eltdf-sticky-holder', array( 'border-color' => $border_color ) );
		}
		
		if ( ! empty( $header_height ) ) {
			$height = mrseo_elated_filter_px( $header_height ) . 'px';
			
			echo mrseo_elated_dynamic_css( '.eltdf-page-header .eltdf-sticky-header', array( 'height' => $height ) );
			echo mrseo_elated_dynamic_css( '.eltdf-page-header .eltdf-sticky-header .eltdf-logo-wrapper a', array( 'max-height' => $height ) );
		}
		
		// sticky menu style
		
		$menu_item_styles = mrseo_elated_get_typography_styles( 'sticky' );
		
		$menu_item_selector = array(
			'.eltdf-main-menu.eltdf-sticky-nav > ul > li > a'
		);
		
		echo mrseo_elated_dynamic_css( $menu_item_selector, $menu_item_styles );
		
		
		$hover_color = mrseo_elated_options()->getOptionValue( 'sticky_hovercolor' );
		
		$menu_item_hover_styles = array();
		if ( ! empty( $hover_color ) ) {
			$menu_item_hover_styles['color'] = $hover_color;
		}
		
		$menu_item_hover_selector = array(
			'.eltdf-main-menu.eltdf-sticky-nav > ul > li:hover > a',
			'.eltdf-main-menu.eltdf-sticky-nav > ul > li.eltdf-active-item > a'
		);
		
		echo mrseo_elated_dynamic_css( $menu_item_hover_selector, $menu_item_hover_styles );
	}
	
	add_action( 'mrseo_elated_style_dynamic', 'mrseo_elated_sticky_header_styles' );
}