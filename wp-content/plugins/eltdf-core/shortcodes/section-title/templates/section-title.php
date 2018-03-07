<div class="eltdf-section-title-holder" <?php echo mrseo_elated_get_inline_style($holder_styles); ?>>
	<?php if(!empty($subtitle)) { ?>
		<h4 class="eltdf-section-subtitle" <?php echo mrseo_elated_get_inline_style($subtitle_styles); ?>><span><?php echo esc_html($subtitle);?></span></h4>
	<?php } ?>

	<?php if(!empty($title)) { ?>
		<<?php echo esc_attr($title_tag); ?> class="eltdf-st-title" <?php echo mrseo_elated_get_inline_style($title_styles); ?>>
			<span><?php echo wp_kses_post($title_italicized);?></span>
		</<?php echo esc_attr($title_tag); ?>>
	<?php } ?>
	<span class="eltdf-title-separator <?php  echo esc_attr($separator_class); ?>" <?php mrseo_elated_inline_style($separator_styles); ?>></span>
	<?php if(!empty($text)) { ?>
		<p class="eltdf-st-text" <?php echo mrseo_elated_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
	<?php } ?>
</div>