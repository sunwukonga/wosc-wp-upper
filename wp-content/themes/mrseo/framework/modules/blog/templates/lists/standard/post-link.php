<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="eltdf-post-content">
        <div class="eltdf-post-text" <?php mrseo_elated_inline_style($background_image_style);?>>
            <div class="eltdf-post-text-inner">
                <div class="eltdf-post-text-main">
                    <div class="eltdf-post-mark">
                        <span class="fa fa-link eltdf-link-mark"></span>
                    </div>
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                </div>
                <div class="eltdf-post-info-bottom clearfix">
                    <div class="eltdf-post-info-bottom-holder">
                    	<?php mrseo_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                        <?php mrseo_elated_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>