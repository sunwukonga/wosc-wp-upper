<?php

if (!function_exists('mrseo_elated_register_widgets')) {
	function mrseo_elated_register_widgets() {
		$widgets = array(
			'MrSeoElatedBlogListWidget',
			'MrSeoElatedButtonWidget',
			'MrSeoElatedImageWidget',
			'MrSeoElatedImageSliderWidget',
			'MrSeoElatedRawHTMLWidget',
			'MrSeoElatedSearchOpener',
			'MrSeoElatedSeparatorWidget',
			'MrSeoElatedSideAreaOpener',
			'MrSeoElatedSocialIconWidget'
		);

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}
	
	add_action('widgets_init', 'mrseo_elated_register_widgets');
}