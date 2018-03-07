<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltdf-post-content">
        <div class="eltdf-post-heading">
            <?php mrseo_elated_get_module_template_part('templates/parts/post-type/video', 'blog', '', $part_params); ?>
        </div>
        <div class="eltdf-post-text">
            <div class="eltdf-post-text-inner">
                <div class="eltdf-post-info eltdf-post-info-top">
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                </div>
                <div class="eltdf-post-text-main">
                    <?php mrseo_elated_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php the_content(); ?>
                    <?php do_action('mrseo_elated_single_link_pages'); ?>
                </div>
                <div class="eltdf-post-info-bottom clearfix">
                    <div class="eltdf-post-info eltdf-post-info-bottom-left">
                        <?php mrseo_elated_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
                        <?php mrseo_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                        <?php mrseo_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                        <?php mrseo_elated_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
                    </div>
                    <div class="eltdf-post-info eltdf-post-info-bottom-right">
                        <?php mrseo_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>