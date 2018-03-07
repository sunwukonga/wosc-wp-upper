<?php
$eltdf_sidebar_layout  = mrseo_elated_sidebar_layout();

get_header();
mrseo_elated_get_title();
get_template_part('slider');
?>
<div class="eltdf-container eltdf-default-page-template">
	<?php do_action('mrseo_elated_after_container_open'); ?>
	<div class="eltdf-container-inner clearfix">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="eltdf-grid-row">
				<div <?php echo mrseo_elated_get_content_sidebar_class(); ?>>
					<div class="eltdf-content-sidebar-upgrade"></div>
					<div class="eltdf-page-content-holder-inner">
						<?php
							the_content();
							do_action('mrseo_elated_page_after_content');
						?>
					</div>
				</div>
				<?php if($eltdf_sidebar_layout !== 'no-sidebar') { ?>
					<div <?php echo mrseo_elated_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		<?php endwhile; endif; ?>
	</div>
	<?php do_action('mrseo_elated_before_container_close'); ?>
</div>
<?php get_footer(); ?>