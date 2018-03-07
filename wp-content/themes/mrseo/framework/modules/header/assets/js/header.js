(function($) {
	"use strict";
	
	var header = {};
	eltdf.modules.header = header;
	
	header.eltdfOnDocumentReady = eltdfOnDocumentReady;
	header.eltdfOnWindowLoad = eltdfOnWindowLoad;
	header.eltdfOnWindowResize = eltdfOnWindowResize;
	header.eltdfOnWindowScroll = eltdfOnWindowScroll;
	
	$(document).ready(eltdfOnDocumentReady);
	$(window).load(eltdfOnWindowLoad);
	$(window).resize(eltdfOnWindowResize);
	$(window).scroll(eltdfOnWindowScroll);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfSetDropDownMenuPosition();
		eltdfDropDownMenu();
		eltdfSearch();
		eltdfSideArea();
		eltdfSideAreaScroll();
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
	
	/**
	 * Set dropdown position
	 */
	function eltdfSetDropDownMenuPosition(){
		var menuItems = $(".eltdf-drop-down > ul > li.narrow");
		
		if(menuItems.length) {
			menuItems.each( function(i) {
				var browserWidth = eltdf.windowWidth-16,
					menuItemPosition = $(this).offset().left,
					dropdownMenuWidth = $(this).find('.second .inner ul').width(),
					menuItemFromLeft = 0; // 16 is width of scroll bar
				
				if(eltdf.body.hasClass('eltdf-boxed')){
					menuItemFromLeft = eltdf.boxedLayoutWidth  - (menuItemPosition - (browserWidth - eltdf.boxedLayoutWidth )/2);
				} else {
					menuItemFromLeft = browserWidth - menuItemPosition;
				}
				
				var dropDownMenuFromLeft; //has to stay undefined beacuse 'dropDownMenuFromLeft < dropdownMenuWidth' condition will be true
				
				if($(this).find('li.sub').length > 0){
					dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
				}
				
				if(menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth){
					$(this).find('.second').addClass('right');
					$(this).find('.second .inner ul').addClass('right');
				}
			});
		}
	}
	
	function eltdfDropDownMenu() {
		var menu_items = $('.eltdf-drop-down > ul > li');
		
		menu_items.each(function(i) {
			if($(menu_items[i]).find('.second').length > 0) {
				var dropDownSecondDiv = $(menu_items[i]).find('.second');
				
				if($(menu_items[i]).hasClass('wide')) {
					if(!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
						dropDownSecondDiv.css('left', 0);
					}
					
					//set columns to be same height - start
					var tallest = 0;
					$(this).find('.second > .inner > ul > li').each(function() {
						var thisHeight = $(this).height();
						if(thisHeight > tallest) {
							tallest = thisHeight;
						}
					});
					
					$(this).find('.second > .inner > ul > li').css("height", ""); // delete old inline css - via resize
					$(this).find('.second > .inner > ul > li').height(tallest);
					//set columns to be same height - end
					
					var left_position;
					
					if(!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
						left_position = dropDownSecondDiv.offset().left;
						
						dropDownSecondDiv.css('left', -left_position);
						dropDownSecondDiv.css('width', eltdf.windowWidth);
					}
				}
				
				if(!eltdf.menuDropdownHeightSet) {
					$(menu_items[i]).data('original_height', dropDownSecondDiv.height() + 'px');
					dropDownSecondDiv.height(0);
				}
				
				if(navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
					$(menu_items[i]).on("touchstart mouseenter", function() {
						dropDownSecondDiv.css({
							'height': $(menu_items[i]).data('original_height'),
							'overflow': 'visible',
							'visibility': 'visible',
							'opacity': '1'
						});
					}).on("mouseleave", function() {
						dropDownSecondDiv.css({
							'height': '0px',
							'overflow': 'hidden',
							'visibility': 'hidden',
							'opacity': '0'
						});
					});
				} else {
					if(eltdf.body.hasClass('eltdf-dropdown-animate-height')) {
						var config = {
							over: function() {
								dropDownSecondDiv.addClass('eltdf-drop-down-start');
								dropDownSecondDiv.css({
									'visibility': 'visible',
									'height': '0px',
								});
								dropDownSecondDiv.stop().animate({
									'height': $(menu_items[i]).data('original_height'),
								}, 400, 'easeInOutQuint', function() {
									dropDownSecondDiv.css('overflow', 'visible');
								});
							},
							timeout: 150,
							out: function() {
								dropDownSecondDiv.removeClass('eltdf-drop-down-start');
								dropDownSecondDiv.stop().animate({
									'height': '0px'
								}, 150, function() {
									dropDownSecondDiv.css({
										'overflow': 'hidden',
										'visibility': 'hidden'
									});
								});
							}
						};

						$(menu_items[i]).hoverIntent(config);
					} else {
						var config = {
							interval: 0,
							over: function() {
								setTimeout(function() {
									dropDownSecondDiv.addClass('eltdf-drop-down-start');
									dropDownSecondDiv.stop().css({'height': $(menu_items[i]).data('original_height')});
								}, 150);
							},
							timeout: 150,
							out: function() {
								dropDownSecondDiv.stop().css({'height': '0px'});
								dropDownSecondDiv.removeClass('eltdf-drop-down-start');
							}
						};
						$(menu_items[i]).hoverIntent(config);
					}
				}
			}
		});
		
		$('.eltdf-drop-down ul li.wide ul li a').on('click', function(e) {
			if (e.which == 1){
				var $this = $(this);
				setTimeout(function() {
					$this.mouseleave();
				}, 500);
			}
		});
		
		eltdf.menuDropdownHeightSet = true;
	}
	
	/**
	 * Init Search Types
	 */
	function eltdfSearch() {
		var searchOpener = $('a.eltdf-search-opener'),
			searchForm,
			searchClose;
		
		if ( searchOpener.length > 0 ) {
			//Check for type of search
			if ( eltdf.body.hasClass( 'eltdf-fullscreen-search' ) ) {
				searchClose = $( '.eltdf-fullscreen-search-close' );
				eltdfFullscreenSearch();
				
			} else if ( eltdf.body.hasClass( 'eltdf-slide-from-header-bottom' ) ) {
				eltdfSearchSlideFromHeaderBottom();
				
			} else if ( eltdf.body.hasClass( 'eltdf-search-covers-header' ) ) {
				eltdfSearchCoversHeader();
				
			} else if ( eltdf.body.hasClass( 'eltdf-search-slides-from-window-top' ) ) {
				searchForm = $('.eltdf-search-slide-window-top');
				searchClose = $('.eltdf-swt-search-close');
				eltdfSearchWindowTop();
			}
		}
		
		/**
		 * Fullscreen search fade
		 */
		function eltdfFullscreenSearch() {
			var searchHolder = $('.eltdf-fullscreen-search-holder');
			
			searchOpener.click(function (e) {
				e.preventDefault();
				
				if (searchHolder.hasClass('eltdf-animate')) {
					eltdf.body.removeClass('eltdf-fullscreen-search-opened eltdf-search-fade-out');
					eltdf.body.removeClass('eltdf-search-fade-in');
					searchHolder.removeClass('eltdf-animate');
					
					setTimeout(function () {
						searchHolder.find('.eltdf-search-field').val('');
						searchHolder.find('.eltdf-search-field').blur();
					}, 300);
					
					eltdf.modules.common.eltdfEnableScroll();
				} else {
					eltdf.body.addClass('eltdf-fullscreen-search-opened eltdf-search-fade-in');
					eltdf.body.removeClass('eltdf-search-fade-out');
					searchHolder.addClass('eltdf-animate');
					
					setTimeout(function () {
						searchHolder.find('.eltdf-search-field').focus();
					}, 900);
					
					eltdf.modules.common.eltdfDisableScroll();
				}
				
				searchClose.click(function (e) {
					e.preventDefault();
					eltdf.body.removeClass('eltdf-fullscreen-search-opened eltdf-search-fade-in');
					eltdf.body.addClass('eltdf-search-fade-out');
					searchHolder.removeClass('eltdf-animate');
					
					setTimeout(function () {
						searchHolder.find('.eltdf-search-field').val('');
						searchHolder.find('.eltdf-search-field').blur();
					}, 300);
					
					eltdf.modules.common.eltdfEnableScroll();
				});
				
				//Close on click away
				$(document).mouseup(function (e) {
					var container = $(".eltdf-form-holder-inner");
					
					if (!container.is(e.target) && container.has(e.target).length === 0) {
						e.preventDefault();
						eltdf.body.removeClass('eltdf-fullscreen-search-opened eltdf-search-fade-in');
						eltdf.body.addClass('eltdf-search-fade-out');
						searchHolder.removeClass('eltdf-animate');
						
						setTimeout(function () {
							searchHolder.find('.eltdf-search-field').val('');
							searchHolder.find('.eltdf-search-field').blur();
						}, 300);
						
						eltdf.modules.common.eltdfEnableScroll();
					}
				});
				
				//Close on escape
				$(document).keyup(function (e) {
					if (e.keyCode == 27) { //KeyCode for ESC button is 27
						eltdf.body.removeClass('eltdf-fullscreen-search-opened eltdf-search-fade-in');
						eltdf.body.addClass('eltdf-search-fade-out');
						searchHolder.removeClass('eltdf-animate');
						
						setTimeout(function () {
							searchHolder.find('.eltdf-search-field').val('');
							searchHolder.find('.eltdf-search-field').blur();
						}, 300);
						
						eltdf.modules.common.eltdfEnableScroll();
					}
				});
			});
			
			//Text input focus change
			var inputSearchField = $('.eltdf-fullscreen-search-holder .eltdf-search-field'),
				inputSearchLine = $('.eltdf-fullscreen-search-holder .eltdf-field-holder .eltdf-line');
			
			inputSearchField.focus(function () {
				inputSearchLine.css('width', '100%');
			});
			
			inputSearchField.blur(function () {
				inputSearchLine.css('width', '0');
			});
		}
		
		/**
		 * Search covers header type of search
		 */
		function eltdfSearchCoversHeader() {
			searchOpener.click(function (e) {
				e.preventDefault();
				
				var thisSearchOpener = $(this),
					searchFormHeight,
					searchFormHeaderHolder = $('.eltdf-page-header'),
					searchFormTopHeaderHolder = $('.eltdf-top-bar'),
					searchFormFixedHeaderHolder = searchFormHeaderHolder.find('.eltdf-fixed-wrapper.fixed'),
					searchFormMobileHeaderHolder = $('.eltdf-mobile-header'),
					searchForm = $('.eltdf-search-cover'),
					searchFormIsInTopHeader = !!thisSearchOpener.parents('.eltdf-top-bar').length,
					searchFormIsInFixedHeader = !!thisSearchOpener.parents('.eltdf-fixed-wrapper.fixed').length,
					searchFormIsInStickyHeader = !!thisSearchOpener.parents('.eltdf-sticky-header').length,
					searchFormIsInMobileHeader = !!thisSearchOpener.parents('.eltdf-mobile-header').length;
				
				searchForm.removeClass('eltdf-is-active');
				
				//Find search form position in header and height
				if (searchFormIsInTopHeader) {
					searchFormHeight = eltdfGlobalVars.vars.eltdfTopBarHeight;
					searchFormTopHeaderHolder.find('.eltdf-search-cover').addClass('eltdf-is-active');
					
				} else if (searchFormIsInFixedHeader) {
					searchFormHeight = searchFormFixedHeaderHolder.outerHeight();
					searchFormHeaderHolder.children('.eltdf-search-cover').addClass('eltdf-is-active');
					
				} else if (searchFormIsInStickyHeader) {
					searchFormHeight = eltdfGlobalVars.vars.eltdfStickyHeaderHeight;
					searchFormHeaderHolder.children('.eltdf-search-cover').addClass('eltdf-is-active');
					
				} else if (searchFormIsInMobileHeader) {
					if(searchFormMobileHeaderHolder.hasClass('mobile-header-appear')) {
						searchFormHeight = searchFormMobileHeaderHolder.children('.eltdf-mobile-header-inner').outerHeight();
					} else {
						searchFormHeight = searchFormMobileHeaderHolder.outerHeight();
					}
					
					searchFormMobileHeaderHolder.find('.eltdf-search-cover').addClass('eltdf-is-active');
					
				} else {
					searchFormHeight = searchFormHeaderHolder.outerHeight();
					searchFormHeaderHolder.children('.eltdf-search-cover').addClass('eltdf-is-active');
				}
				
				if(searchForm.hasClass('eltdf-is-active')) {
					searchForm.height(searchFormHeight).stop(true).fadeIn(600).find('input[type="text"]').focus();
				}
				
				searchForm.find('.eltdf-search-close').click(function (e) {
					e.preventDefault();
					searchForm.stop(true).fadeOut(450);
				});
				
				searchForm.blur(function () {
					searchForm.stop(true).fadeOut(450);
				});
				
				$(window).scroll(function(){
					searchForm.stop(true).fadeOut(450);
				});
			});
		}
		
		/**
		 * Search slides from window top type of search
		 */
		function eltdfSearchWindowTop() {
			searchOpener.click( function(e) {
				e.preventDefault();
				
				if ( searchForm.height() == "0") {
					$('.eltdf-search-slide-window-top input[type="text"]').focus();
					//Push header bottom
					eltdf.body.addClass('eltdf-search-open');
				} else {
					eltdf.body.removeClass('eltdf-search-open');
				}
				
				$(window).scroll(function() {
					if ( searchForm.height() != '0' && eltdf.scroll > 50 ) {
						eltdf.body.removeClass('eltdf-search-open');
					}
				});
				
				searchClose.click(function(e){
					e.preventDefault();
					eltdf.body.removeClass('eltdf-search-open');
				});
			});
		}
		
		/**
		 * Search slide from header bottom type of search
		 */
		function eltdfSearchSlideFromHeaderBottom() {
			searchOpener.click( function(e) {
				e.preventDefault();
				
				var thisSearchOpener = $(this),
					searchIconPosition = parseInt(eltdf.windowWidth - thisSearchOpener.offset().left - thisSearchOpener.outerWidth());
				
				if(eltdf.body.hasClass('eltdf-boxed') && eltdf.windowWidth > 1024) {
					searchIconPosition -= parseInt((eltdf.windowWidth - $('.eltdf-boxed .eltdf-wrapper .eltdf-wrapper-inner').outerWidth()) / 2);
				}
				
				var searchFormHeaderHolder = $('.eltdf-page-header'),
					searchFormTopOffset = '100%',
					searchFormTopHeaderHolder = $('.eltdf-top-bar'),
					searchFormFixedHeaderHolder = searchFormHeaderHolder.find('.eltdf-fixed-wrapper.fixed'),
					searchFormMobileHeaderHolder = $('.eltdf-mobile-header'),
					searchForm = $('.eltdf-slide-from-header-bottom-holder'),
					searchFormIsInTopHeader = !!thisSearchOpener.parents('.eltdf-top-bar').length,
					searchFormIsInFixedHeader = !!thisSearchOpener.parents('.eltdf-fixed-wrapper.fixed').length,
					searchFormIsInStickyHeader = !!thisSearchOpener.parents('.eltdf-sticky-header').length,
					searchFormIsInMobileHeader = !!thisSearchOpener.parents('.eltdf-mobile-header').length;
				
				searchForm.removeClass('eltdf-is-active');
				
				//Find search form position in header and height
				if (searchFormIsInTopHeader) {
					searchFormTopHeaderHolder.find('.eltdf-slide-from-header-bottom-holder').addClass('eltdf-is-active');
					
				} else if (searchFormIsInFixedHeader) {
					searchFormTopOffset = searchFormFixedHeaderHolder.outerHeight() + eltdfGlobalVars.vars.eltdfAddForAdminBar;;
					searchFormHeaderHolder.children('.eltdf-slide-from-header-bottom-holder').addClass('eltdf-is-active');
					
				} else if (searchFormIsInStickyHeader) {
					searchFormTopOffset = eltdfGlobalVars.vars.eltdfStickyHeaderHeight + eltdfGlobalVars.vars.eltdfAddForAdminBar;;
					searchFormHeaderHolder.children('.eltdf-slide-from-header-bottom-holder').addClass('eltdf-is-active');
					
				} else if (searchFormIsInMobileHeader) {
					if(searchFormMobileHeaderHolder.hasClass('mobile-header-appear')) {
						searchFormTopOffset = searchFormMobileHeaderHolder.children('.eltdf-mobile-header-inner').outerHeight() + eltdfGlobalVars.vars.eltdfAddForAdminBar;
					}
					searchFormMobileHeaderHolder.find('.eltdf-slide-from-header-bottom-holder').addClass('eltdf-is-active');
					
				} else {
					searchFormHeaderHolder.children('.eltdf-slide-from-header-bottom-holder').addClass('eltdf-is-active');
				}
				
				if(searchForm.hasClass('eltdf-is-active')) {
					searchForm.css({'right': searchIconPosition, 'top': searchFormTopOffset}).stop(true).slideToggle(300, 'easeOutBack');
				}
				
				//Close on escape
				$(document).keyup(function(e){
					if (e.keyCode == 27 ) { //KeyCode for ESC button is 27
						searchForm.stop(true).fadeOut(0);
					}
				});
				
				$(window).scroll(function(){
					searchForm.stop(true).fadeOut(0);
				});
			});
		}
	}
	
	/**
	 * Show/hide side area
	 */
	function eltdfSideArea() {
		
		var wrapper = $('.eltdf-wrapper'),
			sideMenuButtonOpen = $('a.eltdf-side-menu-button-opener'),
			cssClass = 'eltdf-right-side-menu-opened';
		
		wrapper.prepend('<div class="eltdf-cover"/>');
		
		$('a.eltdf-side-menu-button-opener, a.eltdf-close-side-menu').click( function(e) {
			e.preventDefault();
			
			if(!sideMenuButtonOpen.hasClass('opened')) {
				
				sideMenuButtonOpen.addClass('opened');
				eltdf.body.addClass(cssClass);
				
				$('.eltdf-wrapper .eltdf-cover').click(function() {
					eltdf.body.removeClass('eltdf-right-side-menu-opened');
					sideMenuButtonOpen.removeClass('opened');
				});
				
				var currentScroll = $(window).scrollTop();
				$(window).scroll(function() {
					if(Math.abs(eltdf.scroll - currentScroll) > 400){
						eltdf.body.removeClass(cssClass);
						sideMenuButtonOpen.removeClass('opened');
					}
				});
			} else {
				sideMenuButtonOpen.removeClass('opened');
				eltdf.body.removeClass(cssClass);
			}
		});
	}
	
	/*
	 **  Smooth scroll functionality for Side Area
	 */
	function eltdfSideAreaScroll(){
		var sideMenu = $('.eltdf-side-menu');
		
		if(sideMenu.length){
			sideMenu.niceScroll({
				scrollspeed: 60,
				mousescrollstep: 40,
				cursorwidth: 0,
				cursorborder: 0,
				cursorborderradius: 0,
				cursorcolor: "transparent",
				autohidemode: false,
				horizrailenabled: false
			});
		}
	}
	
})(jQuery);