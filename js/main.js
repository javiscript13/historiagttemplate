jQuery(window).scroll(function() {    
    var scroll = jQuery(window).scrollTop();
    if (scroll == 0) {
        jQuery(".pageHead").removeClass("navbar-fixed-top");
        jQuery("#siteLogo").removeClass("col-sm-offset-2 col-sm-8");
        jQuery("#siteLogo").addClass("col-sm-12");
  	 }
    if (scroll >= 1) {
        jQuery(".pageHead").addClass("navbar-fixed-top");
        jQuery("#siteLogo").removeClass("col-sm-12");
        jQuery("#siteLogo").addClass("col-sm-offset-2 col-sm-8");
    }
}); 

/*
function adjust_body_offset() {
    jQuery('.pageBody').css('margin-top', jQuery('.pageHead').outerHeight(true) + 'px' );
}

jQuery(window).resize(adjust_body_offset);

jQuery(document).ready(adjust_body_offset);
*/
