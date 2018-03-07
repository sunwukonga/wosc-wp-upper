<?php
$masonry_image_size = get_post_meta(get_the_ID(), 'eltdf_product_featured_image_size', true);
if(empty($masonry_image_size)) {
	$masonry_image_size = '';
}
?>
<div class="eltdf-pli <?php echo esc_html($masonry_image_size); ?>">
	<div class="eltdf-pli-inner">
		<div class="eltdf-pli-image">
			<?php mrseo_elated_get_module_template_part('templates/parts/image', 'woocommerce', '', $params); ?>
		</div>
		<div class="eltdf-pli-text" <?php echo mrseo_elated_get_inline_style($shader_styles); ?>>
			<div class="eltdf-pli-text-outer">
				<div class="eltdf-pli-text-inner">
					<?php mrseo_elated_get_module_template_part('templates/parts/add-to-cart', 'woocommerce', '', $params); ?>
				</div>
			</div>
		</div>
		<a class="eltdf-pli-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
	</div>
	<div class="eltdf-pli-text-wrapper" <?php echo mrseo_elated_get_inline_style($text_wrapper_styles); ?>>
		<?php mrseo_elated_get_module_template_part('templates/parts/title', 'woocommerce', '', $params); ?>
		
		<?php mrseo_elated_get_module_template_part('templates/parts/category', 'woocommerce', '', $params); ?>
		
		<?php mrseo_elated_get_module_template_part('templates/parts/excerpt', 'woocommerce', '', $params); ?>
		
		<?php mrseo_elated_get_module_template_part('templates/parts/rating', 'woocommerce', '', $params); ?>
		
		<?php mrseo_elated_get_module_template_part('templates/parts/price', 'woocommerce', '', $params); ?>
	</div>
</div>