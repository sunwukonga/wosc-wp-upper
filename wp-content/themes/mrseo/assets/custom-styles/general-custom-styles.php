<?php
if(!function_exists('mrseo_elated_design_styles')) {
    /**
     * Generates general custom styles
     */
    function mrseo_elated_design_styles() {
	    $font_family = mrseo_elated_options()->getOptionValue('google_fonts');
	    if (!empty($font_family) && mrseo_elated_is_font_option_valid($font_family)){
		    echo mrseo_elated_dynamic_css('body', array('font-family' => mrseo_elated_get_font_option_val($font_family)));
		}

		$second_font_family = mrseo_elated_options()->getOptionValue('second_google_fonts');
	    if (!empty($second_font_family) && mrseo_elated_is_font_option_valid($second_font_family)){
	    	$second_font_selector = array(
	    		'h1',
				'h2',
				'h3',
				'h4',
				'h5',
				'h6',
				'blockquote',
				'.eltdf-blog-holder.eltdf-blog-masonry article.format-quote .eltdf-quote-mark',
				'.eltdf-blog-holder.eltdf-blog-split-column article.format-quote .eltdf-quote-mark',
				'.eltdf-blog-holder.eltdf-blog-standard-date-on-side article.format-quote .eltdf-quote-mark',
				'.eltdf-blog-holder.eltdf-blog-standard article.format-quote .eltdf-quote-mark',
				'.eltdf-blog-holder.eltdf-blog-single.eltdf-blog-single-standard article.format-quote .eltdf-quote-mark',
				'.eltdf-countdown .countdown-row .countdown-section .countdown-amount',
				'.eltdf-countdown .countdown-row .countdown-section .countdown-period',
				'.eltdf-counter-holder .eltdf-counter',
				'.eltdf-pie-chart-holder .eltdf-pc-percentage .eltdf-pc-percent',
				'.eltdf-price-table .eltdf-pt-inner ul li.eltdf-pt-prices',
				'.eltdf-processes-holder .eltdf-process-inner-text',
				'.eltdf-ps-navigation .eltdf-ps-prev .eltdf-portfolio-navigation-info',
				'.eltdf-ps-navigation .eltdf-ps-next .eltdf-portfolio-navigation-info'
    		);

		    echo mrseo_elated_dynamic_css($second_font_selector, array('font-family' => mrseo_elated_get_font_option_val($second_font_family)));
		}

		$first_main_color = mrseo_elated_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
            	'a:hover',
				'h1 a:hover',
				'h2 a:hover',
				'h3 a:hover',
				'h4 a:hover',
				'h5 a:hover',
				'h6 a:hover',
				'p a:hover',
				'.eltdf-comment-holder .eltdf-comment-text .comment-edit-link:hover',
				'.eltdf-comment-holder .eltdf-comment-text .comment-reply-link:hover',
				'.eltdf-comment-holder .eltdf-comment-text .replay:hover',
				'.eltdf-comment-holder .eltdf-comment-text #cancel-comment-reply-link',
				'.eltdf-owl-slider .owl-nav .owl-next:hover .eltdf-next-icon',
				'.eltdf-owl-slider .owl-nav .owl-next:hover .eltdf-prev-icon',
				'.eltdf-owl-slider .owl-nav .owl-prev:hover .eltdf-next-icon',
				'.eltdf-owl-slider .owl-nav .owl-prev:hover .eltdf-prev-icon',
				'.eltdf-side-menu-button-opener.opened',
				'.eltdf-side-menu-button-opener:hover',
				'.eltdf-side-menu a.eltdf-close-side-menu:hover',
				'.eltdf-search-opener:hover',
				'.eltdf-search-page-holder .eltdf-search-page-form .eltdf-form-holder .eltdf-search-submit:hover',
				'.eltdf-search-page-holder article.sticky .eltdf-post-title-area h3 a',
				'.eltdf-search-cover .eltdf-search-close a:hover',
				'.eltdf-blog-holder article.sticky .eltdf-post-title a',
				'.eltdf-blog-holder.eltdf-blog-narrow article .eltdf-post-info.eltdf-section-bottom .eltdf-blog-like:hover i:first-child',
				'.eltdf-blog-holder.eltdf-blog-narrow article .eltdf-post-info.eltdf-section-bottom .eltdf-blog-like:hover span:first-child',
				'.eltdf-blog-holder.eltdf-blog-narrow article .eltdf-post-info.eltdf-section-bottom .eltdf-post-info-comments-holder:hover span:first-child',
				'.eltdf-blog-holder.eltdf-blog-standard-date-on-side article .eltdf-post-date-inner .eltdf-post-date-day',
				'.eltdf-blog-holder.eltdf-blog-standard-date-on-side article .eltdf-post-date-inner .eltdf-post-date-month',
				'.eltdf-blog-holder.eltdf-blog-standard-date-on-side article .eltdf-post-title a:hover',
				'.eltdf-blog-holder.eltdf-blog-standard-date-on-side article .eltdf-post-info>div a:hover',
				'.eltdf-blog-holder.eltdf-blog-standard-date-on-side article.format-quote .eltdf-quote-author',
				'.eltdf-author-description .eltdf-author-description-text-holder .eltdf-author-name a:hover',
				'.eltdf-author-description .eltdf-author-description-text-holder .eltdf-author-social-icons a:hover',
				'.eltdf-bl-standard-pagination ul li.eltdf-bl-pag-active a',
				'.eltdf-blog-pagination ul li a.eltdf-pag-active',
				'.eltdf-blog-single-navigation .eltdf-blog-single-next:hover .eltdf-blog-single-nav-title',
				'.eltdf-blog-single-navigation .eltdf-blog-single-prev:hover .eltdf-blog-single-nav-title',
				'footer .widget.widget_text a:hover',
				'footer .widget ul li a:hover',
				'footer .widget.widget_archive ul li a:hover',
				'footer .widget.widget_categories ul li a:hover',
				'footer .widget.widget_meta ul li a:hover',
				'footer .widget.widget_nav_menu ul li a:hover',
				'footer .widget.widget_pages ul li a:hover',
				'footer .widget.widget_recent_entries ul li a:hover',
				'footer .widget #wp-calendar tfoot a:hover',
				'footer .widget.widget_tag_cloud a:hover',
				'.eltdf-side-menu .widget.widget_text a:hover',
				'.eltdf-side-menu .widget ul li a:hover',
				'.eltdf-side-menu .widget.widget_archive ul li a:hover',
				'.eltdf-side-menu .widget.widget_categories ul li a:hover',
				'.eltdf-side-menu .widget.widget_meta ul li a:hover',
				'.eltdf-side-menu .widget.widget_nav_menu ul li a:hover',
				'.eltdf-side-menu .widget.widget_pages ul li a:hover',
				'.eltdf-side-menu .widget.widget_recent_entries ul li a:hover',
				'.eltdf-side-menu .widget #wp-calendar tfoot a:hover',
				'.eltdf-side-menu .widget.widget_tag_cloud a:hover',
				'.wpb_widgetised_column .widget ul li a:hover',
				'aside.eltdf-sidebar .widget ul li a:hover',
				'.wpb_widgetised_column .widget.widget_archive ul li a:hover',
				'.wpb_widgetised_column .widget.widget_categories ul li a:hover',
				'.wpb_widgetised_column .widget.widget_meta ul li a:hover',
				'.wpb_widgetised_column .widget.widget_nav_menu ul li a:hover',
				'.wpb_widgetised_column .widget.widget_pages ul li a:hover',
				'.wpb_widgetised_column .widget.widget_recent_entries ul li a:hover',
				'aside.eltdf-sidebar .widget.widget_archive ul li a:hover',
				'aside.eltdf-sidebar .widget.widget_categories ul li a:hover',
				'aside.eltdf-sidebar .widget.widget_meta ul li a:hover',
				'aside.eltdf-sidebar .widget.widget_nav_menu ul li a:hover',
				'aside.eltdf-sidebar .widget.widget_pages ul li a:hover',
				'aside.eltdf-sidebar .widget.widget_recent_entries ul li a:hover',
				'.wpb_widgetised_column .widget #wp-calendar tfoot a:hover',
				'aside.eltdf-sidebar .widget #wp-calendar tfoot a:hover',
				'.wpb_widgetised_column .widget.widget_tag_cloud a:hover',
				'aside.eltdf-sidebar .widget.widget_tag_cloud a:hover',
				'.wpb_widgetised_column .widget.widget_text a:hover',
				'aside.eltdf-sidebar .widget.widget_text a:hover',
				'.widget.eltdf-blog-list-widget .eltdf-post-title a:hover',
				'.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget li .eltdf-tweet-text a:hover',
				'.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-standard li .eltdf-twitter-icon',
				'.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-slider li .eltdf-twitter-icon i',
				'.eltdf-main-menu ul li a:hover',
				'.eltdf-drop-down .second .inner ul li.current-menu-ancestor>a',
				'.eltdf-drop-down .second .inner ul li.current-menu-item>a',
				'.eltdf-drop-down .wide .second .inner>ul>li.current-menu-item>a',
				'nav.eltdf-fullscreen-menu ul li ul li.current-menu-ancestor>a',
				'nav.eltdf-fullscreen-menu ul li ul li.current-menu-item>a',
				'nav.eltdf-fullscreen-menu>ul>li.eltdf-active-item>a',
				'.eltdf-header-vertical .eltdf-vertical-menu ul li a:hover',
				'.eltdf-header-vertical .eltdf-vertical-menu ul li.current-menu-ancestor>a',
				'.eltdf-header-vertical .eltdf-vertical-menu ul li.current-menu-item>a',
				'.eltdf-header-vertical .eltdf-vertical-menu ul li.current_page_item>a',
				'.eltdf-header-vertical .eltdf-vertical-menu ul li.eltdf-active-item>a',
				'.eltdf-mobile-header .eltdf-mobile-menu-opener.eltdf-mobile-menu-opened a',
				'.eltdf-mobile-header .eltdf-mobile-nav .eltdf-grid>ul>li.eltdf-active-item>a',
				'.eltdf-mobile-header .eltdf-mobile-nav ul li a:hover',
				'.eltdf-mobile-header .eltdf-mobile-nav ul li h5:hover',
				'.eltdf-mobile-header .eltdf-mobile-nav ul ul li.current-menu-ancestor>a',
				'.eltdf-mobile-header .eltdf-mobile-nav ul ul li.current-menu-item>a',
				'.eltdf-btn.eltdf-btn-outline',
				'.eltdf-icon-shortcode.eltdf-circle .eltdf-icon-element',
				'.eltdf-icon-shortcode.eltdf-dropcaps.eltdf-circle .eltdf-icon-element',
				'.eltdf-icon-shortcode.eltdf-square .eltdf-icon-element',
				'.eltdf-info-box-holder .eltdf-ib-icon',
				'.eltdf-social-share-holder.eltdf-dropdown .eltdf-social-share-dropdown-opener:hover',
				'.eltdf-pl-filter-holder ul li.eltdf-pl-current span',
				'.eltdf-pl-filter-holder ul li:hover span',
				'.eltdf-pl-standard-pagination ul li.eltdf-pl-pag-active a',
				'.eltdf-portfolio-list-holder.eltdf-pl-gallery-overlay article .eltdf-pli-text .eltdf-pli-category-holder a:hover',
				'.eltdf-ps-navigation .eltdf-ps-next a:hover .eltdf-portfolio-navigation-info',
				'.eltdf-ps-navigation .eltdf-ps-next a:hover i',
				'.eltdf-ps-navigation .eltdf-ps-prev a:hover .eltdf-portfolio-navigation-info',
				'.eltdf-ps-navigation .eltdf-ps-prev a:hover i',
				'.eltdf-team .eltdf-icon-shortcode a:hover',
				'.eltdf-team-single-holder .eltdf-icon-shortcode a:hover',
            );

            $woo_color_selector = array();
            if(mrseo_elated_is_woocommerce_installed()) {
                $woo_color_selector = array(
					'.eltdf-woocommerce-page .woocommerce-error>a',
					'.eltdf-woocommerce-page .woocommerce-info>a',
					'.eltdf-woocommerce-page .woocommerce-message>a',
					'.eltdf-woocommerce-page .woocommerce-info .showcoupon',
					'.woocommerce-page .eltdf-content .eltdf-quantity-buttons .eltdf-quantity-minus:hover',
					'.woocommerce-page .eltdf-content .eltdf-quantity-buttons .eltdf-quantity-plus:hover',
					'div.woocommerce .eltdf-quantity-buttons .eltdf-quantity-minus:hover',
					'div.woocommerce .eltdf-quantity-buttons .eltdf-quantity-plus:hover',
					'.woocommerce .star-rating span:before',
					'.eltdf-woo-single-page .eltdf-single-product-summary .product_meta>span a:hover',
					'.eltdf-shopping-cart-holder:hover .eltdf-header-cart',
					'.eltdf-light-header .eltdf-page-header>div:not(.eltdf-sticky-header):not(.fixed) .eltdf-shopping-cart-holder .eltdf-header-cart .eltdf-cart-info .eltdf-cart-info-number',
					'.eltdf-shopping-cart-dropdown .eltdf-item-info-holder .remove:hover',
					'.widget.woocommerce.widget_layered_nav ul li.chosen a',
					'.widget.woocommerce.widget_price_filter .price_slider_amount .button:hover',
					'.widget.woocommerce.widget_products ul li a:hover',
					'.widget.woocommerce.widget_recent_reviews ul li a:hover',
					'.widget.woocommerce.widget_recently_viewed_products ul li a:hover',
					'.widget.woocommerce.widget_top_rated_products ul li a:hover',
					'.widget.woocommerce.widget_product_tag_cloud .tagcloud a:hover',
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
				'.eltdf-blog-slider-holder .eltdf-blog-slider-item .eltdf-section-button-holder a:hover',
				'.eltdf-fullscreen-menu-opener.eltdf-fm-opened',
				'.eltdf-fullscreen-menu-opener:hover',
				'.eltdf-btn.eltdf-btn-simple:not(.eltdf-btn-custom-hover-color):not(.eltdf-btn-hover-unveiling):hover',
	        );

            $background_color_selector = array(
				'.eltdf-st-loader .pulse',
				'.eltdf-st-loader .double_pulse .double-bounce1',
				'.eltdf-st-loader .double_pulse .double-bounce2',
				'.eltdf-st-loader .cube',
				'.eltdf-st-loader .rotating_cubes .cube1',
				'.eltdf-st-loader .rotating_cubes .cube2',
				'.eltdf-st-loader .stripes>div',
				'.eltdf-st-loader .wave>div',
				'.eltdf-st-loader .two_rotating_circles .dot1',
				'.eltdf-st-loader .two_rotating_circles .dot2',
				'.eltdf-st-loader .five_rotating_circles .container1>div',
				'.eltdf-st-loader .five_rotating_circles .container2>div',
				'.eltdf-st-loader .five_rotating_circles .container3>div',
				'.eltdf-st-loader .atom .ball-1:before',
				'.eltdf-st-loader .atom .ball-2:before',
				'.eltdf-st-loader .atom .ball-3:before',
				'.eltdf-st-loader .atom .ball-4:before',
				'.eltdf-st-loader .clock .ball:before',
				'.eltdf-st-loader .mitosis .ball',
				'.eltdf-st-loader .lines .line1',
				'.eltdf-st-loader .lines .line2',
				'.eltdf-st-loader .lines .line3',
				'.eltdf-st-loader .lines .line4',
				'.eltdf-st-loader .fussion .ball',
				'.eltdf-st-loader .fussion .ball-1',
				'.eltdf-st-loader .fussion .ball-2',
				'.eltdf-st-loader .fussion .ball-3',
				'.eltdf-st-loader .fussion .ball-4',
				'.eltdf-st-loader .wave_circles .ball',
				'.eltdf-st-loader .pulse_circles .ball',
				'#submit_comment',
				'.post-password-form input[type=submit]',
				'input.wpcf7-form-control.wpcf7-submit',
				'#eltdf-back-to-top>span',
				'.eltdf-page-footer .eltdf-footer-top-holder .widget .eltdf-widget-title-holder .eltdf-widget-title:after',
				'.eltdf-blog-list-holder.eltdf-bl-standard .eltdf-bli-info-top .eltdf-post-info-date',
				'footer .widget.widget_search .input-holder button',
				'.eltdf-side-menu .widget.widget_search .input-holder button',
				'.eltdf-side-menu .widget .eltdf-widget-title-holder .eltdf-widget-title:after',
				'.wpb_widgetised_column .widget.widget_search .input-holder button',
				'aside.eltdf-sidebar .widget.widget_search .input-holder button',
				'.eltdf-main-menu>ul>li>a:after',
				'.eltdf-accordion-holder.eltdf-ac-boxed .eltdf-title-holder.ui-state-active',
				'.eltdf-accordion-holder.eltdf-ac-boxed .eltdf-title-holder.ui-state-hover',
				'.eltdf-btn.eltdf-btn-solid',
				'.eltdf-info-box-holder.eltdf-ib-light .eltdf-ib-color-holder',
				'.eltdf-progress-bar .eltdf-pb-content-holder .eltdf-pb-content',
				'.eltdf-tabs.eltdf-tabs-standard .eltdf-tabs-nav li.ui-state-active a',
				'.eltdf-tabs.eltdf-tabs-standard .eltdf-tabs-nav li.ui-state-hover a',
				'.eltdf-tabs.eltdf-tabs-vertical .eltdf-tabs-nav li.ui-state-active a',
				'.eltdf-tabs.eltdf-tabs-vertical .eltdf-tabs-nav li.ui-state-hover a',
				'.eltdf-timeline-holder .eltdf-timeline-item.eltdf-link-hovered .eltdf-timeline-line.eltdf-colored',
				'.eltdf-team-modal-holder .eltdf-close',
				'.eltdf-team-modal-holder .eltdf-team-title-holder',
				'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-default-skin .added_to_cart',
				'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-default-skin .button',
				'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-light-skin .added_to_cart:hover',
				'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-light-skin .button:hover',
				'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-dark-skin .added_to_cart:hover',
				'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-add-to-cart.eltdf-dark-skin .button:hover',
				'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-default-skin .added_to_cart',
				'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-default-skin .button',
				'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-light-skin .added_to_cart:hover',
				'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-light-skin .button:hover',
				'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-dark-skin .added_to_cart:hover',
				'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-dark-skin .button:hover',
            );

            $woo_background_color_selector = array();
            if(mrseo_elated_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
					'.woocommerce-page .eltdf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'.woocommerce-page .eltdf-content a.added_to_cart',
					'.woocommerce-page .eltdf-content a.button',
					'.woocommerce-page .eltdf-content button[type=submit]',
					'.woocommerce-page .eltdf-content input[type=submit]',
					'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'div.woocommerce a.added_to_cart',
					'div.woocommerce a.button',
					'div.woocommerce button[type=submit]',
					'div.woocommerce input[type=submit]',
					'.eltdf-woo-single-page .woocommerce-tabs ul.tabs>li.active',
					'.eltdf-woo-single-page .woocommerce-tabs ul.tabs>li:hover',
					'.eltdf-shopping-cart-dropdown .eltdf-cart-bottom .eltdf-checkout',
					'.eltdf-shopping-cart-dropdown .eltdf-cart-bottom .eltdf-view-cart',
					'.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle',
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            $background_color_important_selector = array(            	
				'.eltdf-btn.eltdf-btn-solid-dark:not(.eltdf-btn-custom-hover-bg):hover',
				'.eltdf-btn.eltdf-btn-outline:not(.eltdf-btn-custom-hover-bg):hover',
        	);

            $border_color_selector = array(
				'.eltdf-st-loader .pulse_circles .ball',
				'#eltdf-back-to-top>span',
				'footer .widget.widget_search .input-holder input.search-field:focus',
				'.eltdf-side-menu .widget.widget_search .input-holder input.search-field:focus',
				'.wpb_widgetised_column .widget.widget_search .input-holder input.search-field:focus',
				'aside.eltdf-sidebar .widget.widget_search .input-holder input.search-field:focus',
				'.eltdf-btn.eltdf-btn-outline',
				'.eltdf-processes-holder .eltdf-process-content-wrapper .eltdf-process-content-wrapper-inner:after',
            );

            $border_color_important_selector = array(
            	'.eltdf-btn.eltdf-btn-outline:not(.eltdf-btn-custom-border-hover):hover',
        	);

        	$border_right_color_selector = array(
        		'.woocommerce .eltdf-onsale:before,.woocommerce .eltdf-out-of-stock:before',
        		'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-image-outer .eltdf-plc-image .eltdf-plc-onsale:before',
				'.eltdf-plc-holder .eltdf-plc-item .eltdf-plc-image-outer .eltdf-plc-image .eltdf-plc-out-of-stock:before',
				'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-image .eltdf-pli-onsale:before',
				'.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-image .eltdf-pli-out-of-stock:before'
    		);

            echo mrseo_elated_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo mrseo_elated_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo mrseo_elated_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo mrseo_elated_dynamic_css($background_color_important_selector, array('background-color' => $first_main_color.'!important'));
	        echo mrseo_elated_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
	        echo mrseo_elated_dynamic_css($border_color_important_selector, array('border-color' => $first_main_color.'!important'));
	        echo mrseo_elated_dynamic_css($border_right_color_selector, array('border-right-color' => $first_main_color));
        }

        $page_background_color = mrseo_elated_options()->getOptionValue('page_background_color');
		if (!empty($page_background_color)) {
			$background_color_selector = array(
				'.eltdf-wrapper-inner',
				'.eltdf-content'
			);
			echo mrseo_elated_dynamic_css($background_color_selector, array('background-color' => $page_background_color));
		}

		$selection_color = mrseo_elated_options()->getOptionValue('selection_color');
		if (!empty($selection_color)) {
			echo mrseo_elated_dynamic_css('::selection', array('background' => $selection_color));
			echo mrseo_elated_dynamic_css('::-moz-selection', array('background' => $selection_color));
		}

        $paspartu_style = array();
	    $paspartu_color = mrseo_elated_options()->getOptionValue('paspartu_color');
        if (!empty($paspartu_color)) {
            $paspartu_style['background-color'] = $paspartu_color;
        }
	
	    $paspartu_width = mrseo_elated_options()->getOptionValue('paspartu_width');
        if ($paspartu_width !== '') {
            $paspartu_style['padding'] = $paspartu_width.'%';
        }

        echo mrseo_elated_dynamic_css('.eltdf-paspartu-enabled .eltdf-wrapper', $paspartu_style);
    }

    add_action('mrseo_elated_style_dynamic', 'mrseo_elated_design_styles');
}

