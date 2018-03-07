<?php if ( !strpos( get_the_content(), 'eltdf-more-link-container' )){ //add read more link if there is no continue reading ?>
	<div class="eltdf-post-read-more-button">
	<?php
	    if(mrseo_elated_core_plugin_installed()) {
	        echo mrseo_elated_get_button_html(
	            apply_filters(
	                'mrseo_elated_blog_template_read_more_button',
	                array(
	                    'type' => 'simple',
	                    'size' => 'medium',
	                    'link' => get_the_permalink(),
	                    'text' => esc_html__('Read more', 'mrseo'),
	                    'icon_pack' => 'font_awesome',
	                    'fa_icon' => 'fa-long-arrow-right',
	                    'simple_hover_type' => 'unveiling',
	                    'custom_class' => 'eltdf-blog-list-button'
	                )
	            )
	        );
	    } else { ?>
	        <a itemprop="url" href="<?php echo esc_attr(get_the_permalink()); ?>" target="_self" class="eltdf-btn eltdf-btn-medium eltdf-btn-simple eltdf-btn-icon eltdf-blog-list-button eltdf-btn-hover-unveiling">
	            <span class="eltdf-btn-text">
	                <?php echo esc_html__('Read more', 'mrseo'); ?>
	            </span>
	            <span class="eltdf-btn-icon-holder">
	            	<i class="eltdf-icon-font-awesome fa fa-long-arrow-right "></i>
	            </span>
	        </a>
	<?php } ?>
	</div>
<?php } ?>