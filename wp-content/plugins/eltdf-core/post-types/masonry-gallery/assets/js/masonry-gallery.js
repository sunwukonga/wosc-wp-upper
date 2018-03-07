(function($) {
    'use strict';
	
	var masonryGallery = {};
	eltdf.modules.masonryGallery = masonryGallery;
	
	masonryGallery.eltdfInitMasonryGallery = eltdfInitMasonryGallery;
	
	
	masonryGallery.eltdfOnDocumentReady = eltdfOnDocumentReady;
	
	$(document).ready(eltdfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfInitMasonryGallery();
	}
	
	/**
	 * Masonry gallery, init masonry and resize pictures in grid
	 */
	function eltdfInitMasonryGallery(){
		var galleryHolder = $('.eltdf-masonry-gallery-holder'),
			gallery = galleryHolder.children('.eltdf-mg-inner'),
			gallerySizer = gallery.children('.eltdf-mg-grid-sizer');
		
		resizeMasonryGallery(gallerySizer.outerWidth(), gallery);
		
		if(galleryHolder.length){
			galleryHolder.each(function(){
				var holder = $(this),
					holderGallery = holder.children('.eltdf-mg-inner');
				
				holderGallery.waitForImages(function(){
					holderGallery.animate({opacity:1});
					
					holderGallery.isotope({
						layoutMode: 'packery',
						itemSelector: '.eltdf-mg-item',
						percentPosition: true,
						packery: {
							gutter: '.eltdf-mg-grid-gutter',
							columnWidth: '.eltdf-mg-grid-sizer'
						}
					});
				});
			});
			
			$(window).resize(function(){
				resizeMasonryGallery(gallerySizer.outerWidth(), gallery);
				
				gallery.isotope('reloadItems');
			});
		}
	}
	
	function resizeMasonryGallery(size, holder){
		var rectangle_portrait = holder.find('.eltdf-mg-rectangle-portrait'),
			rectangle_landscape = holder.find('.eltdf-mg-rectangle-landscape'),
			square_big = holder.find('.eltdf-mg-square-big'),
			square_small = holder.find('.eltdf-mg-square-small');
		
		rectangle_portrait.css('height', 2*size);
		
		if (window.innerWidth <= 680) {
			rectangle_landscape.css('height', size/2);
		} else {
			rectangle_landscape.css('height', size);
		}
		
		square_big.css('height', 2*size);
		
		if (window.innerWidth <= 680) {
			square_big.css('height', square_big.width());
		}
		
		square_small.css('height', size);
	}

})(jQuery);