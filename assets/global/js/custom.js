jQuery(document).ready(function($) {
    
    /* Superfish Menu Call */
    $('#profound_menu').superfish({});
    
    /* Responsive Menu */
    $('.primarymenu-resp').toggle(function(){
        $('.primarymenu-section').addClass('menuClicked');
        $('.menuClicked').slideDown();
        $('.menuClicked ul.sub-menu').show().css('visibility', 'visible');
        $('.menuClicked ul.children').show().css('visibility', 'visible');
        $('.menuClicked ul.sf-menu').removeClass('sf-js-enabled');
    }, function(){
        $('.menuClicked').hide();
        $('.menuClicked ul.sf-menu').addClass('sf-js-enabled');
        $('.menuClicked ul.sub-menu').hide().css('visibility', 'hidden');
        $('.menuClicked ul.children').hide().css('visibility', 'hidden');
        $('.primarymenu-section').removeClass('menuClicked');
    });
    
    $(window).resize(function(){
       if( $('.primarymenu-resp').css('display') != 'block'){
           
           $('.primarymenu-section').removeClass('menuClicked');
           $('.primarymenu-section ul.sf-menu').addClass('sf-js-enabled');
           $('.primarymenu-section ul.sub-menu').hide().css('visibility', 'hidden');
           $('.primarymenu-section ul.children').hide().css('visibility', 'hidden');
       } else {
           $('.primarymenu-section').addClass('menuClicked');
           $('.primarymenu-section ul.sf-menu').removeClass('sf-js-enabled');
           $('.primarymenu-section ul.sub-menu').show().css('visibility', 'visible');
           $('.primarymenu-section ul.children').show().css('visibility', 'visible');
       }
    });
    
    /* Flexslider */
      $('.flexslider').flexslider({
                animation: profound_slide_vars.animation,
		direction: profound_slide_vars.direction,
		slideshow: true,
		slideshowSpeed: parseInt(profound_slide_vars.slideshowSpeed),
		animationSpeed: parseInt(profound_slide_vars.animationSpeed),
		pauseOnAction: true,
		controlNav: false,
                directionNav: Boolean(profound_slide_vars.directionNav),
		smoothHeight: Boolean(profound_slide_vars.smoothHeight),
      });

});