<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
	<div class="eltdf-post-content">
		<div class="eltdf-post-text">
			<div class="eltdf-post-text-inner">
                <div class="eltdf-post-info">
                    <?php mrseo_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                </div>
                <?php mrseo_elated_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
			</div>
		</div>
	</div>
</article>