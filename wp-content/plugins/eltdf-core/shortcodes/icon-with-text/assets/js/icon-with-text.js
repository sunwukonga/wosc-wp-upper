(function($) {
    'use strict';
    
    var iconWithText = {};
    eltdf.modules.iconWithText = iconWithText;
    
    iconWithText.eltdfInitIconWithText = eltdfInitIconWithText;
    
    iconWithText.eltdfOnDocumentReady = eltdfOnDocumentReady;
    
    $(document).ready(eltdfOnDocumentReady);
    
    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function eltdfOnDocumentReady() {
        eltdfInitIconWithText();
    }
    
    /**
     * Init Icon With Text
     */
    function eltdfInitIconWithText() {
        var iwtShortcodes = $('.eltdf-icon-with-text');

        if (iwtShortcodes.length) {
            iwtShortcodes.each(function(){
                var iwtShortcode = $(this),
                    iwtTitle = iwtShortcode.find('.eltdf-iwt-title');

                if (typeof iwtTitle.data('title-hover-color') !== 'undefined') {
                    var initialColor = iwtTitle.css('color'),
                        link = iwtTitle.find('a');

                    link.on('mouseenter', function(){
                        link.css('color', iwtTitle.data('title-hover-color'));
                    }).on('mouseleave', function(){
                        link.css('color', initialColor);
                    });
                }

                if (iwtShortcode.hasClass('eltdf-iwt-with-custom-icon')) {
                    var iwtIcon = iwtShortcode.find('.eltdf-iwt-icon img'),
                        animating = false;

                    iwtShortcode.on('mouseenter', function(){
                        animating = true;
                        iwtIcon.addClass('eltdf-animate');
                        iwtIcon.one(eltdf.transitionEnd, function(){ 
                            animating = false;
                        });
                    }).on('mouseleave', function(){
                        if (!animating) {
                            iwtIcon.removeClass('eltdf-animate');
                        } else {
                            iwtIcon.one(eltdf.transitionEnd, function(){ 
                                iwtIcon.removeClass('eltdf-animate');
                                animating = false;
                            });
                        }
                    });
                }                 
            });
        }

    }

})(jQuery);