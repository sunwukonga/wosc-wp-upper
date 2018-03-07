<?php

if(!function_exists('eltdf_core_map_team_single_meta')) {
    function eltdf_core_map_team_single_meta() {

        $meta_box = mrseo_elated_add_meta_box(array(
            'scope' => 'team-member',
            'title' => esc_html__('Team Member Info', 'eltdf-core'),
            'name'  => 'team_meta'
        ));

        mrseo_elated_add_meta_box_field(array(
            'name'        => 'eltdf_team_member_position',
            'type'        => 'text',
            'label'       => esc_html__('Position', 'eltdf-core'),
            'description' => esc_html__('The members\'s role within the team', 'eltdf-core'),
            'parent'      => $meta_box
        ));

        mrseo_elated_add_meta_box_field(array(
            'name'        => 'eltdf_team_member_birth_date',
            'type'        => 'date',
            'label'       => esc_html__('Birth date', 'eltdf-core'),
            'description' => esc_html__('The members\'s birth date', 'eltdf-core'),
            'parent'      => $meta_box
        ));

        mrseo_elated_add_meta_box_field(array(
            'name'        => 'eltdf_team_member_email',
            'type'        => 'text',
            'label'       => esc_html__('Email', 'eltdf-core'),
            'description' => esc_html__('The members\'s email', 'eltdf-core'),
            'parent'      => $meta_box
        ));

        mrseo_elated_add_meta_box_field(array(
            'name'        => 'eltdf_team_member_phone',
            'type'        => 'text',
            'label'       => esc_html__('Phone', 'eltdf-core'),
            'description' => esc_html__('The members\'s phone', 'eltdf-core'),
            'parent'      => $meta_box
        ));

        mrseo_elated_add_meta_box_field(array(
            'name'        => 'eltdf_team_member_address',
            'type'        => 'text',
            'label'       => esc_html__('Address', 'eltdf-core'),
            'description' => esc_html__('The members\'s addres', 'eltdf-core'),
            'parent'      => $meta_box
        ));

        mrseo_elated_add_meta_box_field(array(
            'name'        => 'eltdf_team_member_education',
            'type'        => 'text',
            'label'       => esc_html__('Education', 'eltdf-core'),
            'description' => esc_html__('The members\'s education', 'eltdf-core'),
            'parent'      => $meta_box
        ));

        mrseo_elated_add_meta_box_field(array(
            'name'        => 'eltdf_team_member_resume',
            'type'        => 'file',
            'label'       => esc_html__('Resume', 'eltdf-core'),
            'description' => esc_html__('Upload members\'s resume', 'eltdf-core'),
            'parent'      => $meta_box
        ));

        for($x = 1; $x < 6; $x++) {

            $social_icon_group = mrseo_elated_add_admin_group(array(
                'name'   => 'eltdf_team_member_social_icon_group'.$x,
                'title'  => esc_html__('Social Link ', 'eltdf-core').$x,
                'parent' => $meta_box
            ));

                $social_row1 = mrseo_elated_add_admin_row(array(
                    'name'   => 'eltdf_team_member_social_icon_row1'.$x,
                    'parent' => $social_icon_group
                ));

                    MrSeoElatedIconCollections::get_instance()->getSocialIconsMetaBoxOrOption(array(
                        'label' => esc_html__('Icon ', 'eltdf-core').$x,
                        'parent' => $social_row1,
                        'name' => 'eltdf_team_member_social_icon_pack_'.$x,
                        'defaul_icon_pack' => '',
                        'type' => 'meta-box',
                        'field_type' => 'simple'
                    ));

                $social_row2 = mrseo_elated_add_admin_row(array(
                    'name'   => 'eltdf_team_member_social_icon_row2'.$x,
                    'parent' => $social_icon_group
                ));

                    mrseo_elated_add_meta_box_field(array(
                        'type'            => 'textsimple',
                        'label'           => esc_html__('Link', 'eltdf-core'),
                        'name'            => 'eltdf_team_member_social_icon_'.$x.'_link',
                        'hidden_property' => 'eltdf_team_member_social_icon_pack_'.$x,
                        'hidden_value'    => '',
                        'parent'          => $social_row2
                    ));
	
			        mrseo_elated_add_meta_box_field(array(
				        'type'          => 'selectsimple',
				        'label'         => esc_html__('Target', 'eltdf-core'),
				        'name'          => 'eltdf_team_member_social_icon_'.$x.'_target',
				        'options'       => mrseo_elated_get_link_target_array(),
				        'hidden_property' => 'eltdf_team_member_social_icon_'.$x.'_link',
				        'hidden_value'    => '',
				        'parent'          => $social_row2
			        ));
        }

        $hover_meta_box = mrseo_elated_add_meta_box(array(
            'scope' => 'team-member',
            'title' => esc_html__('Team Member Hover', 'eltdf-core'),
            'name'  => 'team_hover_meta'
        ));


	    mrseo_elated_add_meta_box_field(
		    array(
			    'name' => 'eltdf_team_member_background_color_meta',
			    'type' => 'color',
			    'label' => esc_html__('Hover Background Color', 'eltdf-core'),
			    'description' => esc_html__('Choose a background hover color for this item on team list - info on hover', 'eltdf-core'),
			    'parent' => $hover_meta_box
		    )
	    );
    }

    add_action('mrseo_elated_meta_boxes_map', 'eltdf_core_map_team_single_meta', 46);
}