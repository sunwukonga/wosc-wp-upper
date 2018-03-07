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
(function($) {
    'use strict';

    var portfolio = {};
    eltdf.modules.portfolio = portfolio;

    portfolio.eltdfOnDocumentReady = eltdfOnDocumentReady;
    portfolio.eltdfOnWindowLoad = eltdfOnWindowLoad;
    portfolio.eltdfOnWindowResize = eltdfOnWindowResize;
    portfolio.eltdfOnWindowScroll = eltdfOnWindowScroll;

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
        eltdfInitPortfolioMasonry();
        eltdfInitPortfolioFilter();
        initPortfolioSingleMasonry();
        eltdfInitPortfolioListAnimation();
	    eltdfInitPortfolioPagination().init();
        eltdfPortfolioSingleFollow().init();
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function eltdfOnWindowResize() {
        eltdfInitPortfolioMasonry();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function eltdfOnWindowScroll() {
	    eltdfInitPortfolioPagination().scroll();
    }

    /**
     * Initializes portfolio list article animation
     */
    function eltdfInitPortfolioListAnimation(){
        var portList = $('.eltdf-portfolio-list-holder.eltdf-pl-has-animation');

        if(portList.length){
            portList.each(function(){
                var thisPortList = $(this).children('.eltdf-pl-inner');

                thisPortList.children('article').each(function(l) {
                    var thisArticle = $(this);

                    thisArticle.appear(function() {
                        thisArticle.addClass('eltdf-item-show');

                        setTimeout(function(){
                            thisArticle.addClass('eltdf-item-shown');
                        }, 1000);
                    },{accX: 0, accY: 0});
                });
            });
        }
    }

    /**
     * Initializes portfolio list
     */
    function eltdfInitPortfolioMasonry(){
        var portList = $('.eltdf-portfolio-list-holder.eltdf-pl-masonry');

        if(portList.length){
            portList.each(function(){
                var thisPortList = $(this),
                    masonry = thisPortList.children('.eltdf-pl-inner'),
                    size = thisPortList.find('.eltdf-pl-grid-sizer').width();
                
                eltdfResizePortfolioItems(size, thisPortList);

                masonry.isotope({
                    layoutMode: 'packery',
                    itemSelector: 'article',
                    percentPosition: true,
                    packery: {
                        gutter: '.eltdf-pl-grid-gutter',
                        columnWidth: '.eltdf-pl-grid-sizer'
                    }
                });

                setTimeout(function () {
	                eltdf.modules.parallax.eltdfInitParallax();
                });

                masonry.css('opacity', '1');
            });
        }
    }

    /**
     * Init Resize Portfolio Items
     */
    function eltdfResizePortfolioItems(size,container){

        if(container.hasClass('eltdf-pl-images-fixed')) {
            var padding = parseInt(container.find('article').css('padding-left')),
                defaultMasonryItem = container.find('.eltdf-pl-masonry-default'),
                largeWidthMasonryItem = container.find('.eltdf-pl-masonry-large-width'),
                largeHeightMasonryItem = container.find('.eltdf-pl-masonry-large-height'),
                largeWidthHeightMasonryItem = container.find('.eltdf-pl-masonry-large-width-height');

            if (eltdf.windowWidth > 680) {
                defaultMasonryItem.css('height', size - 2 * padding);
                largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthMasonryItem.css('height', size - 2 * padding);
            } else {
                defaultMasonryItem.css('height', size);
                largeHeightMasonryItem.css('height', size);
                largeWidthHeightMasonryItem.css('height', size);
                largeWidthMasonryItem.css('height', Math.round(size / 2));
            }
        }
    }

    /**
     * Initializes portfolio masonry filter
     */
    function eltdfInitPortfolioFilter(){
        var filterHolder = $('.eltdf-portfolio-list-holder .eltdf-pl-filter-holder');

        if(filterHolder.length){
            filterHolder.each(function(){
                var thisFilterHolder = $(this),
                    thisPortListHolder = thisFilterHolder.closest('.eltdf-portfolio-list-holder'),
                    thisPortListInner = thisPortListHolder.find('.eltdf-pl-inner'),
                    portListHasLoadMore = thisPortListHolder.hasClass('eltdf-pl-pag-load-more') ? true : false;

                thisFilterHolder.find('.eltdf-pl-filter:first').addClass('eltdf-pl-current');
	            
	            if(thisPortListHolder.hasClass('eltdf-pl-gallery')) {
		            thisPortListInner.isotope();
	            }

                thisFilterHolder.find('.eltdf-pl-filter').click(function(){
                    var thisFilter = $(this),
                        filterValue = thisFilter.attr('data-filter'),
                        filterClassName = filterValue.length ? filterValue.substring(1) : '',
                        portListHasArtciles = thisPortListInner.children().hasClass(filterClassName) ? true : false;

                    thisFilter.parent().children('.eltdf-pl-filter').removeClass('eltdf-pl-current');
                    thisFilter.addClass('eltdf-pl-current');

                    if(portListHasLoadMore && !portListHasArtciles) {
                        eltdfInitLoadMoreItemsPortfolioFilter(thisPortListHolder, filterValue, filterClassName);
                    } else {
                        thisFilterHolder.parent().children('.eltdf-pl-inner').isotope({ filter: filterValue });
	                    eltdf.modules.parallax.eltdfInitParallax();
                    }
                });
            });
        }
    }

    /**
     * Initializes load more items if portfolio masonry filter item is empty
     */
    function eltdfInitLoadMoreItemsPortfolioFilter($portfolioList, $filterValue, $filterClassName) {

        var thisPortList = $portfolioList,
            thisPortListInner = thisPortList.find('.eltdf-pl-inner'),
            filterValue = $filterValue,
            filterClassName = $filterClassName,
            maxNumPages = 0;

        if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
            maxNumPages = thisPortList.data('max-num-pages');
        }

        var	loadMoreDatta = eltdf.modules.common.getLoadMoreData(thisPortList),
            nextPage = loadMoreDatta.nextPage,
	        ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'eltdf_core_portfolio_ajax_load_more'),
            loadingItem = thisPortList.find('.eltdf-pl-loading');

        if(nextPage <= maxNumPages) {
            loadingItem.addClass('eltdf-showing eltdf-filter-trigger');
            thisPortListInner.css('opacity', '0');

            $.ajax({
                type: 'POST',
                data: ajaxData,
                url: eltdfGlobalVars.vars.eltdfAjaxUrl,
                success: function (data) {
                    nextPage++;
                    thisPortList.data('next-page', nextPage);
                    var response = $.parseJSON(data),
                        responseHtml = response.html;

                    thisPortList.waitForImages(function () {
                        thisPortListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
                        var portListHasArtciles = !!thisPortListInner.children().hasClass(filterClassName);

                        if(portListHasArtciles) {
                            setTimeout(function() {
                                eltdfResizePortfolioItems(thisPortListInner.find('.eltdf-pl-masonry-grid-sizer').width(), thisPortList);
                                thisPortListInner.isotope('layout').isotope({filter: filterValue});
                                loadingItem.removeClass('eltdf-showing eltdf-filter-trigger');

                                setTimeout(function() {
                                    thisPortListInner.css('opacity', '1');
                                    eltdf.modules.parallax.eltdfInitParallax();
                                }, 150);
                            }, 400);
                        } else {
                            loadingItem.removeClass('eltdf-showing eltdf-filter-trigger');
                            eltdfInitLoadMoreItemsPortfolioFilter(thisPortList, filterValue, filterClassName);
                        }
                    });
                }
            });
        }
    }
	
	/**
	 * Initializes portfolio pagination functions
	 */
	function eltdfInitPortfolioPagination(){
		var portList = $('.eltdf-portfolio-list-holder');
		
		var initStandardPagination = function(thisPortList) {
			var standardLink = thisPortList.find('.eltdf-pl-standard-pagination li');
			
			if(standardLink.length) {
				standardLink.each(function(){
					var thisLink = $(this).children('a'),
						pagedLink = 1;
					
					thisLink.on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();
						
						if (typeof thisLink.data('paged') !== 'undefined' && thisLink.data('paged') !== false) {
							pagedLink = thisLink.data('paged');
						}
						
						initMainPagFunctionality(thisPortList, pagedLink);
					});
				});
			}
		};
		
		var initLoadMorePagination = function(thisPortList) {
			var loadMoreButton = thisPortList.find('.eltdf-pl-load-more a');
			
			loadMoreButton.on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				
				initMainPagFunctionality(thisPortList);
			});
		};
		
		var initInifiteScrollPagination = function(thisPortList) {
			var portListHeight = thisPortList.outerHeight(),
				portListTopOffest = thisPortList.offset().top,
				portListPosition = portListHeight + portListTopOffest - eltdfGlobalVars.vars.eltdfAddForAdminBar;
			
			if(!thisPortList.hasClass('eltdf-pl-infinite-scroll-started') && eltdf.scroll + eltdf.windowHeight > portListPosition) {
				initMainPagFunctionality(thisPortList);
			}
		};
		
		var initMainPagFunctionality = function(thisPortList, pagedLink) {
			var thisPortListInner = thisPortList.find('.eltdf-pl-inner'),
				nextPage,
				maxNumPages;
			
			if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
				maxNumPages = thisPortList.data('max-num-pages');
			}
			
			if(thisPortList.hasClass('eltdf-pl-pag-standard')) {
				thisPortList.data('next-page', pagedLink);
			}
			
			if(thisPortList.hasClass('eltdf-pl-pag-infinite-scroll')) {
				thisPortList.addClass('eltdf-pl-infinite-scroll-started');
			}
			
			var loadMoreDatta = eltdf.modules.common.getLoadMoreData(thisPortList),
				loadingItem = thisPortList.find('.eltdf-pl-loading');
			
			nextPage = loadMoreDatta.nextPage;
			
			if(nextPage <= maxNumPages){
				if(thisPortList.hasClass('eltdf-pl-pag-standard')) {
					loadingItem.addClass('eltdf-showing eltdf-standard-pag-trigger');
					thisPortList.addClass('eltdf-pl-pag-standard-animate');
				} else {
					loadingItem.addClass('eltdf-showing');
				}
				
				var ajaxData = eltdf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'eltdf_core_portfolio_ajax_load_more');
				
				$.ajax({
					type: 'POST',
					data: ajaxData,
					url: eltdfGlobalVars.vars.eltdfAjaxUrl,
					success: function (data) {
						if(!thisPortList.hasClass('eltdf-pl-pag-standard')) {
							nextPage++;
						}
						
						thisPortList.data('next-page', nextPage);
						
						var response = $.parseJSON(data),
							responseHtml =  response.html;
						
						if(thisPortList.hasClass('eltdf-pl-pag-standard')) {
							eltdfInitStandardPaginationLinkChanges(thisPortList, maxNumPages, nextPage);
							
							thisPortList.waitForImages(function(){
								if(thisPortList.hasClass('eltdf-pl-masonry')){
                                    eltdfResizePortfolioItems(thisPortListInner.find('.eltdf-pl-masonry-grid-sizer').width(), thisPortList);
									eltdfInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else if (thisPortList.hasClass('eltdf-pl-gallery') && thisPortList.hasClass('eltdf-pl-has-filter')) {
									eltdfInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else {
									eltdfInitHtmlGalleryNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								}
							});
						} else {
							thisPortList.waitForImages(function(){
								if(thisPortList.hasClass('eltdf-pl-masonry')){
									eltdfInitAppendIsotopeNewContent(thisPortListInner, loadingItem, responseHtml);
								} else if (thisPortList.hasClass('eltdf-pl-gallery') && thisPortList.hasClass('eltdf-pl-has-filter')) {
									eltdfInitAppendIsotopeNewContent(thisPortListInner, loadingItem, responseHtml);
								} else {
									eltdfInitAppendGalleryNewContent(thisPortListInner, loadingItem, responseHtml);
								}
							});
						}
						
						if(thisPortList.hasClass('eltdf-pl-infinite-scroll-started')) {
							thisPortList.removeClass('eltdf-pl-infinite-scroll-started');
						}
					}
				});
			}
			
			if(nextPage === maxNumPages){
				thisPortList.find('.eltdf-pl-load-more-holder').hide();
			}
		};
		
		var eltdfInitStandardPaginationLinkChanges = function(thisPortList, maxNumPages, nextPage) {
			var standardPagHolder = thisPortList.find('.eltdf-pl-standard-pagination'),
				standardPagNumericItem = standardPagHolder.find('li.eltdf-pl-pag-number'),
				standardPagPrevItem = standardPagHolder.find('li.eltdf-pl-pag-prev a'),
				standardPagNextItem = standardPagHolder.find('li.eltdf-pl-pag-next a');
			
			standardPagNumericItem.removeClass('eltdf-pl-pag-active');
			standardPagNumericItem.eq(nextPage-1).addClass('eltdf-pl-pag-active');
			
			standardPagPrevItem.data('paged', nextPage-1);
			standardPagNextItem.data('paged', nextPage+1);
			
			if(nextPage > 1) {
				standardPagPrevItem.css({'opacity': '1'});
			} else {
				standardPagPrevItem.css({'opacity': '0'});
			}
			
			if(nextPage === maxNumPages) {
				standardPagNextItem.css({'opacity': '0'});
			} else {
				standardPagNextItem.css({'opacity': '1'});
			}
		};
		
		var eltdfInitHtmlIsotopeNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
			thisPortListInner.html(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('eltdf-showing eltdf-standard-pag-trigger');
			thisPortList.removeClass('eltdf-pl-pag-standard-animate');
			
			setTimeout(function() {
				thisPortListInner.isotope('layout');
				eltdfInitPortfolioListAnimation();
                eltdf.modules.parallax.eltdfInitParallax();
			}, 400);
		};
		
		var eltdfInitHtmlGalleryNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('eltdf-showing eltdf-standard-pag-trigger');
			thisPortList.removeClass('eltdf-pl-pag-standard-animate');
			thisPortListInner.html(responseHtml);
			eltdfInitPortfolioListAnimation();
            eltdf.modules.parallax.eltdfInitParallax();
		};
		
		var eltdfInitAppendIsotopeNewContent = function(thisPortListInner, loadingItem, responseHtml) {
			thisPortListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('eltdf-showing');
			
			setTimeout(function() {
				thisPortListInner.isotope('layout');
				eltdfInitPortfolioListAnimation();
                eltdf.modules.parallax.eltdfInitParallax();
			}, 400);
		};
		
		var eltdfInitAppendGalleryNewContent = function(thisPortListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('eltdf-showing');
			thisPortListInner.append(responseHtml);
			eltdfInitPortfolioListAnimation();
            eltdf.modules.parallax.eltdfInitParallax();
		};
		
		return {
			init: function() {
				if(portList.length) {
					portList.each(function() {
						var thisPortList = $(this);
						
						if(thisPortList.hasClass('eltdf-pl-pag-standard')) {
							initStandardPagination(thisPortList);
						}
						
						if(thisPortList.hasClass('eltdf-pl-pag-load-more')) {
							initLoadMorePagination(thisPortList);
						}
						
						if(thisPortList.hasClass('eltdf-pl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisPortList);
						}
					});
				}
			},
			scroll: function() {
				if(portList.length) {
					portList.each(function() {
						var thisPortList = $(this);
						
						if(thisPortList.hasClass('eltdf-pl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisPortList);
						}
					});
				}
			}
		};
	}

    var eltdfPortfolioSingleFollow = function() {

        var info = $('.eltdf-follow-portfolio-info .eltdf-portfolio-single-holder .eltdf-ps-info-sticky-holder');

        if (info.length) {
            var infoHolderOffset = info.offset().top,
                infoHolderHeight = info.height(),
                mediaHolder = $('.eltdf-ps-image-holder'),
                mediaHolderHeight = mediaHolder.height(),
                header = $('.header-appear, .eltdf-fixed-wrapper'),
                headerHeight = (header.length) ? header.height() : 0;
        }

        var infoHolderPosition = function() {

            if(info.length) {

                if (mediaHolderHeight > infoHolderHeight) {
                    if(eltdf.scroll > infoHolderOffset) {
                        var marginTop = eltdf.scroll + headerHeight + eltdfGlobalVars.vars.eltdfAddForAdminBar - infoHolderOffset;
                        // if scroll is initially positioned below mediaHolderHeight
                        if(marginTop + infoHolderHeight > mediaHolderHeight){
                            marginTop = mediaHolderHeight - infoHolderHeight;
                        }
                        info.animate({
                            marginTop: marginTop
                        });
                    }
                }
            }
        };

        var recalculateInfoHolderPosition = function() {

            if (info.length) {
                if(mediaHolderHeight > infoHolderHeight) {
                    if(eltdf.scroll > infoHolderOffset) {
                    	
                        if(eltdf.scroll + headerHeight + infoHolderHeight <  mediaHolderHeight) {
                            //Calculate header height if header appears
                            if ($('.header-appear, .eltdf-fixed-wrapper').length) {
                                headerHeight = $('.header-appear, .eltdf-fixed-wrapper').height();
                            }
                            info.stop().animate({
                                marginTop: (eltdf.scroll + headerHeight + eltdfGlobalVars.vars.eltdfAddForAdminBar - infoHolderOffset)
                            });
                            //Reset header height
                            headerHeight = 0;
                        } else{
                            info.stop().animate({
                            	marginTop: mediaHolderHeight - infoHolderHeight
                            });
                        }
                    } else {
                        info.stop().animate({
                            marginTop: 0
                        });
                    }
                }
            }
        };

        return {
            init : function() {
                infoHolderPosition();
                $(window).scroll(function(){
                    recalculateInfoHolderPosition();
                });
            }
        };
    };
	
	function initPortfolioSingleMasonry(){
		var masonryHolder = $('.eltdf-portfolio-single-holder .eltdf-ps-masonry-images'),
			masonry = masonryHolder.children();
		
		if(masonry.length){
            masonry.isotope({
                layoutMode: 'packery',
                itemSelector: '.eltdf-ps-image',
                percentPosition: true,
                packery: {
                    gutter: '.eltdf-ps-grid-gutter',
                    columnWidth: '.eltdf-ps-grid-sizer'
                }
            });

            masonry.css('opacity', '1');
		}
	}

})(jQuery);
(function($) {
    'use strict';

    var team = {};
    eltdf.modules.team = team;

    team.eltdfOnDocumentReady = eltdfOnDocumentReady;
    team.eltdfOnWindowLoad = eltdfOnWindowLoad;
    team.eltdfOnWindowResize = eltdfOnWindowResize;
    team.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).load(eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);
    
    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function eltdfOnDocumentReady() {
    	eltdfTeamInfoBox();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function eltdfOnWindowLoad() {
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function eltdfOnWindowResize() {
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function eltdfOnWindowScroll() {
    }

	function eltdfTeamInfoBox(){

        var teamInfomembers = $('.eltdf-team-list-holder.eltdf-tl-opening-info-popup .eltdf-team');
        var modal = $('.eltdf-team-modal-holder');


        if(teamInfomembers.length) {
            teamInfomembers.each(function () {

                var teamInfoMember = $(this);

                teamInfoMember.find('a').on('click', function(e){
                	e.preventDefault();
                    teamInfoMember.addClass('eltdf-tl-modal-loading');
                    teamInfoMember.addClass('eltdf-tl-modal-active');
                    teamInfomembers.not(teamInfoMember).addClass('eltdf-tl-modal-blocked');

                    var ajaxData = {
                        action: 'eltdf_core_team_list_info_opening',
                        member_id : teamInfoMember.data('member-id')
                    };

                    $.ajax({
                        type: 'POST',
                        data: ajaxData,
                        url: eltdfGlobalVars.vars.eltdfAjaxUrl,
                        success: function (data) {
                          var response = JSON.parse(data);
                          var responseHtml = response.html;
                            modal.empty();
                            modal.append(responseHtml);

                            eltdf.body.addClass('eltdf-team-info-opened');
                            eltdf.html.addClass('eltdf-scroll-disabled');
                            teamInfoMember.removeClass('eltdf-tl-modal-loading');
                            setTimeout(function(){
                            	modal.addClass('eltdf-modal-opened');
                            },300);

                            var box = modal.find('.eltdf-team-box');

                            modal.find('.eltdf-close').on('click', function(){
                                modal.empty();
                                eltdf.body.removeClass('eltdf-team-info-opened');
                                eltdf.html.removeClass('eltdf-scroll-disabled');
                            	modal.removeClass('eltdf-modal-opened');
                   				teamInfomembers.removeClass('eltdf-tl-modal-active');
                    			teamInfomembers.removeClass('eltdf-tl-modal-blocked');
                            });

                            //Close on click away
                            $(document).mouseup(function (e) {
                            	if (modal.hasClass('eltdf-modal-opened')){
	                                var container = $(".eltdf-team-popup-content");
	                                if (!container.is(e.target) && container.has(e.target).length === 0)  {
	                                    e.preventDefault();
	                                    modal.empty();
		                                eltdf.body.removeClass('eltdf-team-info-opened');
		                                eltdf.html.removeClass('eltdf-scroll-disabled');
		                            	modal.removeClass('eltdf-modal-opened');
	                   					teamInfomembers.removeClass('eltdf-tl-modal-active');
	                    				teamInfomembers.removeClass('eltdf-tl-modal-blocked');
	                                }
	                            }
                            });
                        }
                    });
                });
            });
        }
        


    }

})(jQuery);
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