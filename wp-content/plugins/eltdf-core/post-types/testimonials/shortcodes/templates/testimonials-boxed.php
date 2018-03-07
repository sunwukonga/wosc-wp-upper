<div class="eltdf-testimonial-content" id="eltdf-testimonials-<?php echo esc_attr($current_id) ?>" <?php mrseo_elated_inline_style($box_styles); ?>>
    <div class="eltdf-testimonial-text-holder">
        <?php if(!empty($text)) { ?>
            <p class="eltdf-testimonial-text"><?php echo esc_html($text); ?></p>
        <?php } ?>
        <?php if(has_post_thumbnail() || !empty($author)) { ?>
            <div class="eltdf-testimonials-author-holder clearfix">
                <?php if(has_post_thumbnail()) { ?>
                    <div class="eltdf-testimonial-image">
                        <?php echo get_the_post_thumbnail(get_the_ID(), array(85, 85)); ?>
                    </div>
                <?php } ?>
                <?php if(!empty($author)) { ?>
                    <h5 class="eltdf-testimonial-author"><span class="eltdf-testimonial-author-inner"><?php echo esc_html($author); ?></span></h5>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>