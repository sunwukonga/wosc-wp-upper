<?php

if( !function_exists('mrseo_elated_get_blog_holder_params') ) {
    /**
     * Function that generates params for holders on blog templates
     */
    function mrseo_elated_get_blog_holder_params($params) {
        $params_list = array();

        $params_list['holder'] = 'eltdf-container';
        $params_list['inner'] = 'eltdf-container-inner clearfix';

        return $params_list;
    }

    add_filter( 'mrseo_elated_blog_holder_params', 'mrseo_elated_get_blog_holder_params' );
}

if( !function_exists('mrseo_elated_get_blog_holder_classes') ) {
	/**
	 * Function that generates blog holder classes for blog page
	 */
	function mrseo_elated_get_blog_holder_classes($classes) {
		$sidebar_classes   = array();
		$sidebar_classes[] = 'eltdf-grid-large-gutter';
		
		return implode(' ', $sidebar_classes);
	}
	
	add_filter( 'mrseo_elated_blog_holder_classes', 'mrseo_elated_get_blog_holder_classes' );
}

if( !function_exists('mrseo_elated_blog_part_params') ) {
    function mrseo_elated_blog_part_params($params) {

        $part_params = array();
        $part_params['title_tag'] = 'h3';
        $part_params['link_tag'] = 'h4';
        $part_params['quote_tag'] = 'h4';

        return array_merge($params, $part_params);
    }

    add_filter( 'mrseo_elated_blog_part_params', 'mrseo_elated_blog_part_params' );
}