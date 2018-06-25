 $(document).ready(function(){
	$('.go-to-uv').click(function(event) {
		$('html, body').animate({
			scrollTop: $(".candidate").offset().top
		}, 100);
	});

	$('.int-cont').slimScroll({
		color: '#bcbcbc',
		radius: '0px',
		size: '10px',
		height: '310px'
	});
});