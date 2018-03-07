<div class="eltdf-team-popup">
    <div class="eltdf-team-popup-inner">
	    <div class="eltdf-team-popup-content">
	        <?php if (get_the_post_thumbnail($member_id) !== '') { ?>
	            <div class="eltdf-team-popup-image">
	                <?php echo get_the_post_thumbnail($member_id); ?>
	                <i class="fa fa-times eltdf-close" aria-hidden="true" <?php mrseo_elated_inline_style($team_main_bckg_color);?>></i>
	            </div>
	        <?php } ?>
            <div class="eltdf-team-popup-info-holder">
            	<div class="eltdf-team-title-holder" <?php mrseo_elated_inline_style($team_main_bckg_color);?>>
                    <h3 itemprop="name" class="eltdf-team-name entry-title">
                        <?php echo esc_html($title) ?>
                    </h3>
                    <?php if (is_array($team_social_icons) && count($team_social_icons)) { ?>
	                    <div class="eltdf-team-popup-social">
							<?php foreach ($team_social_icons as $team_social_icon) {
								print $team_social_icon;
							} ?>
						</div>
					<?php } ?>
                </div>
                <?php if ($content !== '') { ?>
                <div class="eltdf-team-info-section">
                    <h4 class="eltdf-team-info-section-title"><?php esc_html_e('About','eltdf-core')?></h4>
                    <p><?php echo wp_kses_post($content); ?></p>
                </div>
                <?php } ?>
                <?php if ($position !== '') { ?>
                <div class="eltdf-team-info-section">
                    <h4 class="eltdf-team-info-section-title"><?php esc_html_e('Position','eltdf-core')?></h4>
                    <p><?php echo esc_html($position); ?></p>
                </div>
                <?php } ?>
                <?php if ($email !== '') { ?>
                <div class="eltdf-team-info-section">
                    <h4 class="eltdf-team-info-section-title"><?php esc_html_e('E-mail','eltdf-core')?></h4>
                    <p><?php echo esc_html($email); ?></p>
                </div>
                <?php } ?>
            </div>
	    </div>
    </div>
</div>