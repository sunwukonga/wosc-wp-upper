<div class="eltdf-grid-row <?php echo esc_attr($holder_classes); ?>">
	<div <?php echo mrseo_elated_get_content_sidebar_class(); ?>>
		<div class="eltdf-content-sidebar-upgrade"></div>
		<div class="eltdf-page-content-holder-inner">
			<div class="eltdf-blog-holder eltdf-blog-single <?php echo esc_attr($blog_single_classes); ?>">
				<?php mrseo_elated_get_blog_single_type($blog_single_type); ?>
			</div>
		</div>
	</div>
	<?php if($sidebar_layout !== 'no-sidebar') { ?>
		<div <?php echo mrseo_elated_get_sidebar_holder_class(); ?>>
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>
</div>