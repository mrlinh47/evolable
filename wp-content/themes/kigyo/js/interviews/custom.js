(function($){
	$(document).ready(function(){
        $('.int-cont').slimScroll({
            color: '#bcbcbc',
            radius: '0px',
            size: '10px',
            height: '300px',
            // alwaysVisible: false
        });
        $('.go-to-uv').click(function(event) {
            $('html, body').animate({
                scrollTop: $(".candidate").offset().top
            }, 300);
        })
    })
})(jQuery);