if(!function_exists('mrseo_elated_content_styles')) {
    /**
     * Generates content custom styles
     */
    function mrseo_elated_content_styles() {
        $content_style = array();
	    
	    $padding_top = mrseo_elated_options()->getOptionValue('content_top_padding');
	    if ($padding_top !== '') {
            $content_style['padding-top'] = mrseo_elated_filter_px($padding_top).'px';
        }

        $content_selector = array(
            '.eltdf-content .eltdf-content-inner > .eltdf-full-width > .eltdf-full-width-inner',
        );

        echo mrseo_elated_dynamic_css($content_selector, $content_style);

        $content_style_in_grid = array();
	    
	    $padding_top_in_grid = mrseo_elated_options()->getOptionValue('content_top_padding_in_grid');
	    if ($padding_top_in_grid !== '') {
            $content_style_in_grid['padding-top'] = mrseo_elated_filter_px($padding_top_in_grid).'px';
        }

        $content_selector_in_grid = array(
            '.eltdf-content .eltdf-content-inner > .eltdf-container > .eltdf-container-inner',
        );

        echo mrseo_elated_dynamic_css($content_selector_in_grid, $content_style_in_grid);
    }

    add_action('mrseo_elated_style_dynamic', 'mrseo_elated_content_styles');
}

if (!function_exists('mrseo_elated_h1_styles')) {

    function mrseo_elated_h1_styles() {
	    $margin_top = mrseo_elated_options()->getOptionValue('h1_margin_top');
	    $margin_bottom = mrseo_elated_options()->getOptionValue('h1_margin_bottom');
	    
	    $item_styles = mrseo_elated_get_typography_styles('h1');
	    
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = mrseo_elated_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = mrseo_elated_filter_px($margin_bottom).'px';
	    }
	    
	    $item_selector = array(
		    'h1'
	    );
	
	    echo mrseo_elated_dynamic_css($item_selector, $item_styles);
    }

    add_action('mrseo_elated_style_dynamic', 'mrseo_elated_h1_styles');
}

