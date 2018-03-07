<div class="eltdf-testimonial-content" id="eltdf-testimonials-<?php echo esc_attr($current_id) ?>">
    <div class="eltdf-testimonial-text-holder">
        <?php if(!empty($text)) { ?>
            <h3 class="eltdf-testimonial-text"><?php echo esc_html($text); ?></h3>
        <?php } ?>
        <?php if(!empty($author)) { ?>
            <h5 class="eltdf-testimonial-author"><?php echo esc_html($author); ?></h5>
        <?php } ?>
    </div>
</div>