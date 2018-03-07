(function($) {
	"use strict";

    var common = {};
    eltdf.modules.common = common;

    common.eltdfFluidVideo = eltdfFluidVideo;
    common.eltdfEnableScroll = eltdfEnableScroll;
    common.eltdfDisableScroll = eltdfDisableScroll;
    common.eltdfOwlSlider = eltdfOwlSlider;
    common.eltdfInitSelfHostedVideoPlayer = eltdfInitSelfHostedVideoPlayer;
    common.eltdfSelfHostedVideoSize = eltdfSelfHostedVideoSize;
    common.getLoadMoreData = getLoadMoreData;
    common.setLoadMoreAjaxData = setLoadMoreAjaxData;
	common.eltdfEnableSidebarBckg = eltdfEnableSidebarBckg;
    common.eltdfOnDocumentReady = eltdfOnDocumentReady;
    common.eltdfOnWindowLoad = eltdfOnWindowLoad;
    common.eltdfOnWindowResize = eltdfOnWindowResize;
    common.eltdfOnWindowScroll = eltdfOnWindowScroll;
    common.eltdfRequestAnimationFrame = eltdfRequestAnimationFrame;
    common.eltdfPrettyPhoto = eltdfPrettyPhoto;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
	    eltdfIconWithHover().init();
	    eltdfIEversion();
	    eltdfDisableSmoothScrollForMac();
	    eltdfInitAnchor().init();
	    eltdfInitBackToTop();
	    eltdfBackButtonShowHide();
	    eltdfInitSelfHostedVideoPlayer();
	    eltdfSelfHostedVideoSize();
	    eltdfFluidVideo();
	    eltdfOwlSlider();
	    eltdfPreloadBackgrounds();
	    eltdfPrettyPhoto();
		eltdfEnableSidebarBckg();
		eltdfInitSingleProductLightbox();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function eltdfOnWindowLoad() {
        eltdfSmoothTransition();
		eltdfEnableSidebarBckg();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
        eltdfSelfHostedVideoSize();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdfOnWindowScroll() {
        
    }
	
	/*
	 * IE version
	 */
	function eltdfIEversion() {
		var ua = window.navigator.userAgent;
		var msie = ua.indexOf("MSIE ");
		
		if (msie > 0) {
			var version = parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)));
			eltdf.body.addClass('eltdf-ms-ie'+version);
		}
		return false;
	}
	
	/*
	 ** Disable smooth scroll for mac if smooth scroll is enabled
	 */
	function eltdfDisableSmoothScrollForMac() {
		var os = navigator.appVersion.toLowerCase();
		
		if (os.indexOf('mac') > -1 && eltdf.body.hasClass('eltdf-smooth-scroll')) {
			eltdf.body.removeClass('eltdf-smooth-scroll');
		}
	}
	
	function eltdfDisableScroll() {
		if (window.addEventListener) {
			window.addEventListener('DOMMouseScroll', eltdfWheel, false);
		}
		
		window.onmousewheel = document.onmousewheel = eltdfWheel;
		document.onkeydown = eltdfKeydown;
	}
	
	function eltdfEnableScroll() {
		if (window.removeEventListener) {
			window.removeEventListener('DOMMouseScroll', eltdfWheel, false);
		}
		
		window.onmousewheel = document.onmousewheel = document.onkeydown = null;
	}
	
	function eltdfWheel(e) {
		eltdfPreventDefaultValue(e);
	}
	
	function eltdfKeydown(e) {
		var keys = [37, 38, 39, 40];
		
		for (var i = keys.length; i--;) {
			if (e.keyCode === keys[i]) {
				eltdfPreventDefaultValue(e);
				return;
			}
		}
	}

	function eltdfEnableSidebarBckg(){

		if($('.eltdf-content').find('.eltdf-sidebar').length){
			eltdf.body.addClass('eltdf-sidebar-enabled');
		}
	}
	
	function eltdfPreventDefaultValue(e) {
		e = e || window.event;
		if (e.preventDefault) {
			e.preventDefault();
		}
		e.returnValue = false;
	}
	/*
	 **	WooCommerce single product lightbox functionality
	 */
	function eltdfInitSingleProductLightbox(){
		var item = jQuery('.eltdf-single-product-content .woocommerce-product-gallery__image');

		 if (item.length) {
		     item.children('a').attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');

		     if (typeof eltdf.modules.common.eltdfPrettyPhoto === "function") {
		         eltdf.modules.common.eltdfPrettyPhoto();
		     }
		 }
	}
	/*
	 **	Anchor functionality
	 */
	var eltdfInitAnchor = function() {
		/**
		 * Set active state on clicked anchor
		 * @param anchor, clicked anchor
		 */
		var setActiveState = function(anchor){
			
			$('.eltdf-main-menu .eltdf-active-item, .eltdf-mobile-nav .eltdf-active-item, .eltdf-fullscreen-menu .eltdf-active-item').removeClass('eltdf-active-item');
			anchor.parent().addClass('eltdf-active-item');
			
			$('.eltdf-main-menu a, .eltdf-mobile-nav a, .eltdf-fullscreen-menu a').removeClass('current');
			anchor.addClass('current');
		};
		
		/**
		 * Check anchor active state on scroll
		 */
		var checkActiveStateOnScroll = function(){
			
			$('[data-eltdf-anchor]').waypoint( function(direction) {
				if(direction === 'down') {
					setActiveState($("a[href='"+window.location.href.split('#')[0]+"#"+$(this.element).data("eltdf-anchor")+"']"));
				}
			}, { offset: '50%' });
			
			$('[data-eltdf-anchor]').waypoint( function(direction) {
				if(direction === 'up') {
					setActiveState($("a[href='"+window.location.href.split('#')[0]+"#"+$(this.element).data("eltdf-anchor")+"']"));
				}
			}, { offset: function(){
				return -($(this.element).outerHeight() - 150);
			} });
			
		};
		
		/**
		 * Check anchor active state on load
		 */
		var checkActiveStateOnLoad = function(){
			var hash = window.location.hash.split('#')[1];
			
			if(hash !== "" && $('[data-eltdf-anchor="'+hash+'"]').length > 0){
				anchorClickOnLoad(hash);
			}
		};
		
		/**
		 * Handle anchor on load
		 */
		var anchorClickOnLoad = function($this) {
			var scrollAmount;
			var anchor = $('a');
			var hash = $this;
			if(hash !== "" && $('[data-eltdf-anchor="' + hash + '"]').length > 0 ) {
				var anchoredElementOffset = $('[data-eltdf-anchor="' + hash + '"]').offset().top;
				scrollAmount = $('[data-eltdf-anchor="' + hash + '"]').offset().top - headerHeihtToSubtract(anchoredElementOffset) - eltdfGlobalVars.vars.eltdfAddForAdminBar;
				
				setActiveState(anchor);
				
				eltdf.html.stop().animate({
					scrollTop: Math.round(scrollAmount)
				}, 1000, function() {
					//change hash tag in url
					if(history.pushState) { history.pushState(null, null, '#'+hash); }
				});
				return false;
			}
		};
		
		/**
		 * Calculate header height to be substract from scroll amount
		 * @param anchoredElementOffset, anchorded element offest
		 */
		var headerHeihtToSubtract = function(anchoredElementOffset){
			
			if(eltdf.modules.stickyHeader.behaviour === 'eltdf-sticky-header-on-scroll-down-up') {
				eltdf.modules.stickyHeader.isStickyVisible = (anchoredElementOffset > eltdf.modules.header.stickyAppearAmount);
			}
			
			if(eltdf.modules.stickyHeader.behaviour === 'eltdf-sticky-header-on-scroll-up') {
				if((anchoredElementOffset > eltdf.scroll)){
					eltdf.modules.stickyHeader.isStickyVisible = false;
				}
			}
			
			var headerHeight = eltdf.modules.stickyHeader.isStickyVisible ? eltdfGlobalVars.vars.eltdfStickyHeaderTransparencyHeight : eltdfPerPageVars.vars.eltdfHeaderTransparencyHeight;
			
			if(eltdf.windowWidth < 1025) {
				headerHeight = 0;
			}
			
			return headerHeight;
		};
		
		/**
		 * Handle anchor click
		 */
		var anchorClick = function() {
			eltdf.document.on("click", ".eltdf-main-menu a, .eltdf-fullscreen-menu a, .eltdf-btn, .eltdf-anchor, .eltdf-mobile-nav a", function() {
				var scrollAmount;
				var anchor = $(this);
				var hash = anchor.prop("hash").split('#')[1];
				
				if(hash !== "" && $('[data-eltdf-anchor="' + hash + '"]').length > 0 ) {
					
					var anchoredElementOffset = $('[data-eltdf-anchor="' + hash + '"]').offset().top;
					scrollAmount = $('[data-eltdf-anchor="' + hash + '"]').offset().top - headerHeihtToSubtract(anchoredElementOffset) - eltdfGlobalVars.vars.eltdfAddForAdminBar;
					
					setActiveState(anchor);
					
					eltdf.html.stop().animate({
						scrollTop: Math.round(scrollAmount)
					}, 1000, function() {
						//change hash tag in url
						if(history.pushState) { history.pushState(null, null, '#'+hash); }
					});
					return false;
				}
			});
		};
		
		return {
			init: function() {
				if($('[data-eltdf-anchor]').length) {
					anchorClick();
					checkActiveStateOnScroll();
					$(window).load(function() { checkActiveStateOnLoad(); });
				}
			}
		};
	};
	
	function eltdfInitBackToTop(){
		var backToTopButton = $('#eltdf-back-to-top');
		backToTopButton.on('click',function(e){
			e.preventDefault();
			eltdf.html.animate({scrollTop: 0}, eltdf.window.scrollTop()/4, 'easeInOutQuint');
		});
	}
	
	function eltdfBackButtonShowHide(){
		eltdf.window.scroll(function () {
			var b = $(this).scrollTop();
			var c = $(this).height();
			var d;
			if (b > 0) { d = b + c / 2; } else { d = 1; }
			if (d < 1e3) { eltdfToTopButton('off'); } else { eltdfToTopButton('on'); }
		});
	}
	
	function eltdfToTopButton(a) {
		var b = $("#eltdf-back-to-top");
		b.removeClass('off on');
		if (a === 'on') { b.addClass('on'); } else { b.addClass('off'); }
	}
	
	function eltdfInitSelfHostedVideoPlayer() {
		var players = $('.eltdf-self-hosted-video');
		
		if(players.length) {
			players.mediaelementplayer({
				audioWidth: '100%'
			});
		}
	}
	
	function eltdfSelfHostedVideoSize(){
		var selfVideoHolder = $('.eltdf-self-hosted-video-holder .eltdf-video-wrap');
		
		if(selfVideoHolder.length) {
			selfVideoHolder.each(function(){
				var thisVideo = $(this),
					videoWidth = thisVideo.closest('.eltdf-self-hosted-video-holder').outerWidth(),
					videoHeight = videoWidth / eltdf.videoRatio;
				
				if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
					thisVideo.parent().width(videoWidth);
					thisVideo.parent().height(videoHeight);
				}
				
				thisVideo.width(videoWidth);
				thisVideo.height(videoHeight);
				
				thisVideo.find('video, .mejs-overlay, .mejs-poster').width(videoWidth);
				thisVideo.find('video, .mejs-overlay, .mejs-poster').height(videoHeight);
			});
		}
	}
	
	function eltdfFluidVideo() {
        fluidvids.init({
			selector: ['iframe'],
			players: ['www.youtube.com', 'player.vimeo.com']
		});
	}
	
	function eltdfSmoothTransition() {

        if (eltdf.body.hasClass('eltdf-smooth-page-transitions')) {

            //check for preload animation
            if (eltdf.body.hasClass('eltdf-smooth-page-transitions-preloader')) {
                var loader = $('body > .eltdf-smooth-transition-loader.eltdf-mimic-ajax');
                loader.fadeOut(500);
                $(window).bind("pageshow", function (event) {
                    if (event.originalEvent.persisted) {
                        loader.fadeOut(500);
                    }
                });
            }

            //check for fade out animation
			if(eltdf.body.hasClass('eltdf-smooth-page-transitions-fadeout')) {
				var linkItem = $('a');
				
				linkItem.click(function (e) {
                    var a = $(this);

                    if ((a.parents('.eltdf-shopping-cart-dropdown').length || a.parent('.product-remove').length) && a.hasClass('remove')) {
                        return;
                    }
                    
                    if (
                        e.which == 1 && // check if the left mouse button has been pressed
                        a.attr('href').indexOf(window.location.host) >= 0 && // check if the link is to the same domain
                        (typeof a.data('rel') === 'undefined') && //Not pretty photo link
                        (typeof a.attr('rel') === 'undefined') && //Not VC pretty photo link
                        (typeof a.attr('target') === 'undefined' || a.attr('target') === '_self') && // check if the link opens in the same window
                        (a.attr('href').split('#')[0] !== window.location.href.split('#')[0]) // check if it is an anchor aiming for a different page
                    ) {
                        e.preventDefault();
                        $('.eltdf-wrapper-inner').fadeOut(1000, function () {
                            window.location = a.attr('href');
                        });
                    }
                });
            }
		}
	}
	
	/*
	 *	Preload background images for elements that have 'eltdf-preload-background' class
	 */
	function eltdfPreloadBackgrounds(){
		var preloadBackHolder = $('.eltdf-preload-background');
		
		if(preloadBackHolder.length) {
			preloadBackHolder.each(function() {
				var preloadBackground = $(this);
				
				if(preloadBackground.css("background-image") !== "" && preloadBackground.css("background-image") != "none") {
					var bgUrl = preloadBackground.attr('style');
					
					bgUrl = bgUrl.match(/url\(["']?([^'")]+)['"]?\)/);
					bgUrl = bgUrl ? bgUrl[1] : "";
					
					if (bgUrl) {
						var backImg = new Image();
						backImg.src = bgUrl;
						$(backImg).load(function(){
							preloadBackground.removeClass('eltdf-preload-background');
						});
					}
				} else {
					$(window).load(function(){ preloadBackground.removeClass('eltdf-preload-background'); }); //make sure that eltdf-preload-background class is removed from elements with forced background none in css
				}
			});
		}
	}
	
	function eltdfPrettyPhoto() {
		/*jshint multistr: true */
		var markupWhole = '<div class="pp_pic_holder"> \
                        <div class="ppt">&nbsp;</div> \
                        <div class="pp_top"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                        <div class="pp_content_container"> \
                            <div class="pp_left"> \
                            <div class="pp_right"> \
                                <div class="pp_content"> \
                                    <div class="pp_loaderIcon"></div> \
                                    <div class="pp_fade"> \
                                        <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                                        <div class="pp_hoverContainer"> \
                                            <a class="pp_next" href="#"><span class="fa fa-angle-right"></span></a> \
                                            <a class="pp_previous" href="#"><span class="fa fa-angle-left"></span></a> \
                                        </div> \
                                        <div id="pp_full_res"></div> \
                                        <div class="pp_details"> \
                                            <div class="pp_nav"> \
                                                <a href="#" class="pp_arrow_previous">Previous</a> \
                                                <p class="currentTextHolder">0/0</p> \
                                                <a href="#" class="pp_arrow_next">Next</a> \
                                            </div> \
                                            <p class="pp_description"></p> \
                                            {pp_social} \
                                            <a class="pp_close" href="#">Close</a> \
                                        </div> \
                                    </div> \
                                </div> \
                            </div> \
                            </div> \
                        </div> \
                        <div class="pp_bottom"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                    </div> \
                    <div class="pp_overlay"></div>';
		
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
			hook: 'data-rel',
			animation_speed: 'normal', /* fast/slow/normal */
			slideshow: false, /* false OR interval time in ms */
			autoplay_slideshow: false, /* true/false */
			opacity: 0.80, /* Value between 0 and 1 */
			show_title: true, /* true/false */
			allow_resize: true, /* Resize the photos bigger than viewport. true/false */
			horizontal_padding: 0,
			default_width: 960,
			default_height: 540,
			counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
			theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
			hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
			wmode: 'opaque', /* Set the flash wmode attribute */
			autoplay: true, /* Automatically start videos: True/False */
			modal: false, /* If set to true, only the close button will close the window */
			overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
			keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
			deeplinking: false,
			custom_markup: '',
			social_tools: false,
			markup: markupWhole
		});
	}
	
	/**
	 * Initializes load more data params
	 * @param container with defined data params
	 * return array
	 */
	function getLoadMoreData(container){
		var dataList = container.data(),
			returnValue = {};
		
		for (var property in dataList) {
			if (dataList.hasOwnProperty(property)) {
				if (typeof dataList[property] !== 'undefined' && dataList[property] !== false) {
					returnValue[property] = dataList[property];
				}
			}
		}
		
		return returnValue;
	}
	
	/**
	 * Sets load more data params for ajax function
	 * @param container with defined data params
	 * return array
	 */
	function setLoadMoreAjaxData(container, action){
		var returnValue = {
			action: action
		};
		
		for (var property in container) {
			if (container.hasOwnProperty(property)) {
				
				if (typeof container[property] !== 'undefined' && container[property] !== false) {
					returnValue[property] = container[property];
				}
			}
		}
		
		return returnValue;
	}
	
	/**
	 * Object that represents icon with hover data
	 * @returns {{init: Function}} function that initializes icon's functionality
	 */
	var eltdfIconWithHover = function() {
		//get all icons on page
		var icons = $('.eltdf-icon-has-hover');
		
		/**
		 * Function that triggers icon hover color functionality
		 */
		var iconHoverColor = function(icon) {
			if(typeof icon.data('hover-color') !== 'undefined') {
				var changeIconColor = function(event) {
					event.data.icon.css('color', event.data.color);
				};
				
				var hoverColor = icon.data('hover-color'),
					originalColor = icon.css('color');
				
				if(hoverColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverColor}, changeIconColor);
					icon.on('mouseleave', {icon: icon, color: originalColor}, changeIconColor);
				}
			}
		};
		
		return {
			init: function() {
				if(icons.length) {
					icons.each(function() {
						iconHoverColor($(this));
					});
				}
			}
		};
	};

    /**
     * Init Owl Carousel
     */
    function eltdfOwlSlider() {
        var sliders = $('.eltdf-owl-slider');
        var exceptions = $('.eltdf-testimonials-split > .eltdf-owl-slider'); // selectors for sliders with special behavior not using the default JS

        if (sliders.length) {
            sliders.not(exceptions).each(function(){
                var slider = $(this),
	                slideItems = slider.children(),
	                slideItemsNumber = slider.children().length,
	                numberOfItems = 1,
	                numberOfRows = 1,
	                loop = true,
	                autoplay = true,
	                autoplayHoverPause = true,
	                sliderSpeed = 5000,
	                sliderSpeedAnimation = 600,
	                margin = 0,
	                center = false,
	                autoWidth = false,
	                animateInClass = false, // keyframe css animation
	                animateOut = false, // keyframe css animation
	                navigation = true,
	                pagination = false,
					numberOfItems600 = 1,
					numberOfItems768 = 2,
					numberOfItems1024 = 3,
	                sliderIsPortfolio = !!slider.hasClass('eltdf-pl-is-slider'),
	                sliderDataHolder = sliderIsPortfolio ? slider.parent() : slider;  // this is condition for portfolio slider
	
	            if (typeof slider.data('number-of-items') !== 'undefined' && slider.data('number-of-items') !== false) {
		            numberOfItems = slider.data('number-of-items');
	            }
	            if (typeof sliderDataHolder.data('number-of-columns') !== 'undefined' && sliderDataHolder.data('number-of-columns') !== false && sliderIsPortfolio) {
		            numberOfItems = sliderDataHolder.data('number-of-columns');
	            }
				if (typeof slider.data('number-of-items-1024') !== 'undefined' && slider.data('number-of-items-1024') !== false) {
					numberOfItems1024 = slider.data('number-of-items-1024');
				}
				if (typeof slider.data('number-of-items-768') !== 'undefined' && slider.data('number-of-items-768') !== false) {
					numberOfItems768= slider.data('number-of-items-768');
				}
				if (typeof slider.data('number-of-items-600') !== 'undefined' && slider.data('number-of-items-600') !== false) {
					numberOfItems600 = slider.data('number-of-items-600');
				}

	            if (typeof slider.data('number-of-rows') !== 'undefined' && slider.data('number-of-rows') !== false) {
		            numberOfRows = slider.data('number-of-rows');
	            }

	            if (sliderDataHolder.data('enable-loop') === 'no') {
		            loop = false;
	            }
	            if (sliderDataHolder.data('enable-autoplay') === 'no' ) {
		            autoplay = false;
	            }
	            if (sliderDataHolder.data('enable-autoplay-hover-pause') === 'no') {
		            autoplayHoverPause = false;
	            }
	            if (typeof sliderDataHolder.data('slider-speed') !== 'undefined' && sliderDataHolder.data('slider-speed') !== false) {
		            sliderSpeed = sliderDataHolder.data('slider-speed');
	            }
	            if (typeof sliderDataHolder.data('slider-speed-animation') !== 'undefined' && sliderDataHolder.data('slider-speed-animation') !== false) {
		            sliderSpeedAnimation = sliderDataHolder.data('slider-speed-animation');
	            }
	            if (typeof sliderDataHolder.data('slider-margin') !== 'undefined' && sliderDataHolder.data('slider-margin') !== false) {
		            margin = sliderDataHolder.data('slider-margin');
	            }
	            if(slider.parent().hasClass('eltdf-normal-space')) {
		            margin = 30;
	            } else if (slider.parent().hasClass('eltdf-small-space')) {
		            margin = 20;
	            } else if (slider.parent().hasClass('eltdf-tiny-space')) {
		            margin = 10;
	            }
	            if (sliderDataHolder.data('enable-center') === 'yes') {
		            center = true;
	            }
	            if (sliderDataHolder.data('enable-auto-width') === 'yes') {
		            autoWidth = true;
	            }
	            if (typeof sliderDataHolder.data('slider-animate-in') !== 'undefined' && sliderDataHolder.data('slider-animate-in') !== false) {
		            animateInClass = sliderDataHolder.data('slider-animate-in');
	            }
	            if (typeof sliderDataHolder.data('slider-animate-out') !== 'undefined' && sliderDataHolder.data('slider-animate-out') !== false) {
		            animateOut = sliderDataHolder.data('slider-animate-out');
	            }
	            if (sliderDataHolder.data('enable-navigation') === 'no') {
		            navigation = false;
	            }
	            if (sliderDataHolder.data('enable-pagination') === 'yes') {
		            pagination = true;
	            }
	            
	            if(navigation && pagination) {
		            slider.addClass('eltdf-slider-has-both-nav');
	            }
	
	            if (slideItemsNumber <= 1) {
		            loop       = false;
		            autoplay   = false;
		            navigation = false;
		            pagination = false;
	            }

	            if (numberOfRows > 1){	            	
	                for(var i = 0; i < slideItemsNumber; i+= numberOfRows) {
	                  slideItems.slice(i, i+numberOfRows).wrapAll("<div class='eltdf-owl-item-outer'></div>");
	                }
	            }

	
	            if (numberOfItems < 3) {
					numberOfItems768 = numberOfItems;
					numberOfItems1024 = numberOfItems;
	            }

	            var sliderWidth = function(){
	            	var sliderInitalWidth = Math.floor(parseInt(slider.css('width')));
	            	slider.css('width', sliderInitalWidth); //because of the chrome partial pixels
	            }

                slider.owlCarousel({
	                items: numberOfItems,
	                loop: loop,
	                autoplay: autoplay,
	                autoplayHoverPause: autoplayHoverPause,
	                autoplayTimeout: sliderSpeed,
	                smartSpeed: sliderSpeedAnimation,
	                margin: margin,
		            center: center,
		            autoWidth: autoWidth,
	                animateInClass : animateInClass,
	                animateOut : animateOut,
                    dots: pagination,
                    nav: navigation,
                    navText: [
                        '<span class="eltdf-prev-icon"><span class="eltdf-icon-arrow fa fa-long-arrow-left"></span></span>',
                        '<span class="eltdf-next-icon"><span class="eltdf-icon-arrow fa fa-long-arrow-right"></span></span>'
                    ],
	                responsive: {
		                0: {
			                items: 1,
			                margin: 0,
			                center: false,
			                autoWidth: false
		                },
		                680: {
			                items: numberOfItems600
		                },
		                768: {
			                items: numberOfItems768
		                },
		                1024: {
			                items: numberOfItems1024
		                },
						1200: {
							items: numberOfItems
						}
	                },
	                onInitialized: function () {
		                slider.css('visibility', 'visible');
		                eltdf.modules.parallax.eltdfInitParallax();
		                sliderWidth();
	                }
                });
            });
        }
    }

    /*
    * Request Animation Frame shim
    */
    function eltdfRequestAnimationFrame() {
        window.requestNextAnimationFrame =
            (function () {
                var originalWebkitRequestAnimationFrame = undefined,
                    wrapper = undefined,
                    callback = undefined,
                    geckoVersion = 0,
                    userAgent = navigator.userAgent,
                    index = 0,
                    self = this;

                // Workaround for Chrome 10 bug where Chrome
                // does not pass the time to the animation function

                if (window.webkitRequestAnimationFrame) {
                    // Define the wrapper

                    wrapper = function (time) {
                        if (time === undefined) {
                            time = +new Date();
                        }

                        self.callback(time);
                    };

                    // Make the switch
                  
                    originalWebkitRequestAnimationFrame = window.webkitRequestAnimationFrame;    

                    window.webkitRequestAnimationFrame = function (callback, element) {
                        self.callback = callback;

                        // Browser calls the wrapper and wrapper calls the callback
                    
                        originalWebkitRequestAnimationFrame(wrapper, element);
                    }
                }

                // Workaround for Gecko 2.0, which has a bug in
                // mozRequestAnimationFrame() that restricts animations
                // to 30-40 fps.

                if (window.mozRequestAnimationFrame) {
                    // Check the Gecko version. Gecko is used by browsers
                    // other than Firefox. Gecko 2.0 corresponds to
                    // Firefox 4.0.
                 
                    index = userAgent.indexOf('rv:');

                        if (userAgent.indexOf('Gecko') != -1) {
                            geckoVersion = userAgent.substr(index + 3, 3);

                        if (geckoVersion === '2.0') {
                           // Forces the return statement to fall through
                           // to the setTimeout() function.

                           window.mozRequestAnimationFrame = undefined;
                        }
                    }
                }
              
                return window.requestAnimationFrame   ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame    ||
                    window.oRequestAnimationFrame      ||
                    window.msRequestAnimationFrame     ||

                    function (callback, element) {
                        var start,
                            finish;

                        window.setTimeout( function () {
                            start = +new Date();
                            callback(start);
                            finish = +new Date();

                        self.timeout = 1000 / 60 - (finish - start);

                        }, self.timeout);
                    };
                }
            )
        ();
    }

})(jQuery);