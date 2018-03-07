<?php

if ( ! function_exists( 'mrseo_elated_map_blog_meta' ) ) {
	function mrseo_elated_map_blog_meta() {
		$eltdf_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$eltdf_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = mrseo_elated_add_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'mrseo' ),
				'name'  => 'blog_meta'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'mrseo' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'mrseo' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltdf_blog_categories
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'mrseo' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'mrseo' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltdf_blog_categories,
				'args'        => array( "col_width" => 3 )
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'mrseo' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'mrseo' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'mrseo' ),
					'in-grid'    => esc_html__( 'In Grid', 'mrseo' ),
					'full-width' => esc_html__( 'Full Width', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'mrseo' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'mrseo' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'mrseo' ),
					'two'   => esc_html__( '2 Columns', 'mrseo' ),
					'three' => esc_html__( '3 Columns', 'mrseo' ),
					'four'  => esc_html__( '4 Columns', 'mrseo' ),
					'five'  => esc_html__( '5 Columns', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'mrseo' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'mrseo' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''       => esc_html__( 'Default', 'mrseo' ),
					'normal' => esc_html__( 'Normal', 'mrseo' ),
					'small'  => esc_html__( 'Small', 'mrseo' ),
					'tiny'   => esc_html__( 'Tiny', 'mrseo' ),
					'no'     => esc_html__( 'No Space', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Featured Image Proportion', 'mrseo' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on blog lists.', 'mrseo' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'mrseo' ),
					'fixed'    => esc_html__( 'Fixed', 'mrseo' ),
					'original' => esc_html__( 'Original', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'mrseo' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'mrseo' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'mrseo' ),
					'standard'        => esc_html__( 'Standard', 'mrseo' ),
					'load-more'       => esc_html__( 'Load More', 'mrseo' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'mrseo' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'eltdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'mrseo' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'mrseo' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'mrseo_elated_meta_boxes_map', 'mrseo_elated_map_blog_meta', 30 );
}