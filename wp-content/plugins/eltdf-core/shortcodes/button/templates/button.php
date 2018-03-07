<button type="submit" <?php mrseo_elated_inline_style($button_styles); ?> <?php mrseo_elated_class_attribute($button_classes); ?> <?php echo mrseo_elated_get_inline_attrs($button_data); ?> <?php echo mrseo_elated_get_inline_attrs($button_custom_attrs); ?>>
    <span class="eltdf-btn-text"><?php echo esc_html($text); ?></span>
    <?php  if ($icon !== '' && $icon_pack !== '') { ?>
	    <span class="eltdf-btn-icon-holder">
    		<?php echo mrseo_elated_icon_collections()->renderIcon($icon, $icon_pack); ?>
		</span>
	<?php } ?>
</button>