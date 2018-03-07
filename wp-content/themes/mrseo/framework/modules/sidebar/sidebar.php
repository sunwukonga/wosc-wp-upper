<?php

if (!function_exists('mrseo_elated_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function mrseo_elated_register_sidebars() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'mrseo'),
            'id' => 'sidebar',
            'description' => esc_html__('Default Sidebar', 'mrseo'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="eltdf-widget-title-holder"><h5 class="eltdf-widget-title">',
            'after_title' => '</h5></div>'
        ));
    }

    add_action('widgets_init', 'mrseo_elated_register_sidebars', 1);
}

if (!function_exists('mrseo_elated_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates MrSeoElatedSidebar object
     */
    function mrseo_elated_add_support_custom_sidebar() {
        add_theme_support('MrSeoElatedSidebar');
        if (get_theme_support('MrSeoElatedSidebar')) new MrSeoElatedSidebar();
    }

    add_action('after_setup_theme', 'mrseo_elated_add_support_custom_sidebar');
}