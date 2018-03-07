<?php

if ( ! function_exists('mrseo_elated_blog_options_map') ) {

	function mrseo_elated_blog_options_map() {

		mrseo_elated_add_admin_page(
			array(
				'slug' => '_blog_page',
				'title' => esc_html__('Blog', 'mrseo'),
				'icon' => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */
		$panel_blog_lists = mrseo_elated_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_lists',
				'title' => esc_html__('Blog Lists', 'mrseo')
			)
		);

		mrseo_elated_add_admin_field(array(
			'name'        => 'blog_list_type',
			'type'        => 'select',
			'label'       => esc_html__('Blog Layout for Archive Pages', 'mrseo'),
			'description' => esc_html__('Choose a default blog layout for archived blog post lists', 'mrseo'),
			'default_value' => 'standard',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'centered'			    => esc_html__('Blog: Centered', 'mrseo'),
				'masonry'               => esc_html__('Blog: Masonry', 'mrseo'),
				'masonry-gallery'       => esc_html__('Blog: Masonry Gallery', 'mrseo'),
                'narrow'                => esc_html__('Blog: Narrow', 'mrseo'),
                'split-column'          => esc_html__('Blog: Split Column', 'mrseo'),
                'standard'              => esc_html__('Blog: Standard', 'mrseo'),
                'standard-date-on-side' => esc_html__('Blog: Standard - Date on Side', 'mrseo'),
			)
		));

		mrseo_elated_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout for Archive Pages', 'mrseo'),
			'description' => esc_html__('Choose a sidebar layout for archived blog post lists', 'mrseo'),
			'default_value' => '',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				''		            => esc_html__('Default', 'mrseo'),
				'no-sidebar'		=> esc_html__('No Sidebar', 'mrseo'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'mrseo'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'mrseo'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'mrseo'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'mrseo')
			)
		));
		
		$mrseo_custom_sidebars = mrseo_elated_get_custom_sidebars();
		if(count($mrseo_custom_sidebars) > 0) {
			mrseo_elated_add_admin_field(array(
				'name' => 'archive_custom_sidebar_area',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display for Archive Pages', 'mrseo'),
				'description' => esc_html__('Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'mrseo'),
				'parent' => $panel_blog_lists,
				'options' => mrseo_elated_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			));
		}

        mrseo_elated_add_admin_field(array(
            'name'        => 'blog_masonry_layout',
            'type'        => 'select',
            'label'       => esc_html__('Masonry - Layout', 'mrseo'),
            'default_value' => 'in-grid',
            'description' => esc_html__('Set masonry layout. Default is in grid.', 'mrseo'),
            'parent'      => $panel_blog_lists,
            'options'     => array(
                'in-grid'    => esc_html__('In Grid', 'mrseo'),
                'full-width' => esc_html__('Full Width', 'mrseo')
            )
        ));
		
		mrseo_elated_add_admin_field(array(
			'name'        => 'blog_masonry_number_of_columns',
			'type'        => 'select',
			'label'       => esc_html__('Masonry - Number of Columns', 'mrseo'),
			'default_value' => 'four',
			'description' => esc_html__('Set number of columns for your masonry blog lists. Default value is 4 columns', 'mrseo'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'two'   => esc_html__('2 Columns', 'mrseo'),
				'three' => esc_html__('3 Columns', 'mrseo'),
				'four'  => esc_html__('4 Columns', 'mrseo'),
				'five'  => esc_html__('5 Columns', 'mrseo')
			)
		));
		
		mrseo_elated_add_admin_field(array(
			'name'        => 'blog_masonry_space_between_items',
			'type'        => 'select',
			'label'       => esc_html__('Masonry - Space Between Items', 'mrseo'),
			'default_value' => 'normal',
			'description' => esc_html__('Set space size between posts for your masonry blog lists. Default value is normal', 'mrseo'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'normal'  => esc_html__('Normal', 'mrseo'),
				'small'   => esc_html__('Small', 'mrseo'),
				'tiny'    => esc_html__('Tiny', 'mrseo'),
				'no'      => esc_html__('No Space', 'mrseo')
			)
		));

        mrseo_elated_add_admin_field(array(
            'name'        => 'blog_list_featured_image_proportion',
            'type'        => 'select',
            'label'       => esc_html__('Featured Image Proportion', 'mrseo'),
            'default_value' => 'fixed',
            'description' => esc_html__('Choose type of proportions you want to use for featured images on blog lists.', 'mrseo'),
            'parent'      => $panel_blog_lists,
            'options'     => array(
                'fixed'    => esc_html__('Fixed', 'mrseo'),
                'original' => esc_html__('Original', 'mrseo')
            )
        ));

		mrseo_elated_add_admin_field(array(
			'name'        => 'blog_pagination_type',
			'type'        => 'select',
			'label'       => esc_html__('Pagination Type', 'mrseo'),
			'description' => esc_html__('Choose a pagination layout for Blog Lists', 'mrseo'),
			'parent'      => $panel_blog_lists,
			'default_value' => 'standard',
			'options'     => array(
				'standard'		  => esc_html__('Standard', 'mrseo'),
				'load-more'		  => esc_html__('Load More', 'mrseo'),
				'infinite-scroll' => esc_html__('Infinite Scroll', 'mrseo'),
				'no-pagination'   => esc_html__('No Pagination', 'mrseo')
			)
		));
	
		mrseo_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'number_of_chars',
				'default_value' => '40',
				'label' => esc_html__('Number of Words in Excerpt', 'mrseo'),
				'description' => esc_html__('Enter a number of words in excerpt (article summary). Default value is 40', 'mrseo'),
				'parent' => $panel_blog_lists,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Single
		 */
		$panel_blog_single = mrseo_elated_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_single',
				'title' => esc_html__('Blog Single', 'mrseo')
			)
		);

        mrseo_elated_add_admin_field(array(
            'name'        => 'blog_single_type',
            'type'        => 'select',
            'label'       => esc_html__('Blog Layout for Single Post Pages', 'mrseo'),
            'description' => esc_html__('Choose a default blog layout for single post pages', 'mrseo'),
            'default_value' => 'standard',
            'parent'      => $panel_blog_single,
            'options'     => array(
                'standard'              => esc_html__('Standard', 'mrseo'),
                'title-area-empty'		=> esc_html__('Title Area Empty', 'mrseo'),
                'title-area-info' 		=> esc_html__('Title Area Info', 'mrseo')
            )
        ));

		mrseo_elated_add_admin_field(array(
			'name'        => 'blog_single_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout', 'mrseo'),
			'description' => esc_html__('Choose a sidebar layout for Blog Single pages', 'mrseo'),
			'default_value'	=> '',
			'parent'      => $panel_blog_single,
			'options'     => array(
				''		            => esc_html__('Default', 'mrseo'),
				'no-sidebar'		=> esc_html__('No Sidebar', 'mrseo'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'mrseo'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'mrseo'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'mrseo'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'mrseo')
			)
		));

		if(count($mrseo_custom_sidebars) > 0) {
			mrseo_elated_add_admin_field(array(
				'name' => 'blog_single_custom_sidebar_area',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'mrseo'),
				'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'mrseo'),
				'parent' => $panel_blog_single,
				'options' => mrseo_elated_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			));
		}
		
		mrseo_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'show_title_area_blog',
				'default_value' => '',
				'label'       => esc_html__('Show Title Area', 'mrseo'),
				'description' => esc_html__('Enabling this option will show title area on single post pages', 'mrseo'),
				'parent'      => $panel_blog_single,
				'options'     => mrseo_elated_get_yes_no_select_array(),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		
		mrseo_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'full_height_title_area_blog',
				'default_value' => 'no',
				'label'       => esc_html__('Full Height Title', 'mrseo'),
				'description' => esc_html__('Enabling this option will show standard title area in full height on single post pages', 'mrseo'),
				'parent'      => $panel_blog_single,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		mrseo_elated_add_admin_field(array(
			'name'          => 'blog_single_title_in_title_area',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Post Title in Title Area', 'mrseo'),
			'description'   => esc_html__('Enabling this option will show post title in title area on single post pages', 'mrseo'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		mrseo_elated_add_admin_field(array(
			'name'			=> 'blog_single_related_posts',
			'type'			=> 'yesno',
			'label'			=> esc_html__('Show Related Posts', 'mrseo'),
			'description'   => esc_html__('Enabling this option will show related posts on single post pages', 'mrseo'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		mrseo_elated_add_admin_field(array(
			'name'          => 'blog_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments Form', 'mrseo'),
			'description'   => esc_html__('Enabling this option will show comments form on single post pages', 'mrseo'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		mrseo_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_navigation',
				'default_value' => 'yes',
				'label' => esc_html__('Enable Prev/Next Single Post Navigation Links', 'mrseo'),
				'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)', 'mrseo'),
				'parent' => $panel_blog_single,
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_eltdf_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = mrseo_elated_add_admin_container(
			array(
				'name' => 'eltdf_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'       => esc_html__('Enable Navigation Only in Current Category', 'mrseo'),
				'description' => esc_html__('Limit your navigation only through current category', 'mrseo'),
				'parent'      => $blog_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_author_info',
				'default_value' => 'yes',
				'label' => esc_html__('Show Author Info Box', 'mrseo'),
				'description' => esc_html__('Enabling this option will display author name and descriptions on single post pages', 'mrseo'),
				'parent' => $panel_blog_single,
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_eltdf_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = mrseo_elated_add_admin_container(
			array(
				'name' => 'eltdf_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_author_info_email',
				'default_value' => 'no',
				'label'       => esc_html__('Show Author Email', 'mrseo'),
				'description' => esc_html__('Enabling this option will show author email', 'mrseo'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		mrseo_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'       => esc_html__('Show Author Social Icons', 'mrseo'),
				'description' => esc_html__('Enabling this option will show author social icons on single post pages', 'mrseo'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);
	}

	add_action( 'mrseo_elated_options_map', 'mrseo_elated_blog_options_map', 18);
}