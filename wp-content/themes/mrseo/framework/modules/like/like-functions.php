<?php

if ( ! function_exists('mrseo_elated_like') ) {
	/**
	 * Returns MrSeoElatedLike instance
	 *
	 * @return MrSeoElatedLike
	 */
	function mrseo_elated_like() {
		return MrSeoElatedLike::get_instance();
	}
}

function mrseo_elated_get_like() {

	echo wp_kses(mrseo_elated_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'i' => array(
			'class' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}