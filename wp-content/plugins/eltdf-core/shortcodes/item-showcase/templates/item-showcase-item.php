<div class="eltdf-is-item <?php echo esc_attr($showcase_item_class); ?>">
	<div class="eltdf-is-content">
		<?php if (!empty($item_title)) { ?>
			<<?php echo esc_attr($item_title_tag); ?> class="eltdf-is-title" <?php echo mrseo_elated_get_inline_style($item_title_styles); ?>>
				<?php if (!empty($item_link)) { ?><a href="<?php echo esc_url($item_link); ?>" target="<?php echo esc_attr($item_target); ?>"><?php } ?>
				<?php echo esc_html($item_title); ?>
				<?php if (!empty($item_link)) { ?></a><?php } ?>
			</<?php echo esc_attr($item_title_tag); ?>>
		<?php } ?>
		<?php if (!empty($item_text)) { ?>
			<p class="eltdf-is-text" <?php echo mrseo_elated_get_inline_style($item_text_styles); ?>><?php echo esc_html($item_text); ?></p>
		<?php } ?>
	</div>
</div>