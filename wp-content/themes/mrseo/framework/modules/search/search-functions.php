<?php

if( !function_exists('mrseo_elated_load_search') ) {
    function mrseo_elated_load_search() {
        $search_type_meta = mrseo_elated_options()->getOptionValue('search_type');
	    $search_type = !empty($search_type_meta) ? $search_type_meta : 'fullscreen';
	    
        if ( mrseo_elated_active_widget( false, false, 'eltdf_search_opener' ) ) {
            include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/search/types/' . $search_type . '.php';
        }
    }

    add_action('init', 'mrseo_elated_load_search');
}