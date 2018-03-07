<?php

if(!function_exists('mrseo_elated_map_woocommerce_meta')) {
    function mrseo_elated_map_woocommerce_meta() {
        $woocommerce_meta_box = mrseo_elated_add_meta_box(
            array(
                'scope' => array('product'),
                'title' => esc_html__('Product Meta', 'mrseo'),
                'name' => 'woo_product_meta'
            )
        );

        mrseo_elated_add_meta_box_field(array(
            'name'        => 'eltdf_product_featured_image_size',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Product List Shortcode', 'mrseo'),
            'description' => esc_html__('Choose image layout when it appears in Elated Product List - Masonry layout shortcode', 'mrseo'),
            'parent'      => $woocommerce_meta_box,
            'options'     => array(
                'eltdf-woo-image-normal-width' => esc_html__('Default', 'mrseo'),
                'eltdf-woo-image-large-width'  => esc_html__('Large Width', 'mrseo')
            )
        ));

        mrseo_elated_add_meta_box_field(
            array(
                'name'          => 'eltdf_show_title_area_woo_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Show Title Area', 'mrseo'),
                'description'   => esc_html__('Disabling this option will turn off page title area', 'mrseo'),
                'parent'        => $woocommerce_meta_box,
                'options'       => mrseo_elated_get_yes_no_select_array()
            )
        );
    }
	
    add_action('mrseo_elated_meta_boxes_map', 'mrseo_elated_map_woocommerce_meta', 99);
}