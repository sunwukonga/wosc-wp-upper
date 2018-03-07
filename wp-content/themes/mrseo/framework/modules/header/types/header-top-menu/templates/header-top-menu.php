<?php do_action('mrseo_elated_before_page_header'); ?>

<header class="eltdf-page-header">
	<?php do_action('mrseo_elated_after_page_header_html_open'); ?>
	
	<div class="eltdf-menu-area">
		<?php do_action('mrseo_elated_after_header_menu_area_html_open'); ?>
		
		<?php if($menu_area_in_grid) : ?>
			<div class="eltdf-grid">
		<?php endif; ?>
				
			<div class="eltdf-vertical-align-containers">
				<div class="eltdf-position-left">
					<div class="eltdf-position-left-inner">
						<?php mrseo_elated_get_main_menu(); ?>
					</div>
				</div>
				<div class="eltdf-position-right">
					<div class="eltdf-position-right-inner">
						<?php mrseo_elated_get_header_widget_menu_area(); ?>
					</div>
				</div>
			</div>
				
		<?php if($menu_area_in_grid) : ?>
			</div>
		<?php endif; ?>
	</div>
	
	<div class="eltdf-logo-area">
        <?php if($logo_area_in_grid) : ?>
            <div class="eltdf-grid">
        <?php endif; ?>
	            
            <div class="eltdf-vertical-align-containers">
                <div class="eltdf-position-center">
                    <div class="eltdf-position-center-inner">
                        <?php if(!$hide_logo) {
                            mrseo_elated_get_logo();
                        } ?>
                    </div>
                </div>
            </div>
	            
        <?php if($logo_area_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
	
	<?php do_action('mrseo_elated_before_page_header_html_close'); ?>
</header>

<?php do_action('mrseo_elated_after_page_header'); ?>