/*   
 * Template Name: Unify - Responsive Bootstrap Template
 * Description: Business, Corporate, Portfolio and Blog Theme.
 * Version: 1.4
 * Author: @htmlstream
 * Website: http://htmlstream.com
*/


var App = function () {
    function handleIEFixes() {
        //fix html5 placeholder attribute for ie7 & ie8
        if (jQuery.browser.msie && jQuery.browser.version.substr(0, 1) < 9) { // ie7&ie8
            jQuery('input[placeholder], textarea[placeholder]').each(function () {
                var input = jQuery(this);

                jQuery(input).val(input.attr('placeholder'));

                jQuery(input).focus(function () {
                    if (input.val() == input.attr('placeholder')) {
                        input.val('');
                    }
                });

                jQuery(input).blur(function () {
                    if (input.val() == '' || input.val() == input.attr('placeholder')) {
                        input.val(input.attr('placeholder'));
                    }
                });
            });
        }
    }

    function handleBootstrap() {
        /*Bootstrap Carousel*/
        jQuery('.carousel').carousel({
            interval: 15000,
            pause: 'hover'
        });

        /*Tooltips*/
        
        jQuery('.tooltips').tooltip();
        jQuery('.tooltips-show').tooltip('show');      
        jQuery('.tooltips-hide').tooltip('hide');       
        jQuery('.tooltips-toggle').tooltip('toggle');       
        jQuery('.tooltips-destroy').tooltip('destroy');    

        /*Popovers*/
        jQuery('.popovers').popover();
        jQuery('.popovers-show').popover('show');
        jQuery('.popovers-hide').popover('hide');
        jQuery('.popovers-toggle').popover('toggle');
        jQuery('.popovers-destroy').popover('destroy');
    }

    function handleSearch() {    
        jQuery('.search').click(function () {
            if(jQuery('.search-btn').hasClass('fa-search')){
                jQuery('.search-open').fadeIn(500);
                jQuery('.search-btn').removeClass('fa-search');
                jQuery('.search-btn').addClass('fa-times');
            } else {
                jQuery('.search-open').fadeOut(500);
                jQuery('.search-btn').addClass('fa-search');
                jQuery('.search-btn').removeClass('fa-times');
            }   
        }); 
    }

    function handleToggle() {
        jQuery('.list-toggle').on('click', function() {
            jQuery(this).toggleClass('active');
        });
   }

   function handleHeader() {
         jQuery(window).scroll(function() {
            if (jQuery(window).scrollTop()>100){
                jQuery(".header-fixed .header").addClass("header-fixed-shrink");
            }
            else {
                jQuery(".header-fixed .header").removeClass("header-fixed-shrink");
            }
        });
    }
    
    function hideTopBar() {
    	$(document).on("scroll", function() {

    		if ($(document).scrollTop() > 100) {
    			$(".topbar").slideUp();
    			$("#main-navi").addClass("bottomonly-shadow");
    			

    		} else {
    			$(".topbar").slideDown();
    			$("#main-navi").removeClass("bottomonly-shadow");
    		}
    	});
   }
  //Hover Selector
    function handleHoverSelector() {
        $('.hoverSelector').on('hover', function(e) {  
            $('.hoverSelectorBlock', this).toggleClass('show');
            e.stopPropagation();            
        });
    }   
   
    //Equal Height Columns    
    function handleEqualHeightColumns() {
        var EqualHeightColumns = function () {            
            $(".equal-height-columns").each(function() {
                heights = [];              
                $(".equal-height-column", this).each(function() {
                    $(this).removeAttr("style");
                    heights.push($(this).height()); // write column's heights to the array
                });
                $(".equal-height-column", this).height(Math.max.apply(Math, heights)); //find and set max
            });
        }
       
        EqualHeightColumns();        
        $(window).resize(function() {            
            EqualHeightColumns();
        });
        $(window).load(function() {
            EqualHeightColumns("img.equal-height-column");
        });
    } 
   
    function iscivitiNewsletter() {
    	var msg = '';
    	
    	jQuery('#btn-newsletter-subscribe').click(function(){
	    	
	    		    //showWait();
		    		$.ajax({
                    type : 'GET',
                    url : urlAjaxHandler+"/validate/newsletter",
                    data : {
                    	email      : $('#email').val(),			
		    			Firstname  : $('#nome').val(),
                    },
                    dataType : 'json',
                    success : function(response) {
                        if (response.status) {
                        	updateModalAlertMsg(response.msg);
                        }
                        else updateModalAlertMsg(response.msg);
                    },
                    error : function(response) {
                    	updateModalAlertMsg('Sorry! Error');
                    }
                 });
    	 });
	    	
    }
    
    return {
        init: function () {
            handleBootstrap();
            handleIEFixes();
            handleSearch();
            handleToggle();
            handleHeader();
            hideTopBar();
            handleHoverSelector();
            handleEqualHeightColumns();
            iscivitiNewsletter();
        },

     

        initFancybox: function () {
            jQuery(".fancybox-button").fancybox({
            groupAttr: 'data-rel',
            prevEffect: 'none',
            nextEffect: 'none',
            closeBtn: true,
            helpers: {
                title: {
                    type: 'inside'
                    }
                }
            });

            jQuery(".iframe").fancybox({
                maxWidth    : 800,
                maxHeight   : 600,
                fitToView   : false,
                width       : '70%',
                height      : '70%',
                autoSize    : false,
                closeClick  : false,
                openEffect  : 'none',
                closeEffect : 'none'
            });            
        },

        initCounter: function () {
            jQuery('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        },

        initParallaxBg: function () {
            jQuery('.parallaxBg').parallax("50%", 0.2);
        },
        initMasorny: function () {
        	var $containerM = $('#masonryBox');
        	$containerM.imagesLoaded( function() {
    	 		$containerM.masonry();
    		});
        },
        
        initWoW: function () {
        	 new WOW().init({
   		      mobile:       false,       // default
   		      live:         true        // default
        	 });
        },

    };

}();

/************************************** GESTIONE  DONAZIONI ************************/

 function popolaPP(obj) {
	
	  var  item_name  = $(obj).val()
	  var  item_code  = $(obj).data('code');
	  var  item_price = $(obj).data('price')
	  $("input[name=item_name]").val(item_name)
	  $("input[name=item_number]").val(item_code)
	  $("input[name=amount]").val(item_price)
	 
 }
 
 
 function popolaPPDonate(obj) {
	  scrollToAnchor('donation')
	  var  item_name  = $(obj).val()
	  var  item_code  = $(obj).data('code');
	  var  item_price = $(obj).data('price')
	  $("input[name=item_name]").val(item_name)
	  $("input[name=item_number]").val(item_code)
	  $("input[name=amount]").val(item_price)
	 
}
 
function scrollToAnchor(aid){
	
	 window.location.hash = '#'+aid;
}


/******************************** MODAL ************************/


if (isNewsletterActived == 1) updateModalAlertMsg(t("NewsletterActived"));

function updateModalAlertMsg($htmlContent) {
    bootbox.alert($htmlContent, function(result) {
        if (result === false) {

        } else {

        }
    });
}

function showWait() {
	updateModalAlertMsg ('.....Attendere prego.....')
}

function updateModalBoxMsg($htmlContent) {
    bootbox.confirm($htmlContent, function(result) {
        if (result === false) {

        } else {

        }
    });
}

/*********************************  localize *********************/

function t(str) {
	if (localized[str].length>0) {
		return localized[str];
	} else {
		return str;
	}
}