if (!function_exists('mrseo_elated_h2_styles')) {

    function mrseo_elated_h2_styles() {
	    $margin_top = mrseo_elated_options()->getOptionValue('h2_margin_top');
	    $margin_bottom = mrseo_elated_options()->getOptionValue('h2_margin_bottom');
	
	    $item_styles = mrseo_elated_get_typography_styles('h2');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = mrseo_elated_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = mrseo_elated_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h2'
	    );
	
	    echo mrseo_elated_dynamic_css($item_selector, $item_styles);
    }

    add_action('mrseo_elated_style_dynamic', 'mrseo_elated_h2_styles');
}

if (!function_exists('mrseo_elated_h3_styles')) {

    function mrseo_elated_h3_styles() {
	    $margin_top = mrseo_elated_options()->getOptionValue('h3_margin_top');
	    $margin_bottom = mrseo_elated_options()->getOptionValue('h3_margin_bottom');
	
	    $item_styles = mrseo_elated_get_typography_styles('h3');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = mrseo_elated_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = mrseo_elated_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h3'
	    );
	
	    echo mrseo_elated_dynamic_css($item_selector, $item_styles);
    }

    add_action('mrseo_elated_style_dynamic', 'mrseo_elated_h3_styles');
}

if (!function_exists('mrseo_elated_h4_styles')) {

    function mrseo_elated_h4_styles() {
	    $margin_top = mrseo_elated_options()->getOptionValue('h4_margin_top');
	    $margin_bottom = mrseo_elated_options()->getOptionValue('h4_margin_bottom');
	
	    $item_styles = mrseo_elated_get_typography_styles('h4');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = mrseo_elated_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = mrseo_elated_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h4'
	    );
	
	    echo mrseo_elated_dynamic_css($item_selector, $item_styles);
    }

    add_action('mrseo_elated_style_dynamic', 'mrseo_elated_h4_styles');
}

