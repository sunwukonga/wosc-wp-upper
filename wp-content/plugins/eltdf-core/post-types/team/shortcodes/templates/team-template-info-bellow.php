<div class="eltdf-team eltdf-<?php echo esc_attr($team_member_layout) ?>" data-member-id="<?php echo esc_attr($member_id);?>">
	<div class="eltdf-team-inner">
		<?php if (get_the_post_thumbnail($member_id) !== '') { ?>
			<div class="eltdf-team-image">
                <a itemprop="url" href="<?php echo esc_url(get_the_permalink($member_id)) ?>">
                    <?php echo get_the_post_thumbnail($member_id, 'full'); ?>
                </a>
			</div>
		<?php } ?>
		<div class="eltdf-team-info">
            <div class="eltdf-team-title-holder">
                <h4 itemprop="name" class="eltdf-team-name entry-title">
                    <a itemprop="url" href="<?php echo esc_url(get_the_permalink($member_id)) ?>"><?php echo esc_html($title) ?></a>
                </h4>

                <?php if (!empty($position)) { ?>
                    <h6 class="eltdf-team-position"><?php echo esc_html($position); ?></h6>
                <?php } ?>
            </div>
			<div class="eltdf-team-social-holder-between">
				<div class="eltdf-team-social">
					<div class="eltdf-team-social-inner">
						<div class="eltdf-team-social-wrapp">
							<?php foreach ($team_social_icons as $team_social_icon) {
								print $team_social_icon;
							} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>