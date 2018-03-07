<div <?php mrseo_elated_class_attribute($holder_classes);?>>
	<?php if(!(empty($link))){ ?>
		<a  href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($target) ?>"></a>
	<?php } ?>

	<div class="eltdf-ib-color-holder" <?php echo mrseo_elated_get_inline_style($holder_styles)?>></div>
	<div class="eltdf-ib-bckg-image-holder" <?php echo mrseo_elated_get_inline_style($background_image)?>></div>
	<div class="eltdf-ib-holder-table">
		<div class="eltdf-ib-holder-table-cell" <?php echo mrseo_elated_get_inline_style($inner_table_style)?>>
			<?php if ( ! empty( $title ) ) : ?>
				<h3 class="eltdf-ib-title">
					<?php echo wp_kses_post($title_italicized);?>
				</h3>
			<?php endif; ?>
			<?php if ( ! empty( $text ) ) : ?>
				<p class="eltdf-ib-text">
					<?php echo esc_html( $text ); ?>
				</p>
			<?php endif; ?>
			<?php if(!(empty($link))){ ?>
				<!-- <i class="fa fa-long-arrow-right eltdf-ib-icon" aria-hidden="true"></i> -->
				<?php echo mrseo_elated_get_button_html($button_parameters); ?>
			<?php } ?>

		</div>
	</div>
</div>