<div class="eltdf-grid-row <?php echo esc_attr($holder_classes); ?>">
	<div <?php echo mrseo_elated_get_content_sidebar_class(); ?>>
		<div class="eltdf-content-sidebar-upgrade"></div>
		<div class="eltdf-page-content-holder-inner">
			<?php mrseo_elated_get_blog_type($blog_type); ?>
		</div>
	</div>
	<?php if($sidebar_layout !== 'no-sidebar') { ?>
		<div <?php echo mrseo_elated_get_sidebar_holder_class(); ?>>
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>
</div>