if (!function_exists('mrseo_elated_h5_styles')) {

    function mrseo_elated_h5_styles() {
	    $margin_top = mrseo_elated_options()->getOptionValue('h5_margin_top');
	    $margin_bottom = mrseo_elated_options()->getOptionValue('h5_margin_bottom');
	
	    $item_styles = mrseo_elated_get_typography_styles('h5');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = mrseo_elated_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = mrseo_elated_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h5'
	    );
	
	    echo mrseo_elated_dynamic_css($item_selector, $item_styles);
    }

    add_action('mrseo_elated_style_dynamic', 'mrseo_elated_h5_styles');
}

if (!function_exists('mrseo_elated_h6_styles')) {

    function mrseo_elated_h6_styles() {
	    $margin_top = mrseo_elated_options()->getOptionValue('h6_margin_top');
	    $margin_bottom = mrseo_elated_options()->getOptionValue('h6_margin_bottom');
	
	    $item_styles = mrseo_elated_get_typography_styles('h6');
	
	    if($margin_top !== '') {
		    $item_styles['margin-top'] = mrseo_elated_filter_px($margin_top).'px';
	    }
	    if($margin_bottom !== '') {
		    $item_styles['margin-bottom'] = mrseo_elated_filter_px($margin_bottom).'px';
	    }
	
	    $item_selector = array(
		    'h6'
	    );
	
	    echo mrseo_elated_dynamic_css($item_selector, $item_styles);
    }

    add_action('mrseo_elated_style_dynamic', 'mrseo_elated_h6_styles');
}

