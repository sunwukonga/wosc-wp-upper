(function($) {
    'use strict';
	
	var infoBox = {};
	eltdf.modules.infoBox = infoBox;
	
	infoBox.eltdfInitInfoBox = eltdfInitInfoBox;
	
	
	infoBox.eltdfOnDocumentReady = eltdfOnDocumentReady;
	
	$(document).ready(eltdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitInfoBox();
	}
	
	/**
	 * Init info box shortcode
	 */
	function eltdfInitInfoBox(){
		var infoBoxes = $('.eltdf-info-box-holder');

		if (infoBoxes.length){
			infoBoxes.each(function(){
				var infoBox = $(this),
					overlay = infoBox.find('.eltdf-ib-color-holder'),
					btn = infoBox.find('.eltdf-btn');

				var infoBoxOn = function() {
					infoBox.css('z-index','20');
					infoBox.addClass('eltdf-hovered');
					infoBox.addClass('eltdf-active');
					btn.addClass('eltdf-hovered');
				}

				var infoBoxOff = function() {
					infoBox.css('z-index','auto');
					infoBox.removeClass('eltdf-active');
					infoBoxes.trigger('eltdfBoxClassChanged');
				}

				infoBox.on('mouseenter', function(){
					if (!infoBoxes.filter('.eltdf-active').length) {
						infoBoxOn();
					} else {
						infoBox.on('eltdfBoxClassChanged', function(e){
							if (infoBox.is(':hover')) { 
								infoBoxOn();
							}
						});
					}
				});

				infoBox.on('mouseleave', function(){
					btn.removeClass('eltdf-hovered');
					infoBox.removeClass('eltdf-hovered');
					overlay.one(eltdf.transitionEnd, function(){
						infoBoxOff();
					});
				});
			});
		}
		
	}

})(jQuery);