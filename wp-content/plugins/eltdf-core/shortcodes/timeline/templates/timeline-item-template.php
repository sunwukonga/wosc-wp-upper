<div class="eltdf-timeline-item">
    <div class="eltdf-timeline-text-holder">
        <?php if($item_link !== '') { ?>
        <?php } ?>
        <?php if($image !== ''): ?>
            <div class="eltdf-timeline-image clearfix">
                <?php echo wp_get_attachment_image($image, array(95,95)); ?>
            </div>
        <?php endif; ?>
        <div class="eltdf-timeline-title-holder">
            <?php if ($item_link !== '') { ?>
                <a href="<?php echo esc_url($item_link) ?>" target="<?php echo esc_attr($item_link_target) ?>"></a>
            <?php } ?>
            <?php if($title !== ''): ?>
                <div class="eltdf-timeline-title">
                    <h3><?php echo esc_html($title) ?></h3>
                </div>
            <?php endif; ?>
            <?php if($subtitle !== ''): ?>
                <div class="eltdf-timeline-subtitle">
                    <p><?php echo esc_html($subtitle) ?></p>
                </div>
            <?php endif; ?>
            <?php if($date !== ''): ?>
                <div class="eltdf-timeline-date">
                    <h5><?php echo esc_html($date) ?></h5>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="eltdf-timeline-bottom-holder">
    	<span class="eltdf-timeline-line eltdf-long">
            <span class="eltdf-line-top"></span>
            <span class="eltdf-line-bottom"></span>
        </span>
    	<span class="eltdf-timeline-line eltdf-short">
            <span class="eltdf-line-top"></span>
            <span class="eltdf-line-bottom"></span>
        </span>
    	<span class="eltdf-timeline-line eltdf-long eltdf-colored">
            <span class="eltdf-line-top"></span>
            <span class="eltdf-line-bottom"></span>
        </span>
    	<span class="eltdf-timeline-line eltdf-short">
            <span class="eltdf-line-top"></span>
            <span class="eltdf-line-bottom"></span>
        </span>
    </div>
</div>