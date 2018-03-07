<?php
	$author_info_box = esc_attr(mrseo_elated_options()->getOptionValue('blog_author_info'));
	$author_info_email = esc_attr(mrseo_elated_options()->getOptionValue('blog_author_info_email'));
	$author_id = esc_attr(get_the_author_meta('ID'));
	$author_image_style = 'background-image: url('.get_avatar_url(get_the_author_meta( 'ID' ), array('size' => '250')).')';
	$social_networks   = mrseo_elated_core_plugin_installed() ? mrseo_elated_get_user_custom_fields() : false;
    $display_author_social = mrseo_elated_options()->getOptionValue('blog_single_author_social') === 'no' ? false : true;
?>
<?php if($author_info_box === 'yes' && get_the_author_meta('description') !== "") { ?>
	<div class="eltdf-author-description">
		<div class="eltdf-author-description-inner">
			<div class="eltdf-author-description-content">
				<div class="eltdf-author-description-image">
					<a class="eltdf-author-image-url" itemprop="url" href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" title="<?php the_title_attribute(); ?>" target="_self">
						<span class="eltdf-author-image-bckg" <?php mrseo_elated_inline_style($author_image_style);?>></span>
						<?php echo mrseo_elated_kses_img(get_avatar(get_the_author_meta( 'ID' ), 78)); ?>
					</a>
				</div>
				<div class="eltdf-author-description-text-holder">
					<h5 class="eltdf-author-name vcard author">
						<a itemprop="url" href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" title="<?php the_title_attribute(); ?>" target="_self">
							<span class="fn">
							<?php
								if(get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "") {
									echo esc_html(get_the_author_meta('first_name')) . " " . esc_html(get_the_author_meta('last_name'));
								} else {
									echo esc_html(get_the_author_meta('display_name'));
								}
							?>
							</span>
						</a>
					</h5>
					<?php if($author_info_email === 'yes' && is_email(get_the_author_meta('email'))){ ?>
						<p itemprop="email" class="eltdf-author-email"><?php echo sanitize_email(get_the_author_meta('email')); ?></p>
					<?php } ?>
					<?php if(get_the_author_meta('description') != "") { ?>
						<div class="eltdf-author-text">
							<p itemprop="description"><?php echo esc_html(get_the_author_meta('description')); ?></p>
						</div>
					<?php } ?>
					<?php if($display_author_social) { ?>
						<?php if(is_array($social_networks) && count($social_networks)){ ?>
							<div class="eltdf-author-social-icons clearfix">
								<?php foreach($social_networks as $network){ ?>
									<a itemprop="url" href="<?php echo esc_url($network['link'])?>" target="_blank">
										<?php echo mrseo_elated_icon_collections()->renderIcon($network['class'], 'font_elegant'); ?>
									</a>
								<?php }?>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>