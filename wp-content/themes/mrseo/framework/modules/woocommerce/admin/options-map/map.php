<?php

if ( ! function_exists('mrseo_elated_woocommerce_options_map') ) {

	/**
	 * Add Woocommerce options page
	 */
	function mrseo_elated_woocommerce_options_map() {

		mrseo_elated_add_admin_page(
			array(
				'slug' => '_woocommerce_page',
				'title' => esc_html__('Woocommerce', 'mrseo'),
				'icon' => 'fa fa-shopping-cart'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = mrseo_elated_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_product_list',
				'title' => esc_html__('Product List', 'mrseo')
			)
		);

		mrseo_elated_add_admin_field(array(
			'name'        	=> 'eltdf_woo_product_list_columns',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product List Columns', 'mrseo'),
			'default_value'	=> 'eltdf-woocommerce-columns-3',
			'description' 	=> esc_html__('Choose number of columns for product listing and related products on single product', 'mrseo'),
			'options'		=> array(
				'eltdf-woocommerce-columns-3' => esc_html__('3 Columns', 'mrseo'),
				'eltdf-woocommerce-columns-4' => esc_html__('4 Columns', 'mrseo')
			),
			'parent'      	=> $panel_product_list,
		));
		
		mrseo_elated_add_admin_field(array(
			'name'        	=> 'eltdf_woo_product_list_columns_space',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Space Between Products', 'mrseo'),
			'default_value'	=> 'eltdf-woo-normal-space',
			'description' 	=> esc_html__('Select space between products for product listing and related products on single product', 'mrseo'),
			'options'		=> array(
				'eltdf-woo-normal-space' => esc_html__('Normal', 'mrseo'),
				'eltdf-woo-small-space'  => esc_html__('Small', 'mrseo'),
				'eltdf-woo-no-space'     => esc_html__('No Space', 'mrseo')
			),
			'parent'      	=> $panel_product_list,
		));
		
		mrseo_elated_add_admin_field(array(
			'name'        	=> 'eltdf_woo_product_list_info_position',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product Info Position', 'mrseo'),
			'default_value'	=> 'info_below_image',
			'description' 	=> esc_html__('Select product info position for product listing and related products on single product', 'mrseo'),
			'options'		=> array(
				'info_below_image'    => esc_html__('Info Below Image', 'mrseo'),
				'info_on_image_hover' => esc_html__('Info On Image Hover', 'mrseo')
			),
			'parent'      	=> $panel_product_list,
		));

		mrseo_elated_add_admin_field(array(
			'name'        	=> 'eltdf_woo_products_per_page',
			'type'        	=> 'text',
			'label'       	=> esc_html__('Number of products per page', 'mrseo'),
			'default_value'	=> '',
			'description' 	=> esc_html__('Set number of products on shop page', 'mrseo'),
			'parent'      	=> $panel_product_list,
			'args' 			=> array(
				'col_width' => 3
			)
		));

		mrseo_elated_add_admin_field(array(
			'name'        	=> 'eltdf_products_list_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Products Title Tag', 'mrseo'),
			'default_value'	=> 'h5',
			'description' 	=> '',
			'options'       => mrseo_elated_get_title_tag(),
			'parent'      	=> $panel_product_list,
		));

		/**
		 * Single Product Settings
		 */
		$panel_single_product = mrseo_elated_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_single_product',
				'title' => esc_html__('Single Product', 'mrseo')
			)
		);
		
			mrseo_elated_add_admin_field(array(
				'name'          => 'woo_enable_single_thumb_featured_switch',
				'type'          => 'yesno',
				'label'         => esc_html__('Switch Featured Image on Thumbnail Click', 'mrseo'),
				'description'   => esc_html__('Enabling this option will switch featured image with thumbnail image on thumbnail click', 'mrseo'),
				'default_value' => 'yes',
				'parent'        => $panel_single_product
			));
			
			mrseo_elated_add_admin_field(array(
				'name'          => 'woo_set_thumb_images_position',
				'type'          => 'select',
				'label'         => esc_html__('Set Thumbnail Images Position', 'mrseo'),
				'default_value' => 'below-image',
				'options'		=> array(
					'below-image'  => esc_html__('Below Featured Image', 'mrseo'),
					'on-left-side' => esc_html__('On The Left Side Of Featured Image', 'mrseo')
				),
				'parent'        => $panel_single_product
			));

			mrseo_elated_add_admin_field(array(
				'name'        	=> 'eltdf_single_product_title_tag',
				'type'        	=> 'select',
				'label'       	=> esc_html__('Single Product Title Tag', 'mrseo'),
				'default_value'	=> 'h3',
				'description' 	=> '',
				'options'       => mrseo_elated_get_title_tag(),
				'parent'      	=> $panel_single_product,
			));

            mrseo_elated_add_admin_field(
                array(
                    'type' => 'select',
                    'name' => 'show_title_area_woo',
                    'default_value' => '',
                    'label'       => esc_html__('Show Title Area', 'mrseo'),
                    'description' => esc_html__('Enabling this option will show title area on single post pages', 'mrseo'),
                    'parent'      => $panel_single_product,
                    'options'     => mrseo_elated_get_yes_no_select_array(),
                    'args' => array(
                        'col_width' => 3
                    )
                )
            );

		/**
		 * DropDown Cart Widget Settings
		 */
		$panel_dropdown_cart = mrseo_elated_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_dropdown_cart',
				'title' => esc_html__('Dropdown Cart Widget', 'mrseo')
			)
		);

			mrseo_elated_add_admin_field(array(
				'name'        	=> 'eltdf_woo_dropdown_cart_description',
				'type'        	=> 'text',
				'label'       	=> esc_html__('Cart Description', 'mrseo'),
				'default_value'	=> '',
				'description' 	=> esc_html__('Enter dropdown cart description', 'mrseo'),
				'parent'      	=> $panel_dropdown_cart
			));
	}

	add_action( 'mrseo_elated_options_map', 'mrseo_elated_woocommerce_options_map', 24);
}