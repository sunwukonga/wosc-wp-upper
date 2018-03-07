<?php do_action('mrseo_elated_before_page_header'); ?>

<header class="eltdf-page-header">
	<?php do_action('mrseo_elated_after_page_header_html_open'); ?>
	
    <div class="eltdf-logo-area">
	    <?php do_action( 'mrseo_elated_after_header_logo_area_html_open' ); ?>
	    
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
	
    <?php if($show_fixed_wrapper) : ?>
        <div class="eltdf-fixed-wrapper">
    <?php endif; ?>
	        
    <div class="eltdf-menu-area">
	    <?php do_action( 'mrseo_elated_after_header_menu_area_html_open' ); ?>
	    
        <?php if($menu_area_in_grid) : ?>
            <div class="eltdf-grid">
        <?php endif; ?>
	            
            <div class="eltdf-vertical-align-containers">
                <div class="eltdf-position-center">
                    <div class="eltdf-position-center-inner">
                        <?php mrseo_elated_get_main_menu(); ?>
                    </div>
                </div>
            </div>
	            
        <?php if($menu_area_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
	
    <?php if($show_fixed_wrapper) { ?>
        </div>
	<?php } ?>
	
	<?php if($show_sticky) {
		mrseo_elated_get_sticky_header('centered', 'header/types/header-centered');
	} ?>
	
	<?php do_action('mrseo_elated_before_page_header_html_close'); ?>
</header>

<?php do_action('mrseo_elated_after_page_header'); ?>