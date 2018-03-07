<?php $i = 0; ?>
<div class="eltdf-frame-slider-holder">
	<div class="eltdf-fs-phone"></div>
	<div class="eltdf-fs-slides eltdf-owl-slider" <?php echo mrseo_elated_get_inline_attrs($slider_data); ?>>
		<?php foreach ($images as $image) { ?>
			<div class="eltdf-fs-slide">
				<?php if(!empty($links)){ ?>
					<a class="eltdf-ig-link" href="<?php echo esc_url($links[$i++]) ?>" title="<?php echo esc_attr($image['alt']); ?>" target="<?php echo esc_attr($target); ?>">
				<?php } ?>
					<?php echo wp_get_attachment_image($image['image_id'], 'full'); ?>
				<?php if(!empty($links)){ ?>
					</a>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>
