<?php

if(!function_exists('eltdf_core_team_meta_box_functions')) {
	function eltdf_core_team_meta_box_functions($post_types) {
		$post_types[] = 'team-member';
		
		return $post_types;
	}
	
	add_filter('mrseo_elated_meta_box_post_types_save', 'eltdf_core_team_meta_box_functions');
	add_filter('mrseo_elated_meta_box_post_types_remove', 'eltdf_core_team_meta_box_functions');
}

if(!function_exists('eltdf_core_team_scope_meta_box_functions')) {
	function eltdf_core_team_scope_meta_box_functions($post_types) {
		$post_types[] = 'team-member';
		
		return $post_types;
	}
	
	add_filter('mrseo_elated_set_scope_for_meta_boxes', 'eltdf_core_team_scope_meta_box_functions');
}

if(!function_exists('eltdf_core_team_enqueue_meta_box_styles')) {
	function eltdf_core_team_enqueue_meta_box_styles() {
		global $post;
		
		if($post->post_type == 'team-member'){
			wp_enqueue_style('eltdf-jquery-ui', get_template_directory_uri().'/framework/admin/assets/css/jquery-ui/jquery-ui.css');
		}
	}
	
	add_action('mrseo_elated_enqueue_meta_box_styles', 'eltdf_core_team_enqueue_meta_box_styles');
}

if(!function_exists('eltdf_core_register_team_cpt')) {
	function eltdf_core_register_team_cpt($cpt_class_name) {
		$cpt_class = array(
			'ElatedCore\CPT\Team\TeamRegister'
		);
		
		$cpt_class_name = array_merge($cpt_class_name, $cpt_class);
		
		return $cpt_class_name;
	}
	
	add_filter('eltdf_core_filter_register_custom_post_types', 'eltdf_core_register_team_cpt');
}

if(!function_exists('eltdf_core_get_single_team')) {
	/**
	 * Loads holder template for doctor single
	 */
	function eltdf_core_get_single_team() {
		$team_member_id = get_the_ID();
		
		$params = array(
			'sidebar_layout' => mrseo_elated_sidebar_layout(),
			'position'       => get_post_meta($team_member_id, 'eltdf_team_member_position', true),
			'birth_date'     => get_post_meta($team_member_id, 'eltdf_team_member_birth_date', true),
			'email'          => get_post_meta($team_member_id, 'eltdf_team_member_email', true),
			'phone'          => get_post_meta($team_member_id, 'eltdf_team_member_phone', true),
			'address'        => get_post_meta($team_member_id, 'eltdf_team_member_address', true),
			'education'      => get_post_meta($team_member_id, 'eltdf_team_member_education', true),
			'resume'         => get_post_meta($team_member_id, 'eltdf_team_member_resume', true),
			'social_icons'   => eltdf_core_single_team_social_icons($team_member_id),
		);
		
		eltdf_core_get_cpt_single_module_template_part('templates/single/holder', 'team', '', $params);
	}
}

if(!function_exists('eltdf_core_single_team_social_icons')) {
	function eltdf_core_single_team_social_icons($id){
		$social_icons = array();
		
		for ($i = 1; $i < 6; $i++) {
			$team_icon_pack = get_post_meta($id, 'eltdf_team_member_social_icon_pack_' . $i, true);
			if($team_icon_pack !== '') {
				$team_icon_collection = mrseo_elated_icon_collections()->getIconCollection(get_post_meta($id, 'eltdf_team_member_social_icon_pack_' . $i, true));
				$team_social_icon     = get_post_meta($id, 'eltdf_team_member_social_icon_pack_' . $i . '_' . $team_icon_collection->param, true);
				$team_social_link     = get_post_meta($id, 'eltdf_team_member_social_icon_' . $i . '_link', true);
				$team_social_target   = get_post_meta($id, 'eltdf_team_member_social_icon_' . $i . '_target', true);
				
				if ($team_social_icon !== '') {
					$team_icon_params = array();
					$team_icon_params['icon_pack']                  = $team_icon_pack;
					$team_icon_params[$team_icon_collection->param] = $team_social_icon;
					$team_icon_params['link']                       = !empty($team_social_link) ? $team_social_link : '';
					$team_icon_params['target']                     = !empty($team_social_target) ? $team_social_target : '_self';
					
					$social_icons[] = mrseo_elated_execute_shortcode('eltdf_icon', $team_icon_params);
				}
			}
		}
		
		return $social_icons;
	}
}

