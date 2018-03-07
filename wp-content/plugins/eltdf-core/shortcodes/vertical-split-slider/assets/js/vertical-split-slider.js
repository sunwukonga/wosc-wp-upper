(function($) {
	'use strict';
	
	var verticalSplitSlider = {};
	eltdf.modules.verticalSplitSlider = verticalSplitSlider;
	
	verticalSplitSlider.eltdfInitVerticalSplitSlider = eltdfInitVerticalSplitSlider;
	
	
	verticalSplitSlider.eltdfOnDocumentReady = eltdfOnDocumentReady;
	
	$(document).ready(eltdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitVerticalSplitSlider();
	}
	
	/*
	 **	Vertical Split Slider
	 */
	function eltdfInitVerticalSplitSlider() {
		var slider = $('.eltdf-vertical-split-slider');
		
		if (slider.length) {
			if (eltdf.body.hasClass('eltdf-vss-initialized')) {
				eltdf.body.removeClass('eltdf-vss-initialized');
				$.fn.multiscroll.destroy();
			}
			
			slider.height(eltdf.windowHeight).animate({opacity: 1}, 300);
			
			var defaultHeaderStyle = '';
			if (eltdf.body.hasClass('eltdf-light-header')) {
				defaultHeaderStyle = 'light';
			} else if (eltdf.body.hasClass('eltdf-dark-header')) {
				defaultHeaderStyle = 'dark';
			}
			
			slider.multiscroll({
				scrollingSpeed: 700,
				easing: 'easeInOutQuart',
				navigation: true,
				useAnchorsOnLoad: false,
				sectionSelector: '.eltdf-vss-ms-section',
				leftSelector: '.eltdf-vss-ms-left',
				rightSelector: '.eltdf-vss-ms-right',
				afterRender: function () {
					eltdfCheckVerticalSplitSectionsForHeaderStyle($('.eltdf-vss-ms-left .eltdf-vss-ms-section:last-child').data('header-style'), defaultHeaderStyle);
					eltdf.body.addClass('eltdf-vss-initialized');
					
					var contactForm7 = $('div.wpcf7 > form');
					if (contactForm7.length) {
						_wpcf7.supportHtml5 = $.wpcf7SupportHtml5();
						contactForm7.wpcf7InitForm();
					} // this function need to be initialized after initVerticalSplitSlide
					
					//prepare html for smaller screens - start //
					var verticalSplitSliderResponsive = $('<div class="eltdf-vss-responsive"></div>'),
						leftSide = slider.find('.eltdf-vss-ms-left > div'),
						rightSide = slider.find('.eltdf-vss-ms-right > div');
					
					slider.after(verticalSplitSliderResponsive);
					
					for (var i = 0; i < leftSide.length; i++) {
						verticalSplitSliderResponsive.append($(leftSide[i]).clone(true));
						verticalSplitSliderResponsive.append($(rightSide[leftSide.length - 1 - i]).clone(true));
					}
					
					//prepare google maps clones
					var googleMapHolder = $('.eltdf-vss-responsive .eltdf-google-map');
					if (googleMapHolder.length) {
						googleMapHolder.each(function () {
							var map = $(this);
							map.empty();
							var num = Math.floor((Math.random() * 100000) + 1);
							map.attr('id', 'eltdf-map-' + num);
							map.data('unique-id', num);
						});
					}
					
					if (typeof eltdf.modules.button.eltdfButton === "function") {
						eltdf.modules.button.eltdfButton().init();
					}
					
					if (typeof eltdf.modules.elementsHolder.eltdfInitElementsHolderResponsiveStyle === "function") {
						eltdf.modules.elementsHolder.eltdfInitElementsHolderResponsiveStyle();
					}
					
					if (typeof eltdf.modules.googleMap.eltdfShowGoogleMap === "function") {
						eltdf.modules.googleMap.eltdfShowGoogleMap();
					}
					
					if (typeof eltdf.modules.icon.eltdfIcon === "function") {
						eltdf.modules.icon.eltdfIcon().init();
					}
					
					if (typeof eltdf.modules.progressBar.eltdfInitProgressBars === "function") {
						eltdf.modules.progressBar.eltdfInitProgressBars();
					}
				},
				onLeave: function (index, nextIndex, direction) {
					eltdfCheckVerticalSplitSectionsForHeaderStyle($($('.eltdf-vss-ms-left .eltdf-vss-ms-section')[$(".eltdf-vss-ms-left .eltdf-vss-ms-section").length - nextIndex]).data('header-style'), defaultHeaderStyle);
				}
			});
			
			if (eltdf.windowWidth <= 1024) {
				$.fn.multiscroll.destroy();
			} else {
				$.fn.multiscroll.build();
			}
			
			$(window).resize(function () {
				if (eltdf.windowWidth <= 1024) {
					$.fn.multiscroll.destroy();
				} else {
					$.fn.multiscroll.build();
				}
			});
		}
	}
	
	/*
	 **	Check slides on load and slide change for header style changing
	 */
	function eltdfCheckVerticalSplitSectionsForHeaderStyle(section_header_style, default_header_style) {
		if (section_header_style !== undefined && section_header_style !== '') {
			eltdf.body.removeClass('eltdf-light-header eltdf-dark-header').addClass('eltdf-' + section_header_style + '-header');
		} else if (default_header_style !== '') {
			eltdf.body.removeClass('eltdf-light-header eltdf-dark-header').addClass('eltdf-' + default_header_style + '-header');
		} else {
			eltdf.body.removeClass('eltdf-light-header eltdf-dark-header');
		}
	}
	
})(jQuery);