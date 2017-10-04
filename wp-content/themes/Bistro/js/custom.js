jQuery(document).ready(function() {

    // Homepage
	function abso() {
        jQuery('.home #masthead').css({
            width: jQuery(window).width(),
            height: jQuery(window).height()
        });
    }

    jQuery(window).resize(function() {
        abso();         
    });
    abso();

    // Tinnav
    jQuery("#bistro").tinyNav();


    // Homepage slideshow
    jQuery('.hslides').superslides({animation:'fade',play:5000,pagination:false});

    // Prettyphoto
    jQuery("a[rel^='prettyPhoto']").prettyPhoto();  

    //Recipe

    jQuery(".ingredients ul li").prepend('<i class="fa fa-square-o"></i>')

    jQuery(".ingredients ul li i").toggle(function() {
        jQuery(this).removeClass("fa-square-o");
        jQuery(this).addClass("fa-check-square");
     
    }, function() {
        jQuery(this).removeClass("fa-check-square");
        jQuery(this).addClass("fa-square-o");
        
    });

    jQuery(".steps ol li").click(function() {
        jQuery(this).toggleClass("checked");
    });
});	

