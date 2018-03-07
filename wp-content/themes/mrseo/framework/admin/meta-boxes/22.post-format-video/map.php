<?php

if ( ! function_exists( 'mrseo_elated_map_post_video_meta' ) ) {
	function mrseo_elated_map_post_video_meta() {
		$video_post_format_meta_box = mrseo_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'mrseo' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'mrseo' ),
				'description'   => esc_html__( 'Choose video type', 'mrseo' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'mrseo' ),
					'self'            => esc_html__( 'Self Hosted', 'mrseo' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#eltdf_eltdf_video_self_hosted_container',
						'self'            => '#eltdf_eltdf_video_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#eltdf_eltdf_video_embedded_container',
						'self'            => '#eltdf_eltdf_video_self_hosted_container'
					)
				)
			)
		);
		
		$eltdf_video_embedded_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'eltdf_video_embedded_container',
				'hidden_property' => 'eltdf_video_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$eltdf_video_self_hosted_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'eltdf_video_self_hosted_container',
				'hidden_property' => 'eltdf_video_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'mrseo' ),
				'description' => esc_html__( 'Enter Video URL', 'mrseo' ),
				'parent'      => $eltdf_video_embedded_container,
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'mrseo' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'mrseo' ),
				'parent'      => $eltdf_video_self_hosted_container,
			)
		);
	}
	
	add_action( 'mrseo_elated_meta_boxes_map', 'mrseo_elated_map_post_video_meta', 22 );
}