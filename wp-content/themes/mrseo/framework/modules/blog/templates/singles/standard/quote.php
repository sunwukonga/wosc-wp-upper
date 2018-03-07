<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltdf-post-content">
        <div class="eltdf-post-text" <?php mrseo_elated_inline_style($background_image_style);?>>
            <div class="eltdf-post-text-inner">
                <div class="eltdf-post-text-main">
                    <div class="eltdf-post-mark">
                        <span class="eltdf-quote-mark">&#750;</span>
                    </div>
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
                </div>
                <div class="eltdf-post-info-top">
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="eltdf-post-additional-content">
        <?php the_content(); ?>
        <div class="eltdf-post-info-bottom clearfix">
            <div class="eltdf-post-info-bottom-left">
            	<?php mrseo_elated_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
            </div>
            <div class="eltdf-post-info-bottom-right">
                <?php mrseo_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                <?php mrseo_elated_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
            </div>
        </div>
    </div>
</article>