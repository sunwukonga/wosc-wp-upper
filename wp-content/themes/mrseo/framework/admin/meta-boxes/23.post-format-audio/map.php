<?php

if ( ! function_exists( 'mrseo_elated_map_post_audio_meta' ) ) {
	function mrseo_elated_map_post_audio_meta() {
		$audio_post_format_meta_box = mrseo_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'mrseo' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'          => 'eltdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'mrseo' ),
				'description'   => esc_html__( 'Choose audio type', 'mrseo' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'mrseo' ),
					'self'            => esc_html__( 'Self Hosted', 'mrseo' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#eltdf_eltdf_audio_self_hosted_container',
						'self'            => '#eltdf_eltdf_audio_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#eltdf_eltdf_audio_embedded_container',
						'self'            => '#eltdf_eltdf_audio_self_hosted_container'
					)
				)
			)
		);
		
		$eltdf_audio_embedded_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'eltdf_audio_embedded_container',
				'hidden_property' => 'eltdf_audio_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$eltdf_audio_self_hosted_container = mrseo_elated_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'eltdf_audio_self_hosted_container',
				'hidden_property' => 'eltdf_audio_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'mrseo' ),
				'description' => esc_html__( 'Enter audio URL', 'mrseo' ),
				'parent'      => $eltdf_audio_embedded_container,
			)
		);
		
		mrseo_elated_add_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'mrseo' ),
				'description' => esc_html__( 'Enter audio link', 'mrseo' ),
				'parent'      => $eltdf_audio_self_hosted_container,
			)
		);
	}
	
	add_action( 'mrseo_elated_meta_boxes_map', 'mrseo_elated_map_post_audio_meta', 23 );
}