(function($) {
    'use strict';
    
    var process = {};
    eltdf.modules.process = process;
    
    process.eltdfInitProcessAnimation = eltdfInitProcessAnimation;
    
    process.eltdfOnWindowLoad = eltdfOnWindowLoad;
    
    $(window).load(eltdfOnWindowLoad);
    
    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function eltdfOnWindowLoad() {
        eltdfInitProcessAnimation();
    }
    
    /**
     * Init Icon With Text
     */
    function eltdfInitProcessAnimation() {
        var processShortcodes = $('.eltdf-processes-holder.eltdf-loading-animation-yes');

        if (processShortcodes.length && eltdf.htmlEl.hasClass('no-touch')) {
            processShortcodes.each(function(){
                var processShortcode = $(this),
                    processItems = processShortcode.find('.eltdf-process'),
                    t = 200;

                processShortcode.appear(function(){
                    processShortcode.addClass('eltdf-appeared');

                    processItems.each(function(i){
                        var processItem = $(this);

                        setTimeout(function(){
                            processItem.addClass('eltdf-item-loaded');
                        }, t*i);
                    });
                },{accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});

            });
        }

    }

})(jQuery);