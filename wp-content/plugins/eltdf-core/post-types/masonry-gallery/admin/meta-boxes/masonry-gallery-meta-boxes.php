<?php

if(!function_exists('eltdf_core_map_masonry_gallery_meta')) {
    function eltdf_core_map_masonry_gallery_meta() {
        $masonry_gallery_meta_box = mrseo_elated_add_meta_box(
            array(
                'scope' => array('masonry-gallery'),
                'title' => esc_html__('Masonry Gallery General', 'eltdf-core'),
                'name' => 'masonry_gallery_meta'
            )
        );
	    
        mrseo_elated_add_meta_box_field(
            array(
                'name' => 'eltdf_masonry_gallery_item_title_tag',
                'type' => 'select',
                'default_value' => 'h4',
                'label' => esc_html__('Title Tag', 'eltdf-core'),
                'parent' => $masonry_gallery_meta_box,
                'options' => mrseo_elated_get_title_tag()
            )
        );

        mrseo_elated_add_meta_box_field(
            array(
                'name' => 'eltdf_masonry_gallery_item_text',
                'type' => 'text',
                'label' => esc_html__('Text', 'eltdf-core'),
                'parent' => $masonry_gallery_meta_box
            )
        );

        mrseo_elated_add_meta_box_field(
            array(
                'name' => 'eltdf_masonry_gallery_item_image',
                'type' => 'image',
                'label' => esc_html__('Custom Item Icon', 'eltdf-core'),
                'parent' => $masonry_gallery_meta_box
            )
        );

        mrseo_elated_add_meta_box_field(
            array(
                'name' => 'eltdf_masonry_gallery_item_link',
                'type' => 'text',
                'label' => esc_html__('Link', 'eltdf-core'),
                'parent' => $masonry_gallery_meta_box
            )
        );

        mrseo_elated_add_meta_box_field(
            array(
                'name' => 'eltdf_masonry_gallery_item_link_target',
                'type' => 'select',
                'default_value' => '_self',
                'label' => esc_html__('Link Target', 'eltdf-core'),
                'parent' => $masonry_gallery_meta_box,
                'options' => mrseo_elated_get_link_target_array()
            )
        );

        mrseo_elated_add_admin_section_title(array(
            'name'   => 'eltdf_section_style_title',
            'parent' => $masonry_gallery_meta_box,
            'title'  => esc_html__('Masonry Gallery Item Style', 'eltdf-core')
        ));

        mrseo_elated_add_meta_box_field(
            array(
                'name' => 'eltdf_masonry_gallery_item_size',
                'type' => 'select',
                'default_value' => 'square-small',
                'label' => esc_html__('Size', 'eltdf-core'),
                'parent' => $masonry_gallery_meta_box,
                'options' => array(
                    'square-small'			=> esc_html__('Square Small', 'eltdf-core'),
                    'square-big'			=> esc_html__('Square Big', 'eltdf-core'),
                    'rectangle-portrait'	=> esc_html__('Rectangle Portrait', 'eltdf-core'),
                    'rectangle-landscape'	=> esc_html__('Rectangle Landscape', 'eltdf-core')
                )
            )
        );

        mrseo_elated_add_meta_box_field(
            array(
                'name' => 'eltdf_masonry_gallery_item_type',
                'type' => 'select',
                'default_value' => 'standard',
                'label' => esc_html__('Type', 'eltdf-core'),
                'parent' => $masonry_gallery_meta_box,
                'options' => array(
                    'standard'		=> esc_html__('Standard', 'eltdf-core'),
                    'with-button'	=> esc_html__('With Button', 'eltdf-core'),
                    'simple'		=> esc_html__('Simple', 'eltdf-core')
                ),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        'with-button' => '#eltdf_masonry_gallery_item_simple_type_container',
                        'simple' => '#eltdf_masonry_gallery_item_button_type_container',
                        'standard' => '#eltdf_masonry_gallery_item_button_type_container, #eltdf_masonry_gallery_item_simple_type_container'
                    ),
                    'show' => array(
                        'with-button' => '#eltdf_masonry_gallery_item_button_type_container',
                        'simple' => '#eltdf_masonry_gallery_item_simple_type_container',
                        'standard' => ''
                    )
                )
            )
        );

        $masonry_gallery_item_button_type_container = mrseo_elated_add_admin_container_no_style(array(
            'name'				=> 'masonry_gallery_item_button_type_container',
            'parent'			=> $masonry_gallery_meta_box,
            'hidden_property'	=> 'eltdf_masonry_gallery_item_type',
            'hidden_values'		=> array('standard', 'simple')
        ));

        mrseo_elated_add_meta_box_field(
            array(
                'name' => 'eltdf_masonry_gallery_button_label',
                'type' => 'text',
                'label' => esc_html__('Button Label', 'eltdf-core'),
                'parent' => $masonry_gallery_item_button_type_container
            )
        );

        $masonry_gallery_item_simple_type_container = mrseo_elated_add_admin_container_no_style(array(
            'name'				=> 'masonry_gallery_item_simple_type_container',
            'parent'			=> $masonry_gallery_meta_box,
            'hidden_property'	=> 'eltdf_masonry_gallery_item_type',
            'hidden_values'		=> array('standard', 'with-button')
        ));

        mrseo_elated_add_meta_box_field(
            array(
                'name' => 'eltdf_masonry_gallery_simple_content_background_skin',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Content Background Skin', 'eltdf-core'),
                'parent' => $masonry_gallery_item_simple_type_container,
                'options' => array(
                    'default' => esc_html__('Default', 'eltdf-core'),
                    'light'	=> esc_html__('Light', 'eltdf-core'),
                    'dark'	=> esc_html__('Dark', 'eltdf-core')
                )
            )
        );
    }

    add_action('mrseo_elated_meta_boxes_map', 'eltdf_core_map_masonry_gallery_meta', 45);
}