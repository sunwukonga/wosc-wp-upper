<?php

if (!function_exists('mrseo_elated_woocommerce_products_per_page')) {
	/**
	 * Function that sets number of products per page. Default is 9
	 * @return int number of products to be shown per page
	 */
	function mrseo_elated_woocommerce_products_per_page() {

		$products_per_page = 12;

		if (mrseo_elated_options()->getOptionValue('eltdf_woo_products_per_page')) {
			$products_per_page = mrseo_elated_options()->getOptionValue('eltdf_woo_products_per_page');
		}
		if(isset($_GET['woo-products-count']) && $_GET['woo-products-count'] === 'view-all') {
			$products_per_page = 9999;
		}

		return $products_per_page;
	}
}

if (!function_exists('mrseo_elated_woocommerce_thumbnails_per_row')) {
	/**
	 * Function that sets number of thumbnails on single product page per row. Default is 4
	 * @return int number of thumbnails to be shown on single product page per row
	 */
	function mrseo_elated_woocommerce_thumbnails_per_row() {

		return 4;
	}
}

if (!function_exists('mrseo_elated_woocommerce_related_products_args')) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 * @param $args array array of args for the query
	 * @return mixed array of changed args
	 */
	function mrseo_elated_woocommerce_related_products_args($args) {
		$related = mrseo_elated_options()->getOptionValue('eltdf_woo_product_list_columns');
		
		if (!empty($related)) {
			switch ($related) {
				case 'eltdf-woocommerce-columns-4':
					$args['posts_per_page'] = 4;
					break;
				case 'eltdf-woocommerce-columns-3':
					$args['posts_per_page'] = 3;
					break;
				default:
					$args['posts_per_page'] = 3;
			}
		} else {
			$args['posts_per_page'] = 3;
		}

		return $args;
	}
}

if (!function_exists('mrseo_elated_woocommerce_template_loop_product_title')) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function mrseo_elated_woocommerce_template_loop_product_title() {

		$tag = mrseo_elated_options()->getOptionValue('eltdf_products_list_title_tag');
		if($tag === '') {
			$tag = 'h5';
		}
		the_title('<' . $tag . ' class="eltdf-product-list-title"><a href="'.get_the_permalink().'">', '</a></' . $tag . '>');
	}
}

if (!function_exists('mrseo_elated_woocommerce_template_single_title')) {
	/**
	 * Function for overriding product title template in Single Product template
	 */
	function mrseo_elated_woocommerce_template_single_title() {

		$tag = mrseo_elated_options()->getOptionValue('eltdf_single_product_title_tag');
		if($tag === '') {
			$tag = 'h1';
		}
		the_title('<' . $tag . '  itemprop="name" class="eltdf-single-product-title">', '</' . $tag . '>');
	}
}

if (!function_exists('mrseo_elated_woocommerce_sale_flash')) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function mrseo_elated_woocommerce_sale_flash() {

		return '<span class="eltdf-onsale">' . esc_html__('Sale', 'mrseo') . '</span>';
	}
}

if (!function_exists('mrseo_elated_woocommerce_product_out_of_stock')) {
	/**
	 * Function for adding Out Of Stock Template
	 *
	 * @return string
	 */
	function mrseo_elated_woocommerce_product_out_of_stock() {

		global $product;

		if (!$product->is_in_stock()) {
			print '<span class="eltdf-out-of-stock">' . esc_html__('Sold', 'mrseo') . '</span>';
		}
	}
}

if (!function_exists('mrseo_elated_woocommerce_product_categories')) {
    /**
     * Function that displays product categories
     */
    function mrseo_elated_woocommerce_product_categories(){
		global $product;

		if (wc_get_product_category_list($product->get_id()) != '') { ?>
			<div class="eltdf-product-cat">
		<?php }

		echo wp_kses(wc_get_product_category_list($product->get_id(), ', '), array(
			'a' => array(
				'href' => true,
				'rel' => true,
				'class' => true,
				'title' => true,
				'id' => true
			)
		));

		if (wc_get_product_category_list($product->get_id()) != '') { ?>
			</div>
		<?php }
    }
}

if (!function_exists('mrseo_elated_woocommerce_view_all_pagination')) {
	/**
	 * Function for adding New WooCommerce Pagination Template
	 *
	 * @return string
	 */
	function mrseo_elated_woocommerce_view_all_pagination() {

		global $wp_query;

		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}

		$html = '';

		// if(get_option('woocommerce_shop_page_id')) {
		// 	$html .= '<div class="eltdf-woo-view-all-pagination">';
		// 	$html .= '<a href="'.get_permalink(get_option('woocommerce_shop_page_id')).'?woo-products-count=view-all">'.esc_html__('View All', 'mrseo').'</a>';
		// 	$html .= '</div>';
		// }

		print $html;
	}
}

if (!function_exists('mrseo_elated_woo_view_all_pagination_additional_tag_before')) {
	function mrseo_elated_woo_view_all_pagination_additional_tag_before() {

		print '<div class="eltdf-woo-pagination-holder"><div class="eltdf-woo-pagination-inner">';
	}
}

