<div class="eltdf-pl-holder <?php echo esc_attr($holder_classes) ?>">
	<div class="eltdf-pl-outer">
		<div class="eltdf-pl-sizer"></div>
		<div class="eltdf-pl-gutter"></div>
		<?php if($query_result->have_posts()): while ($query_result->have_posts()) : $query_result->the_post();
			echo mrseo_elated_get_woo_shortcode_module_template_part('templates/parts/'.$params['info_position'], 'product-list', '', $params);
		endwhile; else:
			mrseo_elated_get_module_template_part('templates/parts/no-posts', 'woocommerce', '', $params);
		endif;
			wp_reset_postdata();
		?>
	</div>
</div>