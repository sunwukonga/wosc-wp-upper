<?php if($max_num_pages > 1) { ?>
	<div class="eltdf-blog-pag-loading">
		<div class="eltdf-blog-pag-bounce1"></div>
		<div class="eltdf-blog-pag-bounce2"></div>
		<div class="eltdf-blog-pag-bounce3"></div>
	</div>
	<div class="eltdf-blog-pag-load-more">
		<?php
        if(mrseo_elated_core_plugin_installed()) {
			echo mrseo_elated_get_button_html(
                apply_filters(
                    'mrseo_elated_blog_template_load_more_button',
                    array(
                        'link' => 'javascript: void(0)',
                        'size' => 'medium',
                        'type' => 'solid-dark',
                        'text' => esc_html__('Load more', 'mrseo')
			        )
                )
            );
        } else { ?>
            <a itemprop="url" href="javascript:void(0)" target="_self" class="eltdf-btn eltdf-btn-medium eltdf-btn-solid-dark">
                <span class="eltdf-btn-text">
                    <?php echo esc_html__('Load more', 'mrseo'); ?>
                </span>
            </a>
		<?php } ?>
	</div>
<?php }