if(!function_exists('eltdf_core_get_team_category_list')) {
	function eltdf_core_get_team_category_list($category = '') {
		$number_of_columns = 3;
		
		$params = array(
			'number_of_columns'   => $number_of_columns
		);
		
		if(!empty($category)) {
			$params['category'] = $category;
		}
		
		$html = mrseo_elated_execute_shortcode('eltdf_team_list', $params);
		
		print $html;
	}
}

if(!function_exists('eltdf_core_team_list_info_opening')) {
    function eltdf_core_team_list_info_opening() {

        $data = array();

        if(isset($_POST) && isset($_POST['member_id']) ) {

            $member_id = $_POST['member_id'];

            if(!empty($member_id)) {

                $data['member_id'] = $member_id;
                $data['title'] = get_the_title($member_id);
                $data['position'] = get_post_meta($member_id, 'eltdf_team_member_position', true);
                $data['email'] = get_post_meta($member_id, 'eltdf_team_member_email', true);
                $data['content'] = get_post($member_id)->post_content;
                $data['team_main_bckg_color'] = 'background-color: '.get_post_meta($member_id, 'eltdf_team_member_background_color_meta', true);

				$social_icons = array();

				for($i = 1; $i < 6; $i++) {
					$team_icon_pack = get_post_meta($member_id, 'eltdf_team_member_social_icon_pack_'.$i, true);
					if($team_icon_pack) {
						$team_icon_collection = mrseo_elated_icon_collections()->getIconCollection(get_post_meta($member_id, 'eltdf_team_member_social_icon_pack_' . $i, true));
						$team_social_icon = get_post_meta($member_id, 'eltdf_team_member_social_icon_pack_' . $i . '_' . $team_icon_collection->param, true);
						$team_social_link = get_post_meta($member_id, 'eltdf_team_member_social_icon_' . $i . '_link', true);
						$team_social_target = get_post_meta($member_id, 'eltdf_team_member_social_icon_' . $i . '_target', true);

						if ($team_social_icon !== '') {

							$team_icon_params = array();
							$team_icon_params['icon_pack'] = $team_icon_pack;
							$team_icon_params[$team_icon_collection->param] = $team_social_icon;
							$team_icon_params['link'] = ($team_social_link !== '') ? $team_social_link : '';
							$team_icon_params['target'] = ($team_social_target !== '') ? $team_social_target : '';

							$social_icons[] = mrseo_elated_execute_shortcode('eltdf_icon', $team_icon_params);
						}
					}
				}

				$data['team_social_icons'] = $social_icons;

                $html = eltdf_core_get_cpt_shortcode_module_template_part('team', 'team-popup', '', $data);
            }


        }
        else {

            $status = 'error';
        }

        // var_dump($html); exit;

        $response = array (
            'html' => $html
        );

        $output = json_encode($response);

        exit($output);

        wp_die();
    }

    add_action( 'wp_ajax_nopriv_eltdf_core_team_list_info_opening', 'eltdf_core_team_list_info_opening' );
    add_action( 'wp_ajax_eltdf_core_team_list_info_opening', 'eltdf_core_team_list_info_opening' );
}




if(!function_exists('eltdf_core_team_list_render_box_html')){



    function eltdf_core_team_list_render_box_html(){
        $html='';

        $html .= '<div class="eltdf-team-modal-bcg"></div><div class="eltdf-team-modal-holder"></div>';
        print $html;

    }

    add_action( 'mrseo_elated_after_header_area', 'eltdf_core_team_list_render_box_html', 20);

}