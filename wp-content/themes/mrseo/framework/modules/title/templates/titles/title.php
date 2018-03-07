<?php do_action('mrseo_elated_before_page_title'); ?>
<div class="eltdf-title <?php echo mrseo_elated_title_classes(); ?>" style="<?php echo esc_attr($title_height); echo esc_attr($title_background_color); echo esc_attr($title_background_image); ?>" data-height="<?php echo esc_attr(intval(preg_replace('/[^0-9]+/', '', $title_height), 10));?>" <?php echo esc_attr($title_background_image_width); ?>>
    <?php if(!empty($title_background_image_src)) { ?>
        <div class="eltdf-title-image">
            <img itemprop="image" src="<?php echo esc_url($title_background_image_src); ?>" alt="<?php esc_html_e('Title Image', 'mrseo'); ?>" />
        </div>
    <?php } ?>
    <div class="eltdf-title-holder" <?php mrseo_elated_inline_style($title_holder_height); ?>>
        <div class="eltdf-container clearfix">
            <div class="eltdf-container-inner">
                <div class="eltdf-title-subtitle-holder" style="<?php echo esc_attr($title_subtitle_holder_padding); ?>">
                    <div class="eltdf-title-subtitle-holder-inner">
                        <?php switch ($type){
                            case 'standard': ?>
                                <?php if($has_subtitle){ ?>
                                    <span class="eltdf-subtitle" <?php mrseo_elated_inline_style($subtitle_color); ?>><span><?php mrseo_elated_subtitle_text(); ?></span></span>
                                <?php } ?>
                                <?php if(mrseo_elated_get_title_text() !== '') { ?>
                                    <<?php echo esc_attr($title_tag); ?> class="eltdf-page-title entry-title" <?php mrseo_elated_inline_style($title_color); ?>><span><?php mrseo_elated_title_text(); ?></span></<?php echo esc_attr($title_tag); ?>>
                                <?php } ?>
                                <?php if($enable_breadcrumbs){ ?>
                                    <div class="eltdf-breadcrumbs-holder"> <?php mrseo_elated_custom_breadcrumbs(); ?></div>
                                <?php } ?>
                            <?php break;
                            case 'breadcrumb': ?>
                                <div class="eltdf-breadcrumbs-holder"> <?php mrseo_elated_custom_breadcrumbs(); ?></div>
                            <?php break;
                            }
                        ?>
                        <?php if ($enable_like || $enable_share){ ?>
                        	<div class="eltdf-title-like-share-holder">
	                        	<div class="eltdf-title-ls-table">
		                        	<div class="eltdf-title-ls-table-cell">
										<?php if ($enable_like){
											mrseo_elated_get_like();
										}
										if($enable_share){
											echo mrseo_elated_get_social_share_html();
										} ?>
		                        	</div>
	                        	</div>
                        	</div>
                       <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php do_action('mrseo_elated_after_page_title'); ?>
