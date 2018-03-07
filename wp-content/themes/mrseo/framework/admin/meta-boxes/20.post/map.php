<?php

/*** Post Settings ***/

if ( ! function_exists( 'mrseo_elated_map_post_meta' ) ) {
	function mrseo_elated_map_post_meta() {
		
		$post_meta_box = mrseo_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'mrseo' ),
				'name'  => 'post-meta'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_single_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Single Post Pages', 'mrseo' ),
				'description'   => esc_html__( 'Choose a default blog layout for single post pages', 'mrseo' ),
				'default_value' => 'standard',
				'parent'        => $post_meta_box,
				'options'       => array(
					''                 => esc_html__( 'Default', 'mrseo' ),
					'standard'         => esc_html__( 'Standard', 'mrseo' ),
					'title-area-empty' => esc_html__( 'Title Area Empty', 'mrseo' ),
					'title-area-info'  => esc_html__( 'Title Area Info', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'mrseo' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'mrseo' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
				'options'       => array(
					''                 => esc_html__( 'Default', 'mrseo' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'mrseo' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'mrseo' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'mrseo' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'mrseo' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'mrseo' )
				)
			)
		);
		
		$mrseo_custom_sidebars = mrseo_elated_get_custom_sidebars();
		if ( count( $mrseo_custom_sidebars ) > 0 ) {
			mrseo_elated_add_meta_box_field( array(
				'name'        => 'eltdf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'mrseo' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'mrseo' ),
				'parent'      => $post_meta_box,
				'options'     => mrseo_elated_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'mrseo' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'mrseo' ),
				'parent'      => $post_meta_box
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'mrseo' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'mrseo' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'mrseo' ),
					'large-width'        => esc_html__( 'Large Width', 'mrseo' ),
					'large-height'       => esc_html__( 'Large Height', 'mrseo' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'mrseo' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'mrseo' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'mrseo' ),
					'large-width' => esc_html__( 'Large Width', 'mrseo' )
				)
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'mrseo' ),
				'parent'        => $post_meta_box,
				'options'       => mrseo_elated_get_yes_no_select_array()
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_full_height_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Full Height Title', 'mrseo' ),
				'description'   => esc_html__( 'Enabling this option will show title area in full height on your single post page standard title', 'mrseo' ),
				'parent'        => $post_meta_box,
				'options'       => mrseo_elated_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'mrseo_elated_meta_boxes_map', 'mrseo_elated_map_post_meta', 20 );
}
