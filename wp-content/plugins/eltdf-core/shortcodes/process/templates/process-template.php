<div class="eltdf-process <?php echo esc_attr($process_classes) ?>">

    <div class="eltdf-process-content-wrapper">
	    <div class="eltdf-process-content-wrapper-inner">
	        <div class="eltdf-process-content-holder" <?php echo mrseo_elated_get_inline_style($content_background_image_style)?>>
	            <div class="eltdf-process-content-overlay" <?php echo mrseo_elated_get_inline_style($background_color_hover)?>></div>

	            <?php if($link != '') { ?>
	                <a class="eltdf-process-link" href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($target) ?>"></a>
	            <?php } ?>
	            <?php if($background_image != '') { ?>
	                <div class="eltdf-process-bgrnd" <?php echo mrseo_elated_get_inline_style($background_image_style)?>></div>
	            <?php } ?>
	            <div class="eltdf-process-content-holder-inner">

	                <?php if($type === 'process_icons'){ ?>

	                    <?php print $icon; ?>

	                <?php } elseif($type === 'process_text'){ ?>
	                    <span class="eltdf-process-inner-text">
						<?php echo esc_html($text_in_process, 'eltdf-core') ?>
					</span>

	                <?php } ?>

	            </div>
	        </div>
        </div>
    </div>
    <div class="eltdf-process-text-holder">
        <h5 class="eltdf-process-title">
            <?php echo esc_html($title); ?>
        </h5>
        <p class="eltdf-process-text">
            <?php echo esc_html($text); ?>
        </p>
    </div>


</div>