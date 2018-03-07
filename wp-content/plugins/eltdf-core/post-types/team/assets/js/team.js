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