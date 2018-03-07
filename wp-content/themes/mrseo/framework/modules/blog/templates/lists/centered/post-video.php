<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
	<div class="eltdf-post-content">
		<div class="eltdf-post-text">
			<div class="eltdf-post-text-inner">
                <div class="eltdf-post-info">
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
                </div>
                <div class="eltdf-post-heading">
                    <?php mrseo_elated_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-type/video', 'blog', '', $part_params); ?>
                </div>
                <div class="eltdf-post-text-main">
                    <?php mrseo_elated_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                </div>
                <div class="eltdf-post-info-bottom">
                    <div class="eltdf-info-bottom-item">
                        <?php mrseo_elated_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
                    </div>
                    <div class="eltdf-info-bottom-item">
                        <?php mrseo_elated_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $part_params); ?>
                    </div>
                    <div class="eltdf-info-bottom-item">
                        <?php mrseo_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
</article>