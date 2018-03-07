<?php

if(!function_exists('mrseo_elated_disable_wpml_css')) {
    function mrseo_elated_disable_wpml_css() {
	    define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
    }

	add_action('after_setup_theme', 'mrseo_elated_disable_wpml_css');
}