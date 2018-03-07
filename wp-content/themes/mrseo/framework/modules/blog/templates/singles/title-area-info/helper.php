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

if( !function_exists('mrseo_elated_blog_part_params') ) {
    function mrseo_elated_blog_part_params($params) {

        $part_params = array();
        $part_params['title_tag'] = 'h2';
        $part_params['link_tag'] = 'h5';
        $part_params['quote_tag'] = 'h5';

        return array_merge($params, $part_params);
    }

    add_filter( 'mrseo_elated_blog_part_params', 'mrseo_elated_blog_part_params' );
}

if( !function_exists('mrseo_elated_get_blog_single_title_height') ) {
    /**
     * Function that sets default title height for specific type of header
     *
     * @see mrseo_elated_get_title_area_height_default_value() in title-functions.php
     *
     * @param int $height standard height value
     *
     * @return integer value of title height
     */
    function mrseo_elated_get_blog_single_title_height($height) {
        if($height == mrseo_elated_get_title_area_height_default_value()) {
            return 350;
        }

        return $height;
    }

    add_filter( 'mrseo_elated_title_area_height', 'mrseo_elated_get_blog_single_title_height' );
}

if(!function_exists('mrseo_elated_blog_single_title_layout')) {
    /**
     * Function that
     *
     * @see mrseo_elated_get_title() in title-functions.php
     *
     * @param $layout string with module name
     *
     * @return string with new layout name
     *
     */
    function mrseo_elated_blog_single_title_layout($layout) {

        $layout = 'title-area-info';

        return $layout;
    }

    add_filter('mrseo_elated_title_layout', 'mrseo_elated_blog_single_title_layout');
}

if(!function_exists('mrseo_elated_blog_single_layout_title_class')) {
    /**
     * Function that adds class on title holder if full height title option is enabled for single post page
     * First filter is for applying class
     * Second filter is for overriding title values
     *
     * @see mrseo_elated_title_classes() in filter-functions.php
     *
     * @param $classes array of classes
     *
     * @return array changed array of classes
     *
     */
    function mrseo_elated_blog_single_layout_title_class($classes) {

        $classes[] = 'eltdf-blog-single-title-area-info';

        return $classes;
    }

    add_filter('mrseo_elated_title_classes', 'mrseo_elated_blog_single_layout_title_class');
}

if(!function_exists('mrseo_elated_blog_single_layout_title_load')) {
    /**
     * Function that calls function for overriding title values
     *
     * @see mrseo_elated_blog_single_title_module() in filter-functions.php
     *
     *
     */
    function mrseo_elated_blog_single_layout_title_load() {

        add_filter('mrseo_elated_title_module', 'mrseo_elated_get_blog_module_name');

        add_filter('mrseo_elated_title_area_height_params', 'mrseo_elated_blog_single_title_params');
        add_filter('mrseo_elated_title_image_exists', 'mrseo_elated_post_has_thumbnail');
    }

    add_action('mrseo_elated_blog_single_loaded', 'mrseo_elated_blog_single_layout_title_load');
}