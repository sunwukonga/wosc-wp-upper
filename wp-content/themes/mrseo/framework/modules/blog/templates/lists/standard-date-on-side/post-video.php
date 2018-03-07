<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="eltdf-post-content">
        <div class="eltdf-post-heading">
            <?php mrseo_elated_get_module_template_part('templates/parts/post-type/video', 'blog', '', $part_params); ?>
        </div>
        <div class="eltdf-post-text">
            <div class="eltdf-post-date-inner">
                <div class="eltdf-post-date-day">
                	<?php $day = get_the_time('d');?>
                    <?php the_time($day); ?>
                </div>
                <div class="eltdf-post-date-month">
                	<?php $month = get_the_time('F');?>
                    <?php the_time($month); ?>
                </div>
            </div>
            <div class="eltdf-post-text-inner">
                <?php mrseo_elated_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                <div class="eltdf-post-info">
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
                </div>
                <div class="eltdf-post-text-main">
                    <?php mrseo_elated_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php do_action('mrseo_elated_single_link_pages'); ?>
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
</article>