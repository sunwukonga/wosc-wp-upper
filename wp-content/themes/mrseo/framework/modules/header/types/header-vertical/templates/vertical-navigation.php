<?php do_action('mrseo_elated_before_top_navigation'); ?>
<div class="eltdf-vertical-menu-outer">
	<nav class="eltdf-vertical-menu eltdf-vertical-dropdown-on-click">
		<?php
			wp_nav_menu(array(
				'theme_location'  => 'vertical-navigation',
				'container'       => '',
				'container_class' => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'fallback_cb'     => 'top_navigation_fallback',
				'link_before'     => '<span>',
				'link_after'      => '</span>',
				'walker'          => new MrSeoElatedTopNavigationWalker()
			));
		?>
	</nav>
</div>
<?php do_action('mrseo_elated_after_top_navigation'); ?>