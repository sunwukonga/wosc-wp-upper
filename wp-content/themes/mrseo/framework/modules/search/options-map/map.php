<?php

if ( ! function_exists('mrseo_elated_search_options_map') ) {

	function mrseo_elated_search_options_map() {

		mrseo_elated_add_admin_page(
			array(
				'slug' => '_search_page',
				'title' => esc_html__('Search', 'mrseo'),
				'icon' => 'fa fa-search'
			)
		);

		$search_page_panel = mrseo_elated_add_admin_panel(
			array(
				'title' => esc_html__('Search Page', 'mrseo'),
				'name' => 'search_template',
				'page' => '_search_page'
			)
		);

		mrseo_elated_add_admin_field(array(
			'name'        => 'search_page_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout', 'mrseo'),
            'description' 	=> esc_html__("Choose a sidebar layout for search page", 'mrseo'),
            'default_value' => 'no-sidebar',
            'options'       => array(
                'no-sidebar'        => esc_html__('No Sidebar', 'mrseo'),
                'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'mrseo'),
                'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'mrseo'),
                'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'mrseo'),
                'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'mrseo')
            ),
			'parent'      => $search_page_panel
		));

        $mrseo_custom_sidebars = mrseo_elated_get_custom_sidebars();
        if(count($mrseo_custom_sidebars) > 0) {
            mrseo_elated_add_admin_field(array(
                'name' => 'search_custom_sidebar_area',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'mrseo'),
                'description' => esc_html__('Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'mrseo'),
                'parent' => $search_page_panel,
                'options' => $mrseo_custom_sidebars,
				'args' => array(
					'select2' => true
				)
            ));
        }

		$search_panel = mrseo_elated_add_admin_panel(
			array(
				'title' => esc_html__('Search', 'mrseo'),
				'name' => 'search',
				'page' => '_search_page'
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_type',
				'default_value'	=> 'fullscreen',
				'label' 		=> esc_html__('Select Search Type', 'mrseo'),
				'description' 	=> esc_html__("Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with Vertical Header)", 'mrseo'),
				'options' 		=> array(
					'fullscreen' => esc_html__('Fullscreen Search', 'mrseo'),
					'slide-from-header-bottom' => esc_html__('Slide From Header Bottom', 'mrseo'),
                    'covers-header' => esc_html__('Search Covers Header', 'mrseo'),
                    'slide-from-window-top' => esc_html__('Slide from Window Top' , 'mrseo')
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_icon_pack',
				'default_value'	=> 'font_elegant',
				'label'			=> esc_html__('Search Icon Pack', 'mrseo'),
				'description'	=> esc_html__('Choose icon pack for search icon', 'mrseo'),
				'options'		=> mrseo_elated_icon_collections()->getIconCollectionsExclude(array('linea_icons'))
			)
		);

        mrseo_elated_add_admin_field(
            array(
                'parent'		=> $search_panel,
                'type'			=> 'yesno',
                'name'			=> 'search_in_grid',
                'default_value'	=> 'yes',
                'label'			=> esc_html__('Enable Grid Layout', 'mrseo'),
                'description'	=> esc_html__('Set search area to be in grid. (Applied for Search covers header and Slide from Window Top types.', 'mrseo'),
            )
        );
		
		mrseo_elated_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'initial_header_icon_title',
				'title'		=> esc_html__('Initial Search Icon in Header', 'mrseo')
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'text',
				'name'			=> 'header_search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size', 'mrseo'),
				'description'	=> esc_html__('Set size for icon', 'mrseo'),
				'args'			=> array(
					'col_width' => 3,
					'suffix'	=> 'px'
				)
			)
		);
		
		$search_icon_color_group = mrseo_elated_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Colors', 'mrseo'),
				'description' => esc_html__('Define color style for icon', 'mrseo'),
				'name'		=> 'search_icon_color_group'
			)
		);
		
		$search_icon_color_row = mrseo_elated_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'	=> $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_color',
				'label'		=> esc_html__('Color', 'mrseo')
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_hover_color',
				'label'		=> esc_html__('Hover Color', 'mrseo')
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'enable_search_icon_text',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Enable Search Icon Text', 'mrseo'),
				'description'	=> esc_html__("Enable this option to show 'Search' text next to search icon in header", 'mrseo'),
				'args'			=> array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_enable_search_icon_text_container'
				)
			)
		);
		
		$enable_search_icon_text_container = mrseo_elated_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'enable_search_icon_text_container',
				'hidden_property'	=> 'enable_search_icon_text',
				'hidden_value'		=> 'no'
			)
		);
		
		$enable_search_icon_text_group = mrseo_elated_add_admin_group(
			array(
				'parent'	=> $enable_search_icon_text_container,
				'title'		=> esc_html__('Search Icon Text', 'mrseo'),
				'name'		=> 'enable_search_icon_text_group',
				'description'	=> esc_html__('Define style for search icon text', 'mrseo')
			)
		);
		
		$enable_search_icon_text_row = mrseo_elated_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row'
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color',
				'label'			=> esc_html__('Text Color', 'mrseo')
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color_hover',
				'label'			=> esc_html__('Text Hover Color', 'mrseo')
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_font_size',
				'label'			=> esc_html__('Font Size', 'mrseo'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_line_height',
				'label'			=> esc_html__('Line Height', 'mrseo'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
		
		$enable_search_icon_text_row2 = mrseo_elated_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row2',
				'next'		=> true
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_text_transform',
				'label'			=> esc_html__('Text Transform', 'mrseo'),
				'default_value'	=> '',
				'options'		=> mrseo_elated_get_text_transform_array()
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_icon_text_google_fonts',
				'label'			=> esc_html__('Font Family', 'mrseo'),
				'default_value'	=> '-1',
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_font_style',
				'label'			=> esc_html__('Font Style', 'mrseo'),
				'default_value'	=> '',
				'options'		=> mrseo_elated_get_font_style_array(),
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_font_weight',
				'label'			=> esc_html__('Font Weight', 'mrseo'),
				'default_value'	=> '',
				'options'		=> mrseo_elated_get_font_weight_array(),
			)
		);
		
		$enable_search_icon_text_row3 = mrseo_elated_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row3',
				'next'		=> true
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row3,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_letter_spacing',
				'label'			=> esc_html__('Letter Spacing', 'mrseo'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);
	}

	add_action('mrseo_elated_options_map', 'mrseo_elated_search_options_map', 12);
}