(function($) {
    "use strict";

    var headerDivided = {};
    eltdf.modules.headerDivided = headerDivided;
	
	headerDivided.eltdfOnDocumentReady = eltdfOnDocumentReady;
	headerDivided.eltdfOnWindowLoad = eltdfOnWindowLoad;
	headerDivided.eltdfOnWindowResize = eltdfOnWindowResize;
	headerDivided.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function eltdfOnWindowLoad() {
        eltdfInitDividedHeaderMenu();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
        eltdfInitDividedHeaderMenu();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdfOnWindowScroll() {
    }

    /**
     * Init Divided Header Menu
     */
    function eltdfInitDividedHeaderMenu(){
        if(eltdf.body.hasClass('eltdf-header-divided')){
            //get left side menu width
            var menuArea = $('.eltdf-menu-area'),
                menuAreaWidth = menuArea.width(),
	            menuAreaItem = $('.eltdf-main-menu > ul > li > a'),
	            menuItemPadding = 0,
	            logoArea = menuArea.find('.eltdf-logo-wrapper .eltdf-normal-logo'),
	            logoAreaWidth = 0;

            if(menuArea.children('.eltdf-grid').length) {
                menuAreaWidth = menuArea.children('.eltdf-grid').outerWidth();
            }

	        if(menuAreaItem.length) {
		        menuItemPadding = parseInt(menuAreaItem.css('padding-left'));
	        }

	        if(logoArea.length) {
		        logoAreaWidth = logoArea.width() / 2;
	        }

            var menuAreaLeftRightSideWidth = Math.round(menuAreaWidth/2 - menuItemPadding - logoAreaWidth);

            $('.eltdf-menu-area .eltdf-position-left').width(menuAreaLeftRightSideWidth);
			$('.eltdf-menu-area .eltdf-position-right').width(menuAreaLeftRightSideWidth);

            menuArea.css('opacity',1);
	
	        if (typeof eltdf.modules.header.eltdfDropDownMenu === "function") {
		        eltdf.modules.header.eltdfDropDownMenu();
	        }
	        if (typeof eltdf.modules.header.eltdfSetDropDownMenuPosition === "function") {
		        eltdf.modules.header.eltdfSetDropDownMenuPosition();
	        }
        }
    }

})(jQuery);