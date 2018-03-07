<?php do_action('mrseo_elated_before_page_header'); ?>

<aside class="eltdf-vertical-menu-area <?php echo esc_html($holder_class); ?>">
	<div class="eltdf-vertical-menu-area-inner">
		<div class="eltdf-vertical-area-background"></div>
		<?php if(!$hide_logo) {
			mrseo_elated_get_logo();
		} ?>
		<?php mrseo_elated_get_header_vertical_main_menu(); ?>
		<div class="eltdf-vertical-area-widget-holder">
			<?php mrseo_elated_get_header_vertical_widget_areas(); ?>
		</div>
	</div>
</aside>

<?php do_action('mrseo_elated_after_page_header'); ?>