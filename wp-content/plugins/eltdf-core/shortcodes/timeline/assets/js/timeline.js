(function($) {
    'use strict';
    
    var timeline = {};
    eltdf.modules.timeline = timeline;
    
    timeline.eltdfTimelineMarquee = eltdfTimelineMarquee;
    
    timeline.eltdfOnDocumentReady = eltdfOnDocumentReady;
    
    $(document).ready(eltdfOnDocumentReady);
    
    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function eltdfOnDocumentReady() {
        eltdfTimelineMarquee();
    }
    
    /**
     * Timeline Marquee effect
     */
    function eltdfTimelineMarquee() {
        var timelineHolders = $('.eltdf-timeline-holder');

        if (timelineHolders.length) {
            timelineHolders.each(function(){
                var timelineHolder = $(this),
                    timelineClone = timelineHolder.find('.eltdf-timeline').clone().addClass('eltdf-timeline-clone').appendTo(timelineHolder),
                    timelines = timelineHolder.find('.eltdf-timeline'),
                    timelineOriginal = timelines.first();

                var timelineWidthCalc = function(timelineInstance) {
                    var timelineItems = timelineInstance.find('.eltdf-timeline-item'),
                        width = 0;

                    timelineItems.each(function(){
                        var timelineItem = $(this);

                        width += timelineItem.outerWidth();
                    });

                    return width;
                }

                var marqueeEffect = function () {
                    eltdf.modules.common.eltdfRequestAnimationFrame();

                    var delta = 1, //pixel movement
                        speedCoeff = 1, // below 1 to slow down, above 1 to speed up
                        timelineWidth = timelineWidthCalc(timelineOriginal);

                    timelines.css({'width':timelineWidth}) // set the same width to both elements
                    timelineClone.css('left', timelineWidth); //set to the right of the inital marquee element

                    //pause on hover
                    var timelineLinks = timelines.find('a');
                    if (timelineLinks.length) {
                        var deltaBuffer = delta;
                        timelineLinks.on('mouseenter', function(){
                            $(this).closest('.eltdf-timeline-item').addClass('eltdf-link-hovered');
                            delta = 0;
                        }).on('mouseleave', function(){
                            $(this).closest('.eltdf-timeline-item').removeClass('eltdf-link-hovered');
                            delta = deltaBuffer;
                        });
                    }

                    //movement loop
                    timelines.each(function(i){
                        var timeline = $(this),
                            lines = timeline.find('.eltdf-timeline-line'),
                            currentPos = 0;
                            
                        var eltdfInfiniteScrollEffect = function() {
                            currentPos -= delta;

                            //move timeline
                            if (timeline.position().left <= -timelineWidth) {
                                timeline.css('left', parseInt(timelineWidth - delta));
                                currentPos = 0;
                            }

                            timeline.css('transform','translate3d('+speedCoeff*currentPos+'px,0,0)');

                            //animate lines
                            lines.each(function(){
                                var line = $(this);

                                if ((line.offset().left > 0) && (line.offset().left < eltdf.windowWidth)) {
                                    if (!line.hasClass('eltdf-show')) {
                                        line.removeClass('eltdf-hide').addClass('eltdf-show');
                                        //when the last segment of the colored line is done animating
                                        if (line.hasClass('eltdf-colored')) {
                                            line.find('.eltdf-line-top').one(eltdf.transitionEnd, function(){
                                                line.addClass('eltdf-shown'); 
                                                line.closest('.eltdf-timeline-item').addClass('eltdf-active');
                                            });
                                        }
                                    }
                                } else {
                                    if (line.hasClass('eltdf-show')) {
                                        line.removeClass('eltdf-show').addClass('eltdf-hide');
                                        if (line.hasClass('eltdf-colored')) {
                                            line.closest('.eltdf-timeline-item').removeClass('eltdf-active');
                                            line.removeClass('eltdf-shown');
                                        }
                                    }
                                }
                            });

                            requestNextAnimationFrame(eltdfInfiniteScrollEffect);

                            $(window).resize(function(){
                                currentPos = 0;
                                timelineOriginal.css('left',0);
                                timelineClone.css('left', timelineWidth); //set to the left of the inital marquee element
                            });
                        }; 
                            
                        eltdfInfiniteScrollEffect();
                    });
                };

                timelineHolder.waitForImages(function(){
                    timelineHolder.css('visibility', 'visible');
                    marqueeEffect();
                });
            });
        }
    }

})(jQuery);