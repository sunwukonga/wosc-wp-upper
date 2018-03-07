<div class="eltdf-price-table">
	<div class="eltdf-pt-inner <?php echo esc_attr($holder_classes);?>" <?php echo mrseo_elated_get_inline_style($holder_styles); ?>>
		<ul>
			<li class="eltdf-pt-prices">
				<sup class="eltdf-pt-value" <?php echo mrseo_elated_get_inline_style($currency_styles); ?>><?php echo esc_html($currency); ?></sup>
				<span class="eltdf-pt-price" <?php echo mrseo_elated_get_inline_style($price_styles); ?>><?php echo esc_html($price); ?></span>
				<h6 class="eltdf-pt-mark" <?php echo mrseo_elated_get_inline_style($price_period_styles); ?>><?php echo esc_html($price_period); ?></h6>
			</li>
			<li class="eltdf-pt-title-holder">
				<h4 class="eltdf-pt-title" <?php echo mrseo_elated_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></h4>
                <?php echo mrseo_elated_execute_shortcode('eltdf_separator',$separator_params); ?>
			</li>
			<li class="eltdf-pt-content">
				<?php echo do_shortcode($content); ?>
			</li>
			<?php 
			if(!empty($button_text)) { ?>
				<li class="eltdf-pt-button">
					<?php echo mrseo_elated_get_button_html($button_params); ?>
				</li>				
			<?php } ?>
		</ul>
	</div>
</div>