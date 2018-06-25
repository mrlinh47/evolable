
$(document).ready(function($){
	"use strict";
	
	/////////TO TOP////////////
	function totop_button(a) {
		"use strict";
		var b = $("#back_to_top");
		b.removeClass("off on");
		if (a === "on") {
			b.addClass("on")
		} else {
			b.addClass("off")
		}
	}

    $(window).scroll(function() {
        var b = $(this).scrollTop();
        var c = $(this).height();
        var d;
        if (b > 0) {
            d = b + c / 2
        } else {
            d = 1
        }
        if (d < 1e3) {
            totop_button("off");
        } else {
            totop_button("on");
        }
		
		
	
    })
	
	
    $(document).on('click', '#back_to_top', function(e) {
        e.preventDefault();
        $('body,html').animate({
            scrollTop: 0
        }, $(window).scrollTop() / 3, 'linear')
    })
	
	//loading
	setTimeout(function(){
        $('body').addClass('loaded');
    }, 200);
	
	
	
	

			//nicescroll
				$("html").niceScroll({
				 scrollspeed: 100,	
				mousescrollstep: 100,
				cursorminheight: 200,
				cursorcolor: "#232323",
				cursorwidth: "10px",
				cursorborderradius: "10px",
				cursorborder: "none",
				autohidemode: false,
				background:"rgba(0,0,0,0.3)",
				zindex: 10002
				
			});	
			
			
			if(window.innerWidth>=992){
			$(".left-menu-scroll").niceScroll({
				 scrollspeed: 100,	
				mousescrollstep: 100,
				cursorminheight: 200,
				cursorcolor: "#232323",
				cursorwidth: "10px",
				cursorborderradius: "10px",
				cursorborder: "none",
				autohidemode: false,
				background:"rgba(0,0,0,0.3)",
				zindex: 10002
				
			});	
			}
			

			
	///nav menu	
	if(window.innerWidth<992){
		 $(".navbar-nav li a").click(function(event) {
		$(".navbar-collapse").collapse('hide');
		 });	
	}
	
	if(window.innerWidth>=992){
		$(function(){
		$(".navbar-nav li").hover(function(){
				 $(this).children("ul").stop().fadeIn("slow");
		   },
		   function(){
				 $(this).children("ul").stop().fadeOut(0);   
		});
		});
	}
	
});

 

$(window).bind('resize', function (){
	"use strict";
	if(window.innerWidth>=992){
			$(".left-menu-scroll").niceScroll({
				 scrollspeed: 100,	
				mousescrollstep: 100,
				cursorminheight: 200,
				cursorcolor: "#232323",
				cursorwidth: "10px",
				cursorborderradius: "10px",
				cursorborder: "none",
				autohidemode: false,
				background:"rgba(0,0,0,0.3)",
				zindex: 10002
				
			});	
			}
	else{$(".left-menu-scroll").getNiceScroll().resize();
		}
	
});


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

$(document).ready(function() {
	$("#qtranslate-chooser li:first > a > span").replaceWith("jp");
	$("#qtranslate-chooser li:last > a > span").replaceWith("vn");
});