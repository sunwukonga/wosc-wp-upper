<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php
$eltdf_sidebar_layout  = mrseo_elated_sidebar_layout();

get_header();
mrseo_elated_get_title();
get_template_part('slider');

//Woocommerce content
if ( ! is_singular('product') ) { ?>
	<div class="eltdf-container">
		<div class="eltdf-container-inner clearfix">
			<div class="eltdf-grid-row">
				<div <?php echo mrseo_elated_get_content_sidebar_class(); ?>>
					<div class="eltdf-content-sidebar-upgrade"></div>
					<div class="eltdf-page-content-holder-inner">
						<?php mrseo_elated_woocommerce_content(); ?>
					</div>
				</div>
				<?php if($eltdf_sidebar_layout !== 'no-sidebar') { ?>
					<div <?php echo mrseo_elated_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>			
<?php } else { ?>
	<div class="eltdf-container">
		<div class="eltdf-container-inner clearfix">
			<?php mrseo_elated_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>