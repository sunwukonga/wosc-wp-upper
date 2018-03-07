<?php
$blog_single_navigation = mrseo_elated_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_navigation_through_same_category = mrseo_elated_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
?>
<?php if($blog_single_navigation){ ?>
	<div class="eltdf-blog-single-navigation">
		<div class="eltdf-blog-single-navigation-inner clearfix">
			<?php
			/* Single navigation section - SETTING PARAMS */
			$post_navigation = array(
				'prev' => array(
					'mark' => '<span class="eltdf-blog-single-nav-mark fa fa-long-arrow-left"></span>',
					'title' => '',
					'label' => '<span class="eltdf-blog-single-nav-label">'.esc_html__('Previous post', 'mrseo').'</span>'
				),
				'next' => array(
					'mark' => '<span class="eltdf-blog-single-nav-mark fa fa-long-arrow-right"></span>',
					'title' => '',
					'label' => '<span class="eltdf-blog-single-nav-label">'.esc_html__('Next post', 'mrseo').'</span>'
				)
			);

			if(get_previous_post() !== ""){
				if($blog_navigation_through_same_category){
					if(get_previous_post(true) !== ""){
						$post_navigation['prev']['post'] = get_previous_post(true);
					}
				} else {
					if(get_previous_post() != ""){
						$post_navigation['prev']['post'] = get_previous_post();
					}
				}

				if($post_navigation['prev']['post']->post_title != '') {
					$post_navigation['prev']['title'] = '<span class="eltdf-blog-single-nav-title-text">'.$post_navigation['prev']['post']->post_title.'</span>';
				}
			}
			if(get_next_post() != ""){
				if($blog_navigation_through_same_category){
					if(get_next_post(true) !== ""){
						$post_navigation['next']['post'] = get_next_post(true);

					}
				} else {
					if(get_next_post() !== ""){
						$post_navigation['next']['post'] = get_next_post();
					}
				}

				if($post_navigation['next']['post']->post_title != '') {
					$post_navigation['next']['title'] = '<span class="eltdf-blog-single-nav-title-text">'.$post_navigation['next']['post']->post_title.'</span>';
				}
			}

			/* Single navigation section - RENDERING */
			if (isset($post_navigation['prev']['post']) || isset($post_navigation['next']['post'])) {
				foreach (array('prev', 'next') as $nav_type) {
					if (isset($post_navigation[$nav_type]['post'])) { ?>
						<a itemprop="url" class="eltdf-blog-single-<?php echo esc_attr($nav_type); ?>" href="<?php echo get_permalink($post_navigation[$nav_type]['post']->ID); ?>">
							<h5 class="eltdf-blog-single-nav-title">
								<?php echo wp_kses($post_navigation[$nav_type]['mark'], array('span' => array('class' => true))); ?>
								<?php echo wp_kses($post_navigation[$nav_type]['title'], array('span' => array('class' => true))); ?>
							</h5>
							<?php echo wp_kses($post_navigation[$nav_type]['label'], array('span' => array('class' => true))); ?>
						</a>
					<?php }
				}
			}
			?>
		</div>
	</div>
<?php } ?>