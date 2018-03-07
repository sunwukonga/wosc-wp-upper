<?php

if( !function_exists('mrseo_elated_search_body_class') ) {
    /**
     * Function that adds body classes for different search types
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function mrseo_elated_search_body_class($classes) {
        $classes[] = 'eltdf-fullscreen-search';
        $classes[] = 'eltdf-search-fade';

        return $classes;
    }

    add_filter('body_class', 'mrseo_elated_search_body_class');
}

if ( ! function_exists('mrseo_elated_get_search') ) {
    /**
     * Loads search HTML based on search type option.
     */
    function mrseo_elated_get_search() {
        mrseo_elated_load_search_template();
    }

    add_action('mrseo_elated_before_page_header', 'mrseo_elated_get_search');
}

if ( ! function_exists('mrseo_elated_load_search_template') ) {
    /**
     * Loads search HTML based on search type option.
     */
    function mrseo_elated_load_search_template() {
        mrseo_elated_get_module_template_part('templates/types/fullscreen', 'search');
    }
}