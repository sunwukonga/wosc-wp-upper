<?php ?>
<form action="<?php echo esc_url(home_url('/')); ?>" class="eltdf-search-slide-window-top" method="get">
	<?php if ( $search_in_grid ) { ?>
		<div class="eltdf-grid">
	<?php } ?>
		<div class="eltdf-search-form-inner">
			<span class="eltdf-swt-search-icon">
				<?php echo wp_kses($search_icon, array(
					'i' => array('class' => true, 'aria-hidden' => true),
					'span' => array('class' => true, 'aria-hidden' => true)
				)); ?>
			</span>
			<input type="text" placeholder="<?php esc_html_e('Search', 'mrseo'); ?>" name="s" class="eltdf-swt-search-field" autocomplete="off" />
			<a class="eltdf-swt-search-close" href="#">
                <?php echo wp_kses($search_icon_close, array(
                        'i' => array('class' => true, 'aria-hidden' => true),
                        'span' => array('class' => true, 'aria-hidden' => true)
                )); ?>
			</a>
		</div>
	<?php if ( $search_in_grid ) { ?>
		</div>
	<?php } ?>
</form>