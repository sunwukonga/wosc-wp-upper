<?php
$masonry_classes = '';
$number_of_columns = mrseo_elated_get_meta_field_intersect('portfolio_single_masonry_columns_number');
if(!empty($number_of_columns)) {
	$masonry_classes .= ' eltdf-ps-'.$number_of_columns.'-columns';
}
$space_between_items = mrseo_elated_get_meta_field_intersect('portfolio_single_masonry_space_between_items');
if(!empty($space_between_items)) {
	$masonry_classes .= ' eltdf-ps-'.$space_between_items.'-space';
}
?>
<div class="eltdf-ps-image-holder eltdf-ps-masonry-images <?php echo esc_attr($masonry_classes); ?>">
	<div class="eltdf-ps-image-inner">
		<div class="eltdf-ps-grid-sizer"></div>
		<div class="eltdf-ps-grid-gutter"></div>
		<?php
		$media = eltdf_core_get_portfolio_single_media();
		
		if(is_array($media) && count($media)) : ?>
			<?php foreach($media as $single_media) : ?>
				<div class="eltdf-ps-image <?php echo esc_attr($single_media['holder_classes']); ?>">
					<?php eltdf_core_get_portfolio_single_media_html($single_media); ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
<div class="eltdf-grid-row">
	<div class="eltdf-grid-col-8">
		<?php eltdf_core_get_cpt_single_module_template_part('templates/single/parts/content', 'portfolio', $item_layout); ?>
	</div>
	<div class="eltdf-grid-col-4">
		<div class="eltdf-ps-info-holder">
			<?php
			//get portfolio custom fields section
			eltdf_core_get_cpt_single_module_template_part('templates/single/parts/custom-fields', 'portfolio', $item_layout);
			
			//get portfolio categories section
			eltdf_core_get_cpt_single_module_template_part('templates/single/parts/categories', 'portfolio', $item_layout);
			
			//get portfolio date section
			eltdf_core_get_cpt_single_module_template_part('templates/single/parts/date', 'portfolio', $item_layout);
			
			//get portfolio tags section
			eltdf_core_get_cpt_single_module_template_part('templates/single/parts/tags', 'portfolio', $item_layout);
			
			//get portfolio share section
			eltdf_core_get_cpt_single_module_template_part('templates/single/parts/social', 'portfolio', $item_layout);
			?>
		</div>
	</div>
</div>