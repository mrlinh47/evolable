jQuery(document).ready(function($) {
	$('.toogle-benefit > p').each(function(){
		$(this).html( $(this).html().replace(/\r?\n/g, '<br />') );
	})
	$('.cate-box-content > p').each(function(){
		$(this).html( $(this).html().replace(/\r?\n/g, '<br />') );
	});

	// scroll bar
	$('.inner-content-div').slimScroll({
    	color: '#ff9912',
    	size: '5px',
	    height: '65px'
    });
  //   $('.box-map-sal').slimScroll({
		// color: '#ff9912',
		// size: '5px',
		// height: '140px'
  //   });

	// slider detail
	var owl = $('.owl-carousel');
		owl.owlCarousel({
		loop: true,
		margin: 0,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		smartSpeed:450,
		responsive: {
			0: {
				items: 1,
				nav: false
			},
			502: {
				items: 2,
				nav: false
			},

			1199: {
				items: 3,
				nav: false,
			},
			1300: {
				items: 4,
				nav: true,
			}
		}
	});
});