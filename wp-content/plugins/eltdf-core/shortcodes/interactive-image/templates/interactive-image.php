<div class="eltdf-interactive-image <?php echo esc_attr($holder_classes); ?>">
    <div class="eltdf-ii-image-holder">
        <?php if ($link != '') { ?>
            <a href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($link_target) ?>"></a>
        <?php } ?>
        <div class="eltdf-ii-image-holder-inner">
            <img src="<?php echo wp_get_attachment_url($image); ?>" alt="<?php echo get_the_title($image); ?>" />
        </div>
    </div>
    <div class="eltdf-ii-title-holder"  <?php echo mrseo_elated_get_inline_style($title_holder_styles); ?>>
        <?php if ($link != '') { ?>
            <a href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($link_target) ?>"></a>
        <?php } ?>
        <h5 class="eltdf-ii-title" <?php echo mrseo_elated_get_inline_style($title_styles); ?>><?php echo esc_attr($image_title) ?></h5>
    </div>
</div>