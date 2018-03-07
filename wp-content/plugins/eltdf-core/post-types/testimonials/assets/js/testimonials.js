(function($) {
	'use strict';
	
	var testimonials = {};
	eltdf.modules.testimonials = testimonials;
	
	testimonials.eltdfInitTestimonialsSplitType = eltdfInitTestimonialsSplitType;

	testimonials.eltdfOnDocumentReady = eltdfOnDocumentReady;
	
	$(document).ready(eltdfOnDocumentReady);
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitTestimonialsSplitType();
	}

    /**
     * Init Testimonials Split Type
     */
    function eltdfInitTestimonialsSplitType() {
        var sliders = $('.eltdf-testimonials-split > .eltdf-owl-slider');

    	if (sliders.length) {
    		sliders.each(function(){
    			var slider = $(this),
    				slider1 = slider.find('.eltdf-testimonials-images-holder'),
    				slider2 = slider.find('.eltdf-testimonials-content-holder-inner'),
    				autoplay = true,
    				loop = true,
    				navigation = true,
    				pagination = false;

	            if (slider.data('enable-autoplay') === 'no' ) {
		            autoplay = false;
	            }
                if (slider.data('enable-navigation') === 'no') {
    	            navigation = false;
                }
                if (slider.data('enable-pagination') === 'yes') {
    	            pagination = true;
                }

				slider1.owlCarousel({
	                autoplay: autoplay,
				    items : 1,
				    slideSpeed : 2000,
				    nav: navigation,
				    dots: pagination,
				    loop: loop,
				    navText: [
				        '<span class="eltdf-prev-icon"><span class="eltdf-icon-arrow fa fa-long-arrow-left"></span><span class="eltdf-prev-number"></span></span>',
				        '<span class="eltdf-next-icon"><span class="eltdf-icon-arrow fa fa-long-arrow-right"></span><span class="eltdf-next-number"></span></span>'
				    ],
                    onInitialized: function () {
    	                slider.css('visibility', 'visible');

					  	if (slider.data('enable-navigation') === 'yes') {
	    	                var prevNumber = slider.find('.eltdf-prev-number'),
	    	                	nextNumber = slider.find('.eltdf-next-number');

	    	                prevNumber.text(slider1.find('.owl-item:not(.cloned)').length);
	    	                nextNumber.text(2);
    	            	}
                    }
				}).on('changed.owl.carousel', syncPosition);

			  	if (slider.data('enable-navigation') === 'yes') {
			  		var prevNumber = slider.find('.eltdf-prev-number'),
			  			nextNumber = slider.find('.eltdf-next-number');

					slider1.on('changed.owl.carousel', function(event) {
			  			var currentItem = event.item.index - 1,
			  				numberOfSlides = slider1.find('.owl-item:not(.cloned)').length,
			  				nextItem,
			  				prevItem;

			  			//loop on
			  			if (currentItem == 0) {
			  				currentItem = numberOfSlides;
			  			}

			  			//cases
		  				switch(currentItem) {
		  					//first slide
		  				    case 1:
			  				    prevItem = numberOfSlides;
			  				    nextItem = currentItem  + 1;
		  				        break;
		  					//last slide slide
		  				    case numberOfSlides:
		  				        prevItem = currentItem  - 1;
		  				        nextItem = 1;
		  				        break;
		  				    default:
			  				    nextItem = currentItem  + 1;
			  				    prevItem = currentItem  - 1;
		  				}

		  				prevNumber.text(prevItem);
		  				nextNumber.text(nextItem);
					});	
				}

				slider2.on('initialized.owl.carousel', function () {
			    	slider2.find(".owl-item").eq(0).addClass("current");
			  	}).owlCarousel({
					items : 1,
					dots: false,
					nav: false,
					smartSpeed: 200,
					slideSpeed : 500,
				}).on('changed.owl.carousel', syncPosition2);


			  	function syncPosition(el) {
			  		//if you set loop to false, you have to restore this next line
			  		// var current = el.item.index;
			  		
			  		//if you disable loop you have to comment this block
			  		var count = el.item.count-1;
			  		var current = Math.round(el.item.index - (el.item.count/2) - .5);
			  		
			  		if(current < 0) {
			  		  current = count;
			  		}
			  		if(current > count) {
			  		  current = 0;
			  		}
			  		
			  		//end block

					slider2
					.find(".owl-item")
					.removeClass("current")
					.eq(current)
					.addClass("current");

					var onscreen = slider2.find('.owl-item.active').length - 1;
					var start = slider2.find('.owl-item.active').first().index();
					var end = slider2.find('.owl-item.active').last().index();

					if (current > end) {
						slider2.data('owl.carousel').to(current, 100, true);
					}
					if (current < start) {
						slider2.data('owl.carousel').to(current - onscreen, 100, true);
					}
			  	}
			  	
			  	function syncPosition2(el) {
		  			var number = el.item.index;
		  			slider1.data('owl.carousel').to(number, 600, true);
			  	}
			  	
			  	slider2.on("click", ".owl-item", function(e){
			  		e.preventDefault();
			  		var number = $(this).index();
			  		slider1.data('owl.carousel').to(number, 300, true);
			  	});
    		});
    	}
	}
})(jQuery);