if (!function_exists('mrseo_elated_text_styles')) {

    function mrseo_elated_text_styles() {
	    $item_styles = mrseo_elated_get_typography_styles('text');
	
	    $item_selector = array(
		    'p'
	    );
	
	    echo mrseo_elated_dynamic_css($item_selector, $item_styles);
    }

    add_action('mrseo_elated_style_dynamic', 'mrseo_elated_text_styles');
}

if (!function_exists('mrseo_elated_link_styles')) {

    function mrseo_elated_link_styles() {
        $link_styles = array();

        if(mrseo_elated_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = mrseo_elated_options()->getOptionValue('link_color');
        }
        if(mrseo_elated_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = mrseo_elated_options()->getOptionValue('link_fontstyle');
        }
        if(mrseo_elated_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = mrseo_elated_options()->getOptionValue('link_fontweight');
        }
        if(mrseo_elated_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = mrseo_elated_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo mrseo_elated_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('mrseo_elated_style_dynamic', 'mrseo_elated_link_styles');
}

if (!function_exists('mrseo_elated_link_hover_styles')) {

    function mrseo_elated_link_hover_styles() {
        $link_hover_styles = array();

        if(mrseo_elated_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = mrseo_elated_options()->getOptionValue('link_hovercolor');
        }
        if(mrseo_elated_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = mrseo_elated_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo mrseo_elated_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if(mrseo_elated_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = mrseo_elated_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo mrseo_elated_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('mrseo_elated_style_dynamic', 'mrseo_elated_link_hover_styles');
}

if (!function_exists('mrseo_elated_smooth_page_transition_styles')) {

    function mrseo_elated_smooth_page_transition_styles($style) {
        $id = mrseo_elated_get_page_id();
    	$loader_style = array();
		$current_style = '';

        if(mrseo_elated_get_meta_field_intersect('smooth_pt_bgnd_color',$id) !== '') {
            $loader_style['background-color'] = mrseo_elated_get_meta_field_intersect('smooth_pt_bgnd_color',$id);
        }

        $loader_selector = array('.eltdf-smooth-transition-loader');

        if (!empty($loader_style)) {
			$current_style .= mrseo_elated_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();

        if(mrseo_elated_get_meta_field_intersect('smooth_pt_spinner_color',$id) !== '') {
            $spinner_style['background-color'] = mrseo_elated_get_meta_field_intersect('smooth_pt_spinner_color',$id);
        }

        $spinner_selectors = array(
            '.eltdf-st-loader .eltdf-rotate-circles > div',
            '.eltdf-st-loader .pulse',
            '.eltdf-st-loader .double_pulse .double-bounce1',
            '.eltdf-st-loader .double_pulse .double-bounce2',
            '.eltdf-st-loader .cube',
            '.eltdf-st-loader .rotating_cubes .cube1',
            '.eltdf-st-loader .rotating_cubes .cube2',
            '.eltdf-st-loader .stripes > div',
            '.eltdf-st-loader .wave > div',
            '.eltdf-st-loader .two_rotating_circles .dot1',
            '.eltdf-st-loader .two_rotating_circles .dot2',
            '.eltdf-st-loader .five_rotating_circles .container1 > div',
            '.eltdf-st-loader .five_rotating_circles .container2 > div',
            '.eltdf-st-loader .five_rotating_circles .container3 > div',
            '.eltdf-st-loader .atom .ball-1:before',
            '.eltdf-st-loader .atom .ball-2:before',
            '.eltdf-st-loader .atom .ball-3:before',
            '.eltdf-st-loader .atom .ball-4:before',
            '.eltdf-st-loader .clock .ball:before',
            '.eltdf-st-loader .mitosis .ball',
            '.eltdf-st-loader .lines .line1',
            '.eltdf-st-loader .lines .line2',
            '.eltdf-st-loader .lines .line3',
            '.eltdf-st-loader .lines .line4',
            '.eltdf-st-loader .fussion .ball',
            '.eltdf-st-loader .fussion .ball-1',
            '.eltdf-st-loader .fussion .ball-2',
            '.eltdf-st-loader .fussion .ball-3',
            '.eltdf-st-loader .fussion .ball-4',
            '.eltdf-st-loader .wave_circles .ball',
            '.eltdf-st-loader .pulse_circles .ball'
        );

        if (!empty($spinner_style)) {
			$current_style .= mrseo_elated_dynamic_css($spinner_selectors, $spinner_style);
        }

		$current_style = $current_style . $style;

		return $current_style;
    }

    add_filter('mrseo_elated_add_page_custom_style', 'mrseo_elated_smooth_page_transition_styles');
}