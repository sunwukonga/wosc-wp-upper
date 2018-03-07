<li class="eltdf-bl-item clearfix">
	<div class="eltdf-bli-inner">
        <?php  if ($post_info_image == 'yes') { ?>
            <?php mrseo_elated_get_module_template_part('templates/parts/image', 'blog', '', $params); ?>
        <?php } ?>

            <?php
            if($post_info_section == 'yes') { ?>

            <div class="eltdf-bli-info-top">
                <?php
                if ($post_info_date == 'yes') {
                    mrseo_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params);
                }
                if ($post_info_category == 'yes') {
                    mrseo_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params);
                }
                if ($post_info_author == 'yes') {
                    mrseo_elated_get_module_template_part('templates/parts/post-info/author', 'blog', '', $params);
                }
                if ($post_info_comments == 'yes') {
                    mrseo_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $params);
                }
                if ($post_info_like == 'yes') {
                    mrseo_elated_get_module_template_part('templates/parts/post-info/like', 'blog', '', $params);
                }
                if ($post_info_share == 'yes') {
                    mrseo_elated_get_module_template_part('templates/parts/post-info/share', 'blog', '', $params);
                }
                ?>
            </div>

            <?php } ?>

            <?php mrseo_elated_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>

            <div class="eltdf-bli-excerpt">
                <?php mrseo_elated_get_module_template_part('templates/parts/excerpt', 'blog', '', $params); ?>
                <?php mrseo_elated_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $params); ?>
            </div>
        </div>
</li>