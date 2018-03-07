<div class="eltdf-blog-list-holder <?php echo esc_attr($holder_classes); ?>" <?php echo wp_kses($holder_data, array('data')); ?>>
	<div class="eltdf-bl-wrapper">
		<ul class="eltdf-blog-list">
			<?php
				if($query_result->have_posts()):
					while ($query_result->have_posts()) : $query_result->the_post();
						mrseo_elated_get_module_template_part('shortcodes/blog-list/layout-collections/'.$type, 'blog', '', $params);
					endwhile;
				else:
					mrseo_elated_get_module_template_part('templates/parts/no-posts', 'blog', '', $params);
				endif;
			
				wp_reset_postdata();
			?>
		</ul>
	</div>
	<?php mrseo_elated_get_module_template_part('templates/parts/pagination/'.$params['pagination_type'], 'blog', '', $params); ?>
</div>