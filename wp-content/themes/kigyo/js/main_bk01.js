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
    var elmCFormContent = $('.contact-form__info');
    var hCFormBlock = elmCFormContent.outerHeight();
    console.log(hCFormBlock);
    var hFooter = $('#nav-footer').height();  
    var elmBtnOpen = $('.form-btn--open');   
    elmCFormBlock.css({
        'bottom' : -hCFormBlock 
        
    });
    
    if (w < 768) {
        elmBtnOpen.css({
            'bottom' : 0,
            'z-index' : 1000
        });
    } else{
        elmBtnOpen.css({            
            'z-index' : 998
        });
        $(window).scroll(function() {
            if(w > 768){            
                if ($(this).scrollTop() > $(document).height() - $(window).height() - hFooter) {
                   elmBtnOpen.css({
                        'bottom': hFooter 
                    });                   
                } else {
                   elmBtnOpen.css('bottom', 0);                   
                }
            }
        });
    }
            
    $('.form-btn--open').on("click", function(){ 
    console.log("onclick");                     
        elmCFormBlock.css({
                'bottom' : 0  ,
               
                'z-index' : 999          
            });         
    });
    $('.form-btn--close').on("click", function(){            
        elmCFormBlock.css({
                'bottom' :  - hCFormBlock,
                
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