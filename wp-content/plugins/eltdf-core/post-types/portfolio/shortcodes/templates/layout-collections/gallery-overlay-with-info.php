<?php echo eltdf_core_get_cpt_shortcode_module_template_part('portfolio', 'parts/image', $item_style, $params); ?>

<div class="eltdf-pli-text-holder" <?php mrseo_elated_inline_style($this_object->getItemHoverBackgroundColor());?>>
    <div class="eltdf-pli-text-wrapper">
    	<div class="eltdf-pli-text-wrapper-inner">
			<span class="eltdf-pli-separator"></span>
			<div class="eltdf-pli-content">
			    <?php echo eltdf_core_get_cpt_shortcode_module_template_part('portfolio', 'parts/title', $item_style, $params); ?>

			    <?php echo eltdf_core_get_cpt_shortcode_module_template_part('portfolio', 'parts/category', $item_style, $params); ?>
			</div>
		</div>
    </div>
</div>