(function($) {
    'use strict';

    var woocommerce = {};
    eltdf.modules.woocommerce = woocommerce;

    woocommerce.eltdfOnDocumentReady = eltdfOnDocumentReady;
    woocommerce.eltdfOnWindowLoad = eltdfOnWindowLoad;
    woocommerce.eltdfOnWindowResize = eltdfOnWindowResize;
    woocommerce.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
        eltdfInitQuantityButtons();
        eltdfInitSelect2();
	    eltdfInitSingleProductImageSwitchLogic();
	    eltdfAddingToCartLabel();
	    eltdfInitSingleProductLightbox();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function eltdfOnWindowLoad() {
        eltdfInitProductListMasonryShortcode();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
        eltdfInitProductListMasonryShortcode();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdfOnWindowScroll() {}
    
    /*
    ** Init quantity buttons to increase/decrease products for cart
    */
    function eltdfInitQuantityButtons() {
			
        $(document).on( 'click', '.eltdf-quantity-minus, .eltdf-quantity-plus', function(e) {
            e.stopPropagation();

            var button = $(this),
                inputField = button.siblings('.eltdf-quantity-input'),
                step = parseFloat(inputField.data('step')),
                max = parseFloat(inputField.data('max')),
                minus = false,
                inputValue = parseFloat(inputField.val()),
                newInputValue;

            if (button.hasClass('eltdf-quantity-minus')) {
                minus = true;
            }

            if (minus) {
                newInputValue = inputValue - step;
                if (newInputValue >= 1) {
                    inputField.val(newInputValue);
                } else {
                    inputField.val(0);
                }
            } else {
                newInputValue = inputValue + step;
                if ( max === undefined ) {
                    inputField.val(newInputValue);
                } else {
                    if ( newInputValue >= max ) {
                        inputField.val(max);
                    } else {
                        inputField.val(newInputValue);
                    }
                }
            }

            inputField.trigger( 'change' );
        });
    }

    /*
    ** Init select2 script for select html dropdowns
    */
    function eltdfInitSelect2() {
    	var orderByDropDown = $('.woocommerce-ordering .orderby');
        if (orderByDropDown.length) {
	        orderByDropDown.select2({
                minimumResultsForSearch: Infinity
            });
        }

        var shippingCountryCalc = $('#calc_shipping_country');
        if(shippingCountryCalc.length) {
	        shippingCountryCalc.select2();
        }
	
	    var shippingStateCalc = $('.cart-collaterals .shipping select#calc_shipping_state');
	    if(shippingStateCalc.length) {
		    shippingStateCalc.select2();
	    }

		var variableProducts = $('.eltdf-woocommerce-page .eltdf-content .variations td.value select')
		if (variableProducts.length) {
			variableProducts.select2();
		}
    }
	
	/*
	 ** Init switch image logic for thumbnail and featured images on product single page
	 */
	function eltdfInitSingleProductImageSwitchLogic() {
		if(eltdf.body.hasClass('eltdf-woo-single-switch-image')){
			
			var thumbnailImage = $('.eltdf-woo-single-page .product .images .woocommerce-product-gallery__image > a'),
				featuredImage = $('.eltdf-woo-single-page .product .images .woocommerce-product-gallery__image:first-child > a');

			if(featuredImage.length) {
				featuredImage.on('click', function() {
					if($('div.pp_overlay').length) {
						$.prettyPhoto.close();
					}
					if(eltdf.body.hasClass('eltdf-disable-thumbnail-prettyphoto')){
						eltdf.body.removeClass('eltdf-disable-thumbnail-prettyphoto');
					}
					if(featuredImage.children('.eltdf-fake-featured-image').length){
						$('.eltdf-fake-featured-image').stop().animate({'opacity': '0'}, 300, function() {
							$(this).remove();
						});
					}
				});
			}
			
			if(thumbnailImage.length) {
				thumbnailImage.each(function(){
					var thisThumbnailImage = $(this),
						thisThumbnailImageSrc = thisThumbnailImage.attr('href');

					thisThumbnailImage.on('click', function(e) {
						e.preventDefault();
						
						if(thisThumbnailImageSrc !== '' && featuredImage !== '') {
							if (featuredImage.children('.eltdf-fake-featured-image').length) {
								$('.eltdf-fake-featured-image').remove();
							}
							featuredImage.append('<img itemprop="image" class="eltdf-fake-featured-image" src="' + thisThumbnailImageSrc + '" />');
						}
					});
				});
			}
		}
	}
		/*
	 ** Init Product Single Pretty Photo attributes
	 */
	function eltdfInitSingleProductLightbox() {
		var item = $('.eltdf-woo-single-page .eltdf-single-product-content .images .woocommerce-product-gallery__image');
		
		if(item.length && !eltdf.body.hasClass('eltdf-woo-single-switch-image')) {
			item.each(function() {
				var thisItem = $(this).children('a');
				
				thisItem.attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');
				
				if (typeof eltdf.modules.common.eltdfPrettyPhoto === "function") {
					eltdf.modules.common.eltdfPrettyPhoto();
				}
			});
		}
	}
	
	/*
	 ** Init Product List Masonry Shortcode Layout
	 */
	function eltdfInitProductListMasonryShortcode() {
		var container = $('.eltdf-pl-holder.eltdf-masonry-layout .eltdf-pl-outer');
		
		if(container.length) {
			container.each(function(){
				var thisContainer = $(this);
				
				thisContainer.waitForImages(function() {
					thisContainer.isotope({
						itemSelector: '.eltdf-pli',
						resizable: false,
						masonry: {
							columnWidth: '.eltdf-pl-sizer',
							gutter: '.eltdf-pl-gutter'
						}
					});
					
					thisContainer.isotope('layout');
					
					thisContainer.css('opacity', 1);
				});
			});
		}
	}

	/*
	** Adding To Cart label
	*/
	function eltdfAddingToCartLabel() {
		var addToCartBtn = $('.add_to_cart_button');

		if (addToCartBtn.length) {
			addToCartBtn.on('click', function(){
				$(this).text(eltdfGlobalVars.vars.eltdfAddingToCartLabel);
			});
		}
	}

})(jQuery);