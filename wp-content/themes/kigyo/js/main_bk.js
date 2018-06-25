var w = $(window).width();
(function() {  
    $(window).on('load',function() {        
        contactForm();
        eventGotoTopPage();
       
    });

    $(window).on('resize', function() {
        w = $(window).width();        
        contactForm();
        eventGotoTopPage();
   });


})();


function contactForm(){  
    var elmCFormBlock = $('#Contact-form-block'); 
    var elmCForm = $('.contact-form__info');
    var hCForm = elmCForm.outerHeight();
    var hFooter = $('#nav-footer').height();    
    elmCForm.css({
        'bottom' : -hCForm ,
        'opacity' : 0
    });
    
    if (w < 768) {
        elmCFormBlock.css({
            'bottom' : 0,
            'z-index' : 1000
        });
    } else{
        elmCFormBlock.css({            
            'z-index' : 998
        });
        $(window).scroll(function() {
            if(w > 768){            
                if ($(this).scrollTop() > $(document).height() - $(window).height() - hFooter) {
                   elmCFormBlock.css({
                        'bottom': hFooter 
                    });
                } else {
                   elmCFormBlock.css('bottom', 0);
                }
            }
        });
    }
            
    $('.form-btn--open').on("click", function(){ 
    console.log("onclick");                     
        elmCForm.css({
                'bottom' : 0  ,
                'opacity' : 1 ,
                'z-index' : 999          
            });         
    });
    $('.form-btn--close').on("click", function(){            
        elmCForm.css({
                'bottom' :  - hCForm,
                'opacity' : 0 ,
                'z-index' : 9                
            });
    }); 
}
function eventGotoTopPage() {
    // hide #back-top first
    $(".top-page").hide();
    $(window).scroll(function() {
        if ($(this).scrollTop() > 150) {
            $('.top-page').fadeIn();
        } else {
            $('.top-page').fadeOut();
        }
    });

    $(".top-page").bind('click', function() {
        $('html, body').animate({
            scrollTop : 0
        }, 500);
    });
}