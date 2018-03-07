<div class="eltdf-team-list-holder <?php echo esc_attr($holder_classes); ?>">
	<div class="eltdf-tl-inner <?php echo esc_attr($inner_classes); ?>" <?php echo mrseo_elated_get_inline_attrs($data_attrs); ?>>
		<?php
			if($query_results->have_posts()):
				while ( $query_results->have_posts() ) : $query_results->the_post();
					$params['member_id'] = get_the_ID();
					$params['image'] = get_the_post_thumbnail($params['member_id']);
					$params['title'] = get_the_title($params['member_id']);
					$params['position'] = get_post_meta($params['member_id'], 'eltdf_team_member_position', true);
					$params['birth_date'] = get_post_meta($params['member_id'], 'eltdf_team_member_birth_date', true);
					$params['email'] = get_post_meta($params['member_id'], 'eltdf_team_member_email', true);
					$params['phone'] = get_post_meta($params['member_id'], 'eltdf_team_member_phone', true);
					$params['address'] = get_post_meta($params['member_id'], 'eltdf_team_member_address', true);
					$params['social'] = get_post_meta($params['member_id'], 'eltdf_team_member_social', true);
					$params['resume'] = get_post_meta($params['member_id'], 'eltdf_team_member_resume', true);
					$params['excerpt'] = get_the_excerpt($params['member_id']);
					$params['team_social_icons'] = $this_object->getTeamSocialIcons($params['member_id']);
					$params['background_style'] = (get_post_meta($params['member_id'], 'eltdf_team_member_background_color_meta', true) !== '') ? 'background-color: '.get_post_meta($params['member_id'], 'eltdf_team_member_background_color_meta', true) : '';
					echo eltdf_core_get_cpt_shortcode_module_template_part('team', 'team-template', $team_member_layout, $params);
				endwhile;
			else:
				echo esc_html_e( 'Sorry, no posts matched your criteria.', 'eltdf-core' );
			endif;
		
			wp_reset_postdata();
		?>
	</div>
</div>