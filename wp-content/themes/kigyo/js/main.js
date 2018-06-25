(function($) {
    var w = $(window).width();
    var elmCFormBlock = $('#Contact-form-block'); 
    var elmCForm = $('.contact-form__info');
    var hCForm = $(window).height();
    var hFooter = $('#nav-footer').height(); 
    var elmBtnOpen = $('.form-btn--open');      
    elmCFormBlock.removeClass('active');   
    elmCForm.css({
        'bottom' : -hCForm ,
        'opacity' : 0,
    });
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

        // Smooth scroll
        $(function() {
            $('a.scroll-anchor').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html,body').animate({
                  scrollTop: target.offset().top
                }, 1000);
                return false;
              }
            }
          });
        });

        $(".dropdown-menu > li > a").click(function(){        
          $(this).parents(".dropdown").find('.btn .txtchange').html($(this).text());

          $(this).parents(".dropdown").find('.btn .txtchange').val($(this).data('value'));    
          return true;  
        });

        $(".modal").on("show.bs.modal", function(e) {
            $('html,body').addClass('popup-show');              
        });
        $(".modal").on("hide.bs.modal", function(e) {
            $('html,body').removeClass('popup-show');
        });

        
    })();


    function contactForm(){    
        // var elmCFormBlock = $('#Contact-form-block'); 
        // var elmCForm = $('.contact-form__info');
        // var hCForm = $(window).height();
        // var hFooter = $('#nav-footer').height(); 
        // var elmBtnOpen = $('.form-btn--open');      
        // elmCFormBlock.removeClass('active');    
        // elmCForm.css({
        //     'bottom' : -hCForm ,
        //     'opacity' : 0,
        // });
        
        if (w < 768) {
            elmCFormBlock.css({
                'bottom' : 0,
                // 'z-index' : 999            
            });
            elmBtnOpen.css({
                'bottom' : 10,
                // 'z-index' : 1000
            });
        } else{
            elmCFormBlock.css({            
                // 'z-index' : 998
            });
            elmBtnOpen.css({  
                'bottom' : 0          
                // 'z-index' : 1000
            });
        }
                
        $('.form-btn-execute').on("click", function(){    
            elmCFormBlock.addClass('active');                       
            if(w > 768){              
                elmCForm.css({
                    'bottom' : 0,
                    'opacity' : 1 ,
                });   
            }else{              
                
                $('body').css({'position':'fixed','overflow':'hidden','height':'100%','width':'100%'});
                
                elmCForm.css({                
                    'bottom' : 25,
                    'opacity' : 1 ,                    
                });           
            }                 
            elmBtnOpen.css({            
                'z-index' : 99
            });
        });
        $('.form-btn--close').on("click", function(){
            $('body').removeAttr('style');            
            elmCFormBlock.removeClass('active');        
            // elmCForm.animate({bottom: '-500','opacity' : 0},300);

            elmCForm.css({
                'bottom' :  - hCForm,
                'opacity' : 0 ,              
            });
            elmBtnOpen.css({            
                'z-index' : 1000
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
})(jQuery);

if(window.innerWidth>=992){
    $( ".left-menu-scroll" ).hover(
          function () {
            $(this).addClass('left-menu-show');
          }, 
          function () {
            $(this).removeClass('left-menu-show');
          }
  );
    }