if (!function_exists('mrseo_elated_woo_view_all_pagination_additional_tag_after')) {
	function mrseo_elated_woo_view_all_pagination_additional_tag_after() {

		print '</div></div>';
	}
}

if (!function_exists('mrseo_elated_woocommerce_product_thumbnail_column_size')) {
	function mrseo_elated_woocommerce_product_thumbnail_column_size() {
		
		return 3;
	}
}

if (!function_exists('mrseo_elated_single_product_images_additional_tag_before')) {
	function mrseo_elated_single_product_images_additional_tag_before() {

		print '<div class="eltdf-single-product-images">';
	}
}

if (!function_exists('mrseo_elated_single_product_images_additional_tag_after')) {
	function mrseo_elated_single_product_images_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('mrseo_elated_single_product_content_additional_tag_before')) {
	function mrseo_elated_single_product_content_additional_tag_before() {

		print '<div class="eltdf-single-product-content">';
	}
}

if (!function_exists('mrseo_elated_single_product_content_additional_tag_after')) {
	function mrseo_elated_single_product_content_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('mrseo_elated_single_product_summary_additional_tag_before')) {
	function mrseo_elated_single_product_summary_additional_tag_before() {

		print '<div class="eltdf-single-product-summary">';
	}
}

if (!function_exists('mrseo_elated_single_product_summary_additional_tag_after')) {
	function mrseo_elated_single_product_summary_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('mrseo_elated_pl_holder_additional_tag_before')) {
	function mrseo_elated_pl_holder_additional_tag_before() {

		print '<div class="eltdf-pl-main-holder">';
	}
}

if (!function_exists('mrseo_elated_pl_holder_additional_tag_after')) {
	function mrseo_elated_pl_holder_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('mrseo_elated_pl_inner_additional_tag_before')) {
	function mrseo_elated_pl_inner_additional_tag_before() {

		print '<div class="eltdf-pl-inner">';
	}
}

if (!function_exists('mrseo_elated_pl_inner_additional_tag_after')) {
	function mrseo_elated_pl_inner_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('mrseo_elated_pl_image_additional_tag_before')) {
	function mrseo_elated_pl_image_additional_tag_before() {

		print '<div class="eltdf-pl-image">';
	}
}

if (!function_exists('mrseo_elated_pl_image_additional_tag_after')) {
	function mrseo_elated_pl_image_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('mrseo_elated_pl_inner_button_additional_tag_before')) {
	function mrseo_elated_pl_inner_button_additional_tag_before() {

		print '<div class="eltdf-pl-button-holder">';
	}
}

if (!function_exists('mrseo_elated_pl_inner_button_additional_tag_after')) {
	function mrseo_elated_pl_inner_button_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('mrseo_elated_pl_inner_text_additional_tag_before')) {
	function mrseo_elated_pl_inner_text_additional_tag_before() {

		print '<div class="eltdf-pl-text"><div class="eltdf-pl-text-outer"><div class="eltdf-pl-text-inner">';
	}
}

if (!function_exists('mrseo_elated_pl_inner_text_additional_tag_after')) {
	function mrseo_elated_pl_inner_text_additional_tag_after() {

		print '</div></div></div>';
	}
}

if (!function_exists('mrseo_elated_pl_text_wrapper_additional_tag_before')) {
	function mrseo_elated_pl_text_wrapper_additional_tag_before() {

		print '<div class="eltdf-pl-text-wrapper">';
	}
}

if (!function_exists('mrseo_elated_pl_text_wrapper_additional_tag_after')) {
	function mrseo_elated_pl_text_wrapper_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('mrseo_elated_pl_title_price_additional_tag_before')) {
	function mrseo_elated_pl_title_price_additional_tag_before() {

		print '<div class="eltdf-pl-title-price-wrapper">';
	}
}

if (!function_exists('mrseo_elated_pl_title_price_wrapper_additional_tag_after')) {
	function mrseo_elated_pl_title_price_wrapper_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('mrseo_elated_pl_rating_additional_tag_before')) {
	function mrseo_elated_pl_rating_additional_tag_before() {
		global $product;

		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {

			$rating_html = wc_get_rating_html( $product->get_average_rating() );		

			if($rating_html !== '') {
				print '<div class="eltdf-pl-rating-holder">';
			}
		}
	}
}

if (!function_exists('mrseo_elated_pl_rating_additional_tag_after')) {
	function mrseo_elated_pl_rating_additional_tag_after() {
		global $product;

		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {

			$rating_html = wc_get_rating_html( $product->get_average_rating() );

			if($rating_html !== '') {
				print '</div>';
			}
		}
	}
}

if (!function_exists('mrseo_elated_woo_dropdown_cart_item_price')) {
	function mrseo_elated_woo_dropdown_cart_item_price($html, $cart_item, $cart_item_key){
		$new_html = '<div class="eltdf-item-price-holder">';

		$new_html .= '<span class="eltdf-item-quantity">'.$cart_item['quantity'].'</span>';
		$new_html .= '<span>x</span>';
		$new_html .= $html;

		$new_html .= '</div>';

		return $new_html;
	}
}