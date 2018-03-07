(function($) {
	'use strict';
	
	var customFont = {};
	eltdf.modules.customFont = customFont;
	
	customFont.eltdfCustomFontResize = eltdfCustomFontResize;
	
	
	customFont.eltdfOnDocumentReady = eltdfOnDocumentReady;
	customFont.eltdfOnWindowResize = eltdfOnWindowResize;
	
	$(document).ready(eltdfOnDocumentReady);
	$(window).resize(eltdfOnWindowResize);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfCustomFontResize();
	}
	
	/* 
	 All functions to be called on $(window).resize() should be in this function
	 */
	function eltdfOnWindowResize() {
		eltdfCustomFontResize();
	}
	
	/*
	 **	Custom Font resizing
	 */
	function eltdfCustomFontResize(){
		var customFont = $('.eltdf-custom-font-holder');
		
		if (customFont.length){
			customFont.each(function(){
				var thisCustomFont = $(this);
				var fontSize;
				var lineHeight;
				var coef1 = 1;
				var coef2 = 1;
				
				if (eltdf.windowWidth < 1480){
					coef1 = 0.8;
				}
				
				if (eltdf.windowWidth < 1200){
					coef1 = 0.7;
				}
				
				if (eltdf.windowWidth < 768){
					coef1 = 0.55;
					coef2 = 0.65;
				}
				
				if (eltdf.windowWidth < 600){
					coef1 = 0.45;
					coef2 = 0.55;
				}
				
				if (eltdf.windowWidth < 480){
					coef1 = 0.4;
					coef2 = 0.5;
				}
				
				if (typeof thisCustomFont.data('font-size') !== 'undefined' && thisCustomFont.data('font-size') !== false) {
					fontSize = parseInt(thisCustomFont.data('font-size'));
					
					if (fontSize > 70) {
						fontSize = Math.round(fontSize*coef1);
					}
					else if (fontSize > 35) {
						fontSize = Math.round(fontSize*coef2);
					}
					
					thisCustomFont.css('font-size',fontSize + 'px');
				}
				
				if (typeof thisCustomFont.data('line-height') !== 'undefined' && thisCustomFont.data('line-height') !== false) {
					lineHeight = parseInt(thisCustomFont.data('line-height'));
					
					if (lineHeight > 70 && eltdf.windowWidth < 1440) {
						lineHeight = '1.2em';
					} else if (lineHeight > 35 && eltdf.windowWidth < 768) {
						lineHeight = '1.2em';
					} else {
						lineHeight += 'px';
					}
					
					thisCustomFont.css('line-height', lineHeight);
				}
			});
		}
	}
	
})(jQuery);