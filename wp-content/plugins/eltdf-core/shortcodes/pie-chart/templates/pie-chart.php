<div class="eltdf-pie-chart-holder">
	<div class="eltdf-pc-percentage" <?php echo mrseo_elated_get_inline_attrs($pie_chart_data); ?>>
		<span class="eltdf-pc-percent" <?php echo mrseo_elated_get_inline_style($percent_styles); ?>><?php echo esc_html($percent); ?></span>
	</div>
	<?php if(!empty($title) || !empty($text)) { ?>
		<div class="eltdf-pc-text-holder">
			<?php if(!empty($title)) { ?>
				<<?php echo esc_attr($title_tag); ?> class="eltdf-pc-title" <?php echo mrseo_elated_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
			<?php } ?>
			<?php if(!empty($text)) { ?>
				<p class="eltdf-pc-text" <?php echo mrseo_elated_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
			<?php } ?>
		</div>
	<?php } ?>
</div>