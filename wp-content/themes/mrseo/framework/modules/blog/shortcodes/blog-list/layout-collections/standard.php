<li class="eltdf-bl-item clearfix">
	<div class="eltdf-bli-inner">
		<?php  if ($post_info_image == 'yes') { ?>
       		 <?php mrseo_elated_get_module_template_part('templates/parts/image', 'blog', '', $params); ?>
		<?php } ?>
		<?php
		if($post_info_section == 'yes') { ?>

			<div class="eltdf-bli-info-top">
				<?php
					$year = get_the_time('Y');
					$month_label = get_the_time('M');
					$month = get_the_time('m');
					$day = get_the_time('d');
					$title = get_the_title();

					?>
				<div itemprop="dateCreated" class="eltdf-post-info-date entry-date published updated">
					<?php if(empty($title) && mrseo_elated_blog_item_has_link()) { ?>
					<a itemprop="url" href="<?php the_permalink() ?>">
						<?php } else { ?>
						<a itemprop="url" href="<?php echo get_month_link($year, $month); ?>">
							<?php }?>
							<h3 class="eltdf-bl-day"><?php echo esc_html($day);?></h3>
							<h5  class="eltdf-bl-month"><?php echo esc_html($month_label);?></h5>
						</a>
						<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(mrseo_elated_get_page_id()); ?>"/>
				</div>
			</div>

		<?php } ?>

        <div class="eltdf-bli-content">
            <?php mrseo_elated_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>

            <?php
            if($post_info_section == 'yes') { ?>
                <div class="eltdf-bli-info">
	                <?php

	                    if ($post_info_category == 'yes') {
	                        mrseo_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params);
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
            <div class="eltdf-bli-excerpt">
                <?php mrseo_elated_get_module_template_part('templates/parts/excerpt', 'blog', '', $params); ?>
            </div>
			<?php
			if($post_info_section == 'yes') { ?>

				<div class="eltdf-bli-info-top">
					<?php
					if ($post_info_author == 'yes') {
						mrseo_elated_get_module_template_part('templates/parts/post-info/author', 'blog', '', $params);
					}
					?>
				</div>

			<?php } ?>
        </div>
	</div>
</li>