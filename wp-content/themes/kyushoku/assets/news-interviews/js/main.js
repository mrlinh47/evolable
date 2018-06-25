(function() {
    

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

    eventGotoTopPage();


})();