<div class="eltdf-tabs <?php echo esc_attr($holder_classes); ?>">
	<ul class="eltdf-tabs-nav clearfix">
		<?php foreach ($tabs_titles as $tab_title) { ?>
			<li>
				<?php if($tab_title !== '') { ?>
					<h5 class="eltdf-tabs-title">
						<a href="#tab-<?php echo sanitize_title($tab_title)?>"><?php echo esc_html($tab_title); ?></a>
					</h5>
				<?php } ?>
			</li>
		<?php } ?>
	</ul>
	<?php echo do_shortcode($content); ?>
</div>