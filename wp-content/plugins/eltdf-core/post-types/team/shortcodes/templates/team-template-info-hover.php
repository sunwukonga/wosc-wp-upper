<div class="eltdf-team eltdf-<?php echo esc_attr($team_member_layout) ?>" data-member-id="<?php echo esc_attr($member_id);?>">
    <div class="eltdf-team-inner">
        <?php if (get_the_post_thumbnail($member_id) !== '') { ?>
            <div class="eltdf-team-image">
                <?php echo get_the_post_thumbnail($member_id); ?>
                <div class="eltdf-team-info-holder" <?php mrseo_elated_inline_style($background_style);?>>
                	<a itemprop="url" href="<?php echo esc_url(get_the_permalink($member_id)) ?>" class="eltdf-team-whole-link"></a>
	                <div class="eltdf-team-info-tb">
	                    <div class="eltdf-team-info-tc">
	                        <div class="eltdf-team-title-holder">
	                            <h4 itemprop="name" class="eltdf-team-name entry-title">
	                                <a itemprop="url" href="<?php echo esc_url(get_the_permalink($member_id)) ?>"><?php echo esc_html($title) ?></a>
	                            </h4>
	                            <?php echo mrseo_elated_execute_shortcode('eltdf_separator',array()); ?>
	                            <?php if (!empty($position)) { ?>
	                                <h6 class="eltdf-team-position"><?php echo esc_html($position); ?></h6>
	                            <?php } ?>
	                        </div>

	                    </div>
